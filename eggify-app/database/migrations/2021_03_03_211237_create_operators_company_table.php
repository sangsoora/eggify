<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOperatorsCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operators_company', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('web');
            $table->string('logo')->nullable();
            $table->integer('years');
            $table->string('linkedin');
            $table->foreignId('operator_id')->nullable()->constrained('operators');
            $table->foreignId('operator_company_employees_id')->nullable()->constrained('operators_company_employees');
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
        Schema::dropIfExists('operators_company');
    }
}
