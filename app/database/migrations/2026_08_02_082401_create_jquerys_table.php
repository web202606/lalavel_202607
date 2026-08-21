<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJquerysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jquerys', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->date('date');
            $table->tinyInteger('jquery_plugin');
            $table->tinyInteger('jquery_read');
            $table->tinyInteger('jquery_structure');
            $table->tinyInteger('jquery_method');
            $table->tinyInteger('jquery_event');
            $table->tinyInteger('jquery_ajax');
            $table->tinyInteger('jquery_alert');
            $table->tinyInteger('jquery_counter');
            $table->tinyInteger('jquery_animation');
            $table->tinyInteger('jquery_fade');
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
        Schema::dropIfExists('jquerys');
    }
}
