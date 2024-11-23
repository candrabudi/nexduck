@extends('frontend.layouts.app')

@section('content')
    <div class="mx-auto p-4" style="width: 50%">
        <div class="mb-5 cursor-pointer w-full">
            <form method="POST" action="{{ route('login') }}" class="" style="margin-top: 100px;">
                @csrf
                <div class="flex justify-between mb-6">
                    <h5 class="mb-3 font-bold text-xl">Masuk</h5>
                </div>
                <div class="relative mb-3">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                        <i class="fa-solid fa-user text-success-emphasis"></i>
                    </div>
                    <input required="" type="text" name="username" class="input-group" placeholder="Masukkan Username"
                        value="{{ old('username') }}" autocomplete="username">
                </div>
                @error('username')
                    <div class="text-red-500 text-xs">{{ $message }}</div>
                @enderror

                <div class="relative mb-3">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                        <i class="fa-solid fa-lock text-success-emphasis"></i>
                    </div>
                    <input required="" type="password" name="password" class="input-group"
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
                    <a href=""><strong>Daftar</strong></a>
                </p>
            </form>
        </div>
    </div>
@endsection
