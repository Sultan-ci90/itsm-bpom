<?php

namespace Database\Seeders;

use App\Models\KnowledgeBase;
use App\Models\User;
use Illuminate\Database\Seeder;

class KnowledgeBaseSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::where('role', 'admin')->first() ?? User::first();

        $guides = [
            [
                'judul' => 'Cara Mengatasi Printer Canon / Epson Status Offline pada Windows',
                'slug' => 'cara-mengatasi-printer-status-offline-windows',
                'kategori' => 'Hardware & Printer',
                'ringkasan' => 'Panduan cepat mengatasi printer yang terdeteksi "Offline" atau antrean cetak tersangkut (spooler error).',
                'solusi' => "Kendala printer offline sering kali disebabkan oleh kabel USB/koneksi LAN longgar, atau layanan print spooler Windows yang berhenti berjalan.

Berikut langkah perbaikan mandiri:
1. **Periksa Fisik Kabel & Daya**:
   - Pastikan kabel daya printer menyala (lampu indikator hijau stabil).
   - Cabut dan pasang kembali kabel USB printer ke port USB yang berbeda di komputer/laptop.
2. **Restart Layanan Print Spooler**:
   - Tekan tombol **Windows + R** pada keyboard.
   - Ketik `services.msc` lalu tekan **Enter**.
   - Cari layanan bernama **Print Spooler**.
   - Klik kanan pada **Print Spooler**, lalu pilih **Restart**.
3. **Ubah Status Printer Menjadi Online**:
   - Buka **Control Panel > Devices and Printers** (atau *Settings > Bluetooth & devices > Printers & scanners*).
   - Klik kanan pada printer Anda, pilih **See what's printing**.
   - Pada menu bar jendela antrean, klik tab **Printer**, dan pastikan opsi **Use Printer Offline** TIDAK dicentang.
4. **Coba Cetak Test Page**:
   - Lakukan cetak dokumen percobaan. Jika kertas keluar normal, kendala telah teratasi.",
                'is_published' => true,
                'helpful_yes' => 12,
                'helpful_no' => 1,
                'views' => 45,
                'created_by' => $admin?->id,
            ],
            [
                'judul' => 'Panduan Menghubungkan Laptop Pegawai ke Jaringan Wi-Fi BPOM-Secure',
                'slug' => 'panduan-koneksi-wifi-bpom-secure',
                'kategori' => 'Jaringan & Internet',
                'ringkasan' => 'Langkah autentikasi Wi-Fi resmi kantor BPOM menggunakan akun NIP / email pegawai.',
                'solusi' => "Jaringan Wi-Fi BPOM-Secure menggunakan protokol keamanan WPA2-Enterprise yang mewajibkan autentikasi akun resmi pegawai BPOM.

Langkah-langkah koneksi:
1. Klik ikon Wi-Fi di pojok kanan bawah taskbar Windows.
2. Pilih SSID **BPOM-Secure** lalu klik **Connect**.
3. Saat diminta kredensial:
   - **Username**: Masukkan NIP Anda (tanpa spasi).
   - **Password**: Masukkan kata sandi akun email/portal SSO BPOM Anda.
4. Jika muncul notifikasi sertifikat server (*Continue connecting?*), klik tombol **Connect / Lanjutkan**.
5. Tunggu 5-10 detik hingga status berubah menjadi **Connected, secured**.
6. Apabila gagal terhubung (status *Can't connect to this network*), klik kanan SSID BPOM-Secure, pilih **Forget**, lalu hubungkan ulang dari langkah 1.",
                'is_published' => true,
                'helpful_yes' => 28,
                'helpful_no' => 0,
                'views' => 89,
                'created_by' => $admin?->id,
            ],
            [
                'judul' => 'Tata Cara Reset Mandiri Password Akun Aplikasi SSO BPOM',
                'slug' => 'tata-cara-reset-mandiri-password-sso-bpom',
                'kategori' => 'Akun & Akses',
                'ringkasan' => 'Prosedur pemulihan kata sandi akun SSO mandiri bila lupa sandi atau akun terkunci.',
                'solusi' => "Jika Anda lupa kata sandi akun SSO BPOM, Anda dapat meresetnya secara mandiri tanpa harus menunggu tiket IT diproses:

Langkah-langkah reset kata sandi:
1. Buka portal login resmi BPOM di peramban (browser).
2. Di bawah form isian login, klik tautan **Lupa Password?** atau *Forgot Password*.
3. Masukkan **NIP** atau **Email resmi BPOM** Anda yang terdaftar pada sistem kepegawaian.
4. Masukkan kode Captcha yang tampil di layar, lalu klik tombol **Kirim Tautan Reset**.
5. Buka kotak masuk email dinas Anda (cek juga folder *Spam / Junk*).
6. Buka email dari *Admin IT BPOM* dan klik tautan **Atur Ulang Kata Sandi**.
7. Buat kata sandi baru dengan ketentuan:
   - Minimal 8 karakter.
   - Mengandung kombinasi huruf besar, huruf kecil, dan angka.
8. Simpan dan coba login kembali dengan kata sandi yang baru.",
                'is_published' => true,
                'helpful_yes' => 19,
                'helpful_no' => 2,
                'views' => 64,
                'created_by' => $admin?->id,
            ],
            [
                'judul' => 'Solusi Suara & Audio Zoom Meeting Tidak Terdengar saat Rapat Daring',
                'slug' => 'solusi-audio-zoom-meeting-tidak-terdengar',
                'kategori' => 'Aplikasi BPOM',
                'ringkasan' => 'Mengatasi masalah speaker tidak bersuara atau mikrofon tidak masuk pada aplikasi Zoom Meeting.',
                'solusi' => "Masalah suara pada Zoom sering terjadi karena perangkat output/input salah terpilih atau belum diberikan izin akses audio di Windows.

Langkah-langkah penyelesaian:
1. **Periksa Sambungan Audio Zoom**:
   - Di pojok kiri bawah jendela Zoom, lihat ikon mikrofon.
   - Jika ikonnya berupa headphone dengan panah hijau bertuliskan **Join Audio**, klik tombol tersebut dan pilih **Join with Computer Audio**.
2. **Pilih Speaker yang Tepat**:
   - Klik tanda panah kecil (^) di sebelah ikon Mikrofon.
   - Di bagian **Select a Speaker**, pastikan dicentang ke speaker yang sedang aktif (misalnya *Realtek(R) Audio* atau *Headphones*, bukan monitor HDMI).
   - Klik **Test Speaker & Microphone...** untuk mendengarkan nada dering uji coba.
3. **Periksa Pengaturan Volume Windows**:
   - Pastikan volume Windows tidak dalam kondisi Mute.
   - Klik kanan ikon speaker di taskbar Windows > pilih **Open Volume Mixer** > pastikan slider volume untuk aplikasi Zoom berada di atas 70%.
4. **Perizinan Mikrofon Windows**:
   - Buka **Settings > Privacy & Security > Microphone**.
   - Pastikan opsi **Microphone access** dan **Let desktop apps access your microphone** berada dalam posisi **ON**.",
                'is_published' => true,
                'helpful_yes' => 15,
                'helpful_no' => 1,
                'views' => 52,
                'created_by' => $admin?->id,
            ],
            [
                'judul' => 'Panduan Mengatasi Browser Cache & Kendala Login Aplikasi Portal BPOM',
                'slug' => 'panduan-mengatasi-browser-cache-portal-bpom',
                'kategori' => 'Aplikasi BPOM',
                'ringkasan' => 'Solusi tampilan halaman berantakan (*blank screen*) atau gagal login karena cache lama browser.',
                'solusi' => "Ketika aplikasi web BPOM baru saja diperbarui versinya, browser sering kali masih menyimpan cache kode lama (*outdated scripts*), yang menyebabkan tombol tidak merespons atau halaman putih.

Langkah-langkah membersihkan cache:
1. **Hard Refresh Halaman**:
   - Buka halaman portal aplikasi BPOM yang bermasalah.
   - Tekan kombinasi tombol **Ctrl + F5** (atau **Ctrl + Shift + R**) secara bersamaan. Halaman akan dimuat ulang dengan aset terbaru.
2. **Buka Melalui Mode Penyamaran (Incognito)**:
   - Tekan **Ctrl + Shift + N** di Google Chrome / Microsoft Edge.
   - Buka alamat portal aplikasi. Jika di mode Incognito berhasil normal, kendala dipastikan akibat cache browser lama.
3. **Bersihkan Cache & Cookie Browser**:
   - Di Google Chrome / Edge, tekan tombol **Ctrl + Shift + Delete**.
   - Pilih rentang waktu: **All time (Semua waktu)**.
   - Centang opsi:
     - *Cookies and other site data*
     - *Cached images and files*
   - Klik tombol **Clear data (Hapus data)**.
   - Tutup seluruh jendela browser, buka kembali, dan coba login.",
                'is_published' => true,
                'helpful_yes' => 22,
                'helpful_no' => 0,
                'views' => 77,
                'created_by' => $admin?->id,
            ],
        ];

        foreach ($guides as $guide) {
            KnowledgeBase::updateOrCreate(
                ['slug' => $guide['slug']],
                $guide
            );
        }
    }
}
