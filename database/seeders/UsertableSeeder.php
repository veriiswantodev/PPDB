<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Str;

class UsertableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Veri Iswanto',
            'email' => 'veriiswanto@outlook.com',
            'role' => 'admin',
            'password' => bcrypt('password'),
            'remember_token' => Str::random(20)
        ]);
    }
}
