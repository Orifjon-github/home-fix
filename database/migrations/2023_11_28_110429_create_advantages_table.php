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
        Schema::create('advantages', function (Blueprint $table) {
            $table->id();
            $table->text('icon')->nullable();
            $table->string('title');
            $table->string('title_uz')->nullable();
            $table->text('description')->nullable();
            $table->text('description_uz')->nullable();
            $table->enum('enable', [true, false])->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('advantages');
    }
};
