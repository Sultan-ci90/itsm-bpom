<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    public function run(): void
    {
        Department::updateOrCreate(
            ['code' => 'IT'],
            ['name' => 'IT']
        );

        Department::updateOrCreate(
            ['code' => 'HR'],
            ['name' => 'Human Resources']
        );

        Department::updateOrCreate(
            ['code' => 'FIN'],
            ['name' => 'Finance']
        );

        Department::updateOrCreate(
            ['code' => 'OPS'],
            ['name' => 'Operations']
        );
    }
}