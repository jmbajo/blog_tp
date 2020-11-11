<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Tag;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear modelos de tipo Tag
        $tag = new Tag();
        $tag->nombre = "TagCreadoPorSeeder1";
        $tag->save();

        $tag = new Tag();
        $tag->nombre = "TagCreadoPorSeeder2";
        $tag->save();

        $tag = new Tag();
        $tag->nombre = "TagCreadoPorSeeder3";
        $tag->save();

    }
}
