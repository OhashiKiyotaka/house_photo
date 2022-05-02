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
        Tag::create([
            'name' => 'シンプル',
        ]);
        Tag::create([
            'name' => 'モダン',
        ]);
        Tag::create([
            'name' => '古民家風',
        ]);
        Tag::create([
            'name' => 'リノベーション',
        ]);
        Tag::create([
            'name' => 'こだわり',
        ]);
    }
}
