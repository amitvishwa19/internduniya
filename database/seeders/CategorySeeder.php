<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => $name = 'Internship Categories',
            'slug' => Str::slug($name, '-'),
        ]);
        Category::create([
            'name' => $name = 'Internship Cities',
            'slug' => Str::slug($name, '-'),
        ]);
        Category::create([
            'name' => $name = 'Internship Plans',
            'slug' => Str::slug($name, '-'),
        ]);
        Category::create([
            'name' => $name = 'Home Page',
            'slug' => Str::slug($name, '-'),
        ]);
        
        

    }
}
