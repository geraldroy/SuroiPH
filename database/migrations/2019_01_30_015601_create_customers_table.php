<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('name_last');
            $table->string('name_first');
            $table->string('name_middle');
            $table->string('name_suffix');
            $table->string('address_street1');
            $table->string('address_street2');
            $table->string('address_barangay');
            $table->string('address_mun_city');
            $table->string('address_province');
            $table->string('mobile');
            $table->date('birthday');

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
        Schema::dropIfExists('customers');
    }
}
