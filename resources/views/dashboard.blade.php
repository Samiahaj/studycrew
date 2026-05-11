@extends('layouts.admin')

@section('content')

<h1 class="text-4xl font-bold mb-6">

    Dashboard

</h1>

<div class="grid grid-cols-3 gap-6">

    <div class="bg-white p-6 rounded shadow">

        <h2 class="text-xl font-bold mb-2">

            Nieuwsartikels

        </h2>

        <p>
            Beheer alle nieuwsartikels.
        </p>

    </div>

    <div class="bg-white p-6 rounded shadow">

        <h2 class="text-xl font-bold mb-2">

            FAQ

        </h2>

        <p>
            Beheer FAQ categorieën en vragen.
        </p>

    </div>

    <div class="bg-white p-6 rounded shadow">

        <h2 class="text-xl font-bold mb-2">

            Gebruikers

        </h2>

        <p>
            Beheer gebruikers en admins.
        </p>

    </div>

</div>

@endsection
