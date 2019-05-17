<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->unsignedBigInteger('venue_id')->after('id');
            $table->string('color')->after('user_id');
            $table->string('letter')->after('color');

            $table->foreign('venue_id')
                ->references('id')->on('venues')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['venue_id']);

            $table->dropColumn(['venue_id', 'color', 'letter']);
        });
    }
}
