<nav x-data="{ open: false }" class="bg-D2766 border-b border-DCG9">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-mark class="block w-auto" />
                    </a>
                    @if (Auth::user()->teams->where('id', '=', '2')->first())
                        <div class="ml-4 sm:ml-8 text-sm sm:text-lg md:text-2xl font-bold font-body text-DDW">
                            Delta Hotels Kiosk Manager
                        </div>
                    @endif
                </div>

                <div class=" space-x-8 sm:-my-px sm:ml-10 hidden xl:flex">

                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ml-6">


                <!-- Settings Dropdown -->
                <div class="ml-3 relative">
                    <x-dropdown align="right" width="52">
                        <x-slot name="trigger">

                            <button
                                class="inline-flex items-center justify-center p-2 rounded-md text-DDW hover:text-DCG9 focus:outline-none transition duration-150 ease-in-out">
                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path class="inline-flex" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />

                                </svg>
                            </button>

                        </x-slot>

                        <x-slot name="content">
                            <div class="pt-2 space-y-1">
                                <x-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                                    {{ __('Dashboard') }}
                                </x-responsive-nav-link>
                            </div>
                            @if (Auth::user()->teams->where('id', '=', '1')->first())

                                <x-dropdown-link href="{{ route('teams') }}" :active="request()->routeIs('teams')">
                                    {{ __('Teams') }}
                                </x-dropdown-link>
                                <x-dropdown-link href="{{ route('users') }}" :active="request()->routeIs('users')">
                                    {{ __('Users') }}
                                </x-dropdown-link>
                                <x-dropdown-link href="{{ route('analytics') }}" :active="request()->routeIs('analytics')">
                                    {{ __('Analytics') }}
                                </x-dropdown-link>

                                <x-dropdown-link href="{{ route('banner') }}" :active="request()->routeIs('banner')">
                                    {{ __('Banners') }}
                                </x-dropdown-link>

                                <x-dropdown-link href="{{ route('menus') }}" :active="request()->routeIs('menus')">
                                    {{ __('Menus') }}
                                </x-dropdown-link>
                                <x-dropdown-link href="{{ route('maps') }}" :active="request()->routeIs('maps')">
                                    {{ __('Maps') }}
                                </x-dropdown-link>
                                <x-dropdown-link href="{{ route('attractions') }}" :active="request()->routeIs('attractions')">
                                    {{ __('Attractions') }}
                                </x-dropdown-link>
                                <x-dropdown-link href="{{ route('events') }}" :active="request()->routeIs('events')">
                                    {{ __('Event Scheduler') }}
                                </x-dropdown-link>
                            @else
                                @if (Auth::user()->teams->where('id', '=', '2')->first())
                                    <x-dropdown-link href="{{ route('events') }}" :active="request()->routeIs('events')">
                                        {{ __('Event Scheduler') }}
                                    </x-dropdown-link>
                                    <x-dropdown-link href="{{ route('teams.show', 2) }}" :active="request()->routeIs('teams')">
                                        {{ __('Teams') }}
                                    </x-dropdown-link>
                                    <x-dropdown-link href="{{ route('users') }}" :active="request()->routeIs('users')">
                                        {{ __('Users') }}
                                    </x-dropdown-link>
                                @endif
                            @endif

                            <div class="border-t border-DCG9"></div>
                            <!-- Account Management -->
                            {{-- <h2 class="block px-4 py-2 text-sm font-semibold text-D072">
                                {{ __('Manage your account') }}
                            </h2> --}}

                            <x-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf

                                <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                            <div class="pt-2 pb-1 border-t border-DCG9 text-DCG9">
                                <div class="text-center  text-xs">Contact Technical Support
                                </div>
                                <div class="text-center text-xs">519-913-3169 ext. 206
                                </div>
                                <div class="text-center text-xs">support@eyelookmedia.com
                                </div>
                            </div>
                            <div class="text-center bg-D2766 text-[10px] py-2">

                                <p class=" text-DDW">Powered By: EyeLook Media Inc, {{ now()->year }}</p>
                            </div>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-DDW hover:text-DCG9  focus:outline-none  focus:text-DDW transition duration-150 ease-in-out">
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
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden bg-DDW">
        <div class="pt-3 pb-3 space-y-1 border-t border-DCG9">

            <x-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            @if (Auth::user()->teams->where('id', '=', '1')->first())
                {{-- <x-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link> --}}
                <x-responsive-nav-link href="{{ route('teams') }}" :active="request()->routeIs('teams')">
                    {{ __('Teams') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link href="{{ route('users') }}" :active="request()->routeIs('users')">
                    {{ __('Users') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link href="{{ route('analytics') }}" :active="request()->routeIs('analytics')">
                    {{ __('Analytics') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link href="{{ route('banner') }}" :active="request()->routeIs('banner')">
                    {{ __('Banners') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link href="{{ route('menus') }}" :active="request()->routeIs('menus')">
                    {{ __('Menus') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link href="{{ route('maps') }}" :active="request()->routeIs('maps')">
                    {{ __('Maps') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link href="{{ route('attractions') }}" :active="request()->routeIs('attractions')">
                    {{ __('Attractions') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link href="{{ route('events') }}" :active="request()->routeIs('events')">
                    {{ __('Event Scheduler') }}
                </x-responsive-nav-link>
            @else
                @if (Auth::user()->teams->where('id', '=', '2')->first())
                    <x-responsive-nav-link href="{{ route('events') }}" :active="request()->routeIs('events')">
                        {{ __('Event Scheduler') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link href="{{ route('teams') }}" :active="request()->routeIs('teams')">
                        {{ __('Teams') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link href="{{ route('users') }}" :active="request()->routeIs('users')">
                        {{ __('Users') }}
                    </x-responsive-nav-link>
                @endif
            @endif
        </div>

        <!-- Responsive Settings Options -->
        <div class="border-t border-DCG9">
            {{-- <h2 class="block px-4 text-base font-semibold text-D072 ">
                {{ __('Manage your account') }}
            </h2> --}}

            <div class="mt-3 space-y-1">
                <!-- Account Management -->
                <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf

                    <x-responsive-nav-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
                <div class="pt-2 pb-1 border-t border-DCG9 text-DCG9">
                    <div class="text-center  text-xs">Contact Technical Support
                    </div>
                    <div class="text-center text-xs">519-913-3169 ext. 206
                    </div>
                    <div class="text-center text-xs">support@eyelookmedia.com
                    </div>
                </div>
                <div class="text-center bg-D2766 text-[10px] py-2">

                    <p class=" text-DDW">Powered By: EyeLook Media Inc, {{ now()->year }}</p>
                </div>

            </div>
        </div>
    </div>
</nav>
