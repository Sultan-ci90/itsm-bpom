<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class GenerateReportRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $user = auth()->user();
        return $user && $user->isAdmin();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $isAssetHistory = fn () => $this->input('jenis') === 'riwayat_kerusakan';

        return [
            'jenis'           => ['required', 'in:kerusakan,layanan,riwayat_kerusakan'],
            'asset_id'        => ['required_if:jenis,riwayat_kerusakan', 'nullable', 'integer', 'exists:assets,id'],
            'periode'         => ['required_unless:jenis,riwayat_kerusakan', 'nullable', 'in:triwulan,bulan,semester,tahun'],

            // Per Triwulan (Per 3 Bulan)
            'tahun_triwulan'  => [Rule::requiredIf(fn () => !$isAssetHistory() && $this->input('periode') === 'triwulan'), 'nullable', 'integer', 'min:2020', 'max:2099'],
            'triwulan'        => [Rule::requiredIf(fn () => !$isAssetHistory() && $this->input('periode') === 'triwulan'), 'nullable', 'in:1,2,3,4'],

            // Per Bulan
            'bulan_awal'      => [Rule::requiredIf(fn () => !$isAssetHistory() && $this->input('periode') === 'bulan'), 'nullable', 'date_format:Y-m'],
            'bulan_akhir'     => [Rule::requiredIf(fn () => !$isAssetHistory() && $this->input('periode') === 'bulan'), 'nullable', 'date_format:Y-m', 'after_or_equal:bulan_awal'],

            // Per Semester
            'tahun_semester'  => [Rule::requiredIf(fn () => !$isAssetHistory() && $this->input('periode') === 'semester'), 'nullable', 'integer', 'min:2020', 'max:2099'],
            'semester'        => [Rule::requiredIf(fn () => !$isAssetHistory() && $this->input('periode') === 'semester'), 'nullable', 'in:1,2'],

            // Per Tahun
            'tahun'           => [Rule::requiredIf(fn () => !$isAssetHistory() && $this->input('periode') === 'tahun'), 'nullable', 'integer', 'min:2020', 'max:2099'],
        ];
    }

    /**
     * Custom validation rules and messages.
     */
    public function withValidator($validator)
    {
        $validator->after(function ($v) {
            if ($this->input('jenis') === 'riwayat_kerusakan') {
                return;
            }

            $periode = $this->input('periode');

            // Validasi batas maksimal 2 tahun untuk periode bulan
            if ($periode === 'bulan' && $this->filled('bulan_awal') && $this->filled('bulan_akhir')) {
                try {
                    $start = Carbon::createFromFormat('Y-m', $this->input('bulan_awal'))->startOfMonth();
                    $end = Carbon::createFromFormat('Y-m', $this->input('bulan_akhir'))->startOfMonth();

                    if ($start->copy()->addMonths(24)->lt($end->copy()->addMonth())) {
                        $v->errors()->add('bulan_akhir', 'Rentang bulan maksimal tidak boleh melebihi 2 tahun (24 bulan).');
                    }
                } catch (\Exception $e) {
                    // Penanganan format bulan ditangani oleh rule 'date_format:Y-m'
                }
            }
        });
    }

    /**
     * Custom attribute names.
     */
    public function attributes(): array
    {
        return [
            'jenis'           => 'Jenis Laporan',
            'asset_id'        => 'Aset / Barang BMN',
            'periode'         => 'Pilihan Periode',
            'tahun_triwulan'  => 'Tahun Triwulan',
            'triwulan'        => 'Pilihan Triwulan',
            'bulan_awal'      => 'Bulan Awal',
            'bulan_akhir'     => 'Bulan Akhir',
            'tahun_semester'  => 'Tahun Semester',
            'semester'        => 'Pilihan Semester',
            'tahun'           => 'Tahun Laporan',
        ];
    }

    /**
     * Custom validation messages.
     */
    public function messages(): array
    {
        return [
            'required'                      => ':attribute wajib dipilih atau diisi.',
            'required_if'                   => ':attribute wajib dipilih untuk jenis atau periode laporan tersebut.',
            'required_unless'               => ':attribute wajib dipilih.',
            'in'                            => ':attribute tidak valid.',
            'date_format'                   => ':attribute harus berupa format YYYY-MM (Bulan-Tahun).',
            'after_or_equal'                => ':attribute tidak boleh lebih awal dari tanggal/bulan awal.',
            'bulan_akhir.after_or_equal'    => 'Bulan akhir tidak boleh lebih kecil dari bulan awal.',
        ];
    }
}
