<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateXpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('xps', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedSmallInteger('publish')->nullable();
            $table->string('year');
            $table->string('exp_title')->nullable();
            $table->text('exp_details_1')->nullable();
            $table->text('exp_details_2')->nullable();
            $table->text('exp_content')->nullable();
            $table->string('exp_link')->nullable();
            $table->string('for_title')->nullable();
            $table->text('for_details_1')->nullable();
            $table->text('for_details_2')->nullable();
            $table->text('for_content')->nullable();
            $table->string('for_link')->nullable();
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
        Schema::dropIfExists('xps');
    }
}
