<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class RatingsProvidersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        DB::table('ratings_providers')->truncate();

        $dt = Carbon::now();
        DB::insert('insert into ratings_providers (id,provider_id,rating_id) values (?,?,?)', [1, 1, 1]);
        DB::insert('insert into ratings_providers (id,provider_id,rating_id) values (?,?,?)', [2, 1, 2]);

        Schema::enableForeignKeyConstraints();
    }
}
