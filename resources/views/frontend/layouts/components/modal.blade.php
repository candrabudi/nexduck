<div id="modalLogin" tabindex="-1" aria-hidden="true"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full overflow-x-hidden overflow-y-auto md:inset-0 h-screen md:h-[calc(100%-1rem)] max-h-full justify-center items-center">
    <div class="relative w-full max-w-3xl max-h-full bg-base rounded-lg shadow-lg " style="margin: auto;">
        <div class="flex md:justify-between">
            <div class="w-full p-0 hidden md:block"><img src="/assets/images/br_bg.png" alt=""
                    class="w-full h-full"></div>
            <div class="w-full relative p-5">
                <form method="POST" action="{{ route('login') }}" class="" style="margin-top: 100px;">
                    @csrf
                    <div class="flex justify-between mb-6">
                        <h5 class="mb-3 font-bold text-xl">Login</h5>
                        <a href="javascript:void(0)" class="close-btn" id="closeModalLoginBtn"><i
                                class="fa-solid fa-xmark"></i></a>
                    </div>
                    <div class="relative mb-3">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                            <i class="fa-solid fa-user text-success-emphasis"></i>
                        </div>
                        <input required="" type="text" name="username" class="input-group" placeholder="Username"
                            value="{{ old('username') }}">
                    </div>
                    @error('username')
                        <div class="text-red-500 text-xs">{{ $message }}</div>
                    @enderror

                    <div class="relative mb-3">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                            <i class="fa-solid fa-lock text-success-emphasis"></i>
                        </div>
                        <input required="" type="password" name="password" class="input-group"
                            placeholder="Password">
                    </div>
                    @error('password')
                        <div class="text-red-500 text-xs">{{ $message }}</div>
                    @enderror

                    <a href="/forgot-password" class="text-white text-sm">Forgot Password?</a>

                    <div class="mt-3 w-full"><button type="submit"
                            class="ui-button-blue rounded w-full mb-3">Login</button></div>
                    <p class="text-sm text-gray-500 dark:text-gray-300 mb-6">Don't have an account yet? <a
                            href=""><strong>Register</strong></a></p>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="modalRegister" tabindex="-1" aria-hidden="true"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full overflow-x-hidden overflow-y-auto md:inset-0 h-screen md:h-[calc(100%-1rem)] max-h-full justify-center items-center">
    <div class="relative w-full max-w-3xl max-h-full bg-base rounded-lg shadow-lg">
        <div class="flex md:justify-between h-full">
            <div class="w-full p-0 hidden md:block dark:bg-[#1A1C1F]"><img src="/assets/images/br_bg.png" alt=""
                    class="w-full h-full"></div>
            <div class="w-full relative p-5 m-auto">
                <form method="post" action="{{ route('register') }}" class="">
                    @csrf
                    <div class="flex justify-between mb-6">
                        <h5 class="mb-3 font-bold text-xl">Register</h5>
                        <a href="javascript:void(0)" class="close-btn" id="closeModalBtn"><i
                                class="fa-solid fa-xmark"></i></a>
                    </div>

                    <div class="relative mb-3">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                            <i class="fa-regular fa-user text-success-emphasis"></i>
                        </div>
                        <input type="text" name="full_name" class="input-group" placeholder="Enter Full Name"
                            required="">
                    </div>
                    
                    <div class="relative mb-3">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                            <i class="fa-regular fa-user text-success-emphasis"></i>
                        </div>
                        <input type="text" name="username" class="input-group" placeholder="Enter Username"
                            required="">
                    </div>

                    <div class="relative mb-3">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                            <i class="fa-regular fa-envelope text-success-emphasis"></i>
                        </div>
                        <input type="email" name="email" class="input-group" placeholder="Enter Email"
                            required="">
                    </div>

                    <div class="relative mb-3">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                            <i class="fa-regular fa-lock text-success-emphasis"></i>
                        </div>
                        <input type="password" name="password" class="input-group pr-[40px]"
                            placeholder="Enter Password" required="">
                        <button type="button" class="absolute inset-y-0 right-0 flex items-center pr-3.5">
                            <i class="fa-regular fa-eye"></i>
                        </button>
                    </div>

                    <div class="relative mb-3">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                            <i class="fa-regular fa-lock text-success-emphasis"></i>
                        </div>
                        <input type="password" name="password_confirmation" class="input-group pr-[40px]"
                            placeholder="Enter Password Confirmation" required="">
                        <button type="button" class="absolute inset-y-0 right-0 flex items-center pr-3.5">
                            <i class="fa-regular fa-eye"></i>
                        </button>
                    </div>
                    <div class="relative mb-3">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                            <i class="fa-regular fa-phone"></i>
                        </div>
                        <input type="text" name="phone_number"
                            data-maska="[
                                 '(##) ####-####',
                                 '(##) #####-####'
                                 ]"
                            class="input-group" placeholder="Enter Phone Number" required="">
                    </div>

                    <div class="relative mb-3">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                            <i class="fa-regular fa-user text-success-emphasis"></i>
                        </div>
                        <select name="bank_id" class="input-group" id="">
                            <option value="">Select Bank</option>
                            @foreach ($banks as $bank)
                                <option value="{{ $bank->id }}"> {{ $bank->bank_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="relative mb-3">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                            <i class="fa-regular fa-user text-success-emphasis"></i>
                        </div>
                        <input type="text" name="account_name" class="input-group" placeholder="Enter Account Name"
                            required="">
                    </div>
                    <div class="relative mb-3">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                            <i class="fa-regular fa-user text-success-emphasis"></i>
                        </div>
                        <input type="number" name="account_number" class="input-group" placeholder="Enter Account Number"
                            required="">
                    </div>

                    <div class="mb-3 mt-11">
                        <div class="flex">
                            <input id="link-checkbox" name="term_a" required="" type="checkbox"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                value="">
                            <label for="link-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                I agree
                                to the User Agreement and confirm that I am at least 18 years
                            </label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="flex items-center"><input id="link-checkbox-b" name="term_b" required=""
                                type="checkbox"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                value="">
                                <label for="link-checkbox-b" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                    I agree with <a href="#" class="text-blue-600 dark:text-blue-500 hover:underline">
                                    the terms and conditions
                                </a>.
                            </label>
                        </div>
                    </div>
                    <div class="mt-5 w-full">
                        <button type="submit"  class="ui-button-blue rounded w-full mb-3">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
