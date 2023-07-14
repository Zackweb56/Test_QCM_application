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
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->integer('score')->default(0);
            $table->string('status');
            $table->string('category');
            $table->json('correct_answers')->nullable();
            $table->json('userAnswers')->nullable();
            $table->json('questions')->nullable();
            // forign keys
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            // $table->foreignId('option_id')->constrained('options')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('results');
    }
};
