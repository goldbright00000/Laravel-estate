<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccesscardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
		Schema::create('access_cards', function (Blueprint $table) {
			$table->increments('id');
			$table->string('card_no');
			$table->string('requested_by');
			$table->string('issued_to');
			$table->string('requested_on');
			$table->string('activated_on');
			$table->string('expiry_date');
			$table->string('status');
			$table->string('activity');
			$table->string('report_action');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
		Schema::drop('access_cards');
    }
}
