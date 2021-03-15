<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class OperatorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        DB::table('operators')->truncate();

        DB::insert('insert into operators (id,name,surname,phone,address,user_id,operator_job_id,operator_job_tag_id,operator_employees_id,operator_position_id,postal_code_id) values (?,?,?,?,?,?,?,?,?,?,?)', [1, 'Operatorname1', 'Operatorsurname1', '600600600', 'Calle de Botoneras, 5, 28012 Madrid', 5, 1, 1, 1, 1, 1]);
        DB::insert('insert into operators (id,name,surname,phone,address,user_id,operator_job_id,operator_job_tag_id,operator_employees_id,operator_position_id,postal_code_id) values (?,?,?,?,?,?,?,?,?,?,?)', [2, 'Operatorname2', 'Operatorsurname2', '600600600', 'Calle de Botoneras, 5, 28012 Madrid', 6, 2, 2, 2, 2, 1]);

        Schema::enableForeignKeyConstraints();
    }
}
