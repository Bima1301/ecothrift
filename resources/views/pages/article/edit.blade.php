<x-guest-layout>
    <x-nav-guest data='article' />
    <section class="container">
        <form class="my-14 w-full" action={{ route('tips-trick.update', $article->slug) }} method="POST"
            enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <p class="md:text-3xl text-lg font-bold mb-8">Buat Tips & Tricks</p>
            <div class="mb-6">
                <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul</label>
                <input type="text" id="base-input" name="title" placeholder="Masukkan judul artikel"
                    value="{{ $article->title }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @error('title')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-6">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                    for="default_size">Gambar</label>
                <img id="preview" class=" aspect-square object-cover w-72 mb-3 "
                    src={{ asset('storage/' . $article->image) }} alt="">
                <input type="hidden" value={{ $article->image }} name="oldImage">
                <input
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    id="default_size" type="file" name="image" onchange="previewImage(this);">
                @error('image')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-6">
                <label for="base-input"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kontent</label>
                <textarea id="myeditorinstance" name="content" placeholder="Tulis Artikel disini">{{ $article->content }}</textarea>
                @error('content')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit"
                class="hover:bg-[#E5B299] border-2 border-[#E5B299] hover:text-white duration-200 px-8 py-2 rounded-xl font-bold w-full">Simpan
                Artikel</button>
        </form>
    </section>
    <x-footer />
    <script>
        function previewImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#preview')
                        .removeClass('hidden')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</x-guest-layout>
