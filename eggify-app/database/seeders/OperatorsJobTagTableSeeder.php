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

        DB::insert('insert into operators_job_tag (id,name) values (?,?)', [1, 'Tapas']);
        DB::insert('insert into operators_job_tag (id,name) values (?,?)', [2, 'Copas']);
        DB::insert('insert into operators_job_tag (id,name) values (?,?)', [3, 'Vino']);
        DB::insert('insert into operators_job_tag (id,name) values (?,?)', [4, 'Comida casual']);


        Schema::enableForeignKeyConstraints();
    }
}
