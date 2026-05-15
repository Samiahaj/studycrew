@extends('layouts.admin')

@section('content')

<div class="max-w-3xl mx-auto">

    <h1 class="text-4xl font-bold text-[#5C3A2E] mb-8">

        Nieuwe gebruiker

    </h1>

    <div class="bg-white
                rounded-2xl
                shadow-lg
                border
                border-[#E8D8C4]
                p-8">

        <form method="POST"
              action="{{ route('admin.users.store') }}">

            @csrf

            <div class="mb-5">

                <label class="block font-semibold mb-2">
                    Naam
                </label>

                <input type="text"
                       name="name"
                       required
                       class="w-full border rounded-xl p-3">

            </div>

            <div class="mb-5">

                <label class="block font-semibold mb-2">
                    Username
                </label>

                <input type="text"
                       name="username"
                       required
                       class="w-full border rounded-xl p-3">

            </div>

            <div class="mb-5">

                <label class="block font-semibold mb-2">
                    Email
                </label>

                <input type="email"
                       name="email"
                       required
                       class="w-full border rounded-xl p-3">

            </div>

            <div class="mb-5">

                <label class="block font-semibold mb-2">
                    Wachtwoord
                </label>

                <input type="password"
                       name="password"
                       required
                       minlength="8"
                       class="w-full border rounded-xl p-3">

            </div>

            <div class="mb-8">

                <label class="block font-semibold mb-2">
                    Rol
                </label>

                <select name="role"
                        class="w-full border rounded-xl p-3">

                    <option value="user">
                        User
                    </option>

                    <option value="admin">
                        Admin
                    </option>

                </select>

            </div>

            <button class="bg-[#2F241F]
                           text-[#E8D8C4]
                           px-6
                           py-3
                           rounded-xl
                           font-semibold">

                Gebruiker aanmaken

            </button>

        </form>

    </div>

</div>

@endsection