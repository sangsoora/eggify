<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        DB::table('states')->truncate();
        DB::insert('insert into states (id,code,name,country_id) values (?,?,?,?)', [1, 'BA','Barcelona', 1]);

        Schema::enableForeignKeyConstraints();
    }
}
