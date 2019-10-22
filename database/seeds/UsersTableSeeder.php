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
        User::insert([
            'name' => 'admin',
            'birthday' => '2003-10-20',
            'phone' => '0386843892',
            'email' => 'admin@example.com',
            'password' => bcrypt('123456'),
            'role' => 2,
            'is_active' => true
        ]);
        User::insert([
            'name' => 'user',
            'birthday' => '2003-10-20',
            'phone' => '0386843892',
            'email' => 'user@example.com',
            'password' => bcrypt('123456'),
            'role' => 1,
            'is_active' => true
        ]);
        factory(User::class, 20)->create();
    }
}
