<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTicketRequest extends FormRequest
{
    public function authorize(): bool
    {
        // Hanya teknisi dan admin yang boleh memproses tiket
        return auth()->user()->isTeknisi() || auth()->user()->isAdmin();
    }

    public function rules(): array
    {
        return [
            'status' => 'required|in:Sedang diproses,Selesai,Ditolak',
            'jenis_penyelesaian' => 'required|in:Internal,Pihak ke-3',
            
            // Validasi Bersyarat: Wajib jika Pihak ke-3
            'vendor' => 'required_if:jenis_penyelesaian,Pihak ke-3|nullable|string|max:150',
            'estimasi_biaya' => 'required_if:jenis_penyelesaian,Pihak ke-3|nullable|numeric|min:0',
            'file_surat_justifikasi' => 'nullable|file|mimes:pdf,doc,docx|max:5120', // Max 5MB

            // Analisa & Tindak Lanjut
            'tgl_analisa' => 'required|date',
            'analisa_teknis' => 'required|string|min:10',
            'tgl_tindak_lanjut' => 'required|date',
            'tindak_lanjut_teknis' => 'required|string|min:10',
            
            // Hasil (Wajib jika status Selesai)
            'tgl_hasil' => 'required_if:status,Selesai|nullable|date',
            'hasil' => 'required_if:status,Selesai|nullable|string|min:10',
        ];
    }

    public function messages(): array
    {
        return [
            'vendor.required_if' => 'Nama vendor wajib diisi jika menggunakan Pihak ke-3.',
            'estimasi_biaya.required_if' => 'Estimasi biaya wajib diisi jika menggunakan Pihak ke-3.',
            'hasil.required_if' => 'Kolom hasil wajib diisi jika status diubah menjadi Selesai.',
        ];
    }
}