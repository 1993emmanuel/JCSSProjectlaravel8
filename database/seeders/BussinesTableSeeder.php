<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Business;


class BussinesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Business::create([
            'name'=>'nombre de la empresa',
            'description'=>'a que se dedica la empresa',
            'logo'=>'logo.png',
            'email'=>'correo de la empresa @gmail.com',
            'address'=>'Direccion de la empresa',
            'ruc'=>'1234567891011121314151617181920',
        ]);
    }
}
