<?php

namespace Database\Seeders;
use DB;

use Illuminate\Database\Seeder;

class DirectorioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('directorios')->insert([
            [
                'nombre' => 'Diego Perez',
                'direccion' => 'Cabeza 1234, CABA',
                'telefono' => 1122334455,
            ],
            [
                'nombre' => 'Lidia Mardel',
                'direccion' => 'Paso 4321, Buenos Aires',
                'telefono' => 5544332211,
            ],
        ]);

    }
}
