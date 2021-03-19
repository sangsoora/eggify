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
        DB::insert('insert into budgets (id,data,time,budget_status_id,created_at,updated_at) values (?,?,?,?,?,?)', [1, $dt->toDateString(), $dt->toTimeString(), 1, '2019-07-23 08:18:26', '2019-07-23 08:18:26']);
        DB::insert('insert into budgets (id,data,time,budget_status_id,created_at,updated_at) values (?,?,?,?,?,?)', [2, $dt->toDateString(), $dt->toTimeString(), 2, '2019-07-23 08:18:26', '2019-07-23 08:18:26']);

        Schema::enableForeignKeyConstraints();
    }
}
