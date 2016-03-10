<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddValidToGoodsInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('GoodsInfo', function (Blueprint $table) {
			$table->boolean('valid')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('GoodsInfo', function (Blueprint $table) {
			$table->dropColumn('valid');
        });
    }
}
