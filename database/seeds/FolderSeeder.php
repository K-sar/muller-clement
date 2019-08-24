<?php

use Illuminate\Database\Seeder;
use App\Folder;

class FolderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Folder::class, 9)->create();
        //Folder::create(["name"=>"ça"]);
    }
}
