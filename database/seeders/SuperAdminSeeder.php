<?php

namespace Database\Seeders;

use App\Models\User;
use App\Support\Roles;
use Illuminate\Database\Seeder;

class SuperAdminSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::firstOrCreate(
            ['email' => env('NPD_SUPER_ADMIN_EMAIL', 'admin@nationalpolicydialogue.test')],
            [
                'name' => env('NPD_SUPER_ADMIN_NAME', 'NPD Super Admin'),
                'password' => env('NPD_SUPER_ADMIN_PASSWORD', 'password'),
                'status' => 'active',
            ],
        );

        $user->assignRole(Roles::SUPER_ADMIN);
    }
}
