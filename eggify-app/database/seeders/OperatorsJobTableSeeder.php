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

        DB::insert('insert into operators_job (id,name) values (?,?)', [1, 'Hotel 5*']);
        DB::insert('insert into operators_job (id,name) values (?,?)', [2, 'Hotel 4*']);
        DB::insert('insert into operators_job (id,name) values (?,?)', [3, 'Hotel o B&B']);
        DB::insert('insert into operators_job (id,name) values (?,?)', [4, 'Fine Dining']);
        DB::insert('insert into operators_job (id,name) values (?,?)', [5, 'Casual Dining']);
        DB::insert('insert into operators_job (id,name) values (?,?)', [6, 'All Day Dining']);
        DB::insert('insert into operators_job (id,name) values (?,?)', [7, 'Comida Rápida']);
        DB::insert('insert into operators_job (id,name) values (?,?)', [8, 'Cafeteria / Pasteleria']);
        DB::insert('insert into operators_job (id,name) values (?,?)', [9, 'Pubs / Bares']);
        DB::insert('insert into operators_job (id,name) values (?,?)', [10, 'Heladeria']);
        DB::insert('insert into operators_job (id,name) values (?,?)', [11, 'Food Truck & Kiosko']);
        DB::insert('insert into operators_job (id,name) values (?,?)', [12, 'Discotecas']);
        DB::insert('insert into operators_job (id,name) values (?,?)', [13, 'Concepto Saludable']);
        DB::insert('insert into operators_job (id,name) values (?,?)', [14, 'Beach Club']);


        Schema::enableForeignKeyConstraints();
    }
}
