<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class BudgetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        DB::table('budgets')->truncate();

        $dt = Carbon::now();
        DB::insert('insert into budgets (id,data,time,budget_status_id) values (?,?,?,?)', [1, $dt->toDateString(), $dt->toTimeString(), 1]);

        Schema::enableForeignKeyConstraints();
    }
}
