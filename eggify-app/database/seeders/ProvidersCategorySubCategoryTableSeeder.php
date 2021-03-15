<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ProvidersCategorySubCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        DB::table('providers_category_subcategory')->truncate();

        DB::insert('insert into providers_category_subcategory (id,provider_category_id,provider_subcategory_id) values (?,?,?)', [1, 1, 1]);
        DB::insert('insert into providers_category_subcategory (id,provider_category_id,provider_subcategory_id) values (?,?,?)', [2, 2, 2]);
        DB::insert('insert into providers_category_subcategory (id,provider_category_id,provider_subcategory_id) values (?,?,?)', [3, 3, 3]);


        Schema::enableForeignKeyConstraints();
    }
}
