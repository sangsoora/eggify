<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvidersCategorySubcategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('providers_category_subcategory', function (Blueprint $table) {
            $table->id();
            $table->foreignId('provider_category_id')->nullable()->constrained('providers_category');
            $table->foreignId('provider_subcategory_id')->nullable()->constrained('providers_subcategory');
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
        Schema::dropIfExists('providers_category_subcategory');
    }
}
