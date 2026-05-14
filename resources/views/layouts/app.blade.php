<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>StudyCrew</title>
<link rel="icon" type="image/png" href="/studycrew.png?v=2">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#F5EFE6] text-[#3E2C23] min-h-screen">

<nav class="bg-[#7A1F1F] text-white shadow-lg px-8 py-5 flex justify-between items-center">

    <!-- LOGO -->

    <div>

        <a href="{{ route('home') }}"
           class="font-extrabold text-3xl tracking-wide">

            Study<span class="text-[#E8D8C4]">
                Crew
            </span>

        </a>

    </div>



    <!-- MENU -->

    <div class="flex items-center gap-8 text-lg">

        <a href="{{ route('home') }}"
           class="hover:text-[#E8D8C4] transition">

            Home

        </a>

        <a href="{{ route('news.index') }}"
           class="hover:text-[#E8D8C4] transition">

            Nieuws

        </a>

        <a href="{{ route('faq.index') }}"
           class="hover:text-[#E8D8C4] transition">

            FAQ

        </a>

        <a href="{{ route('contact.index') }}"
           class="hover:text-[#E8D8C4] transition">

            Contact

        </a>

    </div>



    <!-- USER / AUTH -->

    <div>

        @auth

            <div class="flex items-center gap-5">

                <a href="{{ route('profile.show', auth()->user()) }}"
                   class="font-semibold hover:text-[#E8D8C4] transition">

                    {{ auth()->user()->username }}

                </a>

                <form method="POST"
                      action="{{ route('logout') }}">

                    @csrf

                    <button type="submit"
                            class="bg-[#E8D8C4]
                                   text-[#7A1F1F]
                                   px-4
                                   py-2
                                   rounded-lg
                                   font-semibold
                                   hover:opacity-90
                                   transition">

                        Uitloggen

                    </button>

                </form>

            </div>

        @else

            <div class="flex gap-4">

                <a href="{{ route('login') }}"
                   class="bg-[#E8D8C4]
                          text-[#7A1F1F]
                          px-4
                          py-2
                          rounded-lg
                          font-semibold
                          hover:opacity-90
                          transition">

                    Inloggen

                </a>

                <a href="{{ route('register') }}"
                   class="border
                          border-[#E8D8C4]
                          px-4
                          py-2
                          rounded-lg
                          hover:bg-[#E8D8C4]
                          hover:text-[#7A1F1F]
                          transition">

                    Registreren

                </a>

            </div>

        @endauth

    </div>

</nav>



<main class="p-8 max-w-7xl mx-auto">

    @if(session('success'))

        <div class="bg-green-100
                    text-green-800
                    border
                    border-green-300
                    p-4
                    rounded-lg
                    mb-6">

            {{ session('success') }}

        </div>

    @endif

    @yield('content')

</main>

</body>
</html>