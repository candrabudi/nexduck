<!-- Modal Login -->
<div id="modalLogin" tabindex="-1" aria-hidden="true"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full overflow-x-hidden overflow-y-auto md:inset-0 h-screen md:h-[calc(100%-1rem)] max-h-full justify-center items-center">
    <div class="relative w-full max-w-3xl max-h-full bg-base rounded-lg shadow-lg" style="margin: auto;">
        <div class="flex md:justify-between">
            <div class="w-full p-0 hidden md:block"><img src="/assets/images/br_bg.png" alt="Gambar Latar Belakang"
                    class="w-full h-full"></div>
            <div class="w-full relative p-5">
                <form method="POST" action="{{ route('login') }}" class="" style="margin-top: 100px;">
                    @csrf
                    <div class="flex justify-between mb-6">
                        <h5 class="mb-3 font-bold text-xl">Masuk</h5>
                        <a href="javascript:void(0)" class="close-btn" id="closeModalLoginBtn"><i
                                class="fa-solid fa-xmark"></i></a>
                    </div>
                    <div class="relative mb-3">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                            <i class="fa-solid fa-user text-success-emphasis"></i>
                        </div>
                        <input required="" type="text" name="username" class="input-group"
                            placeholder="Masukkan Username" value="{{ old('username') }}" autocomplete="username">
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

                    <a href="/forgot-password" class="text-white text-sm">Lupa Kata Sandi?</a>

                    <div class="mt-3 w-full">
                        <button type="submit" class="ui-button-blue rounded w-full mb-3">Masuk</button>
                    </div>
                    <p class="text-sm text-gray-500 dark:text-gray-300 mb-6">Belum punya akun? <a
                            href=""><strong>Daftar</strong></a></p>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Register -->
<div id="modalRegister" tabindex="-1" aria-hidden="true"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full overflow-x-hidden overflow-y-auto md:inset-0 h-screen md:h-[calc(100%-1rem)] max-h-full justify-center items-center">
    <div class="relative w-full max-w-3xl max-h-full bg-base rounded-lg shadow-lg">
        <div class="flex md:justify-between h-full">
            <div class="w-full p-0 hidden md:block dark:bg-[#1A1C1F]">
                <img src="/assets/images/br_bg.png" alt="Gambar Latar Belakang" class="w-full h-full">
            </div>
            <div class="w-full relative p-5 m-auto">
                <form id="registerForm" method="post" action="{{ route('register') }}">
                    @csrf
                    <div class="flex justify-between mb-6">
                        <h5 class="mb-3 font-bold text-xl">Daftar</h5>
                        <a href="javascript:void(0)" class="close-btn" id="closeModalBtn">
                            <i class="fa-solid fa-xmark"></i>
                        </a>
                    </div>

                    <!-- Nama Lengkap -->
                    <div class="relative mb-3">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                            <i class="fa-regular fa-user text-success-emphasis"></i>
                        </div>
                        <input type="text" name="full_name" class="input-group" placeholder="Masukkan Nama Lengkap"
                            required="">
                    </div>

                    <!-- Username -->
                    <div class="relative mb-3">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                            <i class="fa-regular fa-user text-success-emphasis"></i>
                        </div>
                        <input type="text" name="username" class="input-group" placeholder="Masukkan Username"
                            required="">
                    </div>

                    <!-- Email -->
                    <div class="relative mb-3">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                            <i class="fa-regular fa-envelope text-success-emphasis"></i>
                        </div>
                        <input type="email" name="email" class="input-group" placeholder="Masukkan Email"
                            required="">
                    </div>

                    <!-- Kata Sandi -->
                    <div class="relative mb-3">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                            <i class="fa-regular fa-lock text-success-emphasis"></i>
                        </div>
                        <input type="password" name="password" class="input-group" placeholder="Masukkan Kata Sandi"
                            required="">
                    </div>

                    <!-- Nomor Telepon -->
                    <div class="relative mb-3">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                            <i class="fa-regular fa-phone"></i>
                        </div>
                        <input type="text" name="phone_number" class="input-group"
                            placeholder="Masukkan Nomor Telepon (Contoh: 085xxxxxxxx)" required=""
                            pattern="^08\d{9,10}$" title="Masukkan nomor telepon dengan format: 085xxxxxxxx">
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
                        <input type="text" name="account_name" class="input-group"
                            placeholder="Masukkan Nama Pemilik Rekening" required="">
                    </div>

                    <!-- Nomor Rekening -->
                    <div class="relative mb-3">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                            <i class="fa-regular fa-user text-success-emphasis"></i>
                        </div>
                        <input type="number" name="account_number" class="input-group"
                            placeholder="Masukkan Nomor Rekening" required="">
                    </div>

                    <!-- Kolom Opsional (Reff) -->
                    <div class="relative mb-3">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                            <i class="fa-regular fa-user text-success-emphasis"></i>
                        </div>
                        <input type="text" name="referral_code" class="input-group"
                            placeholder="Kode Referral (Opsional)">
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
                            <input id="terms" name="terms" required="" type="checkbox"
                                class="w-4 h-4 text-blue-600">
                            <label for="terms" class="ml-2 text-sm">Saya setuju dengan Syarat dan Ketentuan</label>
                        </div>
                    </div>

                    <!-- Tombol Daftar -->
                    <div class="mt-5 w-full">
                        <button type="submit" id="registerButton" class="ui-button-blue rounded w-full mb-3"
                            disabled>
                            Daftar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script>
    const form = document.getElementById('registerForm');
    const submitButton = document.getElementById('registerButton');
    form.addEventListener('input', () => {
        const allValid = form.checkValidity();
        submitButton.disabled = !allValid;
    });

    function enableSubmit() {
        submitButton.disabled = false;
    }
</script>
