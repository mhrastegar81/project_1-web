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
            $table->string('title', 255)->collation('utf8mb4_general_ci')->nullable();
            $table->bigInteger('price')->unsigned()->nullable();
            $table->bigInteger('inventory')->unsigned()->nullable();
            $table->bigInteger('sold_number')->unsigned()->nullable();
            $table->text('description')->collation('utf8mb4_general_ci')->nullable();
            $table->enum('status', ['enable', 'disable'])->collation('utf8mb4_general_ci')->default('enable');
            $table->timestamps();
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
