<nav x-data="{ open: false }" class="bg-app_background border-b-4 mb-0 pb-0 z-50 border-app_primary h-24 fixed w-full">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    @if (Auth::check() && Auth::user()->type == 'admin')
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                            {{ __('Dashboard') }}
                        </x-nav-link>
                    @endif
                    <x-nav-link :href="route('home')" :active="request()->routeIs('home*')">
                        {{ __('Home') }}
                    </x-nav-link>
                    <x-nav-link :href="route('menu')" :active="request()->routeIs('menu*')">
                        {{ __('Menu') }}
                    </x-nav-link>
                    <x-nav-link :href="route('order')" :active="request()->routeIs('order')">
                        {{ __('Order') }}
                    </x-nav-link>
                    @if (!request()->routeIs('home'))
                        <x-nav-link href="{{route('home')}}#about" :active="request()->routeIs('')">
                            {{ __('About') }}
                        </x-nav-link>
                    @else
                        <x-nav-link href="#about" :active="request()->is('#about')">
                            {{ __('About') }}
                        </x-nav-link>
                    @endif
                    @if (Auth::check() && Auth::user()->type == 'user')
                        <x-nav-link :href="route('order.history')" :active="request()->routeIs('order.history')">
                            {{ __('History') }}
                        </x-nav-link>
                    @endif
                    @if (Auth::check() && Auth::user()->type == 'user')
                        <x-nav-link :href="route('balance.show')" :active="request()->routeIs('balance.show')">
                            {{ __('Balance') }}
                        </x-nav-link>
                    @endif
                </div>
            </div>

            <!-- Settings Dropdown -->
            @if (Auth::check())
                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                <div>{{ Auth::user()->name }}</div>

                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            @else
                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    <a href="/login"
                        class="text-app_primary px-3 py-2 mr-4 text-xs font-semibold rounded-full border-2 border-app_primary">Sign
                        In</a>
                    <a href="/register"
                        class="bg-app_primary text-white px-3 py-2 text-xs font-semibold rounded-full">Sign Up</a>
                </div>
            @endif

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden bg-app_cream">
        <div class="pt-2 pb-3 space-y-1 bg-app_cream">
            @if (Auth::check())
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
            @endif
            @if (Auth::check() && Auth::user()->type == 'admin')
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-nav-link>
            @endif
            <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home*')">
                {{ __('Home') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('menu')" :active="request()->routeIs('menu*')">
                {{ __('Menu') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('order')" :active="request()->routeIs('order')">
                {{ __('Order') }}
            </x-responsive-nav-link>
            @if (!request()->routeIs('home'))
                <x-responsive-nav-link href="{{route('home')}}#about" :active="request()->routeIs('')">
                    {{ __('About') }}
                </x-responsive-nav-link>
            @else
                <x-responsive-nav-link href="#about" :active="request()->is('#about')">
                    {{ __('About') }}
                </x-responsive-nav-link>
            @endif
            @if (Auth::check() && Auth::user()->type == 'user')
                <x-responsive-nav-link :href="route('order.history')" :active="request()->routeIs('order.history')">
                    {{ __('History') }}
                </x-responsive-nav-link>
            @endif
            @if (Auth::check() && Auth::user()->type == 'user')
                <x-responsive-nav-link :href="route('balance.show')" :active="request()->routeIs('balance.show')">
                    {{ __('Balance') }}
                </x-responsive-nav-link>
            @endif
        </div>

        <!-- Responsive Settings Options -->
        @if (Auth::check())
            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        @else
            <div class="pt-4 pb-1 border-t border-gray-200">
                <x-responsive-nav-link :href="route('login')" :active="request()->routeIs('login*')">
                    {{ __('Login') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('register')" :active="request()->routeIs('register')">
                    {{ __('Register') }}
                </x-responsive-nav-link>
            </div>
        @endif
    </div>
</nav>
