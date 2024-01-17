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
        Schema::create('mc_locations', function (Blueprint $table) {
            $table->bigIncrements('location_id');
            $table->string('v_code', 50);
            $table->string('v_city', 50);
            $table->string('v_name', 50);
            $table->text('v_notes');
            $table->string('v_createdby', 50);
            $table->string('v_updatedby', 50);
            $table->string('v_deletedby', 50);
            $table->timestamps();
            $table->softDeletes();
            $table->tinyInteger('b_status')->default(1)->comment('1=Active, 0=Inactive');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mc__locations');
    }
};
