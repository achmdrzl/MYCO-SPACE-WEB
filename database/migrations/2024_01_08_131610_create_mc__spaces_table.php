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
        Schema::create('mc_spaces', function (Blueprint $table) {
            $table->bigIncrements('spaces_id', 20);
            $table->string('v_code', 100);
            $table->string('v_category', 50);
            $table->string('v_name', 50);
            $table->text('v_notes');
            $table->tinyInteger('b_hasquota')->nullable()->default(0);
            $table->tinyInteger('b_templatequota')->nullable()->default(0);
            $table->string('v_createdby', 20);
            $table->string('v_updatedby', 20);
            $table->string('v_deletedby', 20);
            $table->timestamps();
            $table->dateTime('deleted_at');
            $table->tinyInteger('b_status')->nullable()->default(1)->comment('1=Active, 0=Inactive');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mc__spaces');
    }
};
