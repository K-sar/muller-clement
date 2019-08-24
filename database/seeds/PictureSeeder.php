<?php

use Illuminate\Database\Seeder;
use App\Picture;

class PictureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Picture::class, 90)->create();
    }
}
