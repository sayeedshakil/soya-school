<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'Super Admin']);
        // Role::create(['name' => 'Admin']);
        // Role::create(['name' => 'Tacher']);
        // Role::create(['name' => 'Data Entry']);
        // Role::create(['name' => 'Deactive']);

    }
}
