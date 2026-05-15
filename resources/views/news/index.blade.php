@extends('layouts.app')

@section('content')

<h1 class="text-3xl font-bold mb-6">

    Laatste Nieuws

</h1>

<div class="space-y-6">

    @foreach ($news as $article)

        <div class="bg-white p-6 rounded shadow">
            @if($article->image)

   <img src="{{ asset($article->image) }}"
     alt="{{ $article->title }}"
     class="w-full h-64 object-cover rounded-xl mb-4">

@endif

            <h2 class="text-2xl font-bold">

                {{ $article->title }}

            </h2>

            <p class="text-gray-500 mb-4">

                Gepubliceerd op:
                {{ $article->published_at }}

            </p>

            <a href="{{ route('news.show', $article) }}"
               class="text-[#7A1F1F]">

                Lees meer

            </a>

        </div>

    @endforeach

</div>

@endsection