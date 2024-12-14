@extends('frontend.layouts.app')
@section('title', 'Register Member')
@section('content')
    <div class="mx-auto p-4">
        <div class="w-full max-w-lg mx-auto">
            <div class="mb-5 cursor-pointer w-full">
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <div id="alertBox" class="hidden bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4"
                    role="alert">
                    <span class="block sm:inline" id="alertMessage"></span>
                </div>

                <form id="registerForm" method="post" action="{{ route('register') }}">
                    @csrf
                    <div class="flex justify-between mb-6">
                        <h5 class="mb-3 font-bold text-xl">Daftar</h5>
                    </div>

                    <div class="relative mb-3">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                            <i class="fa-regular fa-user text-success-emphasis"></i>
                        </div>
                        <input type="text" name="full_name" class="input-group" placeholder="Masukkan Nama Lengkap">
                    </div>

                    <div class="relative mb-3">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                            <i class="fa-regular fa-user text-success-emphasis"></i>
                        </div>
                        <input type="text" name="username" class="input-group" placeholder="Masukkan Username">
                    </div>

                    <div class="relative mb-3">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                            <i class="fa-regular fa-envelope text-success-emphasis"></i>
                        </div>
                        <input type="email" name="email" class="input-group" placeholder="Masukkan Email">
                    </div>

                    <div class="relative mb-3">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                            <i class="fa-regular fa-lock text-success-emphasis"></i>
                        </div>
                        <input type="password" name="password" class="input-group" placeholder="Masukkan Kata Sandi">
                    </div>

                    <div class="relative mb-3">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                            <i class="fa-regular fa-phone"></i>
                        </div>
                        <input type="text" name="phone_number" class="input-group"
                            placeholder="Masukkan Nomor Telepon (Contoh: 085xxxxxxxx)" pattern="^08\d{9,10}$"
                            title="Masukkan nomor telepon dengan format: 085xxxxxxxx">
                    </div>

                    <div class="relative mb-3">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                            <i class="fa-regular fa-bank"></i>
                        </div>
                        <select name="bank_id" class="input-group">
                            <option value="">Pilih Bank</option>
                            @foreach ($banks as $bank)
                                <option value="{{ $bank->id }}">{{ $bank->bank_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="relative mb-3">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                            <i class="fa-regular fa-user text-success-emphasis"></i>
                        </div>
                        <input type="text" name="account_name" class="input-group"
                            placeholder="Masukkan Nama Pemilik Rekening">
                    </div>

                    <div class="relative mb-3">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                            <i class="fa-regular fa-user text-success-emphasis"></i>
                        </div>
                        <input type="number" name="account_number" class="input-group"
                            placeholder="Masukkan Nomor Rekening">
                    </div>

                    <div class="relative mb-3">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                            <i class="fa-regular fa-user text-success-emphasis"></i>
                        </div>
                        <input type="text" name="referral_code" class="input-group" value="{{ $referral }}"
                            placeholder="Kode Referral (Opsional)" {{ $referral ? 'readonly' : '' }}>
                    </div>

                    <div class="mb-3">
                        <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"></div>
                        @if ($errors->has('g-recaptcha-response'))
                            <span class="text-red-500 text-sm">
                                <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="mb-3 mt-11">
                        <div class="flex">
                            <input id="terms" name="terms" type="checkbox" class="w-4 h-4 text-blue-600">
                            <label for="terms" class="ml-2 text-sm">Saya setuju dengan Syarat dan Ketentuan</label>
                        </div>
                    </div>

                    <div class="mt-5 w-full">
                        <button type="submit" id="registerButton" class="ui-button-blue rounded w-full mb-3">
                            Daftar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        document.getElementById('registerForm').addEventListener('submit', function(event) {
            // Mencegah form untuk submit jika ada error
            let valid = true;
            let messages = [];

            // Ambil elemen input
            const username = document.querySelector('input[name="username"]');
            const fullName = document.querySelector('input[name="full_name"]');
            const email = document.querySelector('input[name="email"]');
            const accountNumber = document.querySelector('input[name="account_number"]');
            const alertBox = document.getElementById('alertBox');
            const alertMessage = document.getElementById('alertMessage');

            // Reset alert box setiap kali submit
            alertBox.classList.add('hidden');
            alertMessage.innerHTML = '';

            // Validasi Username: tidak boleh ada spasi, tidak boleh lebih dari 15 karakter
            const usernameRegex = /^[^\s]{1,15}$/;
            if (!username.value.trim()) {
                messages.push('Username harus diisi.');
                valid = false;
            } else if (!usernameRegex.test(username.value)) {
                messages.push('Username tidak boleh mengandung spasi dan harus kurang dari 15 karakter.');
                valid = false;
            }

            // Validasi Nama Lengkap: tidak boleh ada angka
            const fullNameRegex = /^[^0-9]+$/;
            if (!fullName.value.trim()) {
                messages.push('Nama lengkap harus diisi.');
                valid = false;
            } else if (!fullNameRegex.test(fullName.value)) {
                messages.push('Nama lengkap tidak boleh mengandung angka.');
                valid = false;
            }

            // Validasi Email
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!email.value.trim()) {
                messages.push('Email harus diisi.');
                valid = false;
            } else if (!emailRegex.test(email.value)) {
                messages.push('Masukkan email yang valid.');
                valid = false;
            }

            // Validasi Nomor Rekening: hanya boleh berisi angka
            const accountNumberRegex = /^[0-9]+$/;
            if (!accountNumber.value.trim()) {
                messages.push('Nomor rekening harus diisi.');
                valid = false;
            } else if (!accountNumberRegex.test(accountNumber.value)) {
                messages.push('Nomor rekening hanya boleh berisi angka.');
                valid = false;
            }

            // Jika ada error, tampilkan alert dengan Tailwind CSS
            if (!valid) {
                event.preventDefault();
                alertMessage.innerHTML = messages.join('<br>'); // Menampilkan semua error dalam alert box
                alertBox.classList.remove('hidden'); // Menampilkan alert box
            }
        });
    </script>
@endsection
