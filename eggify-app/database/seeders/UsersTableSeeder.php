<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        DB::table('users')->truncate();
        DB::insert('insert into users (id,name,email,password,role_id,user_type_id) values (?,?,?,?,?,?)', [1, 'Josué Javier', 'josue@indigenasdigitales.com', '$2y$10$oLMKDeu7VewEDZ/pQ.t.4enKKW2I0OCcTwhbcJPq/PGLzsa.imS5O', 1, 1]);
        DB::insert('insert into users (id,name,email,password,role_id,user_type_id) values (?,?,?,?,?,?)', [2, 'Nuria', 'nuria.barrachina@ideafoster.com', '$2y$10$oLMKDeu7VewEDZ/pQ.t.4enKKW2I0OCcTwhbcJPq/PGLzsa.imS5O', 1, 2]);
        DB::insert('insert into users (id,name,email,password,role_id,user_type_id) values (?,?,?,?,?,?)', [3, 'Test', 'test@ideafoster.com', '$2y$10$oLMKDeu7VewEDZ/pQ.t.4enKKW2I0OCcTwhbcJPq/PGLzsa.imS5O', 1, 3]);
        DB::insert('insert into users (id,name,email,password,role_id,user_type_id) values (?,?,?,?,?,?)', [4, 'Provider', 'provider@ideafoster.com', '$2y$10$oLMKDeu7VewEDZ/pQ.t.4enKKW2I0OCcTwhbcJPq/PGLzsa.imS5O', 2, 4]);
        DB::insert('insert into users (id,name,email,password,role_id,user_type_id) values (?,?,?,?,?,?)', [5, 'Operator1', 'operator1@ideafoster.com', '$2y$10$oLMKDeu7VewEDZ/pQ.t.4enKKW2I0OCcTwhbcJPq/PGLzsa.imS5O', 2, 5]);
        DB::insert('insert into users (id,name,email,password,role_id,user_type_id) values (?,?,?,?,?,?)', [6, 'Operator2', 'operator2@ideafoster.com', '$2y$10$oLMKDeu7VewEDZ/pQ.t.4enKKW2I0OCcTwhbcJPq/PGLzsa.imS5O', 2, 5]);

        Schema::enableForeignKeyConstraints();

        // \App\Models\User::factory(10)->create();
    }
}
