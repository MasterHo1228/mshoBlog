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
            'name' => 'MasterHo1228',
            'email' => 'masterho1228@gmail.com',
            'password' => '123456',
            'is_admin' => true,
            'activated' => true,
        ]);
    }
}
