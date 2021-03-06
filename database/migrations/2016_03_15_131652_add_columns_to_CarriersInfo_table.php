<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToCarriersInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('CarriersInfo', function (Blueprint $table) {
			$table->string('htdgoi');
			$table->string('lxe');
			$table->integer('slxe');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('CarriersInfo', function (Blueprint $table) {
			$table->dropColumn('htdgoi');
			$table->dropColumn('lxe');
			$table->dropColun('slxe');
        });
    }
}
