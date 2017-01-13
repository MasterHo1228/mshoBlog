<?php

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
        User::create([
            'name' => 'Admin',
            'email' => 'admin@msho.app',
            'password' => '123456',
            'gender' => 'male',
            'description' => '',
            'is_admin' => true,
            'activated' => true,
        ]);
    }
}
