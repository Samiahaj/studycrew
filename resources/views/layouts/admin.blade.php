<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StudyCrew Admin</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

<div class="flex min-h-screen">

    <aside class="w-64 bg-gray-900 text-white p-6">

        <h1 class="text-2xl font-bold mb-8">
            Admin Panel
        </h1>

        <nav class="space-y-4">

            <a href="/dashboard" class="block">
                Dashboard
            </a>

            <a href="/nieuws" class="block">
                Nieuws
            </a>

            <a href="#" class="block">
                FAQ
            </a>

            <a href="#" class="block">
                Gebruikers
            </a>

        </nav>

    </aside>

    <main class="flex-1 p-8">

        @yield('content')

    </main>

</div>

</body>
</html>