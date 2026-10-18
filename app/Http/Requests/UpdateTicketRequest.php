<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'status' => 'required|in:Sedang diproses,Selesai',
            'jenis_penyelesaian' => 'required|in:Internal,Pihak ke-3',

            // Pemeriksa harus user dengan role teknisi/admin
            'pemeriksa_id' => [
                'required',
                Rule::exists('users', 'id')->whereIn('role', ['teknisi', 'admin']),
            ],

            // Analisa (opsional) & tindak lanjut (wajib)
            'tgl_analisa' => 'nullable|date',
            'analisa_teknis' => 'nullable|string',
            'tgl_tindak_lanjut' => 'required|date',
            'tindak_lanjut_teknis' => 'required|string|min:5',

            // Hasil (wajib jika status Selesai)
            'tgl_hasil' => 'required_if:status,Selesai|nullable|date',
            'hasil' => 'required_if:status,Selesai|nullable|string|min:10',
        ];
    }

    public function messages(): array
    {
        return [
            'status.required' => 'Status wajib dipilih.',
            'status.in' => 'Status tidak valid.',
            'pemeriksa_id.required' => 'Pemeriksa wajib dipilih.',
            'tgl_tindak_lanjut.required' => 'Tanggal tindak lanjut wajib diisi.',
            'tindak_lanjut_teknis.required' => 'Tindak lanjut tim teknis wajib diisi.',
            'tindak_lanjut_teknis.min' => 'Tindak lanjut tim teknis minimal 5 karakter.',
            'tgl_hasil.required_if' => 'Tanggal hasil wajib diisi jika status Selesai.',
            'hasil.required_if' => 'Kolom hasil wajib diisi jika status diubah menjadi Selesai.',
        ];
    }
}