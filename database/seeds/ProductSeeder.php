<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                "code" => 9999,
                "image" => "",
                "name" => "Kopi Toraja",
                "varian" => "Kopi Arabica",
                "price" => 999,
                "stock" => 99,
                "categorie_id" => 1,
                "description" => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fuga, consequuntur."
            ],
        ];
        forEach($products as $prd) {
            Product::create([
                'code' => $prd['code'],
                'image' => $prd['image'],
                'name' => $prd['name'],
                'varian' => $prd['varian'],
                'price' => $prd['price'],
                'stock' => $prd['stock'],
                "categorie_id" => $prd['categorie_id'],
                "description" => $prd['description']
            ]);
        }
    }
}
