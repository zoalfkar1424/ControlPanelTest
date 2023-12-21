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
        Schema::create('product_technical_characteristics', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')
                ->on('products')->references('id');
            $table->unsignedBigInteger('tech_char_id');
            $table->foreign('tech_char_id')
                ->on('technical_characteristics')->references('id');
            $table->string('characteristic_value');
            $table->unique('product_id','tech_char_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_technical_characteristics');
    }
};
