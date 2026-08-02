<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->date('date');
            $table->tinyInteger('php_if');
            $table->tinyInteger('php_array');
            $table->tinyInteger('php_for');
            $table->tinyInteger('php_object');
            $table->tinyInteger('php_error');
            $table->tinyInteger('php_get');
            $table->tinyInteger('php_post');
            $table->tinyInteger('php_session');
            $table->tinyInteger('php_xss');
            $table->tinyInteger('php_validation');

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
        Schema::dropIfExists('phps');
    }
}
