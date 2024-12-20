<nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        {{-- Navbar Brand --}}
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start rtl:justify-end">
                <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
                    type="button"
                    class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" fill-rule="evenodd"
                            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                        </path>
                    </svg>
                </button>
                <a href="{{ url('/') }}" class="flex ms-2 md:me-24">
                    <img src="{{ asset('storage/assets/icon-noxpital.jpeg') }}" alt="Icon" class="h-8 me-3">
                    <span
                        class="self-center text-xl font-black sm:text-2xl whitespace-nowrap dark:text-white">Job Seeker</span>
                </a>
            </div>

            {{-- User Dropdown --}}
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button
                        class="inline-flex items-center px-3 py-2 border border-transparent text-xl leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                        <div>{{ Auth::user()->name }}</div>

                        <div class="ms-1">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>
                </x-slot>

                <x-slot name="content">
                    <x-dropdown-link :href="route('profile.edit')" class="flex items-center">
                        <ion-icon name="person-outline" class="w-5 h-5 text-gray-700"></ion-icon>
                        <span class="ms-3">{{ __('Profil') }}</span>
                    </x-dropdown-link>

                    {{-- Authentication --}}
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault();
                                            this.closest('form').submit();"
                            class="flex items-center">
                            <ion-icon name="log-out-outline" class="w-5 h-5 text-gray-700"></ion-icon>
                            <span class="ms-3">{{ __('Keluar') }}</span>
                        </x-dropdown-link>
                    </form>
                </x-slot>
            </x-dropdown>
        </div>
    </div>
</nav>

<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
    aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
        <ul class="space-y-2 font-medium">
            {{-- <li>
                <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                    <ion-icon name="home" class="w-5 h-5 text-gray-700"></ion-icon>
                    <span class="ms-3">Beranda</span>
                </x-nav-link>
            </li> --}}

            {{-- @if (Auth::check() && Auth::user()->role == 'admin')
                <li>
                    <x-nav-link :href="route('user-list')" :active="request()->routeIs('user-list')">
                        <ion-icon name="people-sharp" class="w-5 h-5 text-gray-700"></ion-icon>
                        <span class="ms-3">{{ __('Daftar User') }}</span>
                    </x-nav-link>
                </li>

                <li>
                    <x-nav-link :href="route('appointments')" :active="request()->routeIs('appointments')">
                        <ion-icon name="calendar" class="w-5 h-5 text-gray-700"></ion-icon>
                        <span class="ms-3">{{ __('Daftar Janjian') }}</span>
                    </x-nav-link>
                </li>
            @endif --}}

            @if (Auth::check() && Auth::user()->role == 'employee')
                <li>
                    <x-nav-link :href="route('jobPost.index')" :active="request()->routeIs('jobPost.index')">
                        <ion-icon name="people-sharp" class="w-5 h-5 text-gray-700"></ion-icon>
                        <span class="ms-3">{{ __('Daftar Pekerjaan') }}</span>
                    </x-nav-link>
                </li>

                <li>
                    <x-nav-link :href="route('jobPost.create')" :active="request()->routeIs('jobPost.create')">
                        <ion-icon name="calendar" class="w-5 h-5 text-gray-700"></ion-icon>
                        <span class="ms-3">{{ __('Buat Pekerjaan') }}</span>
                    </x-nav-link>
                </li>

                <li>
                    <x-nav-link :href="route('employeeProfile.create')" :active="request()->routeIs('employeeProfile.create')">
                        <ion-icon name="Profile" class="w-5 h-5 text-gray-700"></ion-icon>
                        <span class="ms-3">{{ __('Profile Employee') }}</span>
                    </x-nav-link>
                </li>
            @endif

            <li>
                <x-nav-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')">
                    <ion-icon name="person-sharp" class="w-5 h-5 text-gray-700"></ion-icon>
                    <span class="ms-3">{{ __('Profil') }}</span>
                </x-nav-link>
            </li>
        </ul>
    </div>
</aside>