# 📘 Dokumentasi Proyek: ITSM BPOM

**Repository:** https://github.com/Sultan-ci90/itsm-bpom  
**Stack:** Laravel 12 · PHP 8.4 · MySQL · Tailwind (TailAdmin) · Alpine.js · TomSelect  
**Terakhir diperbarui:** 5 Oktober 2026

---

## 1. Ringkasan Proyek

Aplikasi **IT Service Management (ITSM)** untuk BPOM yang mencakup:
- Manajemen aset TI (inventaris komputer/jaringan/telekomunikasi)
- Pelaporan kendala/incident oleh user
- Service Request dengan alur approval multi-level
- Dashboard monitoring tiket & SLA
- Autentikasi berbasis role (Admin, Teknisi, Pelapor/User)

---

## 2. Struktur Branch Git

| Branch | Fungsi | Status |
|--------|--------|--------|
| `main` | Produksi / stabil | ✅ Sinkron dengan GitHub |
| `development` | Pengembangan fitur baru | ✅ Sinkron dengan GitHub |
| `testing` | QA / pengujian | ✅ Sinkron dengan GitHub |

**Alur kerja:** `development` → `testing` → `main`. Ketiga branch saat ini berada pada commit yang sama (`8267895`).

### Fitur Tambahan (push manual dari laptop, commit `1318099`)
- **Halaman Choice per Role:** `resources/views/pages/choice/index.blade.php` — menu pilihan fitur sesuai akun user
- **Detail Incident:** `resources/views/incidents/show.blade.php` + Request `UpdateIncident.php`
- **Model baru:** `app/Models/TicketResolution.php` (resolusi tiket)
- **Seeder baru:** `database/seeders/PelaporanSeeder.php`
- **Favicon ITSM:** `public/images/logo/itsmfavicon.svg`

---

## 3. Modul Utama

### 3.1 Autentikasi & User
- **Controller:** `app/Http/Controllers/Auth/LoginController.php`
- **Login manual** (tanpa Breeze): validasi email + password via `Auth::attempt()`
- ⚠️ Kolom `is_active` sudah dihapus dari tabel `users` — jangan gunakan sebagai filter login lagi (sudah diperbaiki di commit `9ae7991`)
- Register user baru otomatis dapat role default "User"

### 3.2 Aset TI (Assets)
- **Model:** `app/Models/Asset.php` — kolom `nama_barang`, `kode_barang`, `nup`, `lokasi`, `penanggung_jawab_id`
- CRUD aset untuk admin; dropdown searchable via **TomSelect** (CDN v2.2.2 dimuat di `layouts/app.blade.php` & `fullscreen-layout.blade.php`)
- Endpoint AJAX: `GET /api/assets/{id}` → auto-fill lokasi aset

### 3.3 Incident / Lapor Kendala
- **Controller:** `app/Http/Controllers/IncidentController.php`
- **Request:** `app/Http/Requests/StoreIncidentRequest.php`
  - Validasi: `asset_id` (required, exists), `deskripsi_masalah` (min 10 karakter), `foto_kendala` (nullable, image max 2MB)
- **Views:** `resources/views/incidents/create.blade.php`, `index.blade.php`
- Nomor aduan otomatis: format `TIK-YYYYMMDD-XXXX`
- Status awal: `"Belum diperiksa"` + tercatat di `TicketHistory`

### 3.4 Service Request
- **Controller:** `app/Http/Controllers/ServiceRequestController.php`
  - Method: `index()`, `all()`, `show()`, `create()`, `store()`
- **Migrasi:** `req_details`, `req_approvals`, `req_sasarans`, `req_indikator`, `req_justifikasis`
- **Views:** `resources/views/service-requests/*` (list, create, show)
- Menu sidebar: **Request Baru** (`service-requests.create`) & **Request Saya** (`service-requests.index`)

### 3.5 Dashboard
- Statistik tiket per status, grafik, recent tickets
- Sudah disesuaikan dengan skema database hasil perombakan (kolom `name` → `nama`, relasi role/department) — commit `0b4df1c`

---

## 4. Skema Database (Hasil Rombak)

Skema digabung dalam satu migration utama:
```
database/migrations/xxxx_create_itsm_schema_tables.php
```
Seeder data awal:
```
database/seeders/ItsmSeeder.php
```

**Tabel inti:** `users`, `assets`, `tickets`, `ticket_histories`, `req_details`, `req_approvals`, `req_sasarans`, `req_indikator`, `req_justifikasis`, `bidangs`, `jabatans`

