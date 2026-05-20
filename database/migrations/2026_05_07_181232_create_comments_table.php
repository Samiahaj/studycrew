<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
 * Maakt de comments tabel aan.
 *
 * Deze tabel wordt gebruikt
 * voor het reactiesysteem
 * op nieuwsartikelen.
 *
 * Elke reactie bevat:
 * - een gebruiker
 * - een nieuwsartikel
 * - inhoud van de reactie
 *
 * Er werden relaties gemaakt
 * met users en news via
 * foreign keys.
 *
 * Wanneer een gebruiker
 * of nieuwsartikel verwijderd wordt,
 * worden gekoppelde reacties
 * automatisch verwijderd.
 */
    public function up(): void
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
             $table->foreignId('user_id')
              ->constrained()
              ->onDelete('cascade');

        $table->foreignId('news_id')
              ->constrained()
              ->onDelete('cascade');

        $table->text('content');
            $table->timestamps();
        });
    }

    /**
 * Verwijdert de comments tabel
 * wanneer een rollback
 * uitgevoerd wordt.
 */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
