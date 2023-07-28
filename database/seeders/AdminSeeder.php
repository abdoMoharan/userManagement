<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Abdelrahman',
             'email' => 'admin@admin.com',
             'password' => Hash::make('123'),
             'mobile' => '01127449235',
             'type' => 'admin'
         ])->assignRole('writer', 'admin');

        }
}
