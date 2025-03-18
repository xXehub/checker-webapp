<x-app>
    <div class="page page-center">
        <div class="container container-tight py-4">
            {{-- <div class="text-center mb-4">
                <a href="{{ url('/') }}" class="navbar-brand navbar-brand-autodark">
                    <img src="{{ asset('assets/static/logo.svg') }}" height="36" alt="Logo">
                </a>
            </div> --}}
            <div class="card card-md">
                <div class="card-body">
                    <h2 class="h2 text-center mb-4">{{ __('Masuk ke akun anda') }}</h2>
                    <form method="POST" action="{{ route('login') }}" autocomplete="off" novalidate>
                        @csrf

                        <div class="mb-3">
                            <label class="form-label" for="email">{{ __('Email Address') }}</label>
                            <input type="email" 
                                   class="form-control @error('email') is-invalid @enderror" 
                                   id="email" 
                                   name="email" 
                                   placeholder="email@email.com" 
                                   value="{{ old('email') }}" 
                                   required 
                                   autocomplete="email" 
                                   autofocus>
                            
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label" for="password">
                                {{ __('Password') }}
                                <span class="form-label-description">
                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}">
                                            {{ __('Lupa password?') }}
                                        </a>
                                    @endif
                                </span>
                            </label>
                            <div class="input-group input-group-flat">
                                <input type="password" 
                                       class="form-control @error('password') is-invalid @enderror" 
                                       id="password" 
                                       name="password" 
                                       placeholder="{{ __('Password anda') }}" 
                                       required 
                                       autocomplete="current-password">
                                <span class="input-group-text">
                                    <a href="#" class="link-secondary" title="{{ __('Show password') }}" data-bs-toggle="tooltip" onclick="togglePasswordVisibility()">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                            <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                            <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                                        </svg>
                                    </a>
                                </span>
                                
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-2">
                            <label class="form-check">
                                <input type="checkbox" class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <span class="form-check-label">{{ __('Ingat saya di perangkat ini') }}</span>
                            </label>
                        </div>

                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary w-100">{{ __('Sign in') }}</button>
                        </div>
                    </form>
                </div>

            </div>

            <div class="text-center text-muted mt-3">
                {{ __("Bekum punya akun?") }} 
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" tabindex="-1">{{ __('Daftar selarang') }}</a>
                @endif
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('password');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
            } else {
                passwordInput.type = 'password';
            }
        }
    </script>
    @endpush
</x-app>