<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersSeeder::class);
        $this->call(FolderSeeder::class);
        $this->call(PictureSeeder::class);
        $this->call(TagSeeder::class);
        $this->call(PictureTagSeeder::class);
        $this->call(PortfolioSeeder::class);
        $this->call(BaseSeeder::class);
    }
}
