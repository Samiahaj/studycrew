@extends('layouts.app')

@section('content')

<div class="space-y-20">

    <!-- HERO -->

    <section class="bg-white rounded shadow p-12 text-center">

        <h1 class="text-5xl font-bold mb-6">

            Welkom bij StudyCrew

        </h1>

        <p class="text-xl text-gray-600 mb-8">

            Het platform voor studenten om nieuws,
            informatie en ondersteuning te vinden.

        </p>

        <div class="flex justify-center gap-4">

            <a href="{{ route('news.index') }}"
               class="bg-blue-500 text-white px-6 py-3 rounded">

                Bekijk nieuws

            </a>

            <a href="{{ route('faq.index') }}"
               class="bg-gray-200 px-6 py-3 rounded">

                Bekijk FAQ

            </a>

        </div>

    </section>



    <!-- LATEST NEWS -->

    <section>

        <h2 class="text-3xl font-bold mb-6">

            Laatste nieuws

        </h2>

        <div class="grid md:grid-cols-3 gap-6">

            @foreach($latestNews as $news)

                <div class="bg-white rounded shadow p-6">

                    <h3 class="text-xl font-bold mb-2">

                        {{ $news->title }}

                    </h3>

                    <p class="mb-4 text-gray-600">

                        {{ Str::limit($news->content, 100) }}

                    </p>

                    <a href="{{ route('news.show', $news) }}"
                       class="text-blue-500">

                        Lees meer →

                    </a>

                </div>

            @endforeach

        </div>

    </section>



    <!-- FAQ PREVIEW -->

    <section>

        <h2 class="text-3xl font-bold mb-6">

            Veelgestelde vragen

        </h2>

        <div class="bg-white rounded shadow p-8">

            @foreach($latestFaqs as $faq)

                <div class="mb-6">

                    <h3 class="font-bold">

                        {{ $faq->question }}

                    </h3>

                    <p class="text-gray-600">

                        {{ Str::limit($faq->answer, 120) }}

                    </p>

                </div>

            @endforeach

            <a href="{{ route('faq.index') }}"
               class="text-blue-500 font-bold">

                Bekijk alle FAQ →

            </a>

        </div>

    </section>



    <!-- CONTACT CTA -->

    <section class="bg-white rounded shadow p-10 text-center">

        <h2 class="text-3xl font-bold mb-4">

            Heb je nog vragen?

        </h2>

        <p class="text-gray-600 mb-6">

            Neem contact op met StudyCrew.

        </p>

        <a href="{{ route('contact.index') }}"
           class="bg-blue-500 text-white px-6 py-3 rounded">

            Contacteer ons

        </a>

    </section>

</div>

@endsection