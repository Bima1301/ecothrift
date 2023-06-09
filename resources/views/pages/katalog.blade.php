<x-guest-layout>
    <x-nav-guest />
    <section class="container">
        @if (request('search'))
            <p class="mt-10 text-center">Hasil Pencarian dari : <span class="font-bold">{{ request('search') }}</span></p>
        @endif
        @if (app('request')->input('kategori') != null)

            <div class="flex flex-col">
                <div class="flex flex-row justify-between mt-12">
                    <p class="font-bold">Katalog Pakaian {{ app('request')->input('kategori') }}</p>
                    <a href="/katalog?kategori={{ app('request')->input('kategori') }}"
                        class="py-1 md:px-10 px-3 border border-[#E5B299] text-[#E5B299] font-bold rounded-3xl hover:bg-[#E5B299] hover:text-black">Tampilkan</a>
                </div>
                <div class="flex flex-wrap md:justify-start justify-center gap-4 my-5">
                    @foreach ($products as $product)
                        {{-- <a href={{ auth()->user()?->id == $product->user_id ? '/product/' . $product->id . '/edit' : 'checkout/' . $product->id }} --}}
                        <a href={{ route('product.show', $product->id) }}
                            class="flex flex-col items-center bg-white shadow-lg py-5 md:px-8 px-2 md:w-[240px] w-[170px] rounded-xl">
                            <img class="md:h-36 h-28 w-fit mb-2" src={{ asset('storage/' . $product->image) }}
                                alt="">
                            <p>{{ $product->name }}</p>
                            <p class="text-[#B4846C] font-bold">Rp. {{ number_format($product->price, 0, ',', '.') }}
                            </p>
                            <small class="text-gray-500 mt-4">Stock : {{ $product->stock }}</small>
                        </a>
                    @endforeach
                </div>
            </div>
        @else
            {{-- START KATALOG WANITA --}}

            <div class="flex flex-col">
                <div class="flex flex-row justify-between mt-12">
                    <p class="font-bold">Katalog Pakaian Wanita</p>
                    <a href="/katalog?kategori=Wanita"
                        class="py-1 md:px-10 px-3 border border-[#E5B299] text-[#E5B299] font-bold rounded-3xl hover:bg-[#E5B299] hover:text-black">Tampilkan</a>
                </div>
                <div class="flex flex-wrap md:justify-start justify-center gap-4 my-5">
                    @foreach ($products_women as $p_women)
                        {{-- <a href={{ auth()->user()?->id == $p_women->user_id ? '/product/' . $p_women->id . '/edit' : 'checkout/' . $p_women->id }} --}}
                        <a href={{ route('product.show', $p_women->id) }}
                            class="flex flex-col items-center bg-white shadow-lg py-5 md:px-8 px-2 md:w-[240px] w-[170px] rounded-xl">
                            <img class="md:h-36 h-28 w-fit mb-2" src={{ asset('storage/' . $p_women->image) }}
                                alt="">
                            <p>{{ $p_women->name }}</p>
                            <p class="text-[#B4846C] font-bold">Rp. {{ $p_women->price }}</p>
                            <small class="text-gray-500 mt-4">Stock : {{ $p_women->stock }}</small>
                        </a>
                    @endforeach
                </div>
            </div>

            {{-- END KATALOG WANITA --}}

            {{-- START KATALOG PRIA --}}

            <div class="flex flex-col">
                <div class="flex flex-row justify-between mt-16">
                    <p class="font-bold">Katalog Pakaian Pria</p>
                    <a href="/katalog?kategori=Pria"
                        class="py-1 md:px-10 px-3 border border-[#E5B299] text-[#E5B299] font-bold rounded-3xl hover:bg-[#E5B299] hover:text-black">Tampilkan</a>
                </div>
                <div class="flex flex-wrap md:justify-start justify-center gap-4 my-5">
                    @foreach ($products_man as $p_men)
                        {{-- <a href={{ auth()->user()?->id == $p_men->user_id ? '/product/' . $p_men->id . '/edit' : 'checkout/' . $p_men->id }} --}}
                        <a href={{ route('product.show', $p_men->id) }}
                            class="flex flex-col items-center bg-white shadow-lg py-5 md:px-8 px-2 md:w-[240px] w-[170px] rounded-xl">
                            <img class="md:h-36 h-28 w-fit mb-2" src={{ asset('storage/' . $p_men->image) }}
                                alt="">
                            <p>{{ $p_men->name }}</p>
                            <p class="text-[#B4846C] font-bold">Rp. {{ $p_men->price }}</p>
                            <small class="text-gray-500 mt-4">Stock : {{ $p_men->stock }}</small>
                        </a>
                    @endforeach
                </div>
            </div>
            {{-- END KATALOG PRIA --}}

            {{-- START KATALOG ANAK --}}

            <div class="flex flex-col">
                <div class="flex flex-row justify-between mt-16">
                    <p class="font-bold">Katalog Pakaian Anak</p>
                    <a href="/katalog?kategori=Anak"
                        class="py-1 md:px-10 px-3 border border-[#E5B299] text-[#E5B299] font-bold rounded-3xl hover:bg-[#E5B299] hover:text-black">Tampilkan</a>
                </div>
                <div class="flex flex-wrap md:justify-start justify-center gap-4 my-5">
                    @foreach ($products_kids as $p_kids)
                        {{-- <a href={{ auth()->user()?->id == $p_kids->user_id ? '/product/' . $p_kids->id . '/edit' : 'checkout/' . $p_kids->id }} --}}
                        <a href={{ route('product.show', $p_kids->id) }}
                            class="flex flex-col items-center bg-white shadow-lg py-5 md:px-8 px-2 md:w-[240px] w-[170px] rounded-xl">
                            <img class="md:h-36 h-28 w-fit mb-2" src={{ asset('storage/' . $p_kids->image) }}
                                alt="">
                            <p>{{ $p_kids->name }}</p>
                            <p class="text-[#B4846C] font-bold">Rp. {{ $p_kids->price }}</p>
                            <small class="text-gray-500 mt-4">Stock : {{ $p_kids->stock }}</small>
                        </a>
                    @endforeach
                </div>
            </div>
            {{-- END KATALOG ANAK --}}

            {{-- START KATALOG Accessories --}}

            <div class="flex flex-col">
                <div class="flex flex-row justify-between mt-16">
                    <p class="font-bold">Katalog Pakaian Accessories</p>
                    <a href="/katalog?kategori=Accessories"
                        class="py-1 md:px-10 px-3 border border-[#E5B299] text-[#E5B299] font-bold rounded-3xl hover:bg-[#E5B299] hover:text-black">Tampilkan</a>
                </div>
                <div class="flex flex-wrap md:justify-start justify-center gap-4 my-5">
                    @foreach ($products_accessories as $p_acces)
                        {{-- <a href={{ auth()->user()?->id == $p_acces->user_id ? '/product/' . $p_acces->id . '/edit' : 'checkout/' . $p_acces->id }} --}}
                        <a href={{ route('product.show', $p_acces->id) }}
                            class="flex flex-col items-center bg-white shadow-lg py-5 md:px-8 px-2 md:w-[240px] w-[170px] rounded-xl">
                            <img class="md:h-36 h-28 w-fit mb-2" src={{ asset('storage/' . $p_acces->image) }}
                                alt="">
                            <p>{{ $p_acces->name }}</p>
                            <p class="text-[#B4846C] font-bold">Rp. {{ $p_acces->price }}</p>
                            <small class="text-gray-500 mt-4">Stock : {{ $p_acces->stock }}</small>
                        </a>
                    @endforeach
                </div>
            </div>
            {{-- END KATALOG Accessories --}}
        @endif
    </section>
    <x-footer />
</x-guest-layout>