⚠️ Catatan penting:
- Migration lama sudah dihapus — **jangan jalankan `migrate:rollback`** untuk migration incident/service-request versi lama
- Foreign key harus pakai nama eksplisit unik (contoh: `fk_tickets_pelapor_id`) agar tidak bentrok di MySQL (`Duplicate foreign key constraint name`)
- File database SQLite lama (`tailadmin_laravel`) sudah dikeluarkan dari Git tracking — jangan dilacak lagi

---

## 5. Akun Default Login

Jalankan seeder terlebih dahulu:
```bash
php artisan migrate:fresh --seed
```

| Role | Email | Password |
|------|-------|----------|
| Admin | `admin@bpom.test` | `password` |
| Teknisi | `teknisi@bpom.test` | `password` |
| Pelapor/User | `pelapor@bpom.test` | `password` |

---

## 6. Setup Lokal (Laragon/XAMPP)

```bash
git clone https://github.com/Sultan-ci90/itsm-bpom.git
cd itsm-bpom
git checkout main

composer install
cp .env.example .env
php artisan key:generate

# Setting database MySQL di .env:
# DB_CONNECTION=mysql
# DB_HOST=127.0.0.1
# DB_DATABASE=itsm_bpom
# DB_USERNAME=root
# DB_PASSWORD=(kosongkan jika Laragon default)

npm install && npm run build

php artisan migrate:fresh --seed
php artisan storage:link
php artisan serve
```

Akses: **http://127.0.0.1:8000** → login dengan akun di atas.

---

## 7. Riwayat Error & Solusi (Troubleshooting Log)

| # | Error | Penyebab | Solusi |
|---|-------|----------|--------|
| 1 | `could not find driver (sqlite)` | Session driver sqlite tanpa ekstensi | `SESSION_DRIVER=file` di `.env` atau aktifkan `pdo_sqlite` |
| 2 | `NOT NULL constraint failed: tickets.nomor_aduan` | Seeder lama tidak isi kolom wajib | Seeder diperbarui isi lengkap; kolom `title` dibuat nullable |
| 3 | `Duplicate foreign key constraint 'tickets_user_id_foreign'` | FK nama default bentrok antar migration | FK diberi nama eksplisit unik (`fk_tickets_*`) |
| 4 | `Unknown column 'is_active'` saat login | Filter login masih pakai kolom yang sudah dihapus | Hapus `'is_active' => true` dari `Auth::attempt()` (commit `9ae7991`) |
| 5 | Menu Request Baru/Saya → 404 | Route & controller terhapus saat perombakan | Method `index/all/show` dikembalikan + route diperbarui |
| 6 | Conflict merge `tailadmin_laravel` | File DB ikut di-track Git | `git rm --cached tailadmin_laravel`, masuk `.gitignore` |
| 7 | Error case-sensitive `loginController.php` | Linux bedakan huruf besar/kecil | Rename via `git mv` → `Auth/LoginController.php` |
| 8 | Dashboard error `name` vs `nama` | Skema diubah tapi view/controller belum ikut | Disesuaikan di commit `0b4df1c` |

---

## 8. Konvensi & Catatan Pengembangan

1. **Frontend:** Template TailAdmin + Alpine.js. Komponen `<select>` searchable cukup beri class/attribute yang di-init TomSelect (helper global tersedia di layout).
2. **Upload file:** Foto kendala disimpan ke `storage/app/public/kendala_photos` — wajib `php artisan storage:link`.
3. **Nomor tiket:** Generate berurutan per hari (`TIK-YYYYMMDD-XXXX`), query last record dengan pola tanggal.
4. **History tiket:** Setiap perubahan status dicatat ke `ticket_histories` (`status_label`, `keterangan`).
5. **Commit pesan:** Gunakan prefix jelas (`feat:`, `fix:`, `chore:`).
6. **Sebelum push:** Pastikan `php artisan route:list` jalan tanpa error dan halaman utama merespons.

---

## 9. Keamanan ⚠️

- **Segera revoke PAT GitHub** (`ghp_nwP...`) yang pernah dibagikan di chat, lalu buat token baru.
- Jangan commit `.env`, file database, atau kredensial ke repository.
- Ganti password akun default sebelum deploy ke server produksi.

---

## 10. Perintah Berguna (Cheat Sheet)

```bash
# Sinkron repo lokal dengan remote
git pull origin main

# Reset total database + data contoh
php artisan migrate:fresh --seed

# Bersihkan semua cache
php artisan optimize:clear

# Cek daftar route
php artisan route:list

# Build ulang asset frontend
npm run build

# Jalankan server
php artisan serve
```
