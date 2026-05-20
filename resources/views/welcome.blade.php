@extends('layouts.app')

@section('content')

<div class="space-y-16">

  <!--
Welkom sectie
van de homepage.

Geeft bezoekers
snelle toegang
tot nieuws en FAQ.
-->

    <section class="bg-white rounded-2xl shadow-lg p-12 text-center border border-[#E8D8C4]">

        <h1 class="text-5xl font-extrabold mb-6 text-[#5C3A2E]">

            Welkom bij StudyCrew

        </h1>

        <p class="text-xl text-[#5C3A2E] mb-8">

            Het platform voor studenten om nieuws,
            informatie en ondersteuning te vinden.

        </p>

        <div class="flex justify-center gap-4">

            <a href="{{ route('news.index') }}"
               class="bg-[#7A1F1F]
                      text-white
                      px-6
                      py-3
                      rounded-xl
                      font-semibold
                      hover:opacity-90
                      transition">

                Bekijk nieuws

            </a>

            <a href="{{ route('faq.index') }}"
               class="bg-[#E8D8C4]
                      text-[#5C3A2E]
                      px-6
                      py-3
                      rounded-xl
                      font-semibold
                      hover:opacity-90
                      transition">

                Bekijk FAQ

            </a>

        </div>

    </section>



    <!-- LATEST NEWS -->

    <section>

        <h2 class="text-3xl font-bold mb-6 text-[#5C3A2E]">

            Laatste nieuws

        </h2>

        <div class="grid md:grid-cols-3 gap-6">
<!--
Toont de nieuwste
nieuwsartikelen
uit de database.
-->
            @foreach($latestNews as $news)

                <div class="bg-white rounded-2xl shadow-lg p-6 border border-[#E8D8C4]">
<!--
Toont een afbeelding
indien beschikbaar.
-->
                    @if($news->image)

                       <img src="{{ asset($news->image) }}"
     class="rounded-xl mb-4 h-48 w-full object-cover">

                    @endif

                    <h3 class="text-xl font-bold mb-2 text-[#5C3A2E]">

                        {{ $news->title }}

                    </h3>

                    <p class="mb-4 text-[#5C3A2E]">
<!--
Beperkt de tekstlengte
zodat de homepage overzichtelijk blijft.
-->
                        {{ Str::limit($news->content, 100) }}

                    </p>

                    <a href="{{ route('news.show', $news) }}"
                       class="text-[#7A1F1F] font-semibold">

                        Lees meer →

                    </a>

                </div>

            @endforeach

        </div>

    </section>



    <!-- FAQ -->

    <section>

        <h2 class="text-3xl font-bold mb-6 text-[#5C3A2E]">

            Veelgestelde vragen

        </h2>

        <div class="bg-white rounded-2xl shadow-lg p-8 border border-[#E8D8C4]">
<!--
Toont een overzicht
van recente FAQ's.
-->
            @foreach($latestFaqs as $faq)

                <div class="mb-6 border-b border-[#E8D8C4] pb-4">

                    <h3 class="font-bold text-lg text-[#5C3A2E]">

                        {{ $faq->question }}

                    </h3>

                    <p class="text-[#5C3A2E]">

                        {{ Str::limit($faq->answer, 120) }}

                    </p>

                </div>

            @endforeach

            <a href="{{ route('faq.index') }}"
               class="text-[#7A1F1F] font-bold">

                Bekijk alle FAQ →

            </a>

        </div>

    </section>



    <!--
Contact sectie
voor bezoekers
met extra vragen.
-->
    <section class="bg-[#7A1F1F] rounded-2xl shadow-lg p-12 text-center text-white">

        <h2 class="text-3xl font-bold mb-4">

            Heb je nog vragen?

        </h2>

        <p class="mb-6 text-[#E8D8C4]">

            Neem contact op met StudyCrew.

        </p>

        <a href="{{ route('contact.index') }}"
           class="bg-[#E8D8C4]
                  text-[#7A1F1F]
                  px-6
                  py-3
                  rounded-xl
                  font-bold">

            Contacteer ons

        </a>

    </section>

</div>

@endsection