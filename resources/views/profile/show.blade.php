@extends('layouts.app')

@section('content')

<div class="max-w-4xl mx-auto">

    <div class="bg-white rounded shadow p-8">

        <div class="flex items-center gap-6 mb-8">
<!--
Toont de profielfoto
indien beschikbaar.

Anders wordt
een standaard vakje getoond.
-->
            @if($user->profile_photo)

                <img src="{{ asset('storage/' . $user->profile_photo) }}"
                     class="w-32 h-32 rounded-full object-cover">

            @else

                <div class="w-32 h-32 rounded-full bg-gray-300"></div>

            @endif

            <div>

                <h1 class="text-4xl font-bold">
<!--
Toont de username.
Indien deze niet bestaat,
wordt de naam getoond.
-->
                    {{ $user->username ?? $user->name }}

                </h1>

                <p class="text-gray-500">

                    Lid sinds:
                    {{ $user->created_at->format('d/m/Y') }}

                </p>

            </div>

        </div>

        <div class="mb-6">

            <h2 class="font-bold text-xl mb-2">

                Over mij

            </h2>

            <p>

            <!--
Toont de bio
van de gebruiker.

Indien leeg wordt
een standaard tekst getoond.
-->

                {{ $user->bio ?? 'Geen bio toegevoegd.' }}

            </p>

        </div>

        <div>

            <h2 class="font-bold text-xl mb-2">

                Verjaardag

            </h2>

            <p>

                {{ $user->birthday ?? 'Niet ingevuld' }}

            </p>

        </div>

<!--
Alleen de eigenaar
van het profiel
kan wijzigingen doen.
-->
        @auth

            @if(auth()->id() === $user->id)

                <a href="{{ route('profile.edit') }}"
                   class="inline-block mt-8 bg-blue-500 text-white px-6 py-3 rounded">

                    Profiel wijzigen

                </a>

            @endif

        @endauth

    </div>

</div>

@endsection