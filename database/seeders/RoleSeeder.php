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

        Permission::create(['name' => 'productos.index']);
        Permission::create(['name' => 'productos.add']);
        Permission::create(['name' => 'productos.edit']);
        Permission::create(['name' => 'productos.show']);

        Permission::create(['name' => 'categories.index']);
        Permission::create(['name' => 'categories.add']);
        Permission::create(['name' => 'categories.edit']);
        Permission::create(['name' => 'categories.show']);
    }
}
