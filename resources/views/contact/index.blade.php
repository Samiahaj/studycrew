@extends('layouts.app')

@section('content')

<div class="max-w-4xl mx-auto">

    <div class="bg-white rounded shadow p-8">

        <h1 class="text-4xl font-bold mb-6">

            Contact

        </h1>
<!--
Basis contactinformatie
van StudyCrew.
-->
        <p class="mb-8 text-gray-600">

            Heb je vragen? Neem contact op met StudyCrew.

        </p>

        <div class="mb-8">

            <h2 class="font-bold text-xl mb-2">

                Contactinformatie

            </h2>

            <p>

                Email:
                info@studycrew.be

            </p>

            <p>

                Telefoon:
                +32 123 45 67 89

            </p>

            <p>

                Adres:
                Brusselstraat 1, Brussel

            </p>

        </div>

<!--
Contactformulier waarmee
bezoekers een bericht
kunnen sturen naar de admin.
-->
        <form method="POST"
              action="{{ route('contact.store') }}"
              class="space-y-6">

            @csrf

            <div>

                <label class="block mb-2">

                    Naam

                </label>

                <input type="text"
                       name="name"
                       class="w-full border rounded p-3">

            </div>


            <div>

                <label class="block mb-2">

                    Email

                </label>

                <input type="email"
                       name="email"
                       class="w-full border rounded p-3">

            </div>


            <div>

                <label class="block mb-2">

                    Bericht

                </label>
<!--
Textarea waarin
de bezoeker
een bericht schrijft.
-->
                <textarea name="message"
                          rows="5"
                          class="w-full border rounded p-3"></textarea>

            </div>


            <button class="bg-[#7A1F1F] text-white px-6 py-3 rounded">

                Versturen

            </button>

        </form>

    </div>

</div>

@endsection