<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ProvidersTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        DB::table('providers_type')->truncate();
        DB::insert('insert into providers_type (id,name) values (?,?)', [1, 'distributor']);
        DB::insert('insert into providers_type (id,name) values (?,?)', [2, 'producer']);

        Schema::enableForeignKeyConstraints();

        // \App\Models\User::factory(10)->create();
    }
}
