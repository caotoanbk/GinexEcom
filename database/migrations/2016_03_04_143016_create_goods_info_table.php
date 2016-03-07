<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('GoodsInfo', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('user_id')->unsigned()->index();
			$table->string('name');
			$table->text('description');
			$table->string('route');
			$table->timestamp('date');
			$table->timestamp('time');
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
        Schema::drop('GoodsInfo');
    }
}
