@extends('layouts.app')

@section('content')

<div class="bg-white p-6 rounded shadow">

    <h1 class="text-4xl font-bold mb-4">

        {{ $news->title }}

    </h1>

    <p class="text-gray-500 mb-4">

        Gepubliceerd op:
        {{ $news->published_at }}

    </p>

    <p class="mb-6">

        {{ $news->content }}

    </p>

</div>

@endsection