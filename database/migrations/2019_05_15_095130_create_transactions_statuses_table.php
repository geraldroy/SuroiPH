<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_statuses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('transaction_id');
            $table->string('status');
            $table->integer('user_id');
            $table->string('remarks')->nullable();
            $table->timestamps();
        });

        Schema::table('transactions', function (Blueprint $table) {
            $table->integer('agency_id');
        });

        Schema::dropIfExists('tags_map');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction_statuses');
    }
}
