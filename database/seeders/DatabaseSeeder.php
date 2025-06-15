<?php

namespace Database\Seeders;

use App\Models\Employees;
use App\Models\Ticket;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\RoleEnum;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);
        User::factory(10)->create();
        User::create(
            [
                'first_name' => 'admin',
                'last_name' => 'admin',
                'email' => 'admin@admin.com',
                'password' => 'password'
            ]
        )->syncRoles([RoleEnum::ADMIN]);
        Employees::factory(10)->create();
        Ticket::factory(10)->create();
    }
}
