<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
 * Maakt de tussentabel news_tag aan.
 *
 * Deze tabel wordt gebruikt
 * voor de many-to-many relatie
 * tussen nieuwsartikelen en tags.
 *
 * Een nieuwsartikel kan
 * meerdere tags hebben
 * en een tag kan gekoppeld zijn
 * aan meerdere nieuwsartikelen.
 *
 * Wanneer een nieuwsartikel
 * of tag verwijderd wordt,
 * verdwijnen de gekoppelde relaties
 * automatisch.
 */
    public function up(): void
{
    Schema::create('news_tag', function (Blueprint $table) {

        $table->foreignId('news_id')
            ->constrained()
            ->onDelete('cascade');

        /*
        |----------------------------------------------
        | Tag relatie
        |----------------------------------------------
        | Wanneer een tag verwijderd wordt,
        | verdwijnt ook de koppeling
        | met het nieuwsartikel.
        */
        $table->foreignId('tag_id')
            ->constrained()
            ->onDelete('cascade');

    });
}

    /**
 * Verwijdert de news_tag tabel
 * wanneer een rollback
 * uitgevoerd wordt.
 */
    public function down(): void
    {
        Schema::dropIfExists('news_tag');
    }
};
