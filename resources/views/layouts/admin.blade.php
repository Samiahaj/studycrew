<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>StudyCrew Admin</title>
<link rel="icon" type="image/png" href="/studycrew.png?v=2">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#EFE6DA] text-[#3E2C23]">

<div class="flex min-h-screen">

    <!-- SIDEBAR -->

    <aside class="w-72 bg-[#2F241F] text-white shadow-2xl flex flex-col">

        <!-- LOGO -->

        <div class="p-8 border-b border-[#4A3A33]">

            <h1 class="text-3xl font-extrabold tracking-wide">

                Study<span class="text-[#E8D8C4]">
                    Crew
                </span>

            </h1>

            <p class="text-[#C7B299] mt-2 text-sm">

                Admin Panel

            </p>

        </div>



        <!-- NAVIGATION -->

        <nav class="flex-1 p-6 space-y-3">

            <a href="{{ route('dashboard') }}"
               class="block
                      px-5
                      py-3
                      rounded-xl
                      hover:bg-[#4A3A33]
                      transition
                      font-medium">

                Dashboard

            </a>


            <a href="{{ route('admin.news.index') }}"
               class="block
                      px-5
                      py-3
                      rounded-xl
                      hover:bg-[#4A3A33]
                      transition
                      font-medium">

                Nieuws

            </a>


            <a href="{{ route('admin.faq.index') }}"
               class="block
                      px-5
                      py-3
                      rounded-xl
                      hover:bg-[#4A3A33]
                      transition
                      font-medium">

                FAQ

            </a>


            <a href="{{ route('admin.users.index') }}"
               class="block
                      px-5
                      py-3
                      rounded-xl
                      hover:bg-[#4A3A33]
                      transition
                      font-medium">

                Gebruikers

            </a>
<a href="{{ route('admin.messages.index') }}"
   class="block px-5 py-3 rounded-xl hover:bg-[#4A3A33] transition font-medium">

    Berichten

</a> 
        </nav>



        <!-- USER / FOOTER -->

        <div class="p-6 border-t border-[#4A3A33]">

            <div class="mb-5">

                <p class="font-semibold text-lg">

                    {{ auth()->user()->username }}

                </p>

                <p class="text-sm text-[#C7B299]">

                    Administrator

                </p>

            </div>

            <form method="POST"
                  action="{{ route('logout') }}">

                @csrf

                <button type="submit"
                        class="w-full
                               bg-[#E8D8C4]
                               text-[#5C3A2E]
                               py-3
                               rounded-xl
                               font-bold
                               hover:opacity-90
                               transition">

                    Uitloggen

                </button>

            </form>

        </div>

    </aside>



    <!-- MAIN CONTENT -->

    <main class="flex-1 p-10">

        @yield('content')

    </main>

</div>

</body>
</html>