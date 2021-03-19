<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class RatingsRatingsCriteriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        DB::table('ratings_ratings_criteria')->truncate();

        //DB::insert('insert into ratings_ratings_criteria (id,rating,rating_id,rating_criteria_id) values (?,?,?,?)', [1, 1, 1, 1]);
        //DB::insert('insert into ratings_ratings_criteria (id,rating,rating_id,rating_criteria_id) values (?,?,?,?)', [2, 2, 1, 2]);
        //DB::insert('insert into ratings_ratings_criteria (id,rating,rating_id,rating_criteria_id) values (?,?,?,?)', [3, 3, 1, 3]);
        //DB::insert('insert into ratings_ratings_criteria (id,rating,rating_id,rating_criteria_id) values (?,?,?,?)', [4, 4, 1, 4]);
        //DB::insert('insert into ratings_ratings_criteria (id,rating,rating_id,rating_criteria_id) values (?,?,?,?)', [5, 5, 1, 5]);

        //DB::insert('insert into ratings_ratings_criteria (id,rating,rating_id,rating_criteria_id) values (?,?,?,?)', [6, 4, 2, 1]);
        //DB::insert('insert into ratings_ratings_criteria (id,rating,rating_id,rating_criteria_id) values (?,?,?,?)', [7, 2, 2, 2]);
        //DB::insert('insert into ratings_ratings_criteria (id,rating,rating_id,rating_criteria_id) values (?,?,?,?)', [8, 3, 2, 3]);
        //DB::insert('insert into ratings_ratings_criteria (id,rating,rating_id,rating_criteria_id) values (?,?,?,?)', [9, 4, 2, 4]);
        //DB::insert('insert into ratings_ratings_criteria (id,rating,rating_id,rating_criteria_id) values (?,?,?,?)', [10, 5, 2, 5]);

        Schema::enableForeignKeyConstraints();
    }
}
