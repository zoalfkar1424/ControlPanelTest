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
        Schema::create('technical_characteristics', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('category', ['Dimensions', 'General', 'Laser_source','Hardware','Optics','Electronics','Options','Mechanics','Beds','Working_Table']);
            $table->unsignedBigInteger('catalog_id');
            $table->foreign('catalog_id')
                ->on('catalogs')->references('id');
            $table->timestamps();
            $table->unique('name','category', 'catalog_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('technical_characteristics');
    }
};
