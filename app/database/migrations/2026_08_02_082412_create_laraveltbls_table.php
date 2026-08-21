<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaraveltblsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laraveltbls', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->date('date');
            $table->tinyInteger('laravel_mvs');
            $table->tinyInteger('laravel_route');
            $table->tinyInteger('laravel_controller');
            $table->tinyInteger('laravel_model');
            $table->tinyInteger('laravel_view');
            $table->tinyInteger('laravel_naming');
            $table->tinyInteger('laravel_eloquent');
            $table->tinyInteger('laravel_join');
            $table->tinyInteger('laravel_templete');
            $table->tinyInteger('laravel_web');

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
        Schema::dropIfExists('laraveltbls');
    }
}
