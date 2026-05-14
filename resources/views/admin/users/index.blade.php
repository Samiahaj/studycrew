@extends('layouts.admin')

@section('content')

<h1 class="text-3xl font-bold mb-6">

    Gebruikers beheren

</h1>

<div class="bg-white rounded shadow p-6">

    @foreach($users as $user)

        <div class="border-b py-4 flex justify-between">

            <div>

                <h2 class="font-bold">

                    {{ $user->username ?? $user->name }}

                </h2>

                <p>

                    {{ $user->email }}

                </p>

                <span class="text-sm text-gray-500">

                    {{ $user->role }}

                </span>

            </div>

            @if($user->id !== auth()->id())

                <form method="POST"
                      action="{{ route('admin.users.destroy', $user) }}">

                    @csrf
                    @method('DELETE')

                    <button class="bg-red-500 text-white px-4 py-2 rounded">

                        Verwijderen

                    </button>

                </form>

            @endif

        </div>

    @endforeach

</div>

@endsection