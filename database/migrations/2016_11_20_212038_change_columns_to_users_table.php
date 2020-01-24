<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
			$table->string('salutation')->default("")->change();
			$table->string('gender')->default("")->change();
			$table->string('birthdate')->default("")->change();
			$table->string('citizenship')->default("")->change();
			$table->string('national_identification')->default("")->change();
			$table->string('preferred_language')->default("")->change();
			$table->string('emergency_use')->default("")->change();
			$table->string('emergency_salutation')->default("")->change();
			$table->string('emergency_first')->default("")->change();
			$table->string('emergency_last')->default("")->change();
			$table->string('emergency_gender')->default("")->change();
			$table->string('emergency_relationship')->default("")->change();
			$table->string('personal_emergency_contact_number')->default("")->change();
			$table->string('country_residential_status')->default("")->change();
			$table->string('country_residential_identification')->default("")->change();
			$table->string('residential_status_start_date')->default("")->change();
			$table->string('residential_status_expiry_date')->default("")->change();
			$table->string('permanent_home_address')->default("")->change();
			$table->string('permanent_address_line_1')->default("")->change();
			$table->string('permanent_address_line_2')->default("")->change();
			$table->string('permanent_address_line_3')->default("")->change();
			$table->string('permanent_city')->default("")->change();
			$table->string('permanent_state')->default("")->change();
			$table->string('permanent_country')->default("")->change();
			$table->string('current_residential_address')->default("")->change();
			$table->string('current_residential_address_line_1')->default("")->change();
			$table->string('current_residential_address_line_2')->default("")->change();
			$table->string('current_residential_address_line_3')->default("")->change();
			$table->string('current_residential_city')->default("")->change();
			$table->string('current_residential_state')->default("")->change();
			$table->string('current_residential_country')->default("")->change();
			$table->string('primary_contact_number')->default("")->change();
			$table->string('emergency_contact_number')->default("")->change();
			$table->string('mobile_number')->default("")->change();
			$table->string('primary_email_address')->default("")->change();
			$table->string('secondary_email_address')->default("")->change();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
