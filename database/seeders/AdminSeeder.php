<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admins')->insert([
            [
                'name' => 'GladmanGee',
                'email' => 'admin1@gmail.com',
                'password' => bcrypt('admin1234'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
         
        ]);
    }
}
