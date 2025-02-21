<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->id();
            $table->text('contenu'); 
            $table->timestamp('date_reponse')->default(DB::raw('CURRENT_TIMESTAMP')); 
            $table->foreignId('utilisateur_id')->constrained('users')->onDelete('cascade'); 
            $table->foreignId('question_id')->constrained('questions')->onDelete('cascade'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_answer');
    }
};
