@extends('layouts.admin')

@section('content')

<h1 class="text-4xl font-bold mb-8">
    FAQ Beheer
</h1>

<div class="grid grid-cols-2 gap-8">

    <div class="bg-white p-6 rounded shadow">

        <h2 class="text-xl font-bold mb-4">
            Nieuwe categorie
        </h2>

        <form method="POST"
              action="{{ route('admin.faq.category.store') }}">

            @csrf

            <input type="text"
                   name="name"
                   placeholder="Categorie naam"
                   class="w-full border p-2 mb-4">

            <button class="bg-blue-500 text-white px-4 py-2 rounded">
                Toevoegen
            </button>

        </form>

    </div>

    <div class="bg-white p-6 rounded shadow">

        <h2 class="text-xl font-bold mb-4">
            Nieuwe FAQ
        </h2>

        <form method="POST"
              action="{{ route('admin.faq.store') }}">

            @csrf

            <select name="faq_category_id"
                    class="w-full border p-2 mb-4">

                @foreach($categories as $category)

                    <option value="{{ $category->id }}">
                        {{ $category->name }}
                    </option>

                @endforeach

            </select>

            <input type="text"
                   name="question"
                   placeholder="Vraag"
                   class="w-full border p-2 mb-4">

            <textarea name="answer"
                      placeholder="Antwoord"
                      class="w-full border p-2 mb-4"></textarea>

            <button class="bg-green-500 text-white px-4 py-2 rounded">
                FAQ toevoegen
            </button>

        </form>

    </div>

</div>

<div class="mt-10">

    <h2 class="text-2xl font-bold mb-4">
        FAQ Overzicht
    </h2>

    @foreach($categories as $category)

        <div class="bg-white rounded shadow p-6 mb-6">

            <h3 class="text-xl font-bold mb-4">
                {{ $category->name }}
            </h3>

            @foreach($category->faqs as $faq)

                <div class="border-t py-4">

                    <strong>
                        {{ $faq->question }}
                    </strong>

                    <p class="mb-4">
                        {{ $faq->answer }}
                    </p>

                    <form method="POST"
                          action="{{ route('admin.faq.destroy', $faq) }}">

                        @csrf
                        @method('DELETE')

                        <button class="text-red-500">
                            Verwijderen
                        </button>

                    </form>

                </div>

            @endforeach

        </div>

    @endforeach

</div>

@endsection