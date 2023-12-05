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
            $table->bigIncrements('id');
            $table->string('user_name', 255)->nullable()->collation('utf8mb4_general_ci')->unique();
            $table->string('first_name', 255)->nullable()->collation('utf8mb4_general_ci');
            $table->string('last_name',255)->nullable()->collation('utf8mb4_general_ci');
            $table->integer('age')->nullable()->unsigned();
            $table->enum('gender',['male', 'female'])->nullable();
            $table->string('email',255)->nullable()->collation('utf8mb4_general_ci')->unique();
            $table->bigInteger('phone_number')->nullable()->unsigned()->unique();
            $table->string('password', 255)->nullable()->collation('utf8mb4_general_ci');
            $table->string('address', 255)->nullable()->collation('utf8mb4_general_ci');
            $table->bigInteger('post_code')->nullable()->unsigned();
            $table->string('country', 255)->nullable()->collation('utf8mb4_general_ci');
            $table->string('province', 255)->nullable()->collation('utf8mb4_general_ci');
            $table->string('city', 255)->nullable()->collation('utf8mb4_general_ci');
            $table->text('description')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
            $table->enum('status',['enable', 'disable'])->default('enable')->nullable();
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
