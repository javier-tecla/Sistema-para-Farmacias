<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - {{ config('app.name', 'Laravel') }}</title>

    <!-- Ajusta las rutas de los assets según tu configuración (asset() o mix()) -->
    <link rel="shortcut icon" href="{{ asset('assets/compiled/svg/favicon.svg') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('assets/compiled/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/compiled/css/app-dark.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/compiled/css/auth.css') }}">
</head>

<body>
    <script src="{{ asset('assets/static/js/initTheme.js') }}"></script>
    <div id="auth">
        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                        <a href="/"><img src="{{ asset('assets/compiled/svg/logo.svg') }}" alt="Logo"></a>
                    </div>
                    <h1 class="auth-title">Log in.</h1>
                    <p class="auth-subtitle mb-5">Ingresa con los datos que registraste.</p>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email -->
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="email" name="email"
                                class="form-control form-control-xl @error('email') is-invalid @enderror"
                                placeholder="Correo electrónico" value="{{ old('email') }}" required autofocus>
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                            @error('email')
                                <div class="invalid-feedback">
                                    <i class="bx bx-radio-circle"></i>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" name="password"
                                class="form-control form-control-xl @error('password') is-invalid @enderror"
                                placeholder="Contraseña" required>
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Remember Me -->
                        <div class="form-check form-check-lg d-flex align-items-end">
                            <input class="form-check-input me-2" type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label text-gray-600" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>

                        <!-- Botón de Login -->
                        <div class="row mb-0">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                    </form>

                    <div class="text-center mt-5 text-lg fs-4">
                        @if (Route::has('register'))
                            <p class="text-gray-600">
                                {{ __("Don't have an account?") }}
                                <a href="{{ route('register') }}" class="font-bold">Sign up</a>.
                            </p>
                        @endif

                        @if (Route::has('password.request'))
                            <p>
                                <a class="font-bold" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </p>
                        @endif
                    </div>
                </div>
            </div>
            <!-- ... (resto del código de auth-right) ... -->
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">
                    <!-- Aquí puedes poner una imagen de fondo o dejarlo vacío según la plantilla -->
                </div>
            </div>
        </div>
    </div>
</body>

</html>
