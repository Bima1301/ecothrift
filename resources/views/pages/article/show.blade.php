<x-guest-layout>
    <x-nav-guest data='article' />
    <section class="container">
        <div class=" mb-16 flex flex-col">
            <div class="px-20 flex justify-between items-center">
                <a href={{ route('tips-trick.index') }}
                    class="mt-12 mb-12 font-semibold px-5 border-2 hover:px-8 duration-150 border-[#9e7b6a] py-1 rounded-3xl">Kembali</a>
                @if (auth()->user()?->id == $article->user_id)
                    <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                        class="text-white bg-[#9e7b6a] hover:bg-[#cc9f89] focus:ring-4 focus:outline-none focus:ring-[#9e7b6a] font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center h-fit"
                        type="button">Manage Article<svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg></button>
                    <!-- Dropdown menu -->
                    <div id="dropdown"
                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                            aria-labelledby="dropdownDefaultButton">
                            <li>
                                <a href={{ route('tips-trick.edit', $article->slug) }}
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit
                                    Artikel</a>
                            </li>
                            <li>
                                <form
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                    action={{ route('tips-trick.destroy', $article->slug) }} method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="">Hapus Artikel</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @endif
            </div>
            <div class="flex md:flex-row justify-between gap-16 flex-col px-20">
                <div class="md:max-w-[50%] flex flex-col justify-between">
                    <p class=" text-[#9e7b6a]">Created At
                        <span class="font-bold">
                            {{ date('D, d M Y', strtotime($article->created_at)) }}
                    </p>
                    </span>
                    <p class="text-5xl text-[#9e7b6a] font-bold w-fit text-end">{{ $article->title }}</p>
                    <div class="flex flex-row gap-5">
                        <img class="w-12 aspect-square rounded-3xl"
                            src="https://source.unsplash.com/random/?Children/" />
                        <div class="flex flex-col ">
                            <p class="font-bold md:text-black text-slate-300 w-fit">
                                {{ $article->user->name }}
                            </p>
                            <p class="text-sm text-gray-400 w-fit">
                                {{ $article->user->email }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="md:max-w-[50%]">
                    <img class="h-96" src={{ asset('storage/' . $article->image) }} alt="">

                </div>
            </div>
            <div class="mt-14 px-20">{!! $article->content !!}</div>
        </div>
    </section>
    <x-footer />
</x-guest-layout>
