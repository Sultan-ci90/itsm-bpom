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
            'judul_permintaan' => 'required|string|max:255|min:5',
            'kategori' => 'required|in:Insiden,Permintaan Layanan',
            'prioritas' => 'required|in:Rendah,Sedang,Tinggi,Darurat',
            'asset_id' => 'nullable|exists:assets,id',
            'deskripsi' => 'required|string|min:10',
        ];
    }

    public function messages(): array
    {
        return [
            'judul_permintaan.required' => 'Judul permintaan wajib diisi.',
            'judul_permintaan.min' => 'Judul permintaan minimal 5 karakter.',
            'kategori.required' => 'Silakan pilih kategori.',
            'prioritas.required' => 'Silakan pilih prioritas.',
            'deskripsi.required' => 'Deskripsi wajib diisi.',
            'deskripsi.min' => 'Deskripsi minimal 10 karakter.',
        ];
    }
}
