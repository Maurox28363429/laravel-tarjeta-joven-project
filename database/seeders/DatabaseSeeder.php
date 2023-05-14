<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\roles;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        roles::firstOrCreate(
            ['name' =>"admin"],
            []
        );
        roles::firstOrCreate(
            ['name' =>"empresa"],
            []
        );
        roles::firstOrCreate(
            ['name' =>"cliente"],
            []
        );
    }
}
