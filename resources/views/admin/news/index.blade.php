@extends('layouts.admin')

@section('content')

<div class="flex justify-between items-center mb-8">

    <div>

        <h1 class="text-4xl font-extrabold text-[#5C3A2E]">

            Nieuwsbeheer

        </h1>

        <p class="text-[#5C3A2E] mt-2">

            Beheer alle nieuwsartikels van StudyCrew.

        </p>

    </div>


    <a href="{{ route('news.create') }}"
       class="bg-[#7A1F1F]
              text-white
              px-6
              py-3
              rounded-xl
              font-semibold
              shadow-lg
              hover:opacity-90
              transition">

        + Nieuw Artikel

    </a>

</div>



<div class="grid gap-6">
 <!--
Toont alle nieuwsartikelen
voor de admin.

De admin kan:
- bekijken
- bewerken
- verwijderen
-->
    @forelse($news as $article)

        <div class="bg-white
                    rounded-2xl
                    shadow-lg
                    border
                    border-[#E8D8C4]
                    p-6">

            <div class="flex justify-between items-start">

                <div>

                    <h2 class="text-2xl font-bold text-[#5C3A2E] mb-2">

                        {{ $article->title }}

                    </h2>

                    <p class="text-sm text-gray-500 mb-4">

                        Gepubliceerd op:

                        {{ \Carbon\Carbon::parse($article->published_at)->format('d/m/Y') }}

                    </p>


                    <!-- TAGS -->

                    <div class="flex flex-wrap gap-2">
<!--
Toont alle tags
die gekoppeld zijn
aan een nieuwsartikel.
-->
                        @foreach($article->tags as $tag)

                            <span class="bg-[#E8D8C4]
                                         text-[#5C3A2E]
                                         px-3
                                         py-1
                                         rounded-full
                                         text-sm">

                                {{ $tag->name }}

                            </span>

                        @endforeach

                    </div>

                </div>



             <!--
Acties voor admins:
bekijken, wijzigen
of verwijderen
van een artikel.
-->

                <div class="flex gap-3">

                    <a href="{{ route('admin.news.show', $article) }}"
                       class="text-[#7A1F1F]
                              font-semibold">

                        Bekijken

                    </a>

                    <a href="{{ route('news.edit', $article) }}"
                       class="text-[#5C3A2E]
                              font-semibold">

                        Bewerken

                    </a>

                    <form method="POST"
                          action="{{ route('news.destroy', $article) }}">

                        @csrf
                        @method('DELETE')

                        <button class="text-red-600 font-semibold">

                            Verwijderen

                        </button>

                    </form>

                </div>

            </div>

        </div>
<!--
Wordt getoond wanneer
er geen nieuwsartikelen bestaan.
-->
    @empty

        <div class="bg-white
                    rounded-2xl
                    shadow-lg
                    p-8
                    text-center">

            <p class="text-[#5C3A2E]">

                Geen nieuwsartikels gevonden.

            </p>

        </div>

    @endforelse

</div>

@endsection