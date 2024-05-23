<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PropertiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('properties')->insert([
            [
                'title' => 'ABC',
                'description' => 'A beautiful luxury villa with a sea view.',
                'city' => 'Los Angeles',
                'type' => 'Villa',
                'category_id' => 1, // Ensure this category_id exists
                'image' => 'villa.jpg',
                'price' => 5000000,
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Modern Apartment',
                'description' => 'A modern apartment in the heart of the city.',
                'city' => 'New York',
                'type' => 'Apartment',
                'category_id' => 2, // Ensure this category_id exists
                'image' => 'apartment.jpg',
                'price' => 1500000,
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Cozy Cottage',
                'description' => 'A cozy cottage in the countryside.',
                'city' => 'Austin',
                'type' => 'Cottage',
                'category_id' => 3, // Ensure this category_id exists
                'image' => 'cottage.jpg',
                'price' => 800000,
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
