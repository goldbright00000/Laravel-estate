<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rolesets', function (Blueprint $table) {
            $table->increments('id');			
			$table->integer('user_id')->unsigned();			
			$table->integer('generic_user')->default(1);

			$table->integer('home_owner')->default(0);
			$table->string('home_owner_country')->default("");
			$table->string('home_owner_state')->default("");
			$table->string('home_owner_estate')->default("");
			$table->string('home_owner_building')->default("");
			$table->string('home_owner_level')->default("");
			$table->string('home_owner_unit')->default("");

			$table->integer('home_member')->default(0);
			$table->string('home_member_country')->default("");
			$table->string('home_member_state')->default("");
			$table->string('home_member_estate')->default("");
			$table->string('home_member_building')->default("");
			$table->string('home_member_level')->default("");
			$table->string('home_member_unit')->default("");

			$table->integer('tenant_master')->default(0);
			$table->string('tenant_master_country')->default("");
			$table->string('tenant_master_state')->default("");
			$table->string('tenant_master_estate')->default("");
			$table->string('tenant_master_building')->default("");
			$table->string('tenant_master_level')->default("");
			$table->string('tenant_master_unit')->default("");

			$table->integer('tenant_member')->default(0);
			$table->string('tenant_member_country')->default("");
			$table->string('tenant_member_state')->default("");
			$table->string('tenant_member_estate')->default("");
			$table->string('tenant_member_building')->default("");
			$table->string('tenant_member_level')->default("");
			$table->string('tenant_member_unit')->default("");

			$table->integer('council_member')->default(0);
			$table->string('council_member_country')->default("");
			$table->string('council_member_state')->default("");
			$table->string('council_member_estate')->default("");

			$table->integer('estate_officer')->default(0);
			$table->string('estate_officer_country')->default("");
			$table->string('estate_officer_state')->default("");
			$table->string('estate_officer_estate')->default("");

			$table->integer('estate_manager')->default(0);
			$table->string('estate_manager_country')->default("");
			$table->string('estate_manager_state')->default("");
			$table->string('estate_manager_estate')->default("");

			$table->integer('estate_developer')->default(0);

		    $table->foreign('user_id')->references('id')->on('users');

			 $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rolesets');
    }
}
