<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\News;
use App\Models\Tag;
use App\Models\Comment;
use App\Models\Faq;
use App\Models\FaqCategory;
use Illuminate\Database\Seeder;


class FakeDataSeeder extends Seeder
{

/**
 * Voegt fake gegevens toe
 * aan de database voor testing.
 *
 * Deze seeder maakt automatisch:
 * - gebruikers
 * - FAQ categorieën
 * - FAQ's
 * - tags
 * - nieuwsartikelen
 * - reacties
 *
 * Hierdoor werkt de website
 * onmiddellijk na
 * php artisan migrate:fresh --seed.
 */
    public function run(): void
    {
        // USERS

       
/**
 * Maakt automatisch
 * 10 fake gebruikers aan.
 */
        User::factory(10)->create();



        // FAQ CATEGORIES
/**
 * Maakt standaard FAQ categorieën aan
 * zodat de FAQ pagina direct gevuld is.
 */
        $study = FaqCategory::create([
            'name' => 'Studie',
        ]);

        $admin = FaqCategory::create([
            'name' => 'Administratie',
        ]);

        $it = FaqCategory::create([
            'name' => 'IT & Software',
        ]);

        $general = FaqCategory::create([
            'name' => 'Algemeen',
        ]);



        // FAQ
/**
 * Voegt voorbeeld FAQ's toe
 * gekoppeld aan categorieën.
 */
        Faq::create([
            'faq_category_id' => $study->id,
            'question' => 'Hoe bereid ik examens goed voor?',
            'answer' => 'Maak een planning en studeer regelmatig.',
        ]);

        Faq::create([
            'faq_category_id' => $admin->id,
            'question' => 'Hoe vraag ik een attest aan?',
            'answer' => 'Via het studentenportaal.',
        ]);

        Faq::create([
            'faq_category_id' => $it->id,
            'question' => 'Mijn laptop werkt niet op school wifi?',
            'answer' => 'Neem contact op met IT support.',
        ]);

Faq::create([
    'faq_category_id' => $general->id,
    'question' => 'Waar vind ik algemene informatie?',
    'answer' => 'Bekijk de homepage of contacteer ons.',
]);

        // TAGS
/**
 * Lijst van tags
 * voor nieuwsartikelen.
 */
        $tags = [
            'Studenten',
            'Examens',
            'Campus',
            'Studeren',
            'Software',
            'IT',
            'Tips',
            'School'
        ];

        foreach ($tags as $tag) {

            Tag::create([
                'name' => $tag,
            ]);
        }

  /**
 * Lijst van afbeeldingen
 * die willekeurig gekoppeld worden
 * aan nieuwsartikelen.
 */

        $images = [
    'images/news/student-life.jpg',
    'images/news/library.jpg',
    'images/news/coding.jpg',
    'images/news/group-study.jpg',
    'images/news/exam.jpg',
    'images/news/campus.jpg',
    'images/news/meeting.jpg',
    'images/news/online-learning.jpg',
    'images/news/graduation.jpg',
    'images/news/study-room.jpg',
];

        // NEWS

        $users = User::all();
        $tags = Tag::all();

        /**
 * Maakt fake nieuwsartikelen aan
 * met willekeurige gebruikers,
 * afbeeldingen en tags.
 *
 * Elk nieuwsartikel krijgt
 * tussen 1 en 3 tags.
 */
        for ($i = 0; $i < 12; $i++) {

            $news = News::create([
                'user_id' => $users->random()->id,
                'title' => fake()->sentence(),
                'content' => fake()->paragraphs(4, true),
                'image' => $images[array_rand($images)],
                'published_at' => now(),
            ]);

            $news->tags()->attach(
                $tags->random(rand(1, 3))->pluck('id')
            );
        }



        // COMMENTS
/**
 * Voegt willekeurige reacties toe
 * aan elk nieuwsartikel.
 *
 * Elk artikel krijgt
 * tussen 2 en 6 reacties.
 */
        $newsItems = News::all();

        foreach ($newsItems as $news) {

            for ($i = 0; $i < rand(2, 6); $i++) {

                Comment::create([
                    'user_id' => $users->random()->id,
                    'news_id' => $news->id,
                    'content' => fake()->sentence(12),
                ]);
            }
        }
    }
}