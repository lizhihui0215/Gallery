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
        'name' => 'lizhihui',
        'email' => 'lizhihui0215@gmail.com',
        'password' => Hash::make('pass'),
      ]);

      User::create([
        'name' => 'test',
        'email' => 'test@gmail.com',
        'password' => Hash::make('pass'),
      ]);

      User::create([
        'name' => 'lizhihui',
        'email' => 'lizhihui0215@gmail.com',
        'password' => Hash::make('pass'),
      ]);
    }
}
