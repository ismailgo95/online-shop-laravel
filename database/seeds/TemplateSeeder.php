<?php

use Illuminate\Database\Seeder;
use App\Template;

class TemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Template::create([
            "name" => "template Sayid",
            "folder" => "template_sayid",
            "selected" => 1,
        ]);
        Template::create([
            "name" => "template Bachtiar",
            "folder" => "template_bachtiar"
        ]);
        Template::create([
            "name" => "template Ismail",
            "folder" => "template_ismail"
        ]);
    }
}
