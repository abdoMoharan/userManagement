<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Create the "sidebar" permission
         Permission::create(['name' => 'sidebar']);
         Permission::create(['name' => 'dashboard']);

         // Assign the "sidebar" permission to the "admin" role
         $role = Role::where('name', 'admin')->first();
         $role->givePermissionTo(['sidebar','dashboard']);

    }
}
