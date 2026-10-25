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

    protected function prepareForValidation(): void
    {
        $action = $this->input('action_type', 'selesai');
        $data = [];
        if ($action === 'draft') {
            $data['status'] = 'Sedang diproses';
            $data['action_type'] = 'draft';
        } else {
            $data['status'] = 'Selesai';
            $data['action_type'] = 'selesai';
        }

        // Kunci pemeriksa_id jika tiket sudah punya resolusi atau fallback ke user yang sedang login
        $ticket = $this->route('ticket');
        if ($ticket instanceof \App\Models\Ticket && $ticket->resolution?->pemeriksa_id) {
            $data['pemeriksa_id'] = $ticket->resolution->pemeriksa_id;
        } elseif (!$this->filled('pemeriksa_id')) {
            $data['pemeriksa_id'] = auth()->id();
        }

        $this->merge($data);
    }

    public function rules(): array
    {
        return [
            'action_type' => 'required|in:draft,selesai',
            'status' => 'required|in:Sedang diproses,Selesai',

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

            // Penyelesaian & Hasil (wajib hanya jika aksi Selesai)
            'jenis_penyelesaian' => 'required_if:action_type,selesai|nullable|in:mandiri,Pihak ke-3',
            'tgl_hasil' => 'required_if:action_type,selesai|nullable|date',
            'hasil' => 'required_if:action_type,selesai|nullable|string|min:5',
        ];
    }

    public function messages(): array
    {
        return [
            'pemeriksa_id.required' => 'Pemeriksa wajib dipilih.',
            'tgl_tindak_lanjut.required' => 'Tanggal tindak lanjut wajib diisi.',
            'tindak_lanjut_teknis.required' => 'Tindak lanjut tim teknis wajib diisi.',
            'tindak_lanjut_teknis.min' => 'Tindak lanjut tim teknis minimal 5 karakter.',
            'jenis_penyelesaian.required_if' => 'Jenis penyelesaian wajib dipilih untuk menyelesaikan tiket.',
            'tgl_hasil.required_if' => 'Tanggal hasil wajib diisi untuk menyelesaikan tiket.',
            'hasil.required_if' => 'Kolom hasil wajib diisi untuk menyelesaikan tiket.',
            'hasil.min' => 'Kolom hasil minimal 5 karakter.',
        ];
    }
}
