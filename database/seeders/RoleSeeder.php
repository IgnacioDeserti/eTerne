<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create(['name' => "admin"]);
        $role2 = Role::create(['name' => "client"]);

        Permission::create(['name' => 'productos.index'])->assignRole($role1);
        Permission::create(['name' => 'productos.add'])->assignRole($role1);
        Permission::create(['name' => 'productos.edit'])->assignRole($role1);
        Permission::create(['name' => 'productos.show'])->assignRole($role1);

        Permission::create(['name' => 'categories.index'])->assignRole($role1);
        Permission::create(['name' => 'categories.add'])->assignRole($role1);
        Permission::create(['name' => 'categories.edit'])->assignRole($role1);
        Permission::create(['name' => 'categories.show'])->assignRole($role1);
    }
}
