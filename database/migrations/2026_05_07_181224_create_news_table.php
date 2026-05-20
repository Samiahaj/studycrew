<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
 * Maakt de news tabel aan.
 *
 * Deze tabel wordt gebruikt om
 * nieuwsartikelen op te slaan.
 *
 * Elk nieuwsartikel bevat:
 * - een gebruiker (admin)
 * - titel
 * - inhoud
 * - afbeelding
 * - publicatiedatum
 *
 * Er werd een relatie gemaakt
 * tussen users en news via user_id.
 *
 * Wanneer een gebruiker verwijderd wordt,
 * worden de gekoppelde nieuwsartikelen
 * automatisch verwijderd.
 */

    public function up(): void
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
              ->constrained()
              ->onDelete('cascade');

        $table->string('title');

        $table->text('content');

        $table->string('image')->nullable();

        $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });
    }
/**
 * Verwijdert de news tabel
 * wanneer een rollback
 * uitgevoerd wordt.
 */

    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
