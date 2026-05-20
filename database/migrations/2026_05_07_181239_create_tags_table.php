<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
 * Maakt de tags tabel aan.
 *
 * Deze tabel wordt gebruikt
 * om tags op te slaan
 * voor nieuwsartikelen.
 *
 * Tags maken het mogelijk
 * om nieuwsartikelen
 * te categoriseren.
 */
    public function up(): void
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
                $table->string('name');
            $table->timestamps();
        });
    }

    /**
 * Verwijdert de tags tabel
 * wanneer een rollback
 * uitgevoerd wordt.
 */
    public function down(): void
    {
        Schema::dropIfExists('tags');
    }
};
