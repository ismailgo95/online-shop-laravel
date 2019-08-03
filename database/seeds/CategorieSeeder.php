<?php

use Illuminate\Database\Seeder;
use App\Categorie;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $catagories = ["Coffee & Beverages", "Equipment", "Brewers", "Tools", "Others"];

        forEach($catagories as $ctr){
            Categorie::create([
                "name" => $ctr,
            ]);
        }
    }
}
