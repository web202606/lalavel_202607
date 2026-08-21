<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJavascriptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('javascripts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->date('date');
            $table->tinyInteger('javascript_read');
            $table->tinyInteger('javascript_file');
            $table->tinyInteger('javascript_grammar');
            $table->tinyInteger('javascript_variable');
            $table->tinyInteger('javascript_data');
            $table->tinyInteger('javascript_comparison');
            $table->tinyInteger('javascript_logical');
            $table->tinyInteger('javascript_dom');
            $table->tinyInteger('javascript_structure');
            $table->tinyInteger('javascript_method');

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
        Schema::dropIfExists('javascripts');
    }
}
