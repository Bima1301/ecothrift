<x-guest-layout>
    <section class=" flex lg:flex-row flex-col-reverse">
        <div class="flex-col lg:w-[50%] w-full md:px-24 px-10 py-14 bg-white border-r">
            <p class="text-4xl font-extrabold md:mb-10 mb-5 lg:block hidden">Payment</p>
            <div class="shadow-[5px_3px_20px_3px_rgba(0,0,0,0.3)] rounded-xl flex flex-col p-10">
                <p class="text-xl font-semibold mb-5">Informasi</p>
                <div class="px-4">
                    <div class=" flex flex-row  gap-3 items-start">
                        <p class="me-4">Contact</p>
                        <div class="flex flex-row justify-between w-full items-start">
                            <div class="flex flex-col">
                                <p>{{ $booking->no_hp ? $booking->no_hp : $booking->user->no_hp }}</p>
                                <p>{{ $booking->no_hp ? $booking->no_hp : $booking->user->email }}</p>
                            </div>
                            <button class="text-[#B4846C]">Change</button>
                        </div>
                    </div>
                    <hr class=" border-2 border-gray-600 my-2">
                    <div class=" flex flex-row justify-between gap-3 items-start mt-5">
                        <p class="me-4">Alamat</p>
                        <div class="flex flex-row justify-between w-full items-start">
                            <div class="flex flex-col">
                                <p>{{ $booking->address }}</p>
                            </div>
                        </div>
                        <button class="text-[#B4846C]">Change</button>
                    </div>
                    <hr class=" border-2 border-gray-600 my-2">
                    <div class=" flex flex-row justify-between gap-3 items-start mt-5">
                        <p class="me-4">Metode</p>
                        <div class="flex flex-row justify-between w-full items-start">
                            <div class="flex flex-col">
                                <p>{{ $booking->shipping }}</p>
                            </div>
                        </div>
                        <button class="text-[#B4846C]" type="button">Change</button>
                    </div>
                    <hr class=" border-2 border-gray-600 my-2">

                </div>
            </div>
            <p class="text-2xl font-semibold mb-5 lg:mt-10 mt-8">Metode Pembayaran</p>
            <div class="flex items-center pl-4 border border-gray-200 rounded dark:border-gray-700 mb-3">
                <input checked id="bordered-radio-1" type="radio" value="transfer" name="shipping"
                    class="shipping w-4 h-4 text-[#E0C097] bg-gray-100 border-gray-300 focus:ring-[#E0C097] dark:focus:ring-[#E0C097] dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="bordered-radio-1"
                    class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Transfer Bank</label>
            </div>
            <div class="flex items-center pl-4 border border-gray-200 rounded dark:border-gray-700">
                <input id="bordered-radio-2" type="radio" value="QRIS" name="shipping"
                    class="shipping w-4 h-4 text-[#E0C097] bg-gray-100 border-gray-300 focus:ring-[#E0C097] dark:focus:ring-[#E0C097] dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="bordered-radio-2"
                    class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">QRIS</label>
            </div>
            <div class="w-full flex flex-row justify-end mt-5">
                <button type="button" onclick="btnOpenModal()"
                    class="bg-[#B4846C] px-10 py-2 rounded-3xl text-white font-bold">Bayar</button>
            </div>
        </div>
        <div class="flex-col lg:w-[50%] w-full md:px-12 px-10 py-14 ">
            <p class="text-4xl font-extrabold md:mb-12 mb-7 lg:hidden block">Payment</p>

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
                        <div class="flex flex-row gap-2 h-14 pe-3">
                            <div class="flex flex-col justify-between">
                                <p class="text-center">Qty</p>
                                <p
                                    class=" w-12 border-none bg-transparent focus:ring-yellow-600 focus:rounded-lg text-center">
                                    {{ $booking->quantity }}</p>
                            </div>
                            <div class="flex flex-col justify-between">

                                <p>Harga</p>
                                <p>Rp. {{ number_format($product->price, 0, ',', '.') }}</p>
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
                    <p class="font-bold" id="totalPesan">Rp. {{ number_format($booking->total_price, 0, ',', '.') }}</p>
                    <p class="font-bold">Rp. 10.000</p>
                    <p class="font-bold">- Rp. 0</p>
                    <hr class="my-3 border-2 border-gray-500">
                    <p class="font-bold">Rp. {{ number_format($booking->total_price - 10000, 0, ',', '.') }}</p>
                </div>
            </div>

            {{-- START MODAL TRANSFER --}}
            <button data-modal-target="transferModal" data-modal-toggle="transferModal" id="transferButton"
                class="hidden"></button>
            <!-- Main modal -->
            <div id="transferModal" tabindex="-1" aria-hidden="true"
                class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full backdrop-brightness-90 backdrop-blur-sm">
                <div class="relative w-full max-w-2xl max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Detail Pembayaran Transfer Bank
                            </h3>
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="transferModal">
                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-6 flex flex-col px-14">
                            <div class="flex flex-row gap-4">
                                <div class="flex flex-col gap-3">
                                    <p>Receipt ID</p>
                                    <p>Reference ID</p>
                                </div>
                                <div class="flex flex-col gap-3">
                                    <p>DQjWDbQMl5SrCePRgMjKHJD</p>
                                    <p>2-rDQjWDbQMl5SrCePRgMjKHJD ID</p>
                                </div>
                            </div>
                            <p class="font-bold text-lg text-center mt-16 mb-4">BAYAR SEBELUM 31 FEBRUARI 2024</p>
                            <p class="font-bold text-5xl text-center mb-16 text-[#B4846C]">Rp.
                                {{ number_format($booking->total_price, 0, ',', '.') }}</p>
                            <div class="flex flex-row gap-4">
                                <div class="flex flex-col gap-3">
                                    <p>No. Virtual Account</p>
                                </div>
                                <div class="flex flex-col gap-3">
                                    <p>12121212121212121212121212 (Bank Mandiri)</p>
                                    <p>2-13131313131313131313131313 (Bank BCA)</p>
                                </div>
                            </div>
                        </div>
                        <!-- Modal footer -->
                        <form action="{{ route('payout.verify', $booking->code) }}" method="POST"
                            class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600 justify-end">
                            @csrf
                            <input type="hidden" name="payment_method" value="transfer_bank">
                            <input type="hidden" name="paid_price" value={{ $booking->total_price - 10000 }}>

                            <button data-modal-hide="defaultModal" type="submit"
                                class="text-white bg-[#B4846C] focus:ring-0 focus:outline-none font-medium rounded-xl text-sm px-8 py-2.5 text-center ">Saya
                                Sudah Bayar</button>
                        </form>
                    </div>
                </div>
            </div>
            {{-- END MODAL TRANSFER --}}

            {{-- START MODAL QRIS --}}
            <button data-modal-target="QRISModal" data-modal-toggle="QRISModal" id="QRISButton"
                class="hidden"></button>
            <!-- Main modal -->
            <div id="QRISModal" tabindex="-1" aria-hidden="true"
                class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full backdrop-brightness-90 backdrop-blur-sm">
                <div class="relative w-full max-w-2xl max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Detail Pembayaran QRIS
                            </h3>
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="QRISModal">
                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-6 flex flex-col px-14">
                            <div class="flex flex-row gap-4">
                                <div class="flex flex-col gap-3">
                                    <p>Receipt ID</p>
                                    <p>Reference ID</p>
                                </div>
                                <div class="flex flex-col gap-3">
                                    <p>DQjWDbQMl5SrCePRgMjKHJD</p>
                                    <p>2-rDQjWDbQMl5SrCePRgMjKHJD ID</p>
                                </div>
                            </div>
                            <p class="font-bold text-lg text-center mt-16 mb-4">BAYAR SEBELUM 31 FEBRUARI 2024</p>
                            <p class="font-bold text-5xl text-center mb-5 text-[#B4846C]">Rp.
                                {{ number_format($booking->total_price, 0, ',', '.') }}</p>
                            <div class="flex flex-row w-full justify-center">
                                <img src={{ asset('images/qrisDummy.png') }} class="w-52" alt="">
                            </div>
                        </div>
                        <!-- Modal footer -->
                        <form action="{{ route('payout.verify', $booking->code) }}" method="POST"
                            class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600 justify-end"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="payment_method" value="qris">
                            <input type="hidden" name="paid_price" value={{ $booking->total_price - 10000 }}>
                            <button data-modal-hide="defaultModal" type="submit"
                                class="text-white bg-[#B4846C] focus:ring-0 focus:outline-none font-medium rounded-xl text-sm px-8 py-2.5 text-center ">Saya
                                Sudah Bayar</button>
                        </form>
                    </div>
                </div>
            </div>
            {{-- END MODAL QRIS --}}


    </section>
</x-guest-layout>
<script>
    function btnOpenModal() {
        let shipping = document.querySelector('input[name="shipping"]:checked').value;
        let transferModal = document.getElementById('transferModal');
        let btnTransfer = document.getElementById('transferButton');
        let btnQRIS = document.getElementById('QRISButton');
        if (shipping == 'transfer') {
            btnTransfer.click();
        } else if (shipping == 'QRIS') {
            btnQRIS.click();
        }
        console.log(shipping);
    }
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
