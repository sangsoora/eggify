<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class OperatorsJobTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        DB::table('operators_job_tag')->truncate();

        DB::insert('insert into operators_job_tag (id,name) values (?,?)', [1, 'Director de hotel']);
        DB::insert('insert into operators_job_tag (id,name) values (?,?)', [2, 'Director de F&B']);
        DB::insert('insert into operators_job_tag (id,name) values (?,?)', [3, 'Director de Operaciones']);
        DB::insert('insert into operators_job_tag (id,name) values (?,?)', [4, 'Chef ejecutivo']);
        DB::insert('insert into operators_job_tag (id,name) values (?,?)', [5, 'Sous Chef']);
        DB::insert('insert into operators_job_tag (id,name) values (?,?)', [6, 'Chef']);
        DB::insert('insert into operators_job_tag (id,name) values (?,?)', [7, 'Propietario de restaurante']);
        DB::insert('insert into operators_job_tag (id,name) values (?,?)', [8, 'Manager de restaurante']);
        DB::insert('insert into operators_job_tag (id,name) values (?,?)', [9, 'Manager de bar']);
        DB::insert('insert into operators_job_tag (id,name) values (?,?)', [10, 'Director de compras']);
        DB::insert('insert into operators_job_tag (id,name) values (?,?)', [11, 'Director general restaurante']);
        DB::insert('insert into operators_job_tag (id,name) values (?,?)', [12, 'Manager']);
        DB::insert('insert into operators_job_tag (id,name) values (?,?)', [13, 'Coctelero']);


        Schema::enableForeignKeyConstraints();
    }
}
