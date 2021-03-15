<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatingsRatingsCriteriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratings_ratings_criteria', function (Blueprint $table) {
            $table->id();
            $table->decimal('rating');
            $table->foreignId('rating_id')->nullable()->constrained('ratings');
            $table->foreignId('rating_criteria_id')->nullable()->constrained('ratings_criteria');
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
        Schema::dropIfExists('ratings_ratings_criteria');
    }
}
