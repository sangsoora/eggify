<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class BudgetsStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        DB::table('budgets_status')->truncate();
        DB::insert('insert into budgets_status (id,name) values (?,?)', [1, 'Sin procesar']);
        DB::insert('insert into budgets_status (id,name) values (?,?)', [2, 'Procesado']);

        Schema::enableForeignKeyConstraints();
    }
}
