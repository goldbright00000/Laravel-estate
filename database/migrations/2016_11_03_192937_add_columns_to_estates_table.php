<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToEstatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('estates', function (Blueprint $table) {
            //
			$table->bigInteger('maintenance_fund_per_month'); 
			$table->bigInteger('sinking_fund_per_month'); 
			$table->bigInteger('monthly_payable_fund'); 
			$table->bigInteger('shares_5'); 
			$table->bigInteger('shares_6'); 
			$table->bigInteger('shares_7'); 
			$table->bigInteger('shares_8');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('estates', function (Blueprint $table) {
            //
			$table->dropColumn('maintenance_fund_per_month'); 
			$table->dropColumn('sinking_fund_per_month'); 
			$table->dropColumn('monthly_payable_fund'); 
			$table->dropColumn('shares_5'); 
			$table->dropColumn('shares_6'); 
			$table->dropColumn('shares_7'); 
			$table->dropColumn('shares_8');
        });
    }
}
