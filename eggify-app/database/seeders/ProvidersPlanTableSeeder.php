<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ProvidersPlanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        DB::table('providers_plan')->truncate();
        DB::insert('insert into providers_plan (id,name) values (?,?)', [1, 'Freemium']);

        Schema::enableForeignKeyConstraints();

        // \App\Models\User::factory(10)->create();
    }
}
