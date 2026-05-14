<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token"
          content="{{ csrf_token() }}">

    <title>StudyCrew</title>
<link rel="icon" type="image/png" href="/studycrew.png?v=2">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#F5EFE6] min-h-screen">

    <!-- NAVBAR -->

    <nav class="bg-[#7A1F1F]
                text-white
                shadow-lg
                px-8
                py-5
                flex
                justify-between
                items-center">

        <a href="{{ route('home') }}"
           class="font-extrabold text-3xl tracking-wide">

            Study<span class="text-[#E8D8C4]">
                Crew
            </span>

        </a>

        <a href="{{ route('home') }}"
           class="bg-[#E8D8C4]
                  text-[#7A1F1F]
                  px-4
                  py-2
                  rounded-lg
                  font-semibold
                  hover:opacity-90
                  transition">

            ← Terug naar Home

        </a>

    </nav>


    <!-- CONTENT -->

    <div class="min-h-screen flex justify-center items-center p-8">

        <div class="w-full
                    max-w-md
                    bg-white
                    shadow-xl
                    rounded-2xl
                    p-8
                    border
                    border-[#E8D8C4]">

            {{ $slot }}

        </div>

    </div>

</body>
</html>