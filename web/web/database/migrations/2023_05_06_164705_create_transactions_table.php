<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('owner_user_id')->constrained('users');
            $table->foreignId('borrower_user_id')->constrained('users');
            $table->foreignId('item_id')->constrained('items');
            $table->integer('points');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('status');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}

