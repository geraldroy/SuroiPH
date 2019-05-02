<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PackageImageLocationTag extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('packages', function (Blueprint $table) {
            $table->integer('location_id');
            $table->string('photo1');
            $table->string('photo2')->nullable();
            $table->string('photo3')->nullable();
            $table->string('photo4')->nullable();
            $table->string('photo5')->nullable();
        });

        Schema::create('tags_map', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tag_id');
            $table->integer('package_id');
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
        //
    }
}
