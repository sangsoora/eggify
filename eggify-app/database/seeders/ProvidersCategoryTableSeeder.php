<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ProvidersCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        DB::table('providers_category')->truncate();

        DB::insert('insert into providers_category (id,name) values (?,?)', [1, 'Carne']);
        DB::insert('insert into providers_category (id,name) values (?,?)', [2, 'Bebidas']);
        DB::insert('insert into providers_category (id,name) values (?,?)', [3, 'Marketing']);


        Schema::enableForeignKeyConstraints();
    }
}
