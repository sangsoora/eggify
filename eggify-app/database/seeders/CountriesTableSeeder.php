<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        DB::table('countries')->truncate();
        DB::insert('insert into countries (id,code,name) values (?,?,?)', [1, 'ES', 'España']);

        Schema::enableForeignKeyConstraints();
    }
}
