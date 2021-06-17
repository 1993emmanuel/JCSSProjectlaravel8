<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

//las necesitamos para crear los roles y permisos pertinentes
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesandPermissions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        /*
            crearemos un permisio para cada una las rutas de nuestro controlador y 
            asi tener un mejor acomodo en el sistema
            si ustedes generan un mejor archivo aqui lo pueden mejorar y optimizar algo mejor de lo que yo lo hice
        */
        Permission::create(['name' => 'index_categories']);
        Permission::create(['name' => 'create_categories']);
        Permission::create(['name' => 'show_categories']);
        Permission::create(['name' => 'update_categories']);
        Permission::create(['name' => 'delete_categories']);


        Permission::create(['name' => 'index_clients']);
        Permission::create(['name' => 'create_clients']);
        Permission::create(['name' => 'show_clients']);
        Permission::create(['name' => 'update_clients']);
        Permission::create(['name' => 'delete_clients']);

        Permission::create(['name' => 'index_products']);
        Permission::create(['name' => 'create_products']);
        Permission::create(['name' => 'show_products']);
        Permission::create(['name' => 'update_products']);
        Permission::create(['name' => 'delete_products']);

        Permission::create(['name' => 'index_providers']);
        Permission::create(['name' => 'create_providers']);
        Permission::create(['name' => 'show_providers']);
        Permission::create(['name' => 'update_providers']);
        Permission::create(['name' => 'delete_providers']);

        Permission::create(['name' => 'index_purchases']);
        Permission::create(['name' => 'create_purchases']);
        Permission::create(['name' => 'show_purchases']);
        Permission::create(['name' => 'update_purchases']);
        Permission::create(['name' => 'delete_purchases']);

        Permission::create(['name' => 'index_sales']);
        Permission::create(['name' => 'create_sales']);
        Permission::create(['name' => 'show_sales']);
        Permission::create(['name' => 'update_sales']);
        Permission::create(['name' => 'delete_sales']);

        /*
            genero unos roles con permisos limitados para cada accion recordando que 
            en el futuro los tengo que mejorar o alguien mejor que yo lo puede hacer
        */

        $role = Role::create(['name'=>'vendedor'])->givePermissionTo(['index_sales','create_sales','show_sales']);

        $role = Role::create(['name'=>'comprador']);
        $role->givePermissionTo(['index_purchases', 'create_purchases','show_purchases']);

        $role = Role::create(['name'=>'altas_lvl1']);
        $role->givePermissionTo([
            'index_categories', 'create_categories', 'update_categories',
            'index_providers', 'create_providers', 'show_providers', 'update_providers',
            'index_clients', 'create_clients', 'show_clients', 'update_clients',
        ]);

        /*
            Este es el control maestro y tienes que tener cuidado con lo que puede hacer
            ya que tiene un acceso a todo y nada escapa de su control
        */
        $role = Role::create(['name'=>'control-maestro']);
        $role->givePermissionTo(Permission::all());

    }
}
