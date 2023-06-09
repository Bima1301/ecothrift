<x-guest-layout>
    <div class=" flex lg:flex-row flex-col-reverse bg-white">
        <div class="flex flex-col lg:w-[100%] w-full md:px-36 px-10 py-14  border-r bg-white">
            {{-- <p class="text-4xl font-extrabold md:mb-12 mb-7 lg:block hidden">Chekcout</p> --}}

            <form action="{{ route('profile.update') }}" method="POST"
                class="flex flex-col gap-8 justify-between bg-slate-100" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <p class="text-4xl font-extrabold md:mb-12 mb-7 lg:block hidden px-8 pt-9">Edit Account</p>
                <div class="flex flex-col gap-11 justify-between w-full px-20">
                    <div class="flex flex-row gap-10 w-full">
                        <p style="width: 190px">Nama</p>
                        <input type="text" name="name" value="{{ $user->name }}"
                            class="w-full border-[#C2C2C2] rounded-lg  focus:ring-[#B4846C] focus:border-transparent">
                        @error('name')
                            <small class="text-red-500">{{ $message }}
                            </small>
                        @enderror
                    </div>
                    <div class=" flex flex-row gap-10">
                        <p style="width: 190px">Email</p>
                        <input type="email" name="email" value="{{ $user->email }}"
                            class="w-full   border-[#C2C2C2] rounded-lg  focus:ring-[#B4846C] focus:border-transparent">
                        @error('email')
                            <small class="text-red-500">{{ $message }}
                            </small>
                        @enderror
                    </div>
                    <div class=" flex flex-row gap-10">
                        <p style="width: 190px">No Telp</p>
                        <input type="text" name="no_hp" value="{{ $user->no_hp }}"
                            class="w-full   border-[#C2C2C2] rounded-lg  focus:ring-[#B4846C] focus:border-transparent">
                        @error('mo_hp')
                            <small class="text-red-500">{{ $message }}
                            </small>
                        @enderror
                    </div>
                    <div class=" flex flex-row gap-10">
                        <p style="width: 190px">Jenis Kelamin</p>
                        <input type="text" name="gender" value="{{ $user->gender }}"
                            class="w-full   border-[#C2C2C2] rounded-lg  focus:ring-[#B4846C] focus:border-transparent">
                        @error('gender')
                            <small class="text-red-500">{{ $message }}
                            </small>
                        @enderror
                    </div>
                    <div class=" flex flex-row gap-10">
                        <p style="width: 190px">Alamat</p>
                        <input type="text" name="address" value="{{ $user->address }}"
                            class="w-full   border-[#C2C2C2] rounded-lg  focus:ring-[#B4846C] focus:border-transparent">
                        @error('address')
                            <small class="text-red-500">{{ $message }}
                            </small>
                        @enderror
                    </div>
                    <div class="flex flex-row justify-between mb-10">
                        <a href="/ "
                            class="border-[3px] border-[#B4846C] px-10 py-2 rounded-3xl text-[#B4846C] font-bold text-center">Kembali</a>
                        <button type="submit"
                            class="bg-[#B4846C] px-10 py-2 rounded-3xl text-white font-bold">Simpan</button>

                    </div>
                </div>
            </form>
        </div>

</x-guest-layout>
