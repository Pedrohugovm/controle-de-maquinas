<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            'name' => 'admin',
            'email' => 'suporteepd@gmail.com',
            'password' => bcrypt('@sysepd123#'),
            'role' => 'admin',
        ]);
    }
}