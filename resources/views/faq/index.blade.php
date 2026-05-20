@extends('layouts.app')

@section('content')

<h1 class="text-4xl font-bold mb-8">

    FAQ

</h1>
 <!--
Toont alle FAQ categorieën
met hun gekoppelde vragen.
-->
@foreach($categories as $category)

    <div class="mb-10">

        <h2 class="text-2xl font-bold mb-4">

            {{ $category->name }}

        </h2>

        <div class="space-y-4">
<!--
Toont alle FAQ's
die behoren tot
de categorie.
-->
            @foreach($category->faqs as $faq)

                <div class="bg-white p-6 rounded shadow">

                    <h3 class="font-bold mb-2">

                        {{ $faq->question }}

                    </h3>

                    <p>

                        {{ $faq->answer }}

                    </p>

                </div>

            @endforeach

        </div>

    </div>

@endforeach
<!--
Link naar de contactpagina
wanneer bezoekers
geen antwoord vinden.
-->
<div class="mt-10">

    <a href="/contact"
       class="text-blue-500">

        Geen antwoord gevonden? Contacteer ons.

    </a>

</div>

@endsection