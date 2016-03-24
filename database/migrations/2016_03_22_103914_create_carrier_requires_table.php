<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarrierRequiresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carrier_requires', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('user_id')->unsigned()->index();
			$table->integer('carrier_id')->unsigned()->index();
			$table->integer('price');
			$table->string('name');
			$table->string('htdgoi');
			$table->string('route');
			$table->datetime('tgnhang');
			$table->datetime('tgghang');
			$table->integer('sluong');
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
        Schema::drop('carrier_requires');
    }
}
