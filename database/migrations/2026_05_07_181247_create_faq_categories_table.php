<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
 * Maakt de FAQ categorieën tabel aan.
 *
 * Deze tabel wordt gebruikt
 * om FAQ's te groeperen
 * per categorie.
 *
 * Voorbeelden van categorieën:
 * - Studie
 * - Administratie
 * - IT & Software
 */
    public function up(): void
    {
        Schema::create('faq_categories', function (Blueprint $table) {
            $table->id();
             $table->string('name');
            $table->timestamps();
        });
    }

   /**
 * Verwijdert de FAQ categorieën tabel
 * wanneer een rollback
 * uitgevoerd wordt.
 */
    public function down(): void
    {
        Schema::dropIfExists('faq_categories');
    }
};
