<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    Permission::create(['name' => 'user-create']);
    Permission::create(['name' => 'user-edit']);
    Permission::create(['name' => 'user-delete']);

    Permission::create(['name' => 'post-create']);
    Permission::create(['name' => 'post-edit']);
    Permission::create(['name' => 'post-delete']);

    Permission::create(['name' => 'category-create']);
    Permission::create(['name' => 'category-edit']);
    Permission::create(['name' => 'category-delete']);
    }
}
