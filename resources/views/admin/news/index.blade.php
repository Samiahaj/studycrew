@extends('layouts.admin')

@section('content')

<div class="flex justify-between items-center mb-6">

    <h1 class="text-3xl font-bold">

        Nieuwsbeheer

    </h1>

    <a href="{{ route('news.create') }}"
       class="bg-blue-500 text-white px-4 py-2 rounded">

        Nieuw Artikel

    </a>

</div>

<div class="bg-white rounded shadow">

    <table class="w-full">

        <thead class="bg-gray-200">

            <tr>

                <th class="p-4 text-left">Titel</th>
                <th class="p-4 text-left">Datum</th>
                <th class="p-4 text-left">Acties</th>

            </tr>

        </thead>

        <tbody>

            @foreach($news as $article)

                <tr class="border-t">

                    <td class="p-4">

                        {{ $article->title }}

                    </td>

                    <td class="p-4">

                        {{ $article->published_at }}

                    </td>

                    <td class="p-4 flex gap-4">

                        <a href="{{ route('news.show', $article) }}"
                           class="text-blue-500">

                            Bekijken

                        </a>

                    </td>

                </tr>

            @endforeach

        </tbody>

    </table>

</div>

@endsection