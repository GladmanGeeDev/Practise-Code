<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'name' => 'Residential',

                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Commercial',

                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Industrial',

                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Agricultural',

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Other',

                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
