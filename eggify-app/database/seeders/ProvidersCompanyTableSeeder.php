<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ProvidersCompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        DB::table('providers_company')->truncate();

        DB::insert('insert into providers_company (id,name,web,logo,years,linkedin,provider_id,provider_company_employees_id) values (?,?,?,?,?,?,?,?)', [1, 'Hotel Barceló', 'www.barcelo.com', '', 10, 'www.linkedin.com', 1, 1]);
        DB::insert('insert into providers_company (id,name,web,logo,years,linkedin,provider_id,provider_company_employees_id) values (?,?,?,?,?,?,?,?)', [2, 'Bar Las Palmas', 'www.laspalmas.com', '', 5, 'www.linkedin.com', 2, 2]);

        Schema::enableForeignKeyConstraints();
    }
}
