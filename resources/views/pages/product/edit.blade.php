<x-guest-layout>
    <x-nav-guest />

    <section class="container">
        <div class="mb-10 md:mt-14 mt-0 flex flex-row justify-between items-center">
            <p class="text-3xl font-bold ">Edit produk</p>

        </div>
        <form class="flex md:flex-row flex-col md:gap-10 gap-0 mt-14" method="POST"
            action={{ route('product.update', $product->id) }} enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="flex flex-col md:w-[50%] w-full md:mb-10 mb-0">
                <div class="mb-6">
                    <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                        Produk <span class="text-red-500">*</span></label>
                    <input type="text" id="base-input" name="name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ $product->name }}">

                    @error('name')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror

                </div>
                <div class="mb-6">
                    <label for="countries"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
                    <select id="countries" name="category_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected value="">Pilih Kategori</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @if ($category->id == $product->category_id) selected @endif>
                                {{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga
                        <span class="text-red-500">*</span></label>
                    <input type="number" id="base-input" name="price"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value={{ $product->price }}>
                    @error('price')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-6">

                    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi
                        Produk</label>
                    <textarea id="message" rows="4" name="description"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Tulis deskripsi produk" value="{{ $product->description }}">"{{ $product->description }}"</textarea>
                    <small>Diharapkan tidak melebihi 100 karakter ketika menambahkan deskripsi produk</small>
                    @error('description')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

            </div>
            <div class="flex flex-col md:w-[50%] w-full md:mb-10 mb-0">
                <div class="mb-6">
                    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Foto
                        Produk</label>

                    @php
                        $image0 = '';
                        $image1 = '';
                        $image2 = '';
                        if (array_key_exists(0, $product->image)) {
                            $image0 = $product->image[0];
                        }
                        if (array_key_exists(1, $product->image)) {
                            $image1 = $product->image[1];
                        }
                        if (array_key_exists(2, $product->image)) {
                            $image2 = $product->image[2];
                        }
                    @endphp
                    <div class="flex flex-wrap gap-3">
                        <div class="flex flex-col">
                            <div class="flex items-center justify-start ">
                                <div
                                    id="image-div1"class=" h-56 aspect-square {{ $image0 ? 'flex' : 'hidden' }}  items-center justify-center rounded-md border relative">
                                    <img id="image1" class="h-full w-full object-contain"
                                        src={{ asset('storage/' . $image0) }}>
                                    <div class="absolute bottom-0 right-0">
                                        <button type="button" class="del-img-1 px-2 py-1 bg-red-500"><i
                                                class="fa fa-trash" onclick="removeImage1()"></i></button>
                                        <label for="dropzone-file1"s class="px-2 py-1 bg-[#E0C097] cursor-pointer"><i
                                                class="fa fa-edit"></i></label>
                                    </div>
                                </div>
                                <label for="dropzone-file1" id="label1"
                                    class="{{ $image0 ? 'hidden' : 'flex' }} flex-col items-center justify-center h-56 aspect-square border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                    <div class="flex flex-col items-center justify-center pt-5 px-3 pb-6">
                                        <i class="fa fa-image scale-150 mb-5 text-gray-400"></i>
                                        <p class="mb-2 text-sm text-center text-gray-500 dark:text-gray-400">Drop your
                                            images here, or
                                            select click to browse</p>
                                    </div>
                                    @if ($image0 != '')
                                        <input type="hidden" id="oldImage1" name="image[0]" value={{ $image0 }}>
                                    @endif
                                    <input id="dropzone-file1" type="file" class="hidden" name="image[0]"
                                        accept="image/*" onchange="loadImage1(event)" />
                                </label>
                            </div>
                            @error('image.0')
                                <span class="text-red-500 text-sm max-w-[220px]">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex flex-col">
                            <div class="flex items-center justify-start ">
                                <div id="image-div2"
                                    class=" h-56 aspect-square {{ $image1 ? 'flex' : 'hidden' }}  items-center justify-center rounded-md border relative">
                                    <img id="image2" class="h-full object-contain"
                                        src={{ asset('storage/' . $image1) }}>
                                    <div class="absolute bottom-0 right-0">
                                        <button type="button" class="del-img-2 px-2 py-1 bg-red-500"><i
                                                class="fa fa-trash" onclick="removeImage2()"></i></button>
                                        <label for="dropzone-file2"s class="px-2 py-1 bg-[#E0C097] cursor-pointer"><i
                                                class="fa fa-edit"></i></label>
                                    </div>
                                </div>
                                <label for="dropzone-file2" id="label2"
                                    class="{{ $image1 ? 'hidden' : 'flex' }} flex-col items-center justify-center h-56 aspect-square border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600 ">
                                    <div class="flex flex-col items-center justify-center pt-5 px-3 pb-6">
                                        <i class="fa fa-image scale-150 mb-5 text-gray-400"></i>
                                        <p class="mb-2 text-sm text-center text-gray-500 dark:text-gray-400">Drop your
                                            images here, or
                                            select click to browse</p>
                                    </div>
                                    @if ($image1 != '')
                                        <input type="hidden" id="oldImage2" name="image[1]"
                                            value={{ $image1 }}>
                                    @endif
                                    <input id="dropzone-file2" type="file" class="hidden" name="image[1]"
                                        accept="image/*" onchange="loadImage2(event)" />
                                </label>
                            </div>
                            @error('image.1')
                                <span class="text-red-500 text-sm max-w-[220px]">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex flex-col">
                            <div class="flex items-center justify-start ">
                                <div
                                    id="image-div3"class=" h-56 aspect-square {{ $image2 ? 'flex' : 'hidden' }} items-center justify-center rounded-md border relative">
                                    <img id="image3" class="h-full object-contain"
                                        src={{ asset('storage/' . $image2) }}>
                                    <div class="absolute bottom-0 right-0">
                                        <button type="button" class="del-img-3 px-2 py-1 bg-red-500"><i
                                                class="fa fa-trash" onclick="removeImage3()"></i></button>
                                        <label for="dropzone-file3"s class="px-2 py-1 bg-[#E0C097] cursor-pointer"><i
                                                class="fa fa-edit"></i></label>
                                    </div>
                                </div>
                                <label for="dropzone-file3" id="label3"
                                    class="{{ $image2 ? 'hidden' : 'flex' }} flex-col items-center justify-center h-56 aspect-square border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                    <div class="flex flex-col items-center justify-center pt-5 px-3 pb-6">
                                        <i class="fa fa-image scale-150 mb-5 text-gray-400"></i>
                                        <p class="mb-2 text-sm text-center text-gray-500 dark:text-gray-400">Drop your
                                            images here, or
                                            select click to browse</p>
                                    </div>
                                    @if ($image2 != '')
                                        <input type="hidden" id="oldImage3" name="image[2]"
                                            value={{ $image2 }}>
                                    @endif
                                    <input id="dropzone-file3" type="file" class="hidden" name="image[2]"
                                        accept="image/*" onchange="loadImage3(event)" />
                                </label>
                            </div>
                            @error('image.2')
                                <span class="text-red-500 text-sm max-w-[220px]">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    @error('image')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex md:flex-row flex-col md:gap-8">
                    <div class="mb-6 w-full">
                        <label for="base-input"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tambahkan Ukuran<span
                                class="text-red-500">*</span></label>
                        <input type="text" id="base-input" name="size"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value={{ $product->size }}>
                        @error('size')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-6 w-full">
                        <label for="base-input"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Produk<span
                                class="text-red-500">*</span></label>
                        <input type="date" id="base-input" name="date_product"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value={{ $product->date_product }}>
                        @error('date_product')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-8 ">
                    <label for="base-input"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stock<span
                            class="text-red-500">*</span></label>
                    <div class="counter flex flex-row gap-3">
                        <button type="button"
                            class="counter--arrow-dec bg-slate-200 hover:bg-slate-300 px-3 py-2 rounded-md"><span>-</span></button>
                        <input type="number"
                            class="counter--output border-slate-300 rounded-md focus:border-transparent focus:ring-slate-400 text-center"
                            min="0" value={{ $product->stock }} name="stock">
                        <button type="button"
                            class="counter--arrow-inc bg-slate-200 hover:bg-slate-300 px-3 py-2 rounded-md"><span>+</span></button>
                    </div>
                    @error('stock')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex md:flex-row justify-start gap-8">
                    <a href="/katalog "
                        class="border-[3px] border-[#B4846C] px-10 py-2 rounded-3xl text-[#B4846C] font-bold">Batal</a>
                    <button type="submit" class="bg-[#B4846C] px-10 py-2 rounded-3xl text-white font-bold">Simpan
                        Produk</button>
                </div>
            </div>
        </form>

    </section>

    <x-footer />
    <script>
        const changeValues = () => {
            const inc = document.querySelector(".counter--arrow-inc > span");
            const dec = document.querySelector(".counter--arrow-dec > span");
            const timer = document.querySelector(".counter");
            const output = document.querySelector(".counter--output");
            const singleStep = "1";
            const medStep = "5";
            const lgStep = "25";
            const largeInt = "500";
            const medInt = "250";
            const smInt = "100";
            let step = "1";
            let stepInterval = 1;
            let intTime = largeInt;

            output.setAttribute("value", {{ $product->stock }}); // Initialize input value

            timer.addEventListener("mousedown", e => {
                // Start timer to record length of mousedown event
                const startTime = new Date().getTime();
                output.setAttribute("type", "number");

                stepInterval = () => {
                    const newTime = new Date().getTime();
                    const elapsedTime = newTime - startTime;

                    if (elapsedTime === 0 && elapsedTime < 3000) {
                        step = singleStep;
                        intTime = largeInt;
                    }
                    // Update step and interval values
                    if (elapsedTime > 3000 && elapsedTime < 6000) {
                        step = medStep;
                        intTime = medInt;
                    }

                    if (elapsedTime > 6000) {
                        step = lgStep;
                        intTime = smInt;
                    }

                    // remove click event from decrement button when value is zero
                    if (output.value === "0") {
                        dec.parentElement.classList.add('js-noevent');
                    } else {
                        dec.parentElement.classList.remove('js-noevent');
                    }

                    if (inc.parentElement.contains(e.target)) {
                        // on click increment
                        output.stepUp(step);
                        output.setAttribute('value', output.value);
                        output.setAttribute('step', step);
                    }

                    if (dec.parentElement.contains(e.target)) {
                        // on click decrement
                        output.stepDown(step);
                        output.setAttribute('value', output.value);
                        output.setAttribute('step', step);
                    }

                    // Call recursively
                    count = setTimeout(stepInterval, intTime);
                };
                stepInterval();
            });
        };

        window.addEventListener("mouseup", () => {
            clearTimeout(count);
        });

        changeValues();
    </script>
    <script>
        var loadImage1 = function(event) {
            var image1 = document.getElementById('image1');
            var label1 = document.getElementById('label1');
            var divimage1 = document.getElementById('image-div1');
            image1.src = URL.createObjectURL(event.target.files[0]);
            image1.onload = function() {
                divimage1.style.display = "flex";
                URL.revokeObjectURL(image1.src) // free memory
                label1.style.display = "none";
            }

        };

        function removeImage1() {
            var image1 = document.getElementById('image1');
            var label1 = document.getElementById('label1');
            var divimage1 = document.getElementById('image-div1');
            var oldImage1 = document.getElementById('oldImage1');
            label1.classList.remove('hidden');
            image1.src = "";
            oldImage1.value = "";
            divimage1.style.display = "none";
            label1.style.display = "flex";
        }

        var loadImage2 = function(event) {
            var image2 = document.getElementById('image2');
            var label2 = document.getElementById('label2');
            var divimage2 = document.getElementById('image-div2');
            image2.src = URL.createObjectURL(event.target.files[0]);
            image2.onload = function() {
                divimage2.style.display = "flex";
                URL.revokeObjectURL(image2.src) // free memory
                label2.style.display = "none";
            }

        };

        function removeImage2() {
            var image2 = document.getElementById('image2');
            var label2 = document.getElementById('label2');
            var divimage2 = document.getElementById('image-div2');
            var oldImage2 = document.getElementById('oldImage2');
            image2.src = "";
            oldImage2.value = "";
            divimage2.style.display = "none";
            label2.style.display = "flex";
        }

        var loadImage3 = function(event) {
            var image3 = document.getElementById('image3');
            var label3 = document.getElementById('label3');
            var divimage3 = document.getElementById('image-div3');
            image3.src = URL.createObjectURL(event.target.files[0]);
            image3.onload = function() {
                divimage3.style.display = "flex";
                URL.revokeObjectURL(image3.src) // free memory
                label3.style.display = "none";
            }

        };

        function removeImage3() {
            var image3 = document.getElementById('image3');
            var label3 = document.getElementById('label3');
            var divimage3 = document.getElementById('image-div3');
            var oldImage3 = document.getElementById('oldImage3');
            image3.src = "";
            oldImage3.value = "";
            divimage3.style.display = "none";
            label3.style.display = "flex";
        }
    </script>
</x-guest-layout>
