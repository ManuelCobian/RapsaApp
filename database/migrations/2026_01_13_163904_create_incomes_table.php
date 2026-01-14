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
        Schema::create('incomes', function (Blueprint $table) {
            $table->id();
            $table->decimal('amount', 12, 2);
            $table->string('description', 200)->nullable(); 
            $table->string('concept', 100);
            $table->foreignId('provider_id')
                ->constrained()
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->dateTime('date')->index();
          
            $table->index(['provider_id', 'date']);
            $table->index(['provider_id', 'concept']);

            
            $table->timestamp("created_at")->useCurrent();
            $table->timestamp("update_at")->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incomes');
    }
};
