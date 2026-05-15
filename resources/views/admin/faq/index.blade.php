@extends('layouts.admin')

@section('content')

<h1 class="text-4xl font-extrabold mb-8 text-[#5C3A2E]">

    FAQ Beheer

</h1>



<!-- FORMS -->

<div class="grid md:grid-cols-2 gap-8 mb-10">

    <!-- CATEGORY -->

    <div class="bg-white
                rounded-2xl
                shadow-lg
                border
                border-[#E8D8C4]
                p-6">

        <h2 class="text-2xl font-bold mb-6 text-[#5C3A2E]">

            Nieuwe categorie

        </h2>

        <form method="POST"
              action="{{ route('admin.faq.category.store') }}">

            @csrf

            <input type="text"
                   name="name"
                   placeholder="Categorie naam"
                   class="w-full
                          border
                          border-[#E8D8C4]
                          rounded-xl
                          p-3
                          mb-4">

            <button class="bg-[#7A1F1F]
                           text-white
                           px-5
                           py-3
                           rounded-xl
                           hover:opacity-90
                           transition">

                Toevoegen

            </button>

        </form>

    </div>



    <!-- FAQ -->

    <div class="bg-white
                rounded-2xl
                shadow-lg
                border
                border-[#E8D8C4]
                p-6">

        <h2 class="text-2xl font-bold mb-6 text-[#5C3A2E]">

            Nieuwe FAQ

        </h2>

        <form method="POST"
              action="{{ route('admin.faq.store') }}">

            @csrf

            <select name="faq_category_id"
                    class="w-full
                           border
                           border-[#E8D8C4]
                           rounded-xl
                           p-3
                           mb-4">

                @foreach($categories as $category)

                    <option value="{{ $category->id }}">
                        {{ $category->name }}
                    </option>

                @endforeach

            </select>

            <input type="text"
                   name="question"
                   placeholder="Vraag"
                   class="w-full
                          border
                          border-[#E8D8C4]
                          rounded-xl
                          p-3
                          mb-4">

            <textarea name="answer"
                      placeholder="Antwoord"
                      rows="5"
                      class="w-full
                             border
                             border-[#E8D8C4]
                             rounded-xl
                             p-3
                             mb-4"></textarea>

            <button class="bg-[#7A1F1F]
                           text-white
                           px-5
                           py-3
                           rounded-xl
                           hover:opacity-90
                           transition">

                FAQ toevoegen

            </button>

        </form>

    </div>

</div>



<!-- FAQ OVERVIEW -->

<h2 class="text-3xl font-bold mb-6 text-[#5C3A2E]">

    FAQ Overzicht

</h2>

<div class="space-y-8">

    @foreach($categories as $category)

        <div class="bg-white
                    rounded-2xl
                    shadow-lg
                    border
                    border-[#E8D8C4]
                    p-6">

            <!-- CATEGORY TITLE -->

            <div class="flex items-center mb-6">

                <span class="bg-[#E8D8C4]
                             text-[#5C3A2E]
                             px-4
                             py-2
                             rounded-full
                             font-semibold">

                    {{ $category->name }}

                </span>

            </div>


            <!-- FAQS -->

            <div class="space-y-4">

                @foreach($category->faqs as $faq)

                    <div class="border
                                border-[#E8D8C4]
                                rounded-xl
                                p-5">

                        <h3 class="font-bold text-lg text-[#5C3A2E] mb-2">

                            {{ $faq->question }}

                        </h3>

                        <p class="text-[#5C3A2E] mb-4">

                            {{ $faq->answer }}

                        </p>


                        <a href="{{ route('admin.faq.edit', $faq) }}"
   class="text-[#5C3A2E] font-semibold mr-4">

    Wijzigen

</a>

                        <form method="POST"
                              action="{{ route('admin.faq.destroy', $faq) }}">

                            @csrf
                            @method('DELETE')

                            <button class="text-red-600
                                           font-semibold
                                           hover:underline">

                                Verwijderen

                            </button>

                        </form>

                    </div>

                @endforeach

            </div>

        </div>

    @endforeach

</div>

@endsection