<x-guest-layout>
    <x-nav-guest data='article' />
    <section class="container">
        <div class="flex flex-row justify-between mt-14 mb-5">
            <p class="md:text-2xl text-lg font-bold">Tips & Tricks</p>
            @if (auth()->user())
                <a href={{ route('tips-trick.create') }}
                    class="py-1 md:px-10 px-3 border border-[#E5B299] text-[#E5B299] font-bold rounded-3xl hover:bg-[#E5B299] hover:text-black">Buat
                    Baru</a>
            @endif
        </div>
        <div class="flex flex-wrap lg:justify-between md:justify-center gap-4 mb-20">
            @foreach ($articles as $item)
                <a href={{ route('tips-trick.show', $item->slug) }}
                    class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row  md:max-w-2xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 h-52 mb-10 hover:scale-[1.02] duration-100 group">
                    <img class="object-cover rounded-t-lg aspect-square h-52 md:rounded-none md:rounded-l-lg group-hover:brightness-90 duration-150"
                        src={{ asset('storage/' . $item->image) }} alt="">
                    <div class="flex flex-col gap-5 justify-between p-4 leading-normal">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            {{ $item->title }}</h5>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{!! strip_tags(substr($item->content, 0, 120) . '...') !!}
                        </p>
                    </div>
                </a>
            @endforeach

        </div>
    </section>
    <x-footer />
</x-guest-layout>
