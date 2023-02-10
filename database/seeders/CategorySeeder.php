<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        //
        $categories = [
            ['name' => 'Beauty'],
            ['name' => 'Electronic'],
            ['name' => 'Fashion'],
            ['name' => 'Computer'],
            ['name' => 'Phone'],
            ['name' => 'Shoes'],
            ['name' => 'Sports'],
            ['name' => 'Furniture'],
        ];
        Category::insert($categories);
    }
}
