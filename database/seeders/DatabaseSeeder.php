<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Warga;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'ujang',
            'username' => 'admin',
            'password' => bcrypt('admin123'),
        ]);

        Warga::create([
            'name' => 'joni',
            'username' => 'tiara',
            'password' => bcrypt('warga123'),
        ]);
    }
}
