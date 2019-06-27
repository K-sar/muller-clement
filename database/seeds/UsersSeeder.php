<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
/*
        User::create(['name' => 'Clément Muller', 'access' => 10, 'email' => 'cm@cm.com', 'email_verified_at' => now(), 'password' => 'aze', 'remember_token' => Str::random(10),]);
        User::create(['name' => 'Bienvenu Muller', 'access' => 2, 'email' => 'bm@bm.com', 'email_verified_at' => now(), 'password' => 'aze', 'remember_token' => Str::random(10),]);
*/
        factory(User::class, 10)->create();
    }
}