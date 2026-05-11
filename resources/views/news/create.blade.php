@extends('layouts.admin')

@section('content')

<h1 class="text-3xl font-bold mb-6">

    Nieuws aanmaken

</h1>

<form action="{{ route('news.store') }}"
      method="POST"
      enctype="multipart/form-data"
      class="space-y-4">

    @csrf

    <div>

        <label>Titel</label>

        <input type="text"
               name="title"
               value="{{ old('title') }}"
               class="w-full border p-2">

    </div>

    <div>

        <label>Content</label>

        <textarea name="content"
                  class="w-full border p-2"></textarea>

    </div>

    <div>

        <label>Afbeelding</label>

        <input type="file" name="image">

    </div>


<div>

    <label class="font-bold">
        Tags
    </label>

    <div class="space-y-2 mt-2">

        @foreach($tags as $tag)

            <div>

                <input type="checkbox"
                       name="tags[]"
                       value="{{ $tag->id }}">

                {{ $tag->name }}

            </div>

        @endforeach

    </div>

</div>



    <button class="bg-blue-500 text-white px-4 py-2 rounded">

        Aanmaken

    </button>

</form>

@endsection