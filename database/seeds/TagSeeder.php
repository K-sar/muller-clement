<?php

use App\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::create(['name' => 'Lac']);
        Tag::create(['name' => 'Montagne']);
        Tag::create(['name' => 'Fleur']);
        Tag::create(['name' => 'Animaux']);
        Tag::create(['name' => 'Urbain']);
        Tag::create(['name' => 'Arbre']);
        Tag::create(['name' => 'Route']);
        Tag::create(['name' => 'Intérieur']);
        Tag::create(['name' => 'Extérieur']);
        Tag::create(['name' => 'Paysage']);
    }
}
