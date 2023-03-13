<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => "Fantasy",
                'slug' => "fantasy"
            ],
            [
                'name' => "Romance",
                'slug' => "romance"
            ],
            [
                'name' => "Mystery",
                'slug' => "mytery"
            ],
            [
                'name' => "Horror",
                'slug' => "horror"
            ],
            [
                'name' => "Science Fiction",
                'slug' => "science-fiction"
            ],
            [
                'name' => "Slice of Life",
                'slug' => "slice-of-life"
            ],
        ];


    	foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
