<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterRefundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('refunds', function (Blueprint $table) {
            $table->string('flight_from')->after('user_id');
            $table->string('flight_to')->after('flight_from');
            $table->boolean('direct_flight')->after('flight_to');
            $table->enum('reason_1', ['delayed', 'canceled', 'denied boarding'])->after('direct_flight');
            $table->enum('reason_2', ['+2','-3','+3','0-2','0-3','miss_connect_flight','never_arrived'])->after('reason_1');
            $table->enum('has_reason', ['no', 'yes', 'forget'])->after('reason_2');
            $table->enum('reason_4', ['aircraft technical','bad weater','strike','airport issues','other'])->after('has_reason');
            $table->text('comment')->after('reason_4');
            $table->string('email')->after('comment');
            $table->date('flight_date')->after('email');
            $table->string('Airlines')->after('flight_date');
            $table->string('flight_num')->after('Airlines');
            $table->string('booking_num')->after('flight_num');
            $table->string('first_name')->after('booking_num');
            $table->string('last_name')->after('first_name');
            $table->date('birthdate')->after('last_name');
            $table->string('comfirm_email')->after('birthdate');
            $table->string('adress')->after('comfirm_email');
            $table->string('city')->after('adress');
            $table->string('country')->after('city');
            $table->integer('phone')->after('country');
            $table->enum('status', ['checking', 'waiting', 'validated', 'unvalidated', 'done'])->after('phone');
            $table->dropColumn('company');
            $table->dropColumn('num_fly');
            $table->dropColumn('num_booking');
            $table->dropColumn('reason');
            $table->dropColumn('state');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('refunds', function (Blueprint $table) {
            //
        });
    }
}
