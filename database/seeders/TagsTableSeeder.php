<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tags::create([
            'name' => 'シンプル',
        ]);
        Tags::create([
            'name' => 'モダン',
        ]);
        Tags::create([
            'name' => '古民家風',
        ]);
        Tags::create([
            'name' => 'リノベーション',
        ]);
        Tags::create([
            'name' => 'こだわり',
        ]);
    }
}
