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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('title_uz')->nullable();
            $table->string('title_en')->nullable();
            $table->text('image')->nullable();
            $table->text('short_description');
            $table->text('short_description_uz')->nullable();
            $table->text('short_description_en')->nullable();
            $table->text('description');
            $table->text('description_uz')->nullable();
            $table->text('description_en')->nullable();
            $table->enum('enable', [1, 0])->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
