<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>T-Navista | @yield('title')</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/vazir-font@32.102.2/dist/font-face.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Custom CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    @stack('styles')
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">T-Navista</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">خانه</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/team') }}">اعضای تیم</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/projects') }}">پروژه‌ها</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/articles') }}">مقالات</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/contact') }}">تماس با ما</a></li>
                    @auth
                        <li class="nav-item">
                            <a class="nav-link panel-icon" href="{{ url('/user/dashboard') }}" title="پنل کاربر">
                                <i class="fas fa-user-circle"></i>
                            </a>
                        </li>
                        @if (Auth::user()->is_admin)
                            <li class="nav-item">
                                <a class="nav-link panel-icon" href="{{ url('/dashboard') }}" title="پنل ادمین">
                                    <i class="fas fa-cog"></i>
                                </a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="logout-button">
                                    <i class="fas fa-sign-out-alt"></i>
                                    خروج
                                </button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item auth-buttons">
                            <a class="nav-link" href="{{ url('/login') }}" title="ورود">
                                <i class="fas fa-door-open"></i>
                            </a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-light mt-5 py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <h5>درباره T-Navista</h5>
                    <p class="text-light">ما در T-Navista با هدف ارائه خدمات نوآورانه در زمینه ناوبری و تکنولوژی‌های پیشرفته فعالیت می‌کنیم.</p>
                </div>
                <div class="col-md-4 mb-3">
                    <h5>دسترسی سریع</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ url('/') }}" class="text-light text-decoration-none">خانه</a></li>
                        <li><a href="{{ url('/team') }}" class="text-light text-decoration-none">اعضای تیم</a></li>
                        <li><a href="{{ url('/projects') }}" class="text-light text-decoration-none">پروژه‌ها</a></li>
                        <li><a href="{{ url('/articles') }}" class="text-light text-decoration-none">مقالات</a></li>
                        <li><a href="{{ url('/contact') }}" class="text-light text-decoration-none">تماس با ما</a></li>
                    </ul>
                </div>
                <div class="col-md-4 mb-3">
                    <h5>تماس با ما</h5>
                    <ul class="list-unstyled text-light">
                        <li><i class="fas fa-phone"></i> تلفن: ۰۲۱-XXXXXXXX</li>
                        <li><i class="fas fa-envelope"></i> ایمیل: info@tnavista.com</li>
                        <li><i class="fas fa-map-marker-alt"></i> آدرس: تهران، ایران</li>
                    </ul>
                    <div class="social-links mt-3">
                        <a href="#" class="text-light me-2"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-light me-2"><i class="fab fa-linkedin"></i></a>
                        <a href="#" class="text-light me-2"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
            </div>
            <hr class="mt-4">
            <div class="text-center">
                <p class="mb-0 text-light">&copy; {{ date('Y') }} T-Navista. تمامی حقوق محفوظ است.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- Custom JS -->
    <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')
</body>
</html>