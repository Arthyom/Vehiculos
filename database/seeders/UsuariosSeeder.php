<?php

namespace Database\Seeders;

use App\Models\User;
use File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $stringAsJson =File::get('database/data/usuarios.json');
        $arrayData  = json_decode($stringAsJson, true);

        
        foreach ($arrayData as $key =>  $value  ) {
            if( null == User::find($value['id'] )){
                User::create(attributes: $value);
            }
        }
    }
}
