<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use App\Models\Department;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $adminRole = Role::where('name', 'Admin')->firstOrFail();
        $itDepartment = Department::where('code', 'IT')->firstOrFail();

        User::updateOrCreate(
            [
                'email' => 'admin@itsm-bpom.test',
            ],
            [
                'name' => 'Administrator',
                'phone' => '081234567890',
                'department_id' => $itDepartment->id,
                'role_id' => $adminRole->id,
                'password' => Hash::make('password'),
                'is_active' => true,
                'email_verified_at' => now(),
            ]
        );
    }
}