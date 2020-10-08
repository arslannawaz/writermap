<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <h1 class="fs-70 mb-4 ff-minion font-semibold text-center">Log in to Writers Map</h1>
{{--            <x-jet-authentication-card-logo />--}}
            <div class="flex justify-center mb-8">
                <a href="{{ route('social_login', 'facebook') }}" class="mx-5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" viewBox="0 0 42 42">
                        <g fill="none" fill-rule="evenodd">
                            <g>
                                <g>
                                    <g>
                                        <path stroke="#979797" d="M0 20C0 8.954 8.954 0 20 0s20 8.954 20 20-8.954 20-20 20S0 31.046 0 20z" opacity=".25" transform="translate(-552 -333) translate(553 334)"/>
                                        <path fill="#4E4D4B" d="M21.418 31.093V20.212h3.004l.398-3.75h-3.402l.005-1.877c0-.978.093-1.502 1.498-1.502h1.877v-3.75h-3.004c-3.608 0-4.878 1.82-4.878 4.878v2.252h-2.25v3.75h2.25v10.88h4.502z" transform="translate(-552 -333) translate(553 334)"/>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </svg>
                </a>

                <a href="{{ route('social_login', 'google') }}" class="mx-5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" viewBox="0 0 42 42">
                        <g fill="none" fill-rule="evenodd">
                            <g>
                                <g>
                                    <g>
                                        <path stroke="#979797" d="M0 20C0 8.954 8.967 0 20.029 0s20.029 8.954 20.029 20-8.967 20-20.03 20C8.969 40 0 31.046 0 20z" opacity=".25" transform="translate(-712 -333) translate(553 334) translate(160)"/>
                                        <path fill="#4E4D4B" d="M25.52 26.763c-1.413 1.208-3.297 1.904-5.52 1.904-3.39 0-6.307-1.946-7.733-4.777l2.803-2.176c.693 2.09 2.638 3.602 4.93 3.602 1.29 0 2.273-.357 3.004-.867l.21-.156c1.01-.802 1.472-1.907 1.562-2.656H20v-3.216h8.137c.125.539.183 1.059.183 1.772 0 2.638-.944 4.863-2.58 6.374zM20 11.333c2.34 0 4.295.857 5.797 2.254l-2.446 2.388c-.626-.588-1.724-1.29-3.351-1.29-2.292 0-4.237 1.511-4.94 3.6l-.08.274c-.126.46-.2.943-.2 1.441 0 .597.107 1.175.29 1.714l-2.812 2.176c-.588-1.174-.925-2.494-.925-3.89s.337-2.716.925-3.89l.133-.255c1.47-2.693 4.322-4.522 7.609-4.522z" transform="translate(-712 -333) translate(553 334) translate(160)"/>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </svg>
                </a>
            </div>

            <div class="text-center text-color-light">Or use your email account</div>
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label value="{{ __('Email') }}" />
                <div class="input-icon-wrapper email">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="15" viewBox="0 0 18 15">
                        <g fill="none" fill-rule="evenodd">
                            <g fill="#ADAAA5" fill-rule="nonzero">
                                <g>
                                    <g>
                                        <g>
                                            <path d="M15.3 0H2.7C1.209 0 0 1.209 0 2.7v9c0 1.491 1.209 2.7 2.7 2.7h12.6c1.491 0 2.7-1.209 2.7-2.7v-9C18 1.209 16.791 0 15.3 0zm-.369 1.8L9.639 7.092c-.169.17-.399.266-.639.266s-.47-.096-.639-.266L3.069 1.8h11.862zm1.269 9.9c0 .497-.403.9-.9.9H2.7c-.497 0-.9-.403-.9-.9V3.069l5.292 5.292c1.054 1.053 2.762 1.053 3.816 0L16.2 3.069V11.7z" transform="translate(-463 -533) translate(403 445) translate(60 53) translate(0 35)"/>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </svg>
                    <x-jet-input class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                </div>
            </div>

            <div class="mt-10">
                <x-jet-label value="{{ __('Password') }}" />

                <div class="input-icon-wrapper password">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                        <g fill="none" fill-rule="evenodd">
                            <g fill="#ADAAA5" fill-rule="nonzero">
                                <g>
                                    <g>
                                        <g>
                                            <path d="M9 5.4c-.994 0-1.8.806-1.8 1.8.004.64.346 1.228.9 1.548V11.7c0 .497.403.9.9.9s.9-.403.9-.9V8.748c.554-.32.896-.909.9-1.548 0-.994-.806-1.8-1.8-1.8zM9 0C4.03 0 0 4.03 0 9s4.03 9 9 9 9-4.03 9-9c0-2.387-.948-4.676-2.636-6.364C13.676.948 11.387 0 9 0zm0 16.2c-3.976 0-7.2-3.224-7.2-7.2S5.024 1.8 9 1.8s7.2 3.224 7.2 7.2c0 1.91-.759 3.74-2.109 5.091C12.741 15.441 10.91 16.2 9 16.2z" transform="translate(-463 -631) translate(403 445) translate(60 154) translate(0 32)"/>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </svg>

                    <x-jet-input id="password-input" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />

                    <div id="show-password" class="show-password" onclick="clickShowPassword()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="14" viewBox="0 0 18 14">
                            <g fill="none" fill-rule="evenodd">
                                <g fill="#ADAAA5" fill-rule="nonzero">
                                    <g>
                                        <g>
                                            <g>
                                                <path d="M17.074 6.514C15.343 2.494 12.086 0 8.571 0 5.057 0 1.8 2.494.07 6.514c-.096.219-.096.467 0 .686 1.731 4.02 4.988 6.514 8.502 6.514 3.515 0 6.772-2.494 8.503-6.514.096-.219.096-.467 0-.686zM8.571 12C5.854 12 3.283 10.037 1.8 6.857c1.483-3.18 4.054-5.143 6.771-5.143 2.718 0 5.289 1.963 6.772 5.143C13.86 10.037 11.289 12 8.57 12zm0-8.571c-1.893 0-3.428 1.535-3.428 3.428 0 1.894 1.535 3.429 3.428 3.429C10.465 10.286 12 8.75 12 6.857c0-.91-.361-1.781-1.004-2.424S9.48 3.429 8.57 3.429zm0 5.142c-.946 0-1.714-.767-1.714-1.714s.768-1.714 1.714-1.714c.947 0 1.715.767 1.715 1.714S9.518 8.571 8.57 8.571z" transform="translate(-825 -630) translate(403 445) translate(60 154) translate(362 31)"/>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="flex justify-between block mt-6">
                <label class="flex items-center">
                    <input type="checkbox" class="form-checkbox" name="remember">
                    <span class="ml-2 text-sm text-color-light">{{ __('Remember me') }}</span>
                </label>

                @if (Route::has('password.request'))
                    <a class="underline hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>

            <div class="mt-10 flex flex-col items-center justify-center mt-4">
                <x-jet-button class="">
                    {{ __('Sign In') }}
                </x-jet-button>

                <a class="mt-4 text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}">
                    {{ __('Register') }}
                </a>
            </div>
        </form>

        <script>
            const showPassword = document.getElementById('show-password');

            if (showPassword !== null) {
                function clickShowPassword() {
                    const passwordInput = document.getElementById('password-input');
                    const type = passwordInput.getAttribute('type');

                    if (type === 'password') {
                        passwordInput.setAttribute('type', 'text');
                    } else {
                        passwordInput.setAttribute('type', 'password');
                    }
                }
            }
        </script>
    </x-jet-authentication-card>
</x-guest-layout>
