@extends('layouts.admin')

@section('content')

<h1 class="text-4xl font-bold mb-8">

    Dashboard

</h1>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">

    <a href="{{ route('admin.news.index') }}"
       class="bg-white p-6 rounded shadow hover:shadow-lg transition block">

        <h2 class="text-xl font-bold mb-2">

            Nieuwsartikels

        </h2>

        <p class="text-gray-600">

            Beheer alle nieuwsartikels.

        </p>

    </a>


    <a href="{{ route('admin.faq.index') }}"
       class="bg-white p-6 rounded shadow hover:shadow-lg transition block">

        <h2 class="text-xl font-bold mb-2">

            FAQ

        </h2>

        <p class="text-gray-600">

            Beheer FAQ categorieën en vragen.

        </p>

    </a>


    <a href="{{ route('admin.users.index') }}"
       class="bg-white p-6 rounded shadow hover:shadow-lg transition block">

        <h2 class="text-xl font-bold mb-2">

            Gebruikers

        </h2>

        <p class="text-gray-600">

            Beheer gebruikers en admins.

        </p>

    </a>

</div>

@endsection
