<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class PostalCodesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        DB::table('postal_codes')->truncate();
        DB::insert('insert into postal_codes (id,code,city_id) values (?,?,?)', [1, '08003', 1]);

        Schema::enableForeignKeyConstraints();
    }
}
