<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(AdminUserSeeder::class);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $study = \App\Models\FaqCategory::create([
            'name' => 'Studie',
        ]);

        \App\Models\Faq::create([
            'faq_category_id' => $study->id,
            'question' => 'Hoe schrijf ik me in voor examens?',
            'answer' => 'Je kan je examens registreren via het studentenportaal.',
        ]);
    }
}
