<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBudgetsMessagesLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('budgets_messages_log', function (Blueprint $table) {
            $table->id();
            $table->foreignId('budget_message_id')->nullable()->constrained('budgets_messages');
            $table->foreignId('budget_message_log_status_id')->nullable()->constrained('budgets_messages_log_status');
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
        Schema::dropIfExists('budgets_messages_log');
    }
}
