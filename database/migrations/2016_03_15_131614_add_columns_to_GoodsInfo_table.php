<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToGoodsInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('GoodsInfo', function (Blueprint $table) {
			$table->string('htdgoi');
			$table->integer('sluong');
			$table->dateTime('tgghang');
			$table->dateTime('tgnhang');
			$table->dateTime('nhhdki');
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
            $table->dropColumn('htdgoi');
            $table->dropColumn('sluong');
            $table->dropColumn('tgghang');
            $table->dropColumn('tgnhang');
            $table->dropColumn('nhhdki');
        });
    }
}
