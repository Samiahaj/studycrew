<!--
Deze pagina gebruikt
de admin layout.
-->

@extends('layouts.admin')
 <!--
Start van de content
voor de admin pagina.
-->
@section('content')

<div class="max-w-4xl mx-auto">

    <h1 class="text-4xl font-bold text-[#5C3A2E] mb-8">

        FAQ Wijzigen

    </h1>

    <div class="bg-white
                rounded-2xl
                shadow-lg
                border
                border-[#E8D8C4]
                p-8">
            <!--
Formulier om een bestaande FAQ
te wijzigen.

De admin kan:
- categorie aanpassen
- vraag wijzigen
- antwoord wijzigen
-->

        <form method="POST"
              action="{{ route('admin.faq.update', $faq) }}">
<!--
CSRF bescherming.
Beveiligt het formulier
tegen ongewenste requests.
-->
            @csrf

            <!--
Gebruikt PUT methode
voor het updaten
van een FAQ.
-->
            @method('PUT')

            <div class="mb-5">

                <label class="block font-semibold mb-2">

                    Categorie

                </label>
<!--
Dropdown met alle FAQ categorieën.
De huidige categorie wordt
automatisch geselecteerd.
-->
                <select name="faq_category_id"
                        class="w-full border rounded-xl p-3">

                    @foreach($categories as $category)

                        <option value="{{ $category->id }}"
                            @selected($faq->faq_category_id === $category->id)>
 
                            <!--
Selecteert automatisch
de huidige categorie
van de FAQ.
-->
                            {{ $category->name }}

                        </option>

                    @endforeach

                </select>

            </div>

            <div class="mb-5">

                <label class="block font-semibold mb-2">

                    Vraag

                </label>
<!--
Input veld voor
de vraag van de FAQ.
-->
                <input type="text"
                       name="question"
                       value="{{ $faq->question }}"
                       class="w-full border rounded-xl p-3">

            </div>

            <div class="mb-8">

                <label class="block font-semibold mb-2">

                    Antwoord

                </label>
 <!--
Textarea voor
het antwoord van de FAQ.
-->
                <textarea name="answer"
                          rows="5"
                          class="w-full border rounded-xl p-3">{{ $faq->answer }}</textarea>

            </div>

            <button class="bg-[#2F241F]
                           text-[#E8D8C4]
                           px-6
                           py-3
                           rounded-xl
                           font-semibold">

                FAQ Opslaan

            </button>

        </form>

    </div>

</div>

@endsection