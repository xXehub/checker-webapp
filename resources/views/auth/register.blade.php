
<x-app>
    <div class="page page-center">
        <div class="container container-tight py-4">
            {{-- <div class="text-center mb-4">
                <a href="{{ url('/') }}" class="navbar-brand navbar-brand-autodark">
                    <img src="{{ asset('static/logo.webp') }}" height="36" alt="Logo">
                </a>
            </div> --}}
            <form method="POST" action="{{ route('register') }}" class="card card-md" autocomplete="off" novalidate>
                @csrf
                <div class="card-body">
                    <h2 class="card-title text-center mb-4">{{ __('Buat Akun Baru') }}</h2>
                    
                    <div class="mb-3">
                        <label class="form-label" for="name">{{ __('Nama Lengkap') }}</label>
                        <input type="text" 
                               class="form-control @error('name') is-invalid @enderror" 
                               id="name" 
                               name="name" 
                               placeholder="{{ __('Masukkan nama') }}" 
                               value="{{ old('name') }}" 
                               required 
                               autocomplete="name" 
                               autofocus>
                        
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="email">{{ __('Alamat Email') }}</label>
                        <input type="email" 
                               class="form-control @error('email') is-invalid @enderror" 
                               id="email" 
                               name="email" 
                               placeholder="{{ __('Masukkan email') }}" 
                               value="{{ old('email') }}" 
                               required 
                               autocomplete="email">
                        
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="password">{{ __('Password') }}</label>
                        <div class="input-group input-group-flat">
                            <input type="password" 
                                   class="form-control @error('password') is-invalid @enderror" 
                                   id="password" 
                                   name="password" 
                                   placeholder="{{ __('Buat password') }}" 
                                   required 
                                   autocomplete="new-password">
                            <span class="input-group-text">
                                <a href="#" class="link-secondary toggle-password" title="{{ __('Tampilkan password') }}" data-bs-toggle="tooltip">
                                    <!-- Eye Closed Icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-eye-closed" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" style="display:block;">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <line x1="3" y1="3" x2="21" y2="21" />
                                        <path d="M10.584 10.587a2 2 0 0 0 2.828 2.83" />
                                        <path d="M9.363 5.365a9.466 9.466 0 0 1 2.637 -.365c4 0 7.333 2.333 10 7c-.666 1.167 -1.333 2.167 -2 3m-2 2a9.55 9.55 0 0 1 -2 1" />
                                        <path d="M5.824 5.835a14.646 14.646 0 0 0 -3.824 5.165c2.667 4.667 6 7 10 7c.856 0 1.68 -.11 2.464 -.322" />
                                    </svg>

                                    <!-- Eye Open Icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-eye-open" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" style="display:none;">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <circle cx="12" cy="12" r="2" />
                                        <path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" />
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

                    <div class="mb-3">
                        <label class="form-label" for="password-confirm">{{ __('Konfirmasi Password') }}</label>
                        <div class="input-group input-group-flat">
                            <input type="password" 
                                   class="form-control" 
                                   id="password-confirm" 
                                   name="password_confirmation" 
                                   placeholder="{{ __('Ulangi password') }}" 
                                   required 
                                   autocomplete="new-password">
                            <span class="input-group-text">
                                <a href="#" class="link-secondary toggle-password-confirm" title="{{ __('Tampilkan password') }}" data-bs-toggle="tooltip">
                                    <!-- Eye Closed Icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-eye-closed" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" style="display:block;">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <line x1="3" y1="3" x2="21" y2="21" />
                                        <path d="M10.584 10.587a2 2 0 0 0 2.828 2.83" />
                                        <path d="M9.363 5.365a9.466 9.466 0 0 1 2.637 -.365c4 0 7.333 2.333 10 7c-.666 1.167 -1.333 2.167 -2 3m-2 2a9.55 9.55 0 0 1 -2 1" />
                                        <path d="M5.824 5.835a14.646 14.646 0 0 0 -3.824 5.165c2.667 4.667 6 7 10 7c.856 0 1.68 -.11 2.464 -.322" />
                                    </svg>

                                    <!-- Eye Open Icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-eye-open" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" style="display:none;">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <circle cx="12" cy="12" r="2" />
                                        <path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" />
                                    </svg>
                                </a>
                            </span>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-check">
                            <input type="checkbox" class="form-check-input" required>
                            <span class="form-check-label">{{ __('Saya setuju dengan') }} <a href="" tabindex="-1">{{ __('syarat dan ketentuan') }}</a>.</span>
                        </label>
                    </div>

                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary w-100">{{ __('Buat Akun Baru') }}</button>
                    </div>
                </div>
            </form>

            <div class="text-center text-muted mt-3">
                {{ __('Sudah memiliki akun?') }} <a href="{{ route('login') }}" tabindex="-1">{{ __('Masuk') }}</a>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Password toggle for main password
            const passwordInput = document.getElementById('password');
            const togglePasswordBtn = document.querySelector('.toggle-password');
            const eyeClosedIconPassword = togglePasswordBtn.querySelector('.icon-eye-closed');
            const eyeOpenIconPassword = togglePasswordBtn.querySelector('.icon-eye-open');

            togglePasswordBtn.addEventListener('click', function(e) {
                e.preventDefault();

                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    eyeClosedIconPassword.style.display = 'none';
                    eyeOpenIconPassword.style.display = 'block';
                } else {
                    passwordInput.type = 'password';
                    eyeOpenIconPassword.style.display = 'none';
                    eyeClosedIconPassword.style.display = 'block';
                }
            });

            // Password toggle for confirm password
            const passwordConfirmInput = document.getElementById('password-confirm');
            const togglePasswordConfirmBtn = document.querySelector('.toggle-password-confirm');
            const eyeClosedIconConfirm = togglePasswordConfirmBtn.querySelector('.icon-eye-closed');
            const eyeOpenIconConfirm = togglePasswordConfirmBtn.querySelector('.icon-eye-open');

            togglePasswordConfirmBtn.addEventListener('click', function(e) {
                e.preventDefault();

                if (passwordConfirmInput.type === 'password') {
                    passwordConfirmInput.type = 'text';
                    eyeClosedIconConfirm.style.display = 'none';
                    eyeOpenIconConfirm.style.display = 'block';
                } else {
                    passwordConfirmInput.type = 'password';
                    eyeOpenIconConfirm.style.display = 'none';
                    eyeClosedIconConfirm.style.display = 'block';
                }
            });
        });
    </script>
    @endpush
</x-app>