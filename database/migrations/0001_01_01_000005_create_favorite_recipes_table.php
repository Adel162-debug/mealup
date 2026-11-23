
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('favorite_recipes', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->string('session_key')->nullable();

            $table->foreignId('recipe_id')
                ->constrained('recipes')
                ->cascadeOnDelete();

            $table->timestamps();

            $table->index(['user_id', 'recipe_id']);
            $table->index(['session_key', 'recipe_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('favorite_recipes');
    }
};
