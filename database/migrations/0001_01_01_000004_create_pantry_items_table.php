
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pantry_items', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->string('session_key')->nullable();

            $table->string('name');
            $table->string('category');
            $table->string('quantity');

            $table->date('purchased_at')->nullable();
            $table->date('expires_at')->nullable();

            $table->string('status')->default('Fresh');
            $table->boolean('checked')->default(false);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pantry_items');
    }
};
