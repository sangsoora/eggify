<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class UsersTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        DB::table('users_type')->truncate();
        DB::insert('insert into users_type (id,name) values (?,?)', [1, 'Super admin']);
        DB::insert('insert into users_type (id,name) values (?,?)', [2, 'Comercial']);
        DB::insert('insert into users_type (id,name) values (?,?)', [3, 'Marketing']);
        DB::insert('insert into users_type (id,name) values (?,?)', [4, 'Provider']);
        DB::insert('insert into users_type (id,name) values (?,?)', [5, 'Operator']);

        Schema::enableForeignKeyConstraints();
    }
}
