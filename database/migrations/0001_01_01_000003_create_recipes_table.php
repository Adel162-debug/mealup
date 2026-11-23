<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('cooked_recipes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->cascadeOnDelete();
            $table->string('session_key', 100)->nullable()->index();
            $table->foreignId('recipe_id')->constrained()->cascadeOnDelete();
            $table->timestamp('cooked_at');
            $table->json('remaining_stock')->nullable();
            $table->timestamps();
            $table->index(['session_key', 'cooked_at']);
            $table->index(['user_id', 'cooked_at']);
        });
    }
    public function down(): void { Schema::dropIfExists('cooked_recipes'); }
};
