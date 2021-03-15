<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class OperatorsPositionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        DB::table('operators_position')->truncate();

        DB::insert('insert into operators_position (id,name) values (?,?)', [1, 'Director']);
        DB::insert('insert into operators_position (id,name) values (?,?)', [2, 'Chef']);
        DB::insert('insert into operators_position (id,name) values (?,?)', [3, 'Manager']);


        Schema::enableForeignKeyConstraints();
    }
}
