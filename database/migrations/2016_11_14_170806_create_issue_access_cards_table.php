<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIssueAccessCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('issue_access_cards', function (Blueprint $table) {
            $table->increments('id');
            $table->string('unit_no');
            $table->date('lease_expiring_on');
			$table->string('proximity_card_no');
			$table->string('transponder_disc_no');
			$table->string('add_proximity_card_no');
			$table->string('add_card_receipt_no');
			$table->string('add_transponder_disc_no');
			$table->string('add_disc_receipt_no');
			$table->string('payment');
			$table->string('proximity_cards_lost');
			$table->string('proximity_lost_cards_no');
			$table->string('transponder_discs_lost');
			$table->string('transponder_lost_discs_no');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('issue_access_cards');
    }
}
