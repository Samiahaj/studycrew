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
        Schema::create('news_tag', function (Blueprint $table) {
             $table->foreignId('news_id')
              ->constrained()
              ->onDelete('cascade');
//als een nieuwsartikel verwijders wordt, worden alle comments van de artikel ook verwijderd.
        $table->foreignId('tag_id')
              ->constrained()
              ->onDelete('cascade');
              
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news_tag');
    }
};
