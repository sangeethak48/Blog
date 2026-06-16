<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tags;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $tags = [
            [
                'name'=>'PHP',
                'slug'=>'php',
            ],
            [
                'name'=>'Laravel',
                'slug'=>'laravel',
            ],
            [
                'name'=>'MySQL',
                'slug'=>'mysql',
            ],
            [
                'name'=>'Rest API',
                'slug'=>'rest-api', 
            ],
            [
                'name'=>'Beginner',
                'slug'=> 'beginner',
            ],
            [
                'name' => 'Advanced',
                'slug' => 'advanced',   
            ]
        ];

        foreach ($tags as $tag) {
            Tags::create($tag);
        }
    }
}
