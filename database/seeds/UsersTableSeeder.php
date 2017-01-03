<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
        'is_admin' => true
      ]);
    }
}
