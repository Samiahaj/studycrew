@extends('layouts.app')

@section('content')

<div class="max-w-4xl mx-auto py-10">

    <div class="bg-white rounded shadow p-8 mb-8">

        <h1 class="text-3xl font-bold mb-6">

            Profiel bewerken

        </h1>
<!--
Formulier voor
het aanpassen
van profielinformatie.
-->
        @include('profile.partials.update-profile-information-form')

    </div>

    <div class="bg-white rounded shadow p-8 mb-8">
<!--
Formulier om
het wachtwoord
te wijzigen.
-->
        @include('profile.partials.update-password-form')

    </div>

    <div class="bg-white rounded shadow p-8">
<!--
Formulier om
het account
te verwijderen.
-->
        @include('profile.partials.delete-user-form')

    </div>

</div>

@endsection
