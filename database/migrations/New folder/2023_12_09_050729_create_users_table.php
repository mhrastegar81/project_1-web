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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('user_name',255)->unique()->collation('utf8mb4_general_ci')->nullable();
            $table->string('first_name', 255)->collation('utf8mb4_general_ci')->nullable();
            $table->string('last_name',255)->collation('utf8mb4_general_ci')->nullable();
            $table->string('age',255)->collation('utf8mb4_general_ci')->nullable();
            $table->enum('gender', ['male', 'female']);
            $table->string('email', 255)->collation('utf8mb4_general_ci')->nullable();
            $table->string('phone_number', 255)->collation('utf8mb4_general_ci')->nullable();
            $table->string('password', 255)->collation('utf8mb4_general_ci')->nullable();
            $table->string('address', 255)->collation('utf8mb4_general_ci')->nullable();
            $table->string('post_code', 255)->collation('utf8mb4_general_ci')->nullable();
            $table->string('country', 255)->collation('utf8mb4_general_ci')->nullable();
            $table->string('procince', 255)->collation('utf8mb4_general_ci')->nullable();
            $table->string('city', 255)->collation('utf8mb4_general_ci')->nullable();
            $table->string('cescription', 255)->collation('utf8mb4_general_ci')->nullable();
            $table->enum('status', ['enable', 'disable'])->collation('utf8mb4_general_ci')->nullable()->default('enable');
            $table->timestamps();
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
