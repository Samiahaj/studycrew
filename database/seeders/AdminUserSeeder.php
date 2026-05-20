<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash; 

class AdminUserSeeder extends Seeder
{
   /**
 * Maakt een standaard admin account aan.
 *
 * Deze gebruiker wordt automatisch
 * toegevoegd aan de database
 * via php artisan migrate:fresh --seed.
 *
 * Login gegevens:
 * - username: admin
 * - email: admin@ehb.be
 * - password: Password!321
 */
    public function run(): void
    {
        User::create([
    'name' => 'Admin',
    'username' => 'admin',
    'email' => 'admin@ehb.be',
    'password' => Hash::make('Password!321'),
    'role' => 'admin',
]);
    }
}
