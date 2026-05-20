<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

    /**
 * Voegt extra velden toe
 * aan de users tabel.
 *
 * Deze velden worden gebruikt
 * voor de profielpagina.
 */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
      /**
 * Extra profielvelden
 * voor gebruikers:
 *
 * - username
 * - verjaardag
 * - rol
 * - bio
 * - profielfoto
 */
        $table->string('username')->unique()->after('name');
       $table->date('birthday')->nullable();

        $table->string('role')->default('user');
        $table->text('bio')->nullable();

        $table->string('profile_photo')->nullable();
        });
    }

    /**
 * Draait de migratie terug.
 */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {

    $table->dropColumn([
        'username',
        'birthday',
        'role',
        'bio',
        'profile_photo',
    ]);
});
    }
};
