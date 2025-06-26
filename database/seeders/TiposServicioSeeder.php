<?php

namespace Database\Seeders;

use App\Models\TipoServicio;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TiposServicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stringAsJson =File::get('database/data/tipoServicio.json');
        $arrayData  = json_decode($stringAsJson, true);


        foreach ($arrayData as $key =>  $value  ) {
            if( null == TipoServicio::find($value['id'] )){
                TipoServicio::create(attributes: $value);
            }
        }
    }
}
