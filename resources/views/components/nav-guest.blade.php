@props(['data' => ''])
<nav class="bg-white border-gray-200 dark:bg-gray-900 shadow-md">
    <div
        class="lg:max-w-full lg:container max-w-screen-xl flex flex-wrap items-center lg:justify-normal justify-between  p-4">
        <a href="/" class="flex items-center">
            <img src={{ asset('images/logo.png') }} class="h-14 mr-3" alt="Ecothrift" />
        </a>
        @if (auth()->user())
            <div class="flex items-center md:order-2 ml-[32px]">
                <button type="button"
                    class="flex mr-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                    id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                    data-dropdown-placement="bottom">
                    <span class="sr-only">Open user menu</span>
                    <p class="px-8 py-1 rounded-2xl bg-[#E5B299] font-bold">{{ Auth::user()->name }}</p>
                </button>
                <!-- Dropdown menu -->
                <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600"
                    id="user-dropdown">
                    <div class="px-4 py-3">
                        <span
                            class="block text-sm  text-gray-500 truncate dark:text-gray-400">{{ Auth::user()->email }}</span>
                    </div>
                    <ul class="py-2" aria-labelledby="user-menu-button">
                        {{-- <li>
                            <a href="/dashboard"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Dashboard</a>
                        </li> --}}
                        <li>
                            <a href={{ route('profile.edit') }}
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Profile</a>
                        </li>
                        <li>
                            <form
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
                                method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit">Sign
                                    Out</button>
                            </form>
                    </ul>
                </div>
                <button data-collapse-toggle="mobile-menu-2" type="button"
                    class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="mobile-menu-2" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
        @endif
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1 ms-auto" id="mobile-menu-2">
            <ul
                class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700 items-center">
                <li>
                    <form action="/katalog">
                        <button type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                        @if (request('kategori'))
                            <input type="hidden" name="kategori" value="{{ request('kategori') }}" />
                        @endif
                        <input class="border-0 focus:outline-none focus:ring-0 focus:border-0 lg:w-32 w-24 p-0"
                            placeholder="Cari Barang" type="text" name="search" value="{{ request('search') }}">
                    </form>
                </li>
                <li>
                    <a href="#"
                        class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-[#E5B299] md:p-0  dark:hover md:dark:hover:bg-transparent">Tentang
                        Kami</a>
                </li>
                <li>
                    <a href="/tips-trick"
                        class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-[#E5B299] md:p-0  dark:hover md:dark:hover:bg-transparent {{ $data == 'article' ? 'text-yellow-600' : '' }}">Tips
                        And Trick</a>
                </li>
                <li>
                    <a href="#"
                        class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-[#E5B299] md:p-0  dark:hover md:dark:hover:bg-transparent">Promo</a>
                </li>
                @if (!auth()->user())
                    <div class="flex items-center md:order-2 ml-[32px]">
                        <button type="button"
                            class="flex mr-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                            id="user-menu-buttonxx" aria-expanded="false" data-dropdown-toggle="user-dropdownxx"
                            data-dropdown-placement="bottom">
                            <span class="sr-only">Open user menu</span>
                            <a href={{ route('login') }} class="px-8 py-1 rounded-2xl bg-[#E5B299] font-bold">Masuk</a>
                        </button>
                    </div>
                @endif
            </ul>
        </div>
    </div>
</nav>
