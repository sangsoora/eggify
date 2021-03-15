<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBudgetsMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('budgets_messages', function (Blueprint $table) {
            $table->id();
            $table->string('message');
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
        Schema::dropIfExists('budgets_messages');
    }
}
