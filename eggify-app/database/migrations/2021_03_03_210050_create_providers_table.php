<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('providers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('address');
            $table->text('description')->nullable();
            $table->boolean('policy_consent')->default(0);
            $table->boolean('visible')->default(0);
            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->foreignId('provider_type_id')->nullable()->constrained('providers_type');
            $table->foreignId('provider_category_id')->nullable()->constrained('providers_category');
            $table->foreignId('provider_subcategory_id')->nullable()->constrained('providers_subcategory');
            $table->foreignId('provider_plan_id')->nullable()->constrained('providers_plan');
            $table->foreignId('postal_code_id')->nullable()->constrained('postal_codes');
            $table->foreignId('provider_employees_id')->nullable()->constrained('providers_company_employees');
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
        Schema::dropIfExists('providers');
    }
}
