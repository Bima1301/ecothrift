<x-guest-layout>
    <form class=" flex lg:flex-row flex-col-reverse" method="POST" action={{ route('bookingProduct', $product->id) }}>
        @csrf
        <div class="flex-col lg:w-[50%] w-full md:px-36 px-10 py-14 bg-white border-r">
            <p class="text-4xl font-extrabold md:mb-12 mb-7 lg:block hidden">Chekcout</p>
            @if (!auth()->user())
                <div class="flex flex-col justify-between md:gap-5 gap-3 md:mb-9 mb-4">
                    <div class="flex flex-row justify-between items-center">
                        <p class="text-xl font-semibold">Kontak</p>
                        <small class="text-gray-500">Sudah punya akun? <a class="font-bold"
                                href="/login">Login</a></small>
                    </div>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="no_hp" name="no_hp" type="text" placeholder="No. HP">
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="email" name="email" type="text" placeholder="Email">
                </div>
            @endif
            <div class="flex flex-col justify-between md:gap-5 gap-3 md:mb-9 mb-4">
                <p class="text-xl font-semibold">Metode Pengiriman</p>
                <div class="flex items-center pl-4 border border-gray-200 rounded dark:border-gray-700">
                    <input checked id="bordered-radio-1" type="radio" value="JNE" name="shipping"
                        class="w-4 h-4 text-[#E0C097] bg-gray-100 border-gray-300 focus:ring-[#E0C097] dark:focus:ring-[#E0C097] dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="bordered-radio-1"
                        class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">JNE - REG (3-5
                        Hari Pengiriman)</label>
                </div>
                <div class="flex items-center pl-4 border border-gray-200 rounded dark:border-gray-700">
                    <input id="bordered-radio-2" type="radio" value="SiCepat" name="shipping"
                        class="w-4 h-4 text-[#E0C097] bg-gray-100 border-gray-300 focus:ring-[#E0C097] dark:focus:ring-[#E0C097] dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="bordered-radio-2"
                        class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">SiCepat (2-4 Hari
                        Pengiriman)</label>
                </div>
            </div>
            <div class="flex flex-col justify-between md:gap-5 gap-3 md:mb-9 mb-4">
                <p class="text-xl font-semibold">Alamat Pengiriman</p>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-black leading-tight focus:outline-none focus:shadow-outline"
                    id="sender_name" name="sender_name" type="text" placeholder="Nama Lengkap">
                @error('sender_name')
                    <small class="text-red-500">{{ $message }}</small>
                @enderror
                <div class="flex md:flex-row flex-col md:gap-5 gap-3">
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-black leading-tight focus:outline-none focus:shadow-outline"
                        id="address" name="address" type="text" placeholder="Alamat">
                    @error('address')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                    <input
                        class="shadow appearance-none border rounded w-32 py-2 px-3 text-black leading-tight focus:outline-none focus:shadow-outline"
                        id="postal_code" name="postal_code" type="number" placeholder="Kode Pos">
                    @error('postal_code')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-black leading-tight focus:outline-none focus:shadow-outline"
                    id="district" name="district" type="text" placeholder="Kecamatan">
                @error('district')
                    <small class="text-red-500">{{ $message }}</small>
                @enderror
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-black leading-tight focus:outline-none focus:shadow-outline"
                    id="city" name="city" type="text" placeholder="Kota/Kabupaten">
                @error('city')
                    <small class="text-red-500">{{ $message }}</small>
                @enderror
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-black leading-tight focus:outline-none focus:shadow-outline"
                    id="province" name="province" type="text" placeholder="Provinsi">
                @error('province')
                    <small class="text-red-500">{{ $message }}</small>
                @enderror
            </div>
            <div class="flex md:flex-row gap-3 justify-between">
                <a href="/katalog "
                    class="border-[3px] border-[#B4846C] px-10 py-2 rounded-3xl text-[#B4846C] font-bold text-center">Batal</a>
                <button type="submit" class="bg-[#B4846C] px-10 py-2 rounded-3xl text-white font-bold">Lanjut ke
                    Pembayaran</button>
            </div>
        </div>
        <div class="flex-col lg:w-[50%] w-full md:px-12 px-10 py-14 ">
            <p class="text-4xl font-extrabold md:mb-12 mb-7 lg:hidden block">Chekcout</p>

            <div class=" w-full lg:mt-14 shadow-xl rounded-md bg-white px-10 py-14">
                <div class="flex flex-row justify-between pb-8 px-4">
                    <!-- Slider main container -->
                    <div class="swiper w-40 aspect-square mx-0 ">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            @foreach ($product->image as $item)
                                <div class="swiper-slide flex justify-center">
                                    <img class="h-40" src={{ asset('storage/' . $item) }} alt="">
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                    <div class="flex flex-col">
                        <p class="text-xl font-bold mb-3">{{ $product->name }}</p>
                        <div class="flex flex-row gap-4 h-20 pe-3">
                            <div class="flex flex-col justify-between">
                                <p class="ps-[8px]">Qty</p>
                                <input type="number" name="quantity" min="1" max="{{ $product->stock }}"
                                    maxLength="3" onkeyup="quantityChanged()"
                                    class="counter--output w-12 border-none bg-transparent focus:ring-yellow-600 focus:rounded-lg text-center"
                                    id="qty" placeholder="1">
                                @error('quantity')
                                    <small class="text-red-500">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="flex flex-col justify-between">

                                <p>Harga</p>
                                <p class="pb-[8px]">Rp. {{ number_format($product->price, 0, ',', '.') }}</p>
                            </div>
                        </div>
                        <div class="border-2 border-black mt-3" />
                    </div>
                </div>
            </div>
            <div class="flex flex-row rounded-md overflow-hidden mb-6 mx-3">
                <div class="flex flex-col justify-between bg-[#FCDEC0] py-3 px-5 w-[50%]">
                    <p class="font-bold text-xs">KESBEK 3.0 <span class="font-normal text-gray-500">up to 30%</span>
                    </p>
                    <p class="text-lg font-bold mt-2">Kode Promo</p>
                </div>
                <div class="w-[50%] bg-[#E5B299] flex justify-center">
                    <input type="text" class="border-none bg-transparent focus:ring-0 focus:border-none w-40">
                </div>
            </div>
            <div class="flex flex-row">
                <div class="flex flex-col gap-1">
                    <p class="font-bold">Total Pesanan</p>
                    <p class="font-bold">Biaya Pengiriman</p>
                    <p class="font-bold">Voucher</p>
                    <hr class="my-3 border-none">
                    <p class="font-bold">Total Bayar</p>

                </div>
                <div class="flex flex-col ml-auto gap-1">
                    <p class="font-bold" id="totalPesan">Rp. {{ number_format($product->price, 0, ',', '.') }}</p>
                    <p class="font-bold">Rp. 10.000</p>
                    <p class="font-bold">- Rp. 0</p>
                    <hr class="my-3 border-2 border-gray-500">
                    <p class="font-bold">Rp. {{ number_format($product->price, 0, ',', '.') }}</p>
                </div>
            </div>
            </section>
</x-guest-layout>
<script>
    function quantityChanged() {
        let input = document.getElementById('qty')
        if (input.value < 1) {
            input.value = 1
        } else if (input.value > {{ $product->stock }}) {
            input.value = {{ $product->stock }}
        }
        document.getElementById('#totalPesan').innerHTML = 'aad'
    }
    // document.querySelectorAll('#qty').forEach(input => {
    //     input.oninput = () => {
    //         if (input.value < input.min) {
    //             input.value = input.min
    //         } else if (input.value > input.max) {
    //             input.value = input.max
    //         }
    //         if (input.value.length > input.maxLength) {
    //             input.value = input.value.slice(0, input.maxLength)
    //         }

    //     }
    //     document.querySelectorAll('#totalPesan').innerHTML = input.value
    // })
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
