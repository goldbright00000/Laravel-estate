<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToUsersTable extends Migration
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
			$table->string('salutation')->after('updated_at'); 
			$table->string('gender')->after('family_name'); 
			$table->string('birthdate'); 
			$table->string('citizenship');
			$table->string('national_identification');
			$table->string('preferred_language');
			$table->string('emergency_use');
			$table->string('emergency_salutation');
			$table->string('emergency_first');
			$table->string('emergency_last');
			$table->string('emergency_gender');
			$table->string('emergency_relationship');
			$table->string('personal_emergency_contact_number');
			$table->string('country_residential_status');
			$table->string('country_residential_identification');
			$table->string('residential_status_start_date');
			$table->string('residential_status_expiry_date');
			$table->string('permanent_home_address');
			$table->string('permanent_address_line_1');
			$table->string('permanent_address_line_2');
			$table->string('permanent_address_line_3');
			$table->string('permanent_city');
			$table->string('permanent_state');
			$table->string('permanent_country');
			$table->string('current_residential_address');
			$table->string('current_residential_address_line_1');
			$table->string('current_residential_address_line_2');
			$table->string('current_residential_address_line_3');
			$table->string('current_residential_city');
			$table->string('current_residential_state');
			$table->string('current_residential_country');
			$table->string('primary_contact_number');
			$table->string('emergency_contact_number');
			$table->string('mobile_number');
			$table->string('primary_email_address');
			$table->string('secondary_email_address');

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
			$table->dropColumn('salutation');
			$table->dropColumn('gender');
			$table->dropColumn('birthdate'); 
			$table->dropColumn('citizenship');
			$table->dropColumn('national_identification');
			$table->dropColumn('preferred_language');
			$table->dropColumn('emergency_use');
			$table->dropColumn('emergency_salutation');
			$table->dropColumn('emergency_first');
			$table->dropColumn('emergency_last');
			$table->dropColumn('emergency_gender');
			$table->dropColumn('emergency_relationship');
			$table->dropColumn('personal_emergency_contact_number');
			$table->dropColumn('country_residential_status');
			$table->dropColumn('country_residential_identification');
			$table->dropColumn('residential_status_start_date');
			$table->dropColumn('residential_status_expiry_date');
			$table->dropColumn('permanent_home_address');
			$table->dropColumn('permanent_address_line_1');
			$table->dropColumn('permanent_address_line_2');
			$table->dropColumn('permanent_address_line_3');
			$table->dropColumn('permanent_city');
			$table->dropColumn('permanent_state');
			$table->dropColumn('permanent_country');
			$table->dropColumn('current_residential_address');
			$table->dropColumn('current_residential_address_line_1');
			$table->dropColumn('current_residential_address_line_2');
			$table->dropColumn('current_residential_address_line_3');
			$table->dropColumn('current_residential_city');
			$table->dropColumn('current_residential_state');
			$table->dropColumn('current_residential_country');
			$table->dropColumn('primary_contact_number');
			$table->dropColumn('emergency_contact_number');
			$table->dropColumn('mobile_number');
			$table->dropColumn('primary_email_address');
			$table->dropColumn('secondary_email_address');

        });
    }
}
