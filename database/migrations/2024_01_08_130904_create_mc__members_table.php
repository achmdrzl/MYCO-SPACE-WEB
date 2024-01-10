<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mc_members', function (Blueprint $table) {
            $table->bigIncrements('member_id', 20);
            $table->string('v_code', 100);
            $table->unsignedBigInteger('fk_booking');
            $table->unsignedBigInteger('fk_company');
            $table->string('v_name', 50);
            $table->string('v_email', 50);
            $table->string('v_email2', 50);
            $table->string('v_phone', 20);
            $table->string('v_location', 50);
            $table->string('v_spaces', 50);
            $table->integer('i_people')->nullable();
            $table->string('v_idnumber', 50);
            $table->text('v_address');
            $table->string('v_city', 200);
            $table->string('v_zipcode', 20);
            $table->date('dt_birthdate');
            $table->tinyInteger('b_gender')->default(0)->comment('1=Male, 2=Female');
            $table->string('v_picture', 50);
            $table->string('v_accesscard', 200);
            $table->tinyInteger('b_picstatus')->default(0)->comment('1=PIC, 0=Non-PIC');
            $table->tinyInteger('b_frequent')->default(0)->comment('0 = Default, 1=Monthly, 2=Daily, 3=Hourly');
            $table->tinyInteger('b_membershipstatus')->default(0)->comment('1=Member, 2=Non-Member');
            $table->dateTime('dt_start')->nullable();
            $table->dateTime('dt_end')->nullable();
            $table->time('t_start')->nullable();
            $table->time('t_end')->nullable();
            $table->string('v_room', 50);
            $table->tinyInteger('b_agreement')->default(0)->nullable();
            $table->tinyInteger('b_houserules')->default(0)->nullable();
            $table->text('v_notes');
            $table->dateTime('dt_lastpaid');
            $table->tinyInteger('b_paidstatus')->default(0)->nullable()->comment('0=Unpaid, 1=Paid');
            $table->string('v_createdby');
            $table->string('v_updatedby');
            $table->string('v_deletedby');
            $table->timestamps();
            $table->softDeletes();
            $table->tinyInteger('b_status')->nullable()->default(1)->comment('1=Active, 0=Inactive');

            // Add foreign key constraints if needed
            // $table->foreign('fk_booking')->references('booking_id')->on('mc_booking');
            // $table->foreign('fk_company')->references('company_id')->on('mc_company');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mc__members');
    }
};
