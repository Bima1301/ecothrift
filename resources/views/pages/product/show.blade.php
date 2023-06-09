<x-guest-layout>
    <x-nav-guest />
    <section class="px-20">
        @if (auth()->user()?->id == $product->user_id)
            <a href="/katalog"
                class="mt-14 mb-10 font-semibold px-5 border-2 hover:px-8 duration-150 border-[#9e7b6a] py-1 rounded-3xl w-fit block">Kembali
            </a>
        @endif
        <div
            class="flex lg:flex-row  justify-between gap-14 flex-col {{ auth()->user()?->id == $product->user_id ? 'mb-20' : 'my-20' }}">
            <div class="shadow-xl p-5 rounded-lg bg-white h-fit">
                <!-- Slider main container -->
                <div class="swiper mt-10 lg:w-80 w-52 aspect-square rounded-lg overflow-hidden ">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper ">
                        <!-- Slides -->
                        @foreach ($product->image as $item)
                            <div class="swiper-slide flex justify-center">
                                <img class="h-full object-cover" src={{ asset('storage/' . $item) }} alt="">
                            </div>
                        @endforeach
                    </div>
                    <!-- If we need pagination -->
                    <div class="swiper-pagination absolute !left-auto !right-10 bottom-0 !w-fit"></div>

                </div>
            </div>
            <div class="flex flex-col w-[44%]">
                <p class="text-xl font-bold text-gray-400">Clothing</p>
                <p class="text-5xl font-bold">{{ $product->name }}</p>
                <div class="flex flex-row items-center gap-4 my-5">
                    <p class="to-gray-600"><span class="font-bold text-black">{{ $product->stock }}</span> Stock Left
                    </p>
                    <p class="px-4 py-1 bg-green-500 rounded-3xl text-white">Available</p>
                </div>
                <p class="text-4xl font-bold">Rp. {{ number_format($product->price, 0, ',', '.') }}</p>
                <hr class="border-gray-500 my-3">

                <div id="accordion-collapse" data-accordion="open" class="border-none w-full">
                    <h2 id="accordion-collapse-heading-1">
                        <button type="button"
                            class="flex items-center justify-between  py-5 font-medium text-left text-gray-500  rounded-t-xl w-full"
                            data-accordion-target="#accordion-collapse-body-1" aria-expanded="true"
                            aria-controls="accordion-collapse-body-1">
                            <span>Deskripsi Produk</span>
                            <svg data-accordion-icon class="w-6 h-6 rotate-180 shrink-0" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </h2>
                    <div id="accordion-collapse-body-1" class="hidden" aria-labelledby="accordion-collapse-heading-1">
                        <div class="dark:border-gray-700 dark:bg-gray-900">
                            <p class="mb-2 text-gray-500 dark:text-gray-400">{{ $product->description }}</p>

                        </div>
                    </div>
                    <h2 id="accordion-collapse-heading-2">
                        <button type="button"
                            class="flex items-center justify-between w-full py-5 font-medium text-left text-gray-500 "
                            data-accordion-target="#accordion-collapse-body-2" aria-expanded="false"
                            aria-controls="accordion-collapse-body-2">
                            <span>Tentang Produk</span>
                            <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </h2>
                    <div id="accordion-collapse-body-2" class="hidden" aria-labelledby="accordion-collapse-heading-2">
                        <div class="flex flex-row gap-5">
                            <div class="flex flex-col gap-3">
                                <div class="flex flex-row items-center">
                                    <i class="fa fa-list-alt text-yellow-600"></i>
                                    <p class="text-gray-600 ms-2">Kategori</p>
                                </div>
                                <div class="flex flex-row items-center">
                                    <i class="fa fa-shopping-basket text-yellow-600"></i>
                                    <p class="text-gray-600 ms-2">Ukuran
                                    </p>
                                </div>
                            </div>
                            <div class="flex flex-col gap-3">
                                <p class="font-bold">{{ $product->categories->name }}</p>
                                <p class="font-bold">{{ $product->size }}</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="flex flex-col px-5 py-7 bg-white shadow-xl rounded-xl h-fit">
                <p class="font-bold text-lg">Product Control</p>
                <hr class="my-3">
                <div class="flex flex-col gap-3 justify-between">
                    @if (!auth()->user() || auth()->user()?->id != $product->user_id)
                        <a href={{ 'checkout/' . $product->id }}
                            class="bg-[#B4846C] px-14 py-2 rounded-3xl text-white font-bold">Checkout Produk</a>
                        <a href="/katalog "
                            class="border-[3px] border-[#B4846C] px-14 py-2 rounded-3xl text-[#B4846C] font-bold text-center">Kembali</a>
                    @else
                        <a href={{ route('product.edit', $product->id) }}
                            class="bg-[#B4846C] px-14 py-2 rounded-3xl text-white font-bold text-center">Edit Produk</a>
                        <button data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                            class="border-[3px] border-[#B4846C] px-14 py-2 rounded-3xl text-[#B4846C] font-bold text-center">
                            <i class="fa fa-trash"></i>
                            Hapus Produk</button>
                        {{-- START DELETE MODAL --}}
                        <div id="popup-modal" tabindex="-1"
                            class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full backdrop-blur-sm backdrop-brightness-90">
                            <div class="relative w-full max-w-md max-h-full">
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <button type="button"
                                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                        data-modal-hide="popup-modal">
                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                    <div class="p-6 text-center">
                                        <svg aria-hidden="true"
                                            class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200"
                                            fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you
                                            sure you want
                                            to delete this product <span class="font-bold">{{ $product->name }}</span>
                                            ?</h3>
                                        <form data-modal-hide="popup-modal"
                                            action="{{ route('product.destroy', $product->id) }}" method="POST"
                                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">
                                                Yes, I'm sure
                                            </button>
                                        </form>
                                        <button data-modal-hide="popup-modal" type="button"
                                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
                                            cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- END DELETE MODAL --}}
                    @endif
                </div>
            </div>
        </div>
    </section>
    <x-footer />
</x-guest-layout>
<script>
    const swiper = new Swiper('.swiper', {
        // Optional parameters
        direction: 'horizontal',
        loop: true,

        // If we need pagination
        pagination: {
            el: '.swiper-pagination',
        },
        autoplay: {
            delay: 4000,
            disableOnInteraction: false,
        },

    });
</script>
