@extends('layouts.app')

@section('content')

<div class="bg-white rounded shadow p-10">

    <h1 class="text-5xl font-bold mb-6">

        Welkom bij StudyCrew

    </h1>

    <p class="text-lg mb-8">

        StudyCrew is een studentenplatform waar je nieuws,
        informatie en updates voor studenten kan bekijken.

    </p>

    <a href="{{ route('news.index') }}"
       class="bg-blue-500 text-white px-6 py-3 rounded">

        Bekijk Nieuws

    </a>

</div>

<div class="mt-10">

    <h2 class="text-3xl font-bold mb-6">

        Laatste Nieuws

    </h2>

    <div class="grid grid-cols-3 gap-6">

        @foreach($latestNews as $article)

            <div class="bg-white p-4 rounded shadow">

                @if($article->image)

                    <img src="{{ asset('storage/' . $article->image) }}"
                         class="w-full h-48 object-cover rounded mb-4">

                @endif

                <h3 class="text-xl font-bold mb-2">

                    {{ $article->title }}

                </h3>

                <a href="{{ route('news.show', $article) }}"
                   class="text-blue-500">

                    Lees meer

                </a>

            </div>

        @endforeach

    </div>

</div>

@endsection