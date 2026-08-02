<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCsssTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('csss', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->date('date');
            $table->tinyInteger('css_property');
            $table->tinyInteger('css_element');
            $table->tinyInteger('css_box');
            $table->tinyInteger('css_Flexbox');
            $table->tinyInteger('css_responsive');
            $table->tinyInteger('css_position');
            $table->tinyInteger('css_glid');
            $table->tinyInteger('css_back-ground');
            $table->tinyInteger('css_display');
            $table->tinyInteger('css_coding');
            $table->tinyInteger('del_flg')->default(0);
            $table->string('comment', '100')->nullable();          
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
        Schema::dropIfExists('csss');
    }
}
