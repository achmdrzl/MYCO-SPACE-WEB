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
        Schema::create('mc_users', function (Blueprint $table) {
            $table->bigIncrements('user_id');
            $table->string('name', 100);
            $table->string('email', 200)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 200);
            $table->string('phone_number', 50)->nullable();
            $table->text('address')->nullable();
            $table->string('id_number', 20)->nullable();
            $table->string('profile_picture', 200)->nullable();
            $table->string('role', 200);
            $table->string('created_by', 50)->nullable();
            $table->string('updated_by', 50)->nullable();
            $table->string('deleted_by', 50)->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
            $table->enum('status',['aktif', 'non-aktif'])->default('aktif');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
