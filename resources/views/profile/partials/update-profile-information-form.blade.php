<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification"
          method="post"
          action="{{ route('verification.send') }}">

        @csrf

    </form>
 <!--
Formulier om
het profiel van
de gebruiker aan te passen.
-->
    <form method="post"
          action="{{ route('profile.update') }}"
          class="mt-6 space-y-6"
          enctype="multipart/form-data">

        @csrf
        @method('patch')

        <div>
            <x-input-label for="name"
                           :value="__('Name')" />

            <x-text-input id="name"
                          name="name"
                          type="text"
                          class="mt-1 block w-full"
                          :value="old('name', $user->name)"
                          required
                          autofocus
                          autocomplete="name" />

            <x-input-error class="mt-2"
                           :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email"
                           :value="__('Email')" />

            <x-text-input id="email"
                          name="email"
                          type="email"
                          class="mt-1 block w-full"
                          :value="old('email', $user->email)"
                          required
                          autocomplete="username" />

            <x-input-error class="mt-2"
                           :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())

                <div>

                    <p class="text-sm mt-2 text-gray-800">

                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification"
                                class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">

                            {{ __('Click here to re-send the verification email.') }}

                        </button>

                    </p>

                    @if (session('status') === 'verification-link-sent')

                        <p class="mt-2 font-medium text-sm text-green-600">

                            {{ __('A new verification link has been sent to your email address.') }}

                        </p>

                    @endif

                </div>

            @endif
        </div>

        <div> 
            <!--
Extra veld toegevoegd
voor username.
-->
            <x-input-label for="username"
                           value="Username" />

            <x-text-input id="username"
                          name="username"
                          type="text"
                          class="mt-1 block w-full"
                          :value="old('username', $user->username)" />

            <x-input-error class="mt-2"
                           :messages="$errors->get('username')" />
        </div>

        <div>
            <!--
Gebruiker kan
een verjaardag toevoegen.
-->
            <x-input-label for="birthday"
                           value="Verjaardag" />

            <x-text-input id="birthday"
                          name="birthday"
                          type="date"
                          class="mt-1 block w-full"
                          :value="old('birthday', $user->birthday)" />

            <x-input-error class="mt-2"
                           :messages="$errors->get('birthday')" />
        </div>

        <div>
            <!--
Persoonlijke bio
of beschrijving
van de gebruiker.
-->
            <x-input-label for="bio"
                           value="Over mij" />

            <textarea id="bio"
                      name="bio"
                      class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full">{{ old('bio', $user->bio) }}</textarea>

            <x-input-error class="mt-2"
                           :messages="$errors->get('bio')" />
        </div>

        <div>
            <x-input-label for="profile_photo"
                           value="Profielfoto" />
<!--
Upload van een
profielfoto.
-->
            <input type="file"
                   id="profile_photo"
                   name="profile_photo"
                   class="mt-1 block w-full">
        </div>

        <div class="flex items-center gap-4">

            <x-primary-button>

                {{ __('Save') }}

            </x-primary-button>

            @if (session('status') === 'profile-updated')

                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600">

                    {{ __('Saved.') }}

                </p>

            @endif

        </div>

    </form>
</section>