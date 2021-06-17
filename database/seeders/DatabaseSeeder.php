<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();
        $this->call(RolesandPermissions::class);
        $this->call(UserTableSeeders::class);
        $this->call(PrinterTableSeeder::class);
        $this->call(BussinesTableSeeder::class);
    }
}
