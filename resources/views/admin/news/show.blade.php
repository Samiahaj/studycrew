@extends('layouts.admin')

@section('content')

<a href="{{ route('admin.news.index') }}"
   class="text-blue-500 mb-6 inline-block">

    ← Terug naar overzicht

</a>

<div class="bg-white rounded shadow p-6">

    <h1 class="text-4xl font-bold mb-4">

        {{ $news->title }}

    </h1>

    @if($news->image)

        <img src="{{ asset('storage/' . $news->image) }}"
             class="w-full h-96 object-cover rounded mb-6">

    @endif

    <p class="mb-6">

        {{ $news->content }}

    </p>

    <h2 class="font-bold mb-2">

        Tags

    </h2>

    <div class="flex gap-2 mb-8">

        @foreach($news->tags as $tag)

            <span class="bg-blue-200 px-3 py-1 rounded">

                {{ $tag->name }}

            </span>

        @endforeach

    </div>

    <form method="POST"
          action="{{ route('news.destroy', $news) }}">

        @csrf
        @method('DELETE')

        <button class="bg-red-500 text-white px-4 py-2 rounded">

            Verwijderen

        </button>

    </form>


</div>
 <div class="mt-10">

    <h2 class="text-2xl font-bold mb-6">

        Reacties beheren

    </h2>

    @forelse($news->comments as $comment)

        <div class="bg-gray-100 rounded p-4 mb-4">

            <div class="flex justify-between items-center">

                <div>

                    <strong>

                        {{ $comment->user->username ?? $comment->user->name }}

                    </strong>

                    <p class="text-sm text-gray-500">

                        {{ $comment->created_at->format('d/m/Y') }}

                    </p>

                </div>

                <form method="POST"
                      action="{{ route('admin.comments.destroy', $comment) }}">

                    @csrf
                    @method('DELETE')

                    <button class="bg-red-500 text-white px-4 py-2 rounded">

                        Verwijderen

                    </button>

                </form>

            </div>

            <p class="mt-4">

                {{ $comment->content }}

            </p>

        </div>

    @empty

        <p>

            Geen reacties gevonden.

        </p>

    @endforelse

</div>
@endsection