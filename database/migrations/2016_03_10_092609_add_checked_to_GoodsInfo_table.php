<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCheckedToGoodsInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('GoodsInfo', function (Blueprint $table) {
			$table->boolean('checked', false);
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
			$table->dropColumn('checked');
        });
    }
}
