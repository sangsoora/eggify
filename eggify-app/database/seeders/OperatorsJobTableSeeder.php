<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class OperatorsJobTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        DB::table('operators_job')->truncate();

        DB::insert('insert into operators_job (id,name) values (?,?)', [1, 'Restaurante']);
        DB::insert('insert into operators_job (id,name) values (?,?)', [2, 'Hotel']);
        DB::insert('insert into operators_job (id,name) values (?,?)', [3, 'Bar']);


        Schema::enableForeignKeyConstraints();
    }
}
