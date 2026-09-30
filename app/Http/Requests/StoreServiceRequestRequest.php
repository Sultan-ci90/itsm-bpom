<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreServiceRequestRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'layanan' => 'required|in:zoom,akun,peminjaman,konsultasi,operator',
            'lokasi' => 'required|string|max:100',
            'deskripsi' => 'nullable|string',

            // --- Validasi Bersyarat untuk ZOOM ---
            'bidang_id' => 'required_if:layanan,zoom|exists:bidang,id',
            'nama_acara' => 'required_if:layanan,zoom|string|max:255',
            'jam_mulai' => 'required_if:layanan,zoom|date_format:H:i',
            'jam_selesai' => 'required_if:layanan,zoom|date_format:H:i|after:jam_mulai',
            'jenis_acara' => 'required_if:layanan,zoom|string|max:50',
            'butuh_operator' => 'required_if:layanan,zoom|in:Ya,Tidak',
            'bentuk_ruangan' => 'required_if:layanan,zoom|string|max:100',
            'jumlah_kursi' => 'required_if:layanan,zoom|integer|min:1',

            // --- Validasi Bersyarat untuk AKUN ---
            'jenis_pengajuan' => 'required_if:layanan,akun|string|max:100',
            'sistem_tujuan' => 'required_if:layanan,akun|string|max:100',
            'nip_terkait' => 'required_if:layanan,akun|string|max:50',

            // --- Validasi Bersyarat untuk PEMINJAMAN ---
            'jenis_perangkat' => 'required_if:layanan,peminjaman|string|max:255',
            'tgl_mulai' => 'required_if:layanan,peminjaman|date|after_or_equal:today',
            'tgl_kembali' => 'required_if:layanan,peminjaman|date|after:tgl_mulai',
            'keperluan' => 'required_if:layanan,peminjaman|string',
            'lokasi_penggunaan' => 'required_if:layanan,peminjaman|string|max:100',
        ];
    }

    public function messages(): array
    {
        return [
            'jam_selesai.after' => 'Jam selesai harus lebih besar dari jam mulai.',
            'tgl_kembali.after' => 'Tanggal kembali harus lebih besar dari tanggal mulai.',
            // Tambahkan custom message lain jika perlu
        ];
    }
}