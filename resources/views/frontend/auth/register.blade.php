@extends('frontend.layouts.app')

@section('content')
    <div class="mx-auto p-4">
        <!-- Main form container, full-width on mobile, limited width on larger screens -->
        <div class="w-full max-w-lg mx-auto">
            <div class="mb-5 cursor-pointer w-full">
                <form id="registerForm" method="post" action="{{ route('register') }}">
                    @csrf
                    <div class="flex justify-between mb-6">
                        <h5 class="mb-3 font-bold text-xl">Daftar</h5>
                    </div>

                    <!-- Nama Lengkap -->
                    <div class="relative mb-3">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                            <i class="fa-regular fa-user text-success-emphasis"></i>
                        </div>
                        <input type="text" name="full_name" class="input-group" placeholder="Masukkan Nama Lengkap" required="">
                    </div>

                    <!-- Username -->
                    <div class="relative mb-3">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                            <i class="fa-regular fa-user text-success-emphasis"></i>
                        </div>
                        <input type="text" name="username" class="input-group" placeholder="Masukkan Username" required="">
                    </div>

                    <!-- Email -->
                    <div class="relative mb-3">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                            <i class="fa-regular fa-envelope text-success-emphasis"></i>
                        </div>
                        <input type="email" name="email" class="input-group" placeholder="Masukkan Email" required="">
                    </div>

                    <!-- Kata Sandi -->
                    <div class="relative mb-3">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                            <i class="fa-regular fa-lock text-success-emphasis"></i>
                        </div>
                        <input type="password" name="password" class="input-group" placeholder="Masukkan Kata Sandi" required="">
                    </div>

                    <!-- Nomor Telepon -->
                    <div class="relative mb-3">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                            <i class="fa-regular fa-phone"></i>
                        </div>
                        <input type="text" name="phone_number" class="input-group" placeholder="Masukkan Nomor Telepon (Contoh: 085xxxxxxxx)" required="" pattern="^08\d{9,10}$" title="Masukkan nomor telepon dengan format: 085xxxxxxxx">
                    </div>

                    <!-- Bank -->
                    <div class="relative mb-3">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                            <i class="fa-regular fa-bank"></i>
                        </div>
                        <select name="bank_id" class="input-group" required>
                            <option value="">Pilih Bank</option>
                            @foreach ($banks as $bank)
                                <option value="{{ $bank->id }}">{{ $bank->bank_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Nama Pemilik Rekening -->
                    <div class="relative mb-3">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                            <i class="fa-regular fa-user text-success-emphasis"></i>
                        </div>
                        <input type="text" name="account_name" class="input-group" placeholder="Masukkan Nama Pemilik Rekening" required="">
                    </div>

                    <!-- Nomor Rekening -->
                    <div class="relative mb-3">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                            <i class="fa-regular fa-user text-success-emphasis"></i>
                        </div>
                        <input type="number" name="account_number" class="input-group" placeholder="Masukkan Nomor Rekening" required="">
                    </div>

                    <!-- Kolom Opsional (Reff) -->
                    <div class="relative mb-3">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                            <i class="fa-regular fa-user text-success-emphasis"></i>
                        </div>
                        <input type="text" name="referral_code" class="input-group" placeholder="Kode Referral (Opsional)">
                    </div>

                    <!-- Google reCAPTCHA -->
                    <div class="mb-3">
                        <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"></div>
                        @if ($errors->has('g-recaptcha-response'))
                            <span class="text-red-500 text-sm">
                                <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                            </span>
                        @endif
                    </div>

                    <!-- Checkbox Syarat dan Ketentuan -->
                    <div class="mb-3 mt-11">
                        <div class="flex">
                            <input id="terms" name="terms" required="" type="checkbox" class="w-4 h-4 text-blue-600">
                            <label for="terms" class="ml-2 text-sm">Saya setuju dengan Syarat dan Ketentuan</label>
                        </div>
                    </div>

                    <!-- Tombol Daftar -->
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
