<header class="bg-black text-gray-400" x-data="{ navIsOpen: false, searchIsOpen: false, search: '', }" x-trap.inert.noscroll="navIsOpen" @keydown.window.escape="navIsOpen = false" @click.away="navIsOpen = false">
    <div class="max-w-screen-2xl mx-auto w-full lg:py-2">
        <div class="max-w-screen-xl mx-auto px-4 flex items-center justify-between">
            <!-- logo -->
            <div class="flex-1">
                <a href="{{ route('frontend.home') }}" class="flex items-center outline-none">
                    <x-svg.logo class="mr-1 h-7" style="fill: #f55247;" name="logo" />
                    <span class="text-xl self-center font-semibold whitespace-nowrap hover:text-white">
                        {{ config('app.name') }}
                    </span>
                </a>
            </div>

            <!-- desktop menu -->
            <ul class="hidden md:flex md:items-center md:justify-center md:gap-6 lg:gap-10">
                <li><a href="/" class="hover:text-white">{{ __('Home') }}</a></li>
                <li><a href="/" class="hover:text-white">{{ __('About') }}</a></li>
                <li><a href="{{ route('frontend.blog') }}" class="hover:text-white">{{ __('Blog') }}</a></li>
                <li><a href="/" class="hover:text-white">{{ __('Contact') }}</a></li>
            </ul>

            <div class="flex-1 flex items-center justify-end">
                <!-- language trigger -->
                <button type="button" class="inline-flex justify-center items-center text-sm cursor-pointer hover:text-white" data-dropdown-toggle="language-dropdown-menu">
                    @switch(app()->getLocale())
                    @case('en')
                    <x-svg.us class="h-4 mr-1" />
                    <span class="hidden md:inline">English</span>
                    @break
                    @case('hk')
                    <x-svg.hk class="h-4 mr-1" />
                    <span class="hidden md:inline">香港中文</span>
                    @break
                    @endswitch
                </button>

                <!-- language dropdown -->
                <div class="hidden bg-black z-20" id="language-dropdown-menu">
                    @foreach (config('app.locales') as $locale)
                    <a href="{{ route(Route::currentRouteName(), array_merge(request()->route()->parameters(), ['locale' => $locale])) }}" class="block py-2 px-4 text-sm hover:text-white">
                        <div class="inline-flex items-center">
                            @switch($locale)
                            @case('en')
                            <x-svg.us class="h-4 mr-1" />English
                            @break
                            @case('hk')
                            <x-svg.hk class="h-4 mr-1" />香港中文
                            @break
                            @endswitch
                        </div>
                    </a>
                    @endforeach
                </div>

                <!-- account trigger -->
                <button type="button" class="ml-4 inline-flex justify-center items-center text-sm cursor-pointer hover:text-white" data-dropdown-toggle="account-dropdown-menu">
                    @auth
                    <img src="{{ auth()->user()->profile_photo_url }}" alt="{{ auth()->user()->name }}" class="h-5 mr-1 rounded-full" />
                    <span class="hidden md:inline text-white">{{ auth()->user()->name }}</span>
                    @else
                    <x-svg.user class="h-4 mr-1 fill-gray-400 hover:fill-white" />
                    <span class="hidden md:inline">{{ __('Account') }}</span>
                    @endauth
                </button>

                <!-- account dropdown -->
                <div class="hidden bg-black z-20" id="account-dropdown-menu">
                    @auth
                    @can('admin')
                    <!-- dashboard -->
                    <a href="{{ route('dashboard') }}" class="block py-2 px-4 text-sm hover:text-white">
                        <div class="inline-flex items-center justify-between">
                            <x-svg.hammer class="h-4 mr-1 fill-gray-400" />{{ __('Dashboard') }}
                        </div>
                    </a>
                    @else
                    <!-- profile -->
                    <a href="{{ route('profile.show') }}" class="block py-2 px-4 text-sm hover:text-white">
                        <div class="inline-flex items-center justify-between">
                            <x-svg.profile class="h-4 mr-1 fill-gray-400" />{{ __('Profile') }}
                        </div>
                    </a>
                    @endcan
                    <!-- logout -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="flex py-2 px-4 text-sm hover:text-white">
                        <x-svg.logout class="h-4 mr-1 fill-gray-400" />{{ __('Logout') }}
                        </button>
                    </form>
                    @else
                    <!-- login -->
                    <a href="{{ route('login') }}" class="block py-2 px-4 text-sm hover:text-white">
                        <div class="inline-flex items-center justify-between">
                            <x-svg.login class="h-4 mr-1 fill-gray-400" />{{ __('Login') }}
                        </div>
                    </a>
                    <!-- register -->
                    <a href="{{ route('register') }}" class="block py-2 px-4 text-sm hover:text-white">
                        <div class="inline-flex items-center">
                            <x-svg.register class="h-4 mr-1 fill-gray-400" />{{ __('Register') }}
                        </div>
                    </a>
                    @endauth
                </div>

                <!-- mobile menu trigger -->
                <button class="relative ml-2 w-10 h-10 inline-flex items-center justify-center md:hidden" aria-label="Toggle Menu" @click.prevent="navIsOpen = !navIsOpen">
                    <svg x-show="! navIsOpen" class="w-6" viewBox="0 0 28 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <line y1="1" x2="28" y2="1" stroke="#f55247" stroke-width="2"></line>
                        <line y1="11" x2="28" y2="11" stroke="#f55247" stroke-width="2"></line>
                    </svg>
                    <svg x-show="navIsOpen" class="absolute inset-0 mt-2.5 ml-2.5 w-5" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg" style="display: none;">
                        <rect y="1.41406" width="2" height="24" transform="rotate(-45 0 1.41406)" fill="#f55247"></rect>
                        <rect width="2" height="24" transform="matrix(0.707107 0.707107 0.707107 -0.707107 0.192383 16.9707)" fill="#f55247"></rect>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- mobile menu -->
    <div x-show="navIsOpen" class="md:hidden" style="display: none;">
        <nav x-show="navIsOpen" class="fixed inset-0 w-full pt-[2.5rem] z-10 pointer-events-none" style="display: none;">
            <div class="relative h-full w-full p-4 bg-black pointer-events-auto overflow-y-auto">
                <ul>
                    <li><a class="block w-full py-2 hover:text-white" href="/">{{ __('Home') }}</a></li>
                    <li><a class="block w-full py-2 hover:text-white" href="/">{{ __('About') }}</a></li>
                    <li><a class="block w-full py-2 hover:text-white" href="{{ route('frontend.blog') }}">{{ __('Blog') }}</a></li>
                    <li><a class="block w-full py-2 hover:text-white" href="/">{{ __('Contact') }}</a></li>
                </ul>
            </div>
        </nav>
    </div>
</header>