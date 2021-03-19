<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFielsToProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('providers', function (Blueprint $table) {
            $table->text('about')->nullable();
            $table->text('usp')->nullable();
            $table->string('municipality')->nullable();
            $table->string('location')->nullable();
            $table->date('starting')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('providers', function (Blueprint $table) {
            $table->dropColumn('about');
            $table->dropColumn('usp');
            $table->dropColumn('municipality');
            $table->dropColumn('location');
            $table->dropColumn('starting');
        });
    }
}
