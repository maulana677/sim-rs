<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat Role
        $admin = Role::create(['name' => 'Admin']);
        $regis = Role::create(['name' => 'Regis']);

        // Buat Permission
        Permission::create(['name' => 'create patient']);
        Permission::create(['name' => 'view patient']);

        // Assign Permission ke Role
        $admin->givePermissionTo(['create patient', 'view patient']);
        $regis->givePermissionTo(['create patient']);
    }
}
