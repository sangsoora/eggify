<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOperatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operators', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->string('phone');
            $table->string('address');
            $table->boolean('policy_consent')->default(0);
            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->foreignId('operator_job_id')->nullable()->constrained('operators_job');
            $table->foreignId('operator_job_tag_id')->nullable()->constrained('operators_job_tag');
            $table->foreignId('operator_employees_id')->nullable()->constrained('operators_company_employees');
            $table->foreignId('operator_position_id')->nullable()->constrained('operators_position');
            $table->foreignId('postal_code_id')->nullable()->constrained('postal_codes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('operators');
    }
}
