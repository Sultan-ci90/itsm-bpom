<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreIncidentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Sesuaikan dengan policy jika ada
    }

    public function rules(): array
    {
        return [
            'pelapor_id' => 'nullable|exists:users,id',
            'jenis_kendala' => 'required|in:aset,lainnya',
            'asset_id' => 'required_if:jenis_kendala,aset|nullable|exists:assets,id',
            'deskripsi_masalah' => 'required|string|min:10',
            'foto_kendala' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Max 2MB
        ];
    }

    public function messages(): array
    {
        return [
            'jenis_kendala.required' => 'Silakan pilih jenis kendala.',
            'jenis_kendala.in' => 'Pilihan jenis kendala tidak valid.',
            'asset_id.required_if' => 'Silakan pilih aset/barang TIK terlebih dahulu.',
            'asset_id.exists' => 'Aset tidak ditemukan.',
            'deskripsi_masalah.required' => 'Deskripsi masalah wajib diisi.',
            'deskripsi_masalah.min' => 'Deskripsi masalah minimal 10 karakter.',
            'foto_kendala.image' => 'File harus berupa gambar.',
            'foto_kendala.mimes' => 'Format gambar harus jpeg/png/jpg.',
            'foto_kendala.max' => 'Ukuran gambar maksimal 2MB.',
        ];
    }
}
