<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <a href='#' class="w-full flex items-center justify-center bg-red-600 rounded py-2 text-white hover:bg-red-500 hover:text-black delay-100"><i class="fa-brands fa-google mr-2"></i> Register by Google</a>

        <a href='#' class="w-full flex items-center justify-center bg-blue-600 rounded py-2 my-2 text-white hover:bg-blue-500 hover:text-black delay-100"><i class="fa-brands fa-facebook mr-2"></i> Register by facebook</a>
        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4 relative" x-data="{ showPassword: false }">
            <x-input-label for="password" :value="__('Password')" />

            <div class="relative">
                <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password"
                            x-bind:type="showPassword ? 'text' : 'password'"
                />
                <i class="fa-solid fa-eye absolute bottom-3 right-3 cursor-pointer delay-100" @click="showPassword = !showPassword"></i>
            </div>

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>


        <!-- Confirm Password -->
        <div class="mt-4 relative" x-data="{ showPassword: false }">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <div class="relative">
                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation"
                            required autocomplete="new-password"
                            x-bind:type="showPassword ? 'text' : 'password'"
                />

                <i class="fa-solid fa-eye absolute bottom-3 right-3 cursor-pointer" @click="showPassword = !showPassword"></i>
            </div>

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
