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
            $table->id();
            $table->string('name');
            $table->string('name_uz')->nullable();
            $table->string('image');
            $table->text('short_description')->nullable();
            $table->text('short_description_uz')->nullable();
            $table->text('description');
            $table->text('description_uz')->nullable();
            $table->integer('count')->default(1);
            $table->integer('totalCount')->default(1);
            $table->enum('enable', [1, 0])->default(1);
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
