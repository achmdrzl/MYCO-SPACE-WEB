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
        Schema::create('mc_bookings', function (Blueprint $table) {
            $table->bigIncrements('booking_id', 20);
            $table->string('v_code', 100);
            $table->string('v_city', 50);
            $table->string('v_occupation', 50);
            $table->string('v_preference', 50);
            $table->string('v_location', 50);
            $table->string('v_spaces', 50);
            $table->string('v_people', 50);
            $table->dateTime('dt_start')->nullable();
            $table->dateTime('dt_tour')->nullable();
            $table->string('v_name', 50);
            $table->string('v_companyname', 100);
            $table->string('v_email', 50);
            $table->string('v_phone', 50);
            $table->text('v_notesleadbooking');
            $table->tinyInteger('b_leadstatus')->nullable()->comment('0=Booking, 1=Follow Up, 2=Penawaran, 3=Cancel, 4=Deal, 5=Paid, 6=Agreement, 7=House Rules');
            $table->text('v_notesleadstatus');
            $table->tinyInteger('b_membershipstatus')->default(0)->nullable()->comment('1=Member, 2=Non-Member');
            $table->string('v_createdby', 50)->nullable();
            $table->string('v_updatedby', 50)->nullable();
            $table->string('v_deletedby', 50)->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->tinyInteger('b_status')->nullable()->default(1)->comment('1=Active, 0=Inactive');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mc__bookings');
    }
};
