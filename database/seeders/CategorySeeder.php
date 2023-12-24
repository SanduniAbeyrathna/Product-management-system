<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
          ['name' => 'Category 01'],
          ['name' => 'Category 02'],
          ['name' => 'Category 03'],
          ['name' => 'Category 04'],
          ['name' => 'Category 05'],
          ['name' => 'Category 06'],
          ['name' => 'Category 07'],
          ['name' => 'Category 08'],
          ['name' => 'Category 09'],
          ['name' => 'Category 10'],
        ];

        foreach ($categories as $key => $categoryData) {
            $existingCategory = Category::where('name', $categoryData['name'])->first();

            if (!$existingCategory) {
                // Category doesn't exist, create it
                Category::create($categoryData);
            }
        }
    }
}