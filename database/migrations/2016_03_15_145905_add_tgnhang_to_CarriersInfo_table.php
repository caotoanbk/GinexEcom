<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTgnhangToCarriersInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('CarriersInfo', function (Blueprint $table) {
           $table->dateTime('tgnhang'); 
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
           $table->dropColumn('tgnhang'); 
        });
    }
}
