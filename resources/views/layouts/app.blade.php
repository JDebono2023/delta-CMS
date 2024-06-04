<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link href="https://db.onlinewebfonts.com/c/3a5aa0af287c7e7493a57027f816dfd5?family=DIN+Next+Slab+W01+Light"
        rel="stylesheet">
    <link href="https://db.onlinewebfonts.com/c/32206fa5ec6549c9a4f9f7d6bfaba8d1?family=GrotesqueMT" rel="stylesheet"
        type="text/css" />



    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <x-head.tinymce-config />

    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased">
    <x-banner />

    <div class="min-h-screen bg-DDW">
        @livewire('navigation-menu')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-DDW shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    <footer class="flex">

        <div class="xxs:max-md:hidden  p-3 bg-DCG3 justify-center w-full inset-x-0 bottom-0 overscroll-auto z-[1000] ">
            <div class="text-center text-xs ">
                <div class="items-center flex justify-center text-D2766">

                    <a class="pl-2 " href="http://www.eyelookmedia.com"><span
                            class="hover:text-DCG9">www.eyelookmedia.com</span>
                    </a> <span class="px-2">|</span>519-913-3169
                    ext. 205

                </div>
            </div>

        </div>
    </footer>

    @stack('modals')
    @stack('scripts')

    @livewireScripts
</body>

</html>
