<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class BudgetsMessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        $dt = Carbon::now();
        DB::insert('insert into budgets_messages (id,message,budget_id,user_from_id,user_to_id,created_at,updated_at) values (?,?,?,?,?,?,?)', [1, 'Message1', 1, 5, 4, '2019-07-23 08:18:26', '2019-07-23 08:18:26']);
        DB::insert('insert into budgets_messages (id,message,budget_id,user_from_id,user_to_id,created_at,updated_at) values (?,?,?,?,?,?,?)', [2, 'Message2', 1, 4, 5, '2019-07-23 08:18:26', '2019-07-23 08:18:26']);
        DB::insert('insert into budgets_messages (id,message,budget_id,user_from_id,user_to_id,created_at,updated_at) values (?,?,?,?,?,?,?)', [3, 'Message3', 2, 6, 4, '2019-07-23 08:18:26', '2019-07-23 08:18:26']);

        Schema::enableForeignKeyConstraints();
    }
}
