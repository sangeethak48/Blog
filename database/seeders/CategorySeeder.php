<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categories;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            [
                'name' => 'Technology',
                'slug' => 'technology',
                'description' => 'Tech related articles'
            ],
            [
                'name' => 'Laravel',
                'slug' => 'laravel',
                'description' => 'Laravel framework articles.'
            ],
            [
                'name' => 'PHP',
                'slug' => 'php',
                'description' => 'PHP language articles.'
            ],
        ];

        foreach ($categories as $category) {
            Categories::create($category);
        }
    }
}