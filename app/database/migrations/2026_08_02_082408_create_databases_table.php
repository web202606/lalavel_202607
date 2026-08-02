<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatabasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('databases', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->date('date');
            $table->tinyInteger('db_crud');
            $table->tinyInteger('db_rule');
            $table->tinyInteger('db_query');
            $table->tinyInteger('db_join');
            $table->tinyInteger('db_groupby');
            $table->tinyInteger('db_transaction');
            $table->tinyInteger('db_Injection');
            $table->tinyInteger('db_placeholder');
            $table->tinyInteger('db_connect');
            $table->tinyInteger('db_sql');

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
        Schema::dropIfExists('databases');
    }
}
