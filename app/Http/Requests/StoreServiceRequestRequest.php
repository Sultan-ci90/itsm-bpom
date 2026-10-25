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
            'layanan' => 'required|in:zoom,akun,reset_password,tambah_akun,peminjaman,konsultasi,operator,lainnya',
            'lokasi' => 'required|string|max:100',
            'deskripsi' => 'nullable|string',

            // --- Validasi Bersyarat untuk ZOOM ---
            'bidang_id' => 'required_if:layanan,zoom|nullable|exists:bidang,id',
            'nama_acara' => 'required_if:layanan,zoom|nullable|string|max:255',
            'tgl_acara' => 'required_if:layanan,zoom|nullable|date',
            'jam_mulai' => 'required_if:layanan,zoom|nullable|date_format:H:i',
            'jam_selesai' => 'required_if:layanan,zoom|nullable|date_format:H:i|after:jam_mulai',
            'jenis_acara' => 'required_if:layanan,zoom|nullable|string|max:50',
            'butuh_operator' => 'required_if:layanan,zoom|nullable|in:Ya,Tidak',

            // --- Validasi Bersyarat untuk AKUN ---
            'sistem_tujuan' => 'nullable|string|max:100',
            'jenis_pengajuan' => 'nullable|string|max:100',

            // --- Validasi Bersyarat untuk PEMINJAMAN ---
            'jenis_perangkat' => 'required_if:layanan,peminjaman|nullable|string|max:255',
            'tgl_mulai' => 'required_if:layanan,peminjaman|nullable|date',
            'tgl_kembali' => 'required_if:layanan,peminjaman|nullable|date|after_or_equal:tgl_mulai',
            'keperluan' => 'required_if:layanan,peminjaman|nullable|string',
            'lokasi_penggunaan' => 'required_if:layanan,peminjaman|nullable|string|max:100',
        ];
    }

    public function messages(): array
    {
        return [
            'jam_selesai.after' => 'Jam selesai harus lebih besar dari jam mulai.',
            'tgl_kembali.after_or_equal' => 'Tanggal kembali harus sama dengan atau setelah tanggal mulai.',
            'layanan.in' => 'Jenis layanan yang dipilih tidak valid.',
            'bidang_id.required_if' => 'Bidang wajib dipilih untuk permohonan Zoom.',
            'nama_acara.required_if' => 'Nama acara wajib diisi untuk permohonan Zoom.',
            'tgl_acara.required_if' => 'Tanggal acara wajib diisi untuk permohonan Zoom.',
            'jam_mulai.required_if' => 'Jam mulai wajib diisi untuk permohonan Zoom.',
            'jam_selesai.required_if' => 'Jam selesai wajib diisi untuk permohonan Zoom.',
        ];
    }
}
