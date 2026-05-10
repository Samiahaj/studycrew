@extends('layouts.app')

@section('content')

<h1 class="text-3xl font-bold mb-6">

    Laatste Nieuws

</h1>

<div class="space-y-6">

    @foreach ($news as $article)

        <div class="bg-white p-6 rounded shadow">

            <h2 class="text-2xl font-bold">

                {{ $article->title }}

            </h2>

            <p class="text-gray-500 mb-4">

                Gepubliceerd op:
                {{ $article->published_at }}

            </p>

            <a href="{{ route('news.show', $article) }}"
               class="text-blue-500">

                Lees meer

            </a>

        </div>

    @endforeach

</div>

@endsection