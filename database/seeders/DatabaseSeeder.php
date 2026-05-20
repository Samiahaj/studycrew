<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
 * Voert alle seeders uit
 * voor de database.
 *
 * Eerst wordt een standaard
 * admin account aangemaakt.
 *
 * Daarna worden fake gegevens
 * toegevoegd zoals:
 * - gebruikers
 * - nieuwsartikelen
 * - FAQ's
 * - tags
 * - reacties
 */
    public function run(): void
    {
        $this->call([
            AdminUserSeeder::class,
            FakeDataSeeder::class,
        ]);
    }
}
