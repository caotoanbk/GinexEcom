<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarrierInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CarriersInfo', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('user_id')->unsigned()->index();
			$table->string('route');
			$table->text('description');
			$table->integer('price')->unsigned();
			$table->timestamps();
			$table->timestamp('date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('CarriersInfo');
    }
}
