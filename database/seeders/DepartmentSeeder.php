<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    public function run(): void
    {
        Department::insert([
            [
                'name' => 'IT',
                'code' => 'IT',
            ],
            [
                'name' => 'Human Resources',
                'code' => 'HR',
            ],
            [
                'name' => 'Finance',
                'code' => 'FIN',
            ],
            [
                'name' => 'Operations',
                'code' => 'OPS',
            ],
        ]);
    }
}