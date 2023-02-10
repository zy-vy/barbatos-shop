<?php
namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        

        $products = [
            [
                'name' => 'Batik 1',
                'detail' => 'this is detail',
                'price' => 10000,
                'photo' => 'images/Batik 1.png',
                'category_id' => 1
            ],
            [
                'name' => 'Batik 2',
                'detail' => 'this is detail',
                'price' => 12000,
                'photo' => 'images/Batik 2.png',
                'category_id' => 1
            ],[
                'name' => 'Batik 3',
                'detail' => 'this is detail',
                'price' => 1000,
                'photo' => 'images/Batik 3.png',
                'category_id' => 1
            ],[
                'name' => 'Batik 4',
                'detail' => 'this is detail',
                'price' => 16000,
                'photo' => 'images/Batik 4.png',
                'category_id' => 1
            ],[
                'name' => 'Batik 5',
                'detail' => 'this is detail',
                'price' => 17000,
                'photo' => 'images/Batik 5.png',
                'category_id' => 1
            ],
            [
                'name' => 'Batik 6',
                'detail' => 'this is detail',
                'price' => 10000,
                'photo' => 'images/Batik 1.png',
                'category_id' => 1
            ],
            [
                'name' => 'Batik 7',
                'detail' => 'this is detail',
                'price' => 12000,
                'photo' => 'images/Batik 2.png',
                'category_id' => 1
            ],[
                'name' => 'Batik 8',
                'detail' => 'this is detail',
                'price' => 1000,
                'photo' => 'images/Batik 3.png',
                'category_id' => 1
            ],[
                'name' => 'Batik 9',
                'detail' => 'this is detail',
                'price' => 16000,
                'photo' => 'images/Batik 4.png',
                'category_id' => 1
            ],[
                'name' => 'Batik 10',
                'detail' => 'this is detail',
                'price' => 17000,
                'photo' => 'images/Batik 5.png',
                'category_id' => 1
            ],
            [
                'name' => 'Batik 11',
                'detail' => 'this is detail',
                'price' => 16000,
                'photo' => 'images/Batik 4.png',
                'category_id' => 1
            ],[
                'name' => 'Batik 12',
                'detail' => 'this is detail',
                'price' => 17000,
                'photo' => 'images/Batik 5.png',
                'category_id' => 1
            ],
        ];
        Product::factory(50)->create();
        Product::insert($products);
    }
}
