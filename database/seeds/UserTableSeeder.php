<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      User::create([
        'name' => 'Amitav Roy',
        'email' => 'reachme@amitavory.com',
        'password' => Hash::make('pass'),
      ]);

      User::create([
        'name' => 'Jhon Doe',
        'email' => 'jhondoe@gmail.com',
        'password' => Hash::make('pass'),
      ]);

    }
}