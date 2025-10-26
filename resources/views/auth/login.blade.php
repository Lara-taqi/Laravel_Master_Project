<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center  ">
        <div class="dark:bg-gray-900 shadow-2xl rounded-3xl p-16 w-full max-w-3xl relative overflow-hidden">
            
            <div class="absolute -top-40 -right-40 w-96 h-96 bg-yellow-300 rounded-full opacity-30 animate-pulse blur-3xl"></div>
            <div class="absolute -bottom-40 -left-40 w-96 h-96 bg-red-500 rounded-full opacity-30 animate-pulse blur-3xl"></div>
            
            <h2 class="text-5xl font-extrabold text-center text-red-600 dark:text-red-400 mb-8 animate-bounce">Welcome Back</h2>
            
            <x-auth-session-status class="mb-6" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-6">
                    <x-input-label for="email" :value="__('Email')" class="text-red-600 dark:text-red-400"/>
                    <x-text-input id="email" class="block mt-1 w-full border-red-400 focus:border-red-500 focus:ring-red-500 text-lg" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600" />
                </div>

                <div class="mb-6">
                    <x-input-label for="password" :value="__('Password')" class="text-red-600 dark:text-red-400"/>
                    <x-text-input id="password" class="block mt-1 w-full border-red-400 focus:border-red-500 focus:ring-red-500 text-lg"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600" />
                </div>

                <div class="block mb-6">
                    <label for="remember_me" class="inline-flex items-center text-gray-700 dark:text-gray-300">
                        <input id="remember_me" type="checkbox" class="rounded border-red-400 text-red-600 shadow-sm focus:ring-red-500" name="remember">
                        <span class="ms-2 text-lg">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-end space-x-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-lg text-red-600 hover:text-red-800 dark:text-red-400 dark:hover:text-red-200 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <x-primary-button class="bg-red-600 hover:bg-red-700 focus:ring-red-500 transform hover:scale-105 transition-all duration-300 text-black-900 px-8 py-4 text-lg">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
