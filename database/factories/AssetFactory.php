<?php

namespace Database\Factories;

use App\Models\Asset;
use Illuminate\Database\Eloquent\Factories\Factory;

class AssetFactory extends Factory
{
    protected $model = Asset::class;

    public function definition(): array
    {
        return [
            'kode_barang' => strtoupper($this->faker->unique()->bothify('KB-####??')),
            'nama_barang' => $this->faker->randomElement([
                'Laptop Lenovo ThinkPad', 'Printer Epson L3210', 'Proyektor Epson EB-X51',
                'Monitor LG 24 Inch', 'PC Desktop Rakitan', 'Scanner Epson DS-670',
                'AC Split Panasonic', 'Televisi Samsung 43"', 'Router Mikrotik',
                'UPS APC 650VA', 'Keyboard & Mouse Wireless', 'Weblog Logitech C270',
            ]) . ' ' . $this->faker->numberBetween(1, 99),
            'nup' => $this->faker->unique()->numerify('##############'),
            'lokasi' => $this->faker->randomElement([
                'Lantai 1 - Ruang Pelayanan', 'Lantai 2 - Ruang IT', 'Lantai 3 - Ruang Kepala',
                'Gudang', 'Ruang Rapat Utama', 'Lobby',
            ]),
        ];
    }
}
