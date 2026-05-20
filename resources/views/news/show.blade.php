@extends('layouts.app')

@section('content')

<div class="bg-white p-6 rounded shadow">

    <h1 class="text-4xl font-bold mb-4">

        {{ $news->title }}

    </h1>

<!--
Toont de afbeelding
van het nieuwsartikel
indien beschikbaar.
-->
    @if($news->image)

        <img src="{{ asset($news->image) }}"
     alt="{{ $news->title }}"
     class="w-full h-96 object-cover rounded-2xl mb-6">

    @endif


    <p class="text-gray-500 mb-4">

        Gepubliceerd op:
        {{ $news->published_at }}

    </p>


    <p class="mb-6">

        {{ $news->content }}

    </p>


    <div class="mt-6">

        <h3 class="font-bold mb-2">

            Tags

        </h3>

        <div class="flex gap-2">
<!--
Toont alle tags
die gekoppeld zijn
aan het nieuwsartikel.
-->
            @foreach($news->tags as $tag)

                <span class="bg-[#E8D8C4] text-[#5C3A2E] px-3 py-1 rounded">

                    {{ $tag->name }}

                </span>

            @endforeach

        </div>

    </div>


    <div class="mt-10">

        <h2 class="text-2xl font-bold mb-6">

            Reacties

        </h2>
<!--
Alleen ingelogde gebruikers
kunnen reacties plaatsen.
-->
        @auth

            <form method="POST"
                  action="{{ route('comments.store', $news) }}"
                  class="mb-8">

                @csrf

                <textarea name="content"
                          class="w-full border rounded p-4"
                          rows="4"
                          placeholder="Schrijf een reactie..."></textarea>

                <button class="bg-[#7A1F1F] text-white px-4 py-2 rounded mt-4">

                    Reageren

                </button>

            </form>

        @else

            <p class="mb-6">

                Log in om een reactie te plaatsen.

            </p>

        @endauth
<!--
Toont alle reacties
van het nieuwsartikel.
-->

        @forelse($news->comments as $comment)

            <div class="bg-gray-100 rounded p-4 mb-4">

                <div class="flex justify-between mb-2">

                    <strong>

                        {{ $comment->user->username ?? $comment->user->name }}

                    </strong>

                    <span class="text-gray-500 text-sm">

                        {{ $comment->created_at->format('d/m/Y') }}

                    </span>

                </div>

                <p>

                    {{ $comment->content }}

                </p>

            </div>
<!--
Wordt getoond wanneer
er nog geen reacties zijn.
-->
        @empty

            <p>

                Nog geen reacties.

            </p>

        @endforelse

    </div>

</div>

@endsection