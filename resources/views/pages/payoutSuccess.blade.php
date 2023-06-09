<x-guest-layout>
    <div class="bg-contain absolute w-full" style="background-image: url({{ asset('images/success.png') }})">
        <p class="text-3xl text-white font-extrabold px-16 py-8">Ecothrift</p>
    </div>
    <div class="flex flex-col justify-center items-center w-full min-h-screen">
        <p class="text-3xl font-bold mb-12">Transaksi Berhasil</p>
        <img class="aspect-square w-20" src={{ asset('images/check.png') }} alt="">
    </div>
    <script>
        window.setTimeout(function() {
            window.location.href = '/katalog';
        }, 3000);
    </script>
</x-guest-layout>
