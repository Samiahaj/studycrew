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
    public function run(): void
    {
        // USERS

       

        User::factory(10)->create();



        // FAQ CATEGORIES

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



        // TAGS

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



        // NEWS

        $users = User::all();
        $tags = Tag::all();

        for ($i = 0; $i < 12; $i++) {

            $news = News::create([
                'user_id' => $users->random()->id,
                'title' => fake()->sentence(),
                'content' => fake()->paragraphs(4, true),
                'published_at' => now(),
            ]);

            $news->tags()->attach(
                $tags->random(rand(1, 3))->pluck('id')
            );
        }



        // COMMENTS

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