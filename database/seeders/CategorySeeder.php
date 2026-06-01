<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = ['Teknologi', 'Olahraga', 'Pendidikan', 'Kesehatan', 'Lifestyle'];

        foreach ($categories as $category) {
            Category::create(['name' => $category]);
        }
    }
}