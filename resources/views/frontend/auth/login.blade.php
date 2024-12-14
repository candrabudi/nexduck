@extends('frontend.layouts.app')
@section('title', 'Login Member')
@section('content')
    <div class="mx-auto p-4">
        <div class="mb-5 cursor-pointer w-full max-w-md mx-auto">
            <form method="POST" action="{{ route('login') }}" class="login-form" style="margin-top: 50px;">
                @csrf
                <div class="flex justify-between mb-6">
                    <h5 class="mb-3 font-bold text-xl">Masuk</h5>
                </div>

                <!-- Alert Box -->
                <div id="alertBox" class="hidden bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4" role="alert">
                    <span class="block sm:inline" id="alertMessage"></span>
                </div>

                <div class="relative mb-3">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                        <i class="fa-solid fa-user text-success-emphasis"></i>
                    </div>
                    <input type="text" name="username" class="input-group w-full" placeholder="Masukkan Username"
                        value="{{ old('username') }}" autocomplete="username">
                </div>
                @error('username')
                    <div class="text-red-500 text-xs">{{ $message }}</div>
                @enderror

                <div class="relative mb-3">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                        <i class="fa-solid fa-lock text-success-emphasis"></i>
                    </div>
                    <input type="password" name="password" class="input-group w-full"
                        placeholder="Masukkan Password" autocomplete="current-password">
                </div>
                @error('password')
                    <div class="text-red-500 text-xs">{{ $message }}</div>
                @enderror

                <a href="#" class="text-white text-sm">Lupa Kata Sandi?</a>

                <div class="mt-3 w-full">
                    <button type="submit" class="ui-button-blue rounded w-full mb-3">Masuk</button>
                </div>
                <p class="text-sm text-gray-500 dark:text-gray-300 mb-6">Belum punya akun? 
                    <a href="/register"><strong>Daftar</strong></a>
                </p>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.querySelector('.login-form').addEventListener('submit', function(event) {
            // Mencegah form untuk submit jika ada error
            let valid = true;
            let messages = [];

            // Ambil elemen input
            const username = document.querySelector('input[name="username"]');
            const password = document.querySelector('input[name="password"]');
            const alertBox = document.getElementById('alertBox');
            const alertMessage = document.getElementById('alertMessage');

            // Reset alert box setiap kali submit
            alertBox.classList.add('hidden');
            alertMessage.innerHTML = '';

            // Validasi Username
            if (!username.value.trim()) {
                messages.push('Username harus diisi.');
                valid = false;
            }

            // Validasi Password
            if (!password.value.trim()) {
                messages.push('Password harus diisi.');
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
