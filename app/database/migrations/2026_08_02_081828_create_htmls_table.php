<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHtmlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('htmls', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->date('date');
            $table->tinyInteger('html_structure');
            $table->tinyInteger('html_property');
            $table->tinyInteger('html_posision');
            $table->tinyInteger('html_link');
            $table->tinyInteger('html_form');
            $table->tinyInteger('html_table');
            $table->tinyInteger('html_path');
            $table->tinyInteger('html_element');
            $table->tinyInteger('html_tool');
            $table->tinyInteger('html_web');
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
        Schema::dropIfExists('htmls');
    }
}
