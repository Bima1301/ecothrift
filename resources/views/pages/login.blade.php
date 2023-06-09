<x-guest-layout>
    <section class="min-h-screen bg-black flex justify-center items-center">
        <div class="text-black bg-white flex rounded-lg overflow-hidden h-[35rem] ">
            <img class="max-w-[490px] min-w-[300px] md:block hidden object-cover" src={{ asset('images/login.png') }}
                alt="">
            <div class="md:px-20 px-10 flex flex-col justify-center lg:min-w-[490px]">
                <p class="text-4xl font-bold">Ecothrift</p>
                <div class="bg-[#FFEBD1] w-fit  px-2 py-1 rounded-3xl flex justify-between gap-5 my-7">
                    <button onclick="loginTab()"
                        class="login-btn py-2 bg-[#B4846C] text-white px-6 rounded-3xl">Login</button>
                    <button onclick="registerTab()" class="register-btn py-2 px-6">Register</button>
                </div>
                <form method="POST" action="{{ route('login') }}" id="login">
                    @csrf
                    <div class="mb-4">
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="email" name="email" type="text" placeholder="Email">
                    </div>
                    <div class="mb-0">
                        <input
                            class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                            id="password" name="password" type="password" placeholder="Password">
                    </div>
                    <div class="mb-6">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox"
                                class="rounded border-gray-300 text-[#B4846C] shadow-sm focus:ring-[#B4846C]"
                                name="remember">
                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>
                    <div class="flex justify-end">
                        <button class="py-2 bg-[#B4846C] text-white px-6 rounded-3xl items-end">
                            Login
                        </button>
                    </div>
                </form>
                <form method="POST" action="{{ route('register') }}" id="register" class="hidden">
                    @csrf
                    <div class="mb-4">
                        <input
                            class="shadow appearance-none border border-[#C2C2C2] rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="name" name="name" type="text" placeholder="Full Name" :value="old('name')"
                            required autofocus autocomplete="name">
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <div class="mb-4">
                        <input
                            class="shadow appearance-none border border-[#C2C2C2] rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="email" name="email" type="text" placeholder="Email" :value="old('email')"
                            required>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <div class="mb-4">
                        <input
                            class="shadow appearance-none border border-[#C2C2C2] rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="no_hp" name="no_hp" type="text" placeholder="No Hp (62..)"
                            :value="old('no_hp')" required>
                        <x-input-error :messages="$errors->get('no_hp')" class="mt-2" />
                    </div>
                    <div class="mb-4">
                        <input
                            class="shadow appearance-none border border-[#C2C2C2] rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="password" name="password" type="password" placeholder="Password" required
                            autocomplete="new-password">
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                    <div class="mb-6">
                        <input
                            class="shadow appearance-none border border-[#C2C2C2] rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                            id="password_confirmation" type="password" placeholder="Confirm Password"
                            name="password_confirmation" required autocomplete="new-password">
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>
                    <div class="flex justify-end">
                        <button class="py-2 bg-[#B4846C] text-white px-6 rounded-3xl items-end">
                            Register
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script>
        function loginTab() {
            document.getElementById("login").style.display = "block";
            document.getElementById("register").style.display = "none";
            loginBtn = document.querySelector(".login-btn");
            loginBtn.classList.add("bg-[#B4846C]");
            loginBtn.classList.add("text-white");
            loginBtn.classList.add("px-6");
            loginBtn.classList.add("rounded-3xl");
            registerBtn = document.querySelector(".register-btn");
            registerBtn.classList.remove("bg-[#B4846C]");
            registerBtn.classList.remove("text-white");
            registerBtn.classList.remove("rounded-3xl");

        }

        function registerTab() {
            document.getElementById("register").style.display = "block";
            document.getElementById("login").style.display = "none";
            registerBtn = document.querySelector(".register-btn");
            registerBtn.classList.add("bg-[#B4846C]");
            registerBtn.classList.add("text-white");
            registerBtn.classList.add("px-6");
            registerBtn.classList.add("rounded-3xl");
            loginBtn = document.querySelector(".login-btn");
            loginBtn.classList.remove("bg-[#B4846C]");
            loginBtn.classList.remove("text-white");
            loginBtn.classList.remove("rounded-3xl");


        }
    </script>
</x-guest-layout>
