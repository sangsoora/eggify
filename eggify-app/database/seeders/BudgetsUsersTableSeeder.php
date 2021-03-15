<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class BudgetsUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        DB::table('budgets_users')->truncate();

        $dt = Carbon::now();
        DB::insert('insert into budgets_users (id,budget_id,user_from_id,user_to_id) values (?,?,?,?)', [1, 1, 1, 4]);

        Schema::enableForeignKeyConstraints();
    }
}
