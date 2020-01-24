<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToAccessCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('access_cards', function (Blueprint $table) {
            //
			$table->string('unit_no');
			$table->string('contact_no');
			$table->integer('document_type');
			$table->integer('exception_type');
			$table->bigInteger('card_charge');
			$table->string('exception_card_no');
			$table->string('card_quantity');
			$table->bigInteger('amount_collected');			
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('access_cards', function (Blueprint $table) {
            //
			$table->dropColumn('unit_no'); 
			$table->dropColumn('contact_no'); 
			$table->dropColumn('document_type'); 
			$table->dropColumn('exception_type'); 
			$table->dropColumn('card_charge'); 
			$table->dropColumn('exception_card_no'); 
			$table->dropColumn('amount_collected'); 
        });
    }
}
