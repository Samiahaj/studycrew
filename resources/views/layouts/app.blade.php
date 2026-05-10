<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StudyCrew</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

<nav class="bg-white shadow p-4 flex justify-between">

    <div>

        <a href="/" class="font-bold text-2xl">
            StudyCrew
        </a>

    </div>

    <div class="space-x-4">

        <a href="/">
            Home
        </a>

        <a href="{{ route('news.index') }}">
            Nieuws
        </a>

        <a href="#">
            FAQ
        </a>

        <a href="#">
            Contact
        </a>

    </div>

    <div>

        @auth

            {{ auth()->user()->username }}

        @else

            <a href="{{ route('login') }}">
                Inloggen
            </a>

        @endauth

    </div>

</nav>

<main class="p-6">

    @yield('content')

</main>

</body>
</html>