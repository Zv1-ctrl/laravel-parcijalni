<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
        ['email' => 'admin@test.com'],
        [
            'name' => 'Admin User',
            'datumrod' => '2005-10-30',
            'password' => Hash::make('password'),
            'usertype' => 0,
        ]
    );
    }
}
