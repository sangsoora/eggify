<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBudgetsUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('budgets_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('budget_id')->nullable()->constrained('budgets');
            $table->foreignId('user_from_id')->nullable()->constrained('users');
            $table->foreignId('user_to_id')->nullable()->constrained('users');
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
        Schema::dropIfExists('budgets_users');
    }
}
