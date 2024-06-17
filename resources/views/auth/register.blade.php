<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="flex flex-wrap -mx-2">
            <!-- First Name -->
            <div class="mt-4 w-full md:w-1/2 px-2">
                <x-input-label for="fname" :value="__('First Name')" />
                <x-text-input id="fname" class="block mt-1 w-full" type="text" name="fname" :value="old('fname')"
                    required autofocus autocomplete="fname"  />
                <x-input-error :messages="$errors->get('fname')" class="mt-2" />
            </div>

            <!-- Last Name -->
            <div class="mt-4 w-full md:w-1/2 px-2 ">
                <x-input-label for="lname" :value="__('Last Name')" />
                <x-text-input id="lname" class="block mt-1 w-full" type="text" name="lname" :value="old('lname')"
                    required autofocus autocomplete="lname" />
                <x-input-error :messages="$errors->get('lname')" class="mt-2" />
            </div>
        </div>

        <div class="flex flex-wrap -mx-2">
            <!-- User Name -->
            <div class="mt-4 w-full md:w-1/2 px-2">
                <x-input-label for="uname" :value="__('User Name')" />
                <x-text-input id="uname" class="block mt-1 w-full" type="text" name="uname" :value="old('uname')"
                    required autofocus autocomplete="uname"  />
                <x-input-error :messages="$errors->get('uname')" class="mt-2" />
            </div>

            <!-- Mobile Number -->
            <div class="mt-4 w-full md:w-1/2 px-2">
                <x-input-label for="mobile_number" :value="__('Mobile')" />
                <x-text-input id="mobile_number" class="block mt-1 w-full" type="tel" maxlength="10"
                    pattern="[0-9]{10}"
                    oninput="this.value = this.value.replace(/[^0-9]/g, '');" name="mobile_number" :value="old('uname')"
                    required autofocus autocomplete="mobile_number" />
                <x-input-error :messages="$errors->get('mobile_number')" class="mt-2" />
            </div>
        </div>

        {{-- <div class="flex flex-wrap -mx-2"> --}}
        <!-- Email Address -->
        <div class="mt-4 w-full md:w-1/2 px-2">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4 w-full md:w-1/2 px-2 ">
            {{-- <div class="mt-4 w-full md:w-1/2 px-2"> --}}
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4 w-full md:w-1/2 px-2">
            {{-- <div class="mt-4 w-full md:w-1/2 px-2"> --}}
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
        {{-- </div> --}}

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
