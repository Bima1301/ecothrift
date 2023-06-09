<x-guest-layout>
    <div id="preloader" class=" min-h-screen min-w-full bg-black flex items-center fixed z-50">
        <img src={{ asset('images/loader.png') }} alt="">
        <div class="absolute flex flex-col gap-5 items-center w-full">
            <p class="text-white text-3xl font-bold">Ecothrift</p>
            <p class="text-white">Copyright Ecothrift 2023 | All right reserved. </p>
        </div>
    </div>
    <x-nav-guest />
    <section class="container">


        <!-- Slider main container -->
        <div class="swiper h-96 mt-10 rounded-lg overflow-hidden">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper ">
                <!-- Slides -->
                <div class="swiper-slide">
                    <img class="w-full lg:h-auto h-full object-cover" src={{ asset('images/slider/slider2.jpg') }}
                        alt="">
                </div>
                <div class="swiper-slide">
                    <img class="w-full lg:h-auto h-full object-cover" src={{ asset('images/slider/slider3.jpg') }}
                        alt="">
                </div>
                <div class="swiper-slide">
                    <img class="w-full lg:h-auto h-full object-cover" src={{ asset('images/slider/slider1.jpg') }}
                        alt="">
                </div>
            </div>
            <!-- If we need pagination -->
            <div class="swiper-pagination absolute !left-auto !right-10 bottom-0 !w-fit"></div>

        </div>
        <div class="flex flex-row justify-between mt-16">
            <p class="font-bold">Katalog</p>

            <div class="flex lg:flex-row flex-col gap-3">
                <a href="/katalog"
                    class="py-1 md:px-10 px-3 border border-[#E5B299] text-[#E5B299] font-bold rounded-3xl hover:bg-[#E5B299] hover:text-black">Tampilkan</a>
                @if (auth()->user())
                    <a href="/product/create"
                        class="py-1 md:px-10 px-3 border border-[#E5B299] text-[#E5B299] font-bold rounded-3xl hover:bg-[#E5B299] hover:text-black">Tambah
                        Produk</a>
                @endif

            </div>
        </div>
        <div class="flex md:flex-row flex-wrap gap-5 md:justify-between justify-center mt-10 mb-20">
            <div
                class="bg-white flex flex-col justify-center items-center gap-5 shadow-[5px_6px_20px_0_rgba(0,0,0,0.3)] rounded-xl w-80 h-80 hover:scale-105 duration-150">
                <img class="h-32" src={{ asset('images/women.png') }} alt="">
                <p>Pakaian Wanita</p>
                <a href="/katalog?kategori=Wanita"
                    class="bg-[#B4846C] hover:bg-[#98705B] cursor-pointer px-16 py-3 rounded-3xl w-fit text-white">Pilih</a>
            </div>
            <div
                class="bg-white flex flex-col justify-center items-center gap-5 shadow-[5px_6px_20px_0_rgba(0,0,0,0.3)] rounded-xl w-80 h-80 hover:scale-105 duration-150">
                <img class="h-32" src={{ asset('images/man.png') }} alt="">
                <p>Pakaian Pria</p>
                <a href="/katalog?kategori=Pria"
                    class="bg-[#B4846C] hover:bg-[#98705B] cursor-pointer px-16 py-3 rounded-3xl w-fit text-white">Pilih</a>
            </div>
            <div
                class="bg-white flex flex-col justify-center items-center gap-5 shadow-[5px_6px_20px_0_rgba(0,0,0,0.3)] rounded-xl w-80 h-80 hover:scale-105 duration-150">
                <img class="h-32" src={{ asset('images/child.png') }} alt="">
                <p>Pakaian Anak</p>
                <a href="/katalog?kategori=Anak"
                    class="bg-[#B4846C] hover:bg-[#98705B] cursor-pointer px-16 py-3 rounded-3xl w-fit text-white">Pilih</a>
            </div>
            <div
                class="bg-white flex flex-col justify-center items-center gap-5 shadow-[5px_6px_20px_0_rgba(0,0,0,0.3)] rounded-xl w-80 h-80 hover:scale-105 duration-150">
                <img class="h-32" src={{ asset('images/hat.png') }} alt="">
                <p>Accessories</p>
                <a href="/katalog?kategori=Accessories"
                    class="bg-[#B4846C] hover:bg-[#98705B] cursor-pointer px-16 py-3 rounded-3xl w-fit text-white">Pilih</a>
            </div>

        </div>
    </section>
    <x-footer />
</x-guest-layout>
<script>
    var loader = document.getElementById("preloader");
    window.addEventListener('load', function(load) {
        window.removeEventListener('load', load, false);
        setTimeout(function() {
            loader.style.setProperty("display", "none", "important")
        }, 1500);
    }, false);
</script>
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
