<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class OperatorsCompanyEmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        DB::table('operators_company_employees')->truncate();

        DB::insert('insert into operators_company_employees (id,name) values (?,?)', [1, '0-10']);
        DB::insert('insert into operators_company_employees (id,name) values (?,?)', [2, '10-20']);
        DB::insert('insert into operators_company_employees (id,name) values (?,?)', [3, '+20']);


        Schema::enableForeignKeyConstraints();
    }
}
