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
        Schema::create('mc_company', function (Blueprint $table) {
            $table->bigIncrements('company_id', 20);
            $table->string('v_code', 100);
            $table->string('v_name', 100);
            $table->string('v_email', 200);
            $table->string('v_phone', 50);
            $table->text('v_address');
            $table->string('v_city', 200);
            $table->string('v_zipcode', 50);
            $table->string('v_picture', 50);
            $table->text('v_notes');
            $table->string('v_npwp', 50);
            $table->string('v_createdby', 50);
            $table->string('v_updatedby', 50);
            $table->string('v_deletedby', 50);
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
        Schema::dropIfExists('mc__companies');
    }
};
