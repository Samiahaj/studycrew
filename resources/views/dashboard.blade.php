@extends('layouts.admin')

@section('content')

<h1 class="text-4xl font-extrabold mb-8 text-[#5C3A2E]">

    Dashboard

</h1>


<!-- STATS -->

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">

    <div class="bg-white rounded-2xl shadow-lg p-6 border border-[#E8D8C4]">

        <h2 class="text-lg font-semibold text-[#5C3A2E] mb-2">

            Gebruikers

        </h2>

        <p class="text-4xl font-extrabold text-[#7A1F1F]">

            {{ $usersCount }}

        </p>

    </div>


    <div class="bg-white rounded-2xl shadow-lg p-6 border border-[#E8D8C4]">

        <h2 class="text-lg font-semibold text-[#5C3A2E] mb-2">

            Nieuwsartikels

        </h2>

        <p class="text-4xl font-extrabold text-[#7A1F1F]">

            {{ $newsCount }}

        </p>

    </div>


    <div class="bg-white rounded-2xl shadow-lg p-6 border border-[#E8D8C4]">

        <h2 class="text-lg font-semibold text-[#5C3A2E] mb-2">

            FAQ

        </h2>

        <p class="text-4xl font-extrabold text-[#7A1F1F]">

            {{ $faqCount }}

        </p>

    </div>


    <div class="bg-white rounded-2xl shadow-lg p-6 border border-[#E8D8C4]">

        <h2 class="text-lg font-semibold text-[#5C3A2E] mb-2">

            Reacties

        </h2>

        <p class="text-4xl font-extrabold text-[#7A1F1F]">

            {{ $commentsCount }}

        </p>

    </div>

</div>



<!-- QUICK ACTIONS -->

<h2 class="text-2xl font-bold mb-6 text-[#5C3A2E]">

    Snelle acties

</h2>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">

    <a href="{{ route('news.create') }}"
       class="bg-white
              border
              border-[#E8D8C4]
              rounded-2xl
              p-6
              shadow-lg
              hover:scale-105
              transition">

        <h3 class="text-xl font-bold mb-2 text-[#5C3A2E]">

            Nieuw artikel

        </h3>

        <p class="text-[#5C3A2E]">

            Maak een nieuw nieuwsartikel.

        </p>

    </a>



    <a href="{{ route('admin.faq.index') }}"
       class="bg-white
              border
              border-[#E8D8C4]
              rounded-2xl
              p-6
              shadow-lg
              hover:scale-105
              transition">

        <h3 class="text-xl font-bold mb-2 text-[#5C3A2E]">

            FAQ beheren

        </h3>

        <p class="text-[#5C3A2E]">

            Voeg vragen en categorieën toe.

        </p>

    </a>



    <a href="{{ route('admin.users.index') }}"
       class="bg-white
              border
              border-[#E8D8C4]
              rounded-2xl
              p-6
              shadow-lg
              hover:scale-105
              transition">

        <h3 class="text-xl font-bold mb-2 text-[#5C3A2E]">

            Gebruikers beheren

        </h3>

        <p class="text-[#5C3A2E]">

            Bekijk en verwijder gebruikers.

        </p>

    </a>

</div>

@endsection