<?php

use App\PictureTag;
use Illuminate\Database\Seeder;

class PictureTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(PictureTag::class, 90)->create();
    }
}
