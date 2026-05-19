@extends('layouts.admin')

@section('content')

<h1 class="text-4xl font-bold mb-8 text-[#5C3A2E]">

    Berichten

</h1>

<div class="space-y-6">

    @forelse($messages as $message)

        <div class="bg-white rounded-2xl p-6 shadow border border-[#E8D8C4]">

            <div class="flex justify-between mb-4">

                <div>

                    <h2 class="text-xl font-bold text-[#5C3A2E]">

                        {{ $message->name }}

                    </h2>

                    <p class="text-gray-500">

                        {{ $message->email }}

                    </p>

                </div>

                <span class="text-sm text-gray-500">

                    {{ $message->created_at->format('d/m/Y H:i') }}

                </span>

            </div>

            <p class="mb-4">

                {{ $message->message }}

            </p>

            <form method="POST"
                  action="{{ route('admin.messages.destroy', $message) }}">

                @csrf
                @method('DELETE')

                <button class="bg-red-600 text-white px-4 py-2 rounded-xl">

                    Verwijderen

                </button>

            </form>

        </div>

    @empty

        <p>Geen berichten gevonden.</p>

    @endforelse

</div>

@endsection