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
            $table->bigIncrements('id');
            $table->string('title',255)->unique()->collation('utf8mb4_general_ci')->nullable();
            $table->bigInteger('price')->unsigned()->nullable();
            $table->bigInteger('inventory')->unsigned()->nullable();
            $table->bigInteger('sold_number')->unsigned()->nullable();
            $table->text('discription')->collation('utf8mb4_general_ci')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
            $table->enum('status',['enable', 'disable'])->default('enable');
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
