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
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('user_id')->unsigned()->index();
            $table->bigInteger('category_id')->unsigned()->index();
            $table->string('title', 255)->nullable();
            $table->bigInteger('price')->unsigned()->nullable();
            $table->bigInteger('inventory')->unsigned()->nullable();
            $table->bigInteger('sold_number')->unsigned()->nullable();
            $table->text('description')->collation('utf8mb4_general_ci')->nullable();
            $table->string('image_address',255)->nullable();
            $table->enum('status', ['waiting', 'defined','undefined'])->default('waiting');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
