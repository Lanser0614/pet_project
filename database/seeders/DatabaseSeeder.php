<?php

namespace Database\Seeders;


use App\Models\User;
use Illuminate\Database\Seeder;
use Module\Role\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        Role::factory(10)->create();
    }
}
