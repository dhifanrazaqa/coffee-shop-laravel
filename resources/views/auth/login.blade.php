<x-app-layout>
    <div class="flex w-full">
        <div class="hidden md:block w-3/4">
            <img class="h-screen -mt-24 object-cover w-full" src="{{ asset('images/login.png') }}" alt="">
        </div>
        <div class="flex flex-col justify-center items-center py-24 w-full">
            <div class="flex flex-col justify-start w-full px-4 md:px-0 md:w-1/2">
                @if ($errors->any())
                    <div class="mb-4 p-4 bg-red-500 text-white rounded">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <h1 class="mb-4 font-bold text-2xl text-start text-app_primary">Login</h1>
            </div>
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <div class="w-full px-4 md:px-0 md:w-1/2">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 font-bold mb-2">Email</label>
                        <input type="email" name="email" id="email"
                            class="w-full p-2 border-2 bg-app_cream border-gray-300 focus:ring-0 focus:outline-none focus:border-app_primary rounded"
                            value="{{ old('email') }}" required autofocus autocomplete="username">
                    </div>

                    <div class="mb-4">
                        <label for="password" class="block text-gray-700 font-bold mb-2">Password</label>
                        <input type="password" name="password" id="password"
                            class="w-full p-2 border-2 bg-app_cream border-gray-300 focus:ring-0 focus:outline-none focus:border-app_primary rounded"
                            value="" required autofocus autocomplete="current-password">
                    </div>

                    <div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox"
                                class="rounded border-gray-300 text-app_primary shadow-sm focus:ring-app_primary"
                                name="remember">
                            <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    <div class="flex items-center justify-between mt-4">
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            href="{{ route('register') }}">
                            {{ __("Don't have an account?") }}
                        </a>

                        <x-primary-button class="ms-3">
                            {{ __('Log in') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </x-guest-layout>
