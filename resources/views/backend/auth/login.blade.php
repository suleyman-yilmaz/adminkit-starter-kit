<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Giriş Yap | Domain Yönetim Sistemi</title>

    <link rel="shortcut icon" href="/backend/assets/img/icons/icon-48x48.png"/>
    <link href="/backend/assets/css/app.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
@if ($errors->any())
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Hata!',
            html: `{!! implode('<br><br>', $errors->all()) !!}`,
            showConfirmButton: false,
            timer: 4000,
            toast: true,
            position: 'top-end'
        });
    </script>
@endif
<main class="d-flex w-100 vh-100">
    <div class="row w-100 g-0">

        {{-- Sol taraf (Form Alanı) --}}
        <div class="col-md-6 d-flex align-items-center justify-content-center bg-light">
            <div class="w-75" style="max-width: 420px">
                <div class="text-center mb-4">
                    <h1 class="h3 mb-2">Adminkit</h1>
                    <p class="text-muted">Starter Kit</p>
                </div>

                <div class="card shadow-sm border-0">
                    <div class="card-body p-4">
                        <form method="POST" action="{{ route('backend.auth.login.post') }}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">E-posta</label>
                                <input class="form-control form-control-lg" type="email" name="email" placeholder="E-posta adresiniz" value="{{ old('email') }}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Şifre</label>
                                <input class="form-control form-control-lg" type="password" name="password" placeholder="Şifreniz" value="{{ old('password') }}">
                            </div>

                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="rememberMe" name="remember" checked>
                                    <label class="form-check-label" for="rememberMe">Beni hatırla</label>
                                </div>
                                <a href="#" class="text-decoration-none">Şifremi unuttum</a>
                            </div>

                            <button type="submit" class="btn btn-primary btn-lg w-100">Giriş Yap</button>
                        </form>
                    </div>
                </div>

                <p class="text-center mt-3 mb-0">
                    Hesabın yok mu?
                    <a href="#" class="text-primary fw-semibold text-decoration-none">Kayıt ol</a>
                </p>
            </div>
        </div>

        {{-- Sağ taraf (Görsel Alanı) --}}
        <div class="col-md-6 d-none d-md-flex align-items-center justify-content-center bg-dark text-white p-0">
            <img src="#" alt="Login görseli" class="img-fluid w-100 h-100 object-fit-cover opacity-75">
            <div class="position-absolute text-center">
                <h2 class="fw-light">Adminkit</h2>
                <p class="text-white-50">Starter Kit</p>
            </div>
        </div>
    </div>
</main>

<script src="/backend/assets/js/app.js"></script>
</body>
</html>
