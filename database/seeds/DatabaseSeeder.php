<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $this->call(UsersTableSeeder::class);
    }
}

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
        'name' => 'Admin',
        'email' => 'eric.randall.lynch@gmail.com',
        'password' => bcrypt('password'),
        'role' => 'admin'
      ]);

      DB::table('images')->insert([
        'path' => '/images/users/eric.jpeg',
        'user_id' => 1
      ]);
    }
}
