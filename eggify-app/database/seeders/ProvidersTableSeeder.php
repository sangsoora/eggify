<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ProvidersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        DB::table('providers')->truncate();

        DB::insert('insert into providers (id,name,phone,address,description,user_id,provider_type_id,provider_category_id,provider_subcategory_id,provider_plan_id,postal_code_id) values (?,?,?,?,?,?,?,?,?,?,?)', [1, 'Provider', '600600600', 'Calle de Botoneras, 5, 28012 Madrid', 'Espirituosos S.A. es una pequeña empresa que se dedica a la producción de bebidas espirituosas. Entre nuestros productos destacan el brandy, el ron, la ginebra y unos licores especiales de la marca.', 4, 1, 1, 1, 1, 1]);

        Schema::enableForeignKeyConstraints();
    }
}
