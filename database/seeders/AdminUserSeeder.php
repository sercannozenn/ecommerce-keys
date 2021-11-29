<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('12345678'),
            'is_admin' => 1
        ]);

        User::create([
            'name' => 'user',
            'email' => 'user@user.com',
            'password' => bcrypt('12345678'),
        ]);
    }
}
