@extends('layouts.admin')

@section('content')

<div class="flex justify-between items-center mb-8">

    <div>

        <h1 class="text-4xl font-extrabold text-[#5C3A2E]">

            Gebruikers beheren

        </h1>

        <p class="text-[#5C3A2E] mt-2">

            Beheer alle gebruikers van StudyCrew.

        </p>

    </div>

<a href="{{ route('admin.users.create') }}"
   class="bg-[#2F241F]
          text-[#E8D8C4]
          px-5
          py-3
          rounded-xl
          font-semibold">

    Nieuwe gebruiker

</a>



</div>



<div class="grid gap-6">
<!--
Toont alle gebruikers
van het platform.

Admins kunnen:
- rollen aanpassen
- gebruikers verwijderen
-->
    @foreach($users as $user)

        <div class="bg-white
                    rounded-2xl
                    shadow-lg
                    border
                    border-[#E8D8C4]
                    p-6">

            <div class="flex justify-between items-center">

                <div>

                    <h2 class="text-2xl font-bold text-[#5C3A2E]">

                        {{ $user->username ?? $user->name }}

                    </h2>

                    <p class="text-gray-600 mt-1">

                        {{ $user->email }}

                    </p>

                    <p class="text-sm text-gray-500 mt-2">

                        Lid sinds:

                        {{ $user->created_at->format('d/m/Y') }}

                    </p>

                </div>



                <div class="flex items-center gap-4">

                    <!--
Toont visueel
welke rol een gebruiker heeft.
-->

                    @if($user->role === 'admin')

                        <span class="bg-[#7A1F1F]
                                     text-white
                                     px-4
                                     py-2
                                     rounded-full
                                     text-sm
                                     font-semibold">

                            Admin

                        </span>

                    @else

                        <span class="bg-[#E8D8C4]
                                     text-[#5C3A2E]
                                     px-4
                                     py-2
                                     rounded-full
                                     text-sm
                                     font-semibold">

                            User

                        </span>

                    @endif
<!--
Voorkomt dat een admin
zijn eigen rechten
of de hoofdadmin wijzigt.
-->
  @if($user->id !== auth()->id()
    && $user->email !== 'admin@ehb.be')

    <!--
Wijzigt de rol
tussen user en admin.
-->
    <form method="POST"
   
          action="{{ route('admin.users.toggle-admin', $user) }}">

        @csrf
        @method('PATCH')

        @if($user->role === 'admin')

            <button style="background-color:#A65E2E;
               color:white;
               padding:10px 20px;
               border-radius:12px;
               font-weight:600;">

    Verwijder Admin

</button>

        @else

           <button style="background-color:#2F241F;
               color:#E8D8C4;
               padding:10px 20px;
               border-radius:12px;
               font-weight:600;">

    Maak Admin

</button>

        @endif

    </form>

@endif

                    <!--
Voorkomt dat een admin
zichzelf verwijdert.
-->

                    @if($user->id !== auth()->id())

                        <form method="POST"
                              action="{{ route('admin.users.destroy', $user) }}">

                            @csrf
                            @method('DELETE')

  <button class="bg-red-600
   text-white
px-5
   py-2
          rounded-xl
         hover:opacity-90
    transition">

     Verwijderen
</button>

 </form>

  @endif
  </div>

 </div>

  </div>

    @endforeach

</div>

@endsection