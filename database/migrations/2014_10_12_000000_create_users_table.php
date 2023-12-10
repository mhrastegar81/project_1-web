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
            $table->string('user_name', 255)->nullable()->unique();
            $table->string('first_name', 255)->nullable();
            $table->string('last_name',255)->nullable();
            $table->string('age',255)->nullable();
            $table->enum('gender',['male', 'female'])->nullable();
            $table->string('email',255)->nullable()->unique();
            $table->string('phone_number',255)->nullable()->unique();
            $table->string('password', 255)->nullable();
            $table->string('address', 255)->nullable();
            $table->string('post_code',255)->nullable();
            $table->string('country', 255)->nullable();
            $table->string('province', 255)->nullable();
            $table->string('city', 255)->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
            $table->softDeletes('deleted_at');
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
