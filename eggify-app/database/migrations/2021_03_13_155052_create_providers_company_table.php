<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvidersCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('providers_company', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('web');
            $table->string('logo')->nullable();
            $table->integer('years');
            $table->string('linkedin');
            $table->foreignId('provider_id')->nullable()->constrained('providers');
            $table->foreignId('provider_company_employees_id')->nullable()->constrained('providers_company_employees');
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
        Schema::dropIfExists('providers_company');
    }
}
