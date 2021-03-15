<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ProvidersSubCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        DB::table('providers_subcategory')->truncate();

        DB::insert('insert into providers_subcategory (id,name) values (?,?)', [1, 'Carne Roja']);
        DB::insert('insert into providers_subcategory (id,name) values (?,?)', [2, 'Bebidas con alcohol']);
        DB::insert('insert into providers_subcategory (id,name) values (?,?)', [3, 'Fotografía']);


        Schema::enableForeignKeyConstraints();
    }
}
