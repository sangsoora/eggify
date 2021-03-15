<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class RatingsCriteriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        DB::table('ratings_criteria')->truncate();
        DB::insert('insert into ratings_criteria (id,name) values (?,?)', [1, 'Calidad de servicio']);
        DB::insert('insert into ratings_criteria (id,name) values (?,?)', [2, 'Relación calidad/precio']);
        DB::insert('insert into ratings_criteria (id,name) values (?,?)', [3, 'Puntualidad']);
        DB::insert('insert into ratings_criteria (id,name) values (?,?)', [4, 'Logística']);
        DB::insert('insert into ratings_criteria (id,name) values (?,?)', [5, 'Tiempo de respuesta']);

        Schema::enableForeignKeyConstraints();
    }
}
