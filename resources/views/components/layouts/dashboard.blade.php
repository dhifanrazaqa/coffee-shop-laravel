<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Coffee Shop') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body class="font-sans antialiased bg-app_background">
    <div x-data="{ open: false }" class="flex h-screen">
        <!-- Sidebar -->
        <div :class="open ? 'translate-x-0 w-64' : 'translate-x-0 w-16'"
            class="fixed inset-y-0 left-0 bg-app_primary text-white transform transition-all duration-300 flex flex-col">
            <div class="p-4 flex items-center justify-between" x-cloak x-show="open">
                <h2 class="text-xl font-bold">Menu</h2>
                <button @click="open = !open" class="text-gray-400 focus:outline-none focus:text-gray-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>
            <div class="p-4 flex justify-end" x-cloak x-show="!open">
                <button @click="open = !open" class="text-gray-400 focus:outline-none focus:text-gray-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>
            <nav class="mt-4 flex-1">
                <a href="{{ route('dashboard') }}"
                    class="flex items-start py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">
                    <svg height="25px" width="25px" version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve"
                        fill="#000000">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <style type="text/css">
                                .st0 {
                                    fill: #ffffff;
                                }
                            </style>
                            <g>
                                <polygon class="st0"
                                    points="434.162,293.382 434.162,493.862 308.321,493.862 308.321,368.583 203.682,368.583 203.682,493.862 77.841,493.862 77.841,293.382 256.002,153.862 ">
                                </polygon>
                                <polygon class="st0"
                                    points="0,242.682 256,38.93 512,242.682 482.21,285.764 256,105.722 29.79,285.764 ">
                                </polygon>
                                <polygon class="st0"
                                    points="439.853,18.138 439.853,148.538 376.573,98.138 376.573,18.138 "></polygon>
                            </g>
                        </g>
                    </svg>
                    <span x-cloak x-show="open" class="ml-4">Home</span>
                </a>
                <a href="{{ route('dashboard.order') }}"
                    class="flex items-center py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">
                    <svg height="25px" width="25px" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M5.58579 4.58579C5 5.17157 5 6.11438 5 8V17C5 18.8856 5 19.8284 5.58579 20.4142C6.17157 21 7.11438 21 9 21H15C16.8856 21 17.8284 21 18.4142 20.4142C19 19.8284 19 18.8856 19 17V8C19 6.11438 19 5.17157 18.4142 4.58579C17.8284 4 16.8856 4 15 4H9C7.11438 4 6.17157 4 5.58579 4.58579ZM9 8C8.44772 8 8 8.44772 8 9C8 9.55228 8.44772 10 9 10H15C15.5523 10 16 9.55228 16 9C16 8.44772 15.5523 8 15 8H9ZM9 12C8.44772 12 8 12.4477 8 13C8 13.5523 8.44772 14 9 14H15C15.5523 14 16 13.5523 16 13C16 12.4477 15.5523 12 15 12H9ZM9 16C8.44772 16 8 16.4477 8 17C8 17.5523 8.44772 18 9 18H13C13.5523 18 14 17.5523 14 17C14 16.4477 13.5523 16 13 16H9Z"
                                fill="#ffffff"></path>
                        </g>
                    </svg>
                    <span x-cloak x-show="open" class="ml-4">Order</span>
                </a>
                <a href="{{ route('dashboard.product') }}"
                    class="flex items-center py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">
                    <svg height="25px" width="25px" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M8.25 7.00151L8.25 6C8.25 3.92893 9.92893 2.25 12 2.25C14.0711 2.25 15.75 3.92893 15.75 6V7L15.75 7.00151C18.4344 7.0136 19.8606 7.1222 20.6606 8.09803C21.5608 9.19607 21.2287 10.8563 20.5646 14.1767L19.9646 17.1767C19.5029 19.4856 19.272 20.6401 18.4425 21.32C17.6131 22 16.4358 22 14.0812 22H9.9188C7.56417 22 6.38686 22 5.55742 21.32C4.72799 20.6401 4.4971 19.4856 4.03532 17.1767L3.43532 14.1767C2.77123 10.8563 2.43919 9.19607 3.33936 8.09803C4.13936 7.12219 5.56562 7.0136 8.25 7.00151ZM9.75 6C9.75 4.75736 10.7574 3.75 12 3.75C13.2426 3.75 14.25 4.75736 14.25 6V7H9.75V6ZM15 11C15.5523 11 16 10.5523 16 10C16 9.44772 15.5523 9 15 9C14.4477 9 14 9.44772 14 10C14 10.5523 14.4477 11 15 11ZM9.99998 10C9.99998 10.5523 9.55226 11 8.99998 11C8.44769 11 7.99998 10.5523 7.99998 10C7.99998 9.44772 8.44769 9 8.99998 9C9.55226 9 9.99998 9.44772 9.99998 10Z"
                                fill="#ffffff"></path>
                        </g>
                    </svg>
                    <span x-cloak x-show="open" class="ml-4">Product</span>
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="flex w-full items-center py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">
                        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path
                                    d="M16.8 2H14.2C11 2 9 4 9 7.2V11.25H15.25C15.66 11.25 16 11.59 16 12C16 12.41 15.66 12.75 15.25 12.75H9V16.8C9 20 11 22 14.2 22H16.79C19.99 22 21.99 20 21.99 16.8V7.2C22 4 20 2 16.8 2Z"
                                    fill="#ffffff"></path>
                                <path
                                    d="M4.56141 11.2498L6.63141 9.17984C6.78141 9.02984 6.85141 8.83984 6.85141 8.64984C6.85141 8.45984 6.78141 8.25984 6.63141 8.11984C6.34141 7.82984 5.86141 7.82984 5.57141 8.11984L2.22141 11.4698C1.93141 11.7598 1.93141 12.2398 2.22141 12.5298L5.57141 15.8798C5.86141 16.1698 6.34141 16.1698 6.63141 15.8798C6.92141 15.5898 6.92141 15.1098 6.63141 14.8198L4.56141 12.7498H9.00141V11.2498H4.56141Z"
                                    fill="#ffffff"></path>
                            </g>
                        </svg>
                        <span x-cloak x-show="open" class="ml-4">Logout</span>
                        </a>

                </form>
            </nav>
        </div>

        <!-- Main content -->
        <div class="flex-1 flex flex-col ml-16">
            <!-- Header -->
            @if (isset($header))
                <header class="flex items-center justify-between bg-app_background shadow p-4 px-24">
                    <h1 class="text-xl font-bold">{{ $header }}</h1>
                </header>
            @endif

            <!-- Main content area -->
            <main class="flex-1 p-4 px-24">
                {{ $slot }}
            </main>
        </div>
    </div>
</body>

</html>
