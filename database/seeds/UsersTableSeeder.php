<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Create default admin account.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'access_level' => User::LEVEL_ADMIN,
            'password' => bcrypt('secret'),
            'remember_token' => str_random(10)
        ]);
    }
}
