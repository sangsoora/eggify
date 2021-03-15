<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        DB::table('cities')->truncate();
        DB::insert('insert into cities (id,name,state_id) values (?,?,?)', [1, 'Barcelona', 1]);

        Schema::enableForeignKeyConstraints();
    }
}
