<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'id' => 1,
            'name' => 'Cloth',
            'slug' => 'cloth',
            'parent_id' => 0,
            'discription' => 'Cloth',
            'image' => '',
            'status' => '1',
        ]);

        DB::table('categories')->insert([
            'id' => 2,
            'name' => 'Man',
            'slug' => 'man',
            'parent_id' => 1,
            'discription' => 'Cloth > Man',
            'image' => '',
            'status' => '1',
        ]);

        DB::table('categories')->insert([
            'id' => 3,
            'name' => 'Woman',
            'slug' => 'woman',
            'parent_id' => 1,
            'discription' => 'Cloth > Woman',
            'image' => '',
            'status' => '1',
        ]);

        DB::table('categories')->insert([
            'id' => 4,
            'name' => 'Round Boy T-shirt',
            'slug' => 'round-boy-tshirt',
            'parent_id' => 2,
            'discription' => 'Cloth > Man > Round Boy T-shirt',
            'image' => '',
            'status' => '1',
        ]);

        DB::table('categories')->insert([
            'id' => 5,
            'name' => 'Round Girl T-shirt',
            'slug' => 'round-girl-tshirt',
            'parent_id' => 3,
            'discription' => 'Cloth > Man > Round Girl T-shirt',
            'image' => '',
            'status' => '1',
        ]);
        DB::table('categories')->insert([
            'id' => 6,
            'name' => 'Electronics',
            'slug' => 'electronics',
            'parent_id' => 0,
            'discription' => 'Electronics',
            'image' => '',
            'status' => '1',
        ]);

        DB::table('categories')->insert([
            'id' => 7,
            'name' => 'Sports',
            'slug' => 'sports',
            'parent_id' => 0,
            'discription' => 'Sports',
            'image' => '',
            'status' => '1',
        ]);
        
        DB::table('categories')->insert([
            'id' => 8,
            'name' => 'FootBall',
            'slug' => 'football',
            'parent_id' => 7,
            'discription' => 'Sports > FootBall',
            'image' => '',
            'status' => '1',
        ]);

    }
}
