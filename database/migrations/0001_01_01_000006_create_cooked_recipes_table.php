
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cooked_recipes', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->string('session_key')->nullable();

            $table->foreignId('recipe_id')
                ->constrained('recipes')
                ->cascadeOnDelete();

            $table->timestamp('cooked_at')->useCurrent();
            $table->json('remaining_stock')->nullable();

            $table->timestamps();

            $table->index(['user_id', 'cooked_at']);
            $table->index(['session_key', 'cooked_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cooked_recipes');
    }
};
