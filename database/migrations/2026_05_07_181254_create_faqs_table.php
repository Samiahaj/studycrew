<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
 * Maakt de FAQ tabel aan.
 *
 * Deze tabel bevat alle
 * veelgestelde vragen
 * van het platform.
 *
 * Elke FAQ bevat:
 * - een categorie
 * - een vraag
 * - een antwoord
 *
 * Er werd een relatie gemaakt
 * tussen FAQ's en categorieën
 * via faq_category_id.
 *
 * Wanneer een categorie
 * verwijderd wordt,
 * worden gekoppelde FAQ's
 * automatisch verwijderd.
 */
    public function up(): void
    {
        Schema::create('faqs', function (Blueprint $table) {
            $table->id();
             $table->foreignId('faq_category_id')
              ->constrained()
              ->onDelete('cascade');

        $table->string('question');

        $table->text('answer');
            $table->timestamps();
        });
    }

    /**
 * Verwijdert de FAQ tabel
 * wanneer een rollback
 * uitgevoerd wordt.
 */
    public function down(): void
    {
        Schema::dropIfExists('faqs');
    }
};
