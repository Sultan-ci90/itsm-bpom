<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class GenerateReportRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $user = auth()->user();
        return $user && ($user->isTeknisi() || $user->isAdmin());
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'jenis'           => ['required', 'in:kerusakan,layanan'],
            'periode'         => ['required', 'in:triwulan,bulan,semester,tahun'],

            // Per Triwulan (Per 3 Bulan)
            'tahun_triwulan'  => ['required_if:periode,triwulan', 'nullable', 'integer', 'min:2020', 'max:2099'],
            'triwulan'        => ['required_if:periode,triwulan', 'nullable', 'in:1,2,3,4'],

            // Per Bulan
            'bulan_awal'      => ['required_if:periode,bulan', 'nullable', 'date_format:Y-m'],
            'bulan_akhir'     => ['required_if:periode,bulan', 'nullable', 'date_format:Y-m', 'after_or_equal:bulan_awal'],

            // Per Semester
            'tahun_semester'  => ['required_if:periode,semester', 'nullable', 'integer', 'min:2020', 'max:2099'],
            'semester'        => ['required_if:periode,semester', 'nullable', 'in:1,2'],

            // Per Tahun
            'tahun'           => ['required_if:periode,tahun', 'nullable', 'integer', 'min:2020', 'max:2099'],
        ];
    }

    /**
     * Custom validation rules and messages.
     */
    public function withValidator($validator)
    {
        $validator->after(function ($v) {
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
            'required_if'                   => ':attribute wajib diisi untuk periode yang dipilih.',
            'in'                            => ':attribute tidak valid.',
            'date_format'                   => ':attribute harus berupa format YYYY-MM (Bulan-Tahun).',
            'after_or_equal'                => ':attribute tidak boleh lebih awal dari tanggal/bulan awal.',
            'bulan_akhir.after_or_equal'    => 'Bulan akhir tidak boleh lebih kecil dari bulan awal.',
        ];
    }
}
