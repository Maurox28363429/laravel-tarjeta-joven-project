<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\consecutivos;
class ConsecutivoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        consecutivos::create([
            'nombre'=>'Consecutivo_seguro',
            'valor'=>0
        ]);
    }
}
