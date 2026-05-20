<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{/**
 * Maakt de contact_messages tabel aan.
 *
 * Deze tabel wordt gebruikt
 * om contactberichten
 * van bezoekers op te slaan.
 *
 * Elk bericht bevat:
 * - naam
 * - emailadres
 * - bericht
 *
 * Deze gegevens kunnen
 * bekeken worden door admins
 * in het dashboard.
 */
    public function up(): void
    {
        Schema::create('contact_messages', function (Blueprint $table) {
            $table->id();
             $table->string('name');

        $table->string('email');


        $table->text('message');

            $table->timestamps();
        });
    }

  /**
 * Verwijdert de contact_messages tabel
 * wanneer een rollback
 * uitgevoerd wordt.
 */
    public function down(): void
    {
        Schema::dropIfExists('contact_messages');
    }
};
