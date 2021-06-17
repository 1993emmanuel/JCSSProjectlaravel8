<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;


class UserTableSeeders extends Seeder
{   

    /*
        parametros para el modelo user
        'name',
        'email',
        'password',
        'username',
    */

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //usuario con el rol de vendedor
        $vendedor = User::create([
            'name'=>'VentasProfile',
            'email'=>'ventas@gmail.com',
            'password'=>bcrypt('123456'),
            'username'=>'VentasProfile',
        ]);
        $vendedor->assignRole('vendedor');
        //usuario con el rol de comprador
        $comprador = User::create([
            'name'=> 'CompradorProfile',
            'email'=>'compras@gmail.com',
            'password'=>bcrypt('123456'),
            'username'=>'ComprasProfile',
        ]);
        $comprador->assignRole('comprador');
        //usuario con el rol de altas_lvl1
        $altas_lvl1 = User::create([
            'name'=>'altas1Profile',
            'email'=>'altas@gmail.com',
            'password'=>bcrypt('123456'),
            'username'=>'AltasBasicasProfile',
        ]);
        $altas_lvl1->assignRole('altas_lvl1');
        //usuario con el control maestro
        $control_maestro = User::create([
            'name'=>'Emmanuel hernandez mejia',
            'email'=>'deskbot.emmanuel@gmail.com',
            'password'=>bcrypt('36142103'),
            'username'=>'PandoraActor',
        ]);
        $control_maestro->assignRole('control-maestro');

        $control_maestro2 = User::create([
            'name'=>'Julio Cesar Calderon Solis',
            'email'=>'excella00@gmail.com',
            'password'=>bcrypt('JCCS00'),
            'username'=>'JCCS',
        ]);
        $control_maestro2->assignRole('control-maestro');        

    }
}
