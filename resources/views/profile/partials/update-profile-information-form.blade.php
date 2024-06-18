<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>

    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div class="flex flex-wrap mx-2">
            <!-- First Name -->
            <div class="w-full md:w-1/5 px-2">
                <x-input-label for="first_name" :value="__('First Name')" />
                <x-text-input id="first_name" name="first_name" type="text" class="mt-1 block w-full"
                    :value="old('first_name', $user->first_name)" required autofocus autocomplete="first_name" />
                <x-input-error class="mt-2" :messages="$errors->get('first_name')" />
            </div>

            <!-- Last Name -->
            <div class="w-full md:w-1/5 px-2">
                <x-input-label for="last_name" :value="__('Last Name')" />
                <x-text-input id="last_name" name="last_name" type="text" class="mt-1 block w-full" :value="old('last_name', $user->last_name)"
                    required autofocus autocomplete="family-name" />
                <x-input-error class="mt-2" :messages="$errors->get('last_name')" />
            </div>

            <!-- User Name -->
            <div class="w-full md:w-1/5 px-2">
                <x-input-label for="user_name" :value="__('User Name')" />
                <x-text-input id="user_name" name="user_name" type="text" class="mt-1 block w-full" :value="old('user_name', $user->user_name)"
                    required autofocus autocomplete="username" />
                <x-input-error class="mt-2" :messages="$errors->get('user_name')" />
            </div>

            <!-- Date of Birth -->
            <div class="w-full md:w-1/5 px-2">
                <x-input-label for="date_of_birth" :value="__('Date of Birth')" />
                <x-text-input id="date_of_birth" name="date_of_birth" type="date" class="mt-1 block w-full"
                    :value="old('date_of_birth', $user->date_of_birth)" required autofocus autocomplete="bday" />
                <x-input-error class="mt-2" :messages="$errors->get('date_of_birth')" />
            </div>

            <!-- Mobile Number -->
            <div class="w-full md:w-1/5 px-2">
                <x-input-label for="mobile_number" :value="__('Mobile Number')" />
                <x-text-input id="mobile_number" name="mobile_number" type="tel" class="mt-1 block w-full"
                    :value="old('mobile_number', $user->mobile_number)" required autofocus autocomplete="tel" maxlength="10" pattern="[0-9]{10}"
                    oninput="this.value = this.value.replace(/[^0-9]/g, '');" />
                <x-input-error class="mt-2" :messages="$errors->get('mobile_number')" />
            </div>
        </div>

        <div class="flex flex-wrap mx-2">
            <div class="w-full md:w-1/5 px-2">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)"
                    required autocomplete="username" />
                <x-input-error class="mt-2" :messages="$errors->get('email')" />

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                    <div>
                        <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                            {{ __('Your email address is unverified.') }}

                            <button form="send-verification"
                                class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                                {{ __('Click here to re-send the verification email.') }}
                            </button>
                        </p>

                        @if (session('status') === 'verification-link-sent')
                            <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                                {{ __('A new verification link has been sent to your email address.') }}
                            </p>
                        @endif
                    </div>
                @endif
            </div>
            <div class="w-full md:w-1/5 px-2">
                <x-input-label for="pincode" :value="__('Pincode')" />
                <x-text-input id="pincode" name="pincode" type="text" class="mt-1 block w-full" :value="old('pincode', $user->pincode)"
                    required autofocus autocomplete="pincode" />
                <x-input-error class="mt-2" :messages="$errors->get('pincode')" />
            </div>
            <div class="w-full md:w-1/5 px-2">
                <x-input-label for="state" :value="__('State')" />
                <x-text-input id="state" name="state" type="text" class="mt-1 block w-full" :value="old('state', $user->state)"
                    required autofocus autocomplete="state" />
                <x-input-error class="mt-2" :messages="$errors->get('state')" />
            </div>
            <div class="w-full md:w-1/5 px-2">
                <x-input-label for="city" :value="__('City')" />
                <x-text-input id="city" name="city" type="text" class="mt-1 block w-full" :value="old('city', $user->city)"
                    required autofocus autocomplete="city" />
                <x-input-error class="mt-2" :messages="$errors->get('city')" />
            </div>
            <div class="w-full md:w-1/5 px-2">
                <x-input-label for="address" :value="__('Address')" />
                <x-text-input id="address" name="address" type="text" class="mt-1 block w-full" :value="old('address', $user->address)"
                    required autofocus autocomplete="address" />
                <x-input-error class="mt-2" :messages="$errors->get('address')" />
            </div>
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
