<?php

namespace Database\Seeders;

use App\Models\Rol;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $stringAsJson =File::get('database/data/roles.json');
        $arrayData  = json_decode($stringAsJson, true);

        
        foreach ($arrayData as $key =>  $value  ) {
            if( null == Rol::find($value['id'] )){
                Rol::create(attributes: $value);
            }
        }
    }
}
