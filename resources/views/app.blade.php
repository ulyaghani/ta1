<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="ghan" />
    <title>Website Wood Mood</title>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/logo.png" />

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />

    <!-- Template Main JS File -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Bootstrap Icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('vendor/animate.css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/glightbox/css/glightbox.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/aos/aos.css" rel="stylesheet') }}">

    <!-- Custom CSS -->
    <style>
        .dropdown-toggle::after {
            display: none;
            /* Menghilangkan ikon tanda dropdown */
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark fixed-top py-3" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#page-top"><img src="assets/logo1.png" alt="" class="img-fluid"></a>
            <a class="navbar-brand" href="#page-top">Wood Mood</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarResponsive">
                <ul class="navbar-nav ms-auto my-2 my-lg-0">
                    <li class="nav-item mt-2"><a class="nav-link" href="{{ url('home') }}">Home</a></li>
                    <li class="nav-item mt-2"><a class="nav-link" href="{{ url('about') }}">About</a></li>
                    <li class="nav-item mt-2"><a class="nav-link" href="{{ url('portfolio') }}">Portfolio</a></li>
                    <li class="nav-item mt-2"><a class="nav-link" href="{{ url('contact') }}">Contact</a></li>
                    @guest
                        <li class="btn nav-item bg-primary rounded"><a class="nav-link bi bi-box-arrow-in-right me-3"
                                href="{{ url('login') }}"> Login</a></li>
                    @endguest
                    @auth
                        @if (in_array(auth()->user()->role, ['user', 'AdminChat', 'SuperAdmin']))
                            <div class="dropdown">
                                <button class="btn btn-primary nav-item" type="button" id="userDropdown"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ auth()->user()->name }}
                                    <i class="bi bi-person-check-fill ms-1 ps-2" style="border-left: 1px solid white;"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="userDropdown">
                                    <li><a class="dropdown-item" href="{{ url('/profile') }}">Profile</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <form action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <button type="submit"
                                                class="dropdown-item bi bi-box-arrow-in-left">Logout</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        @endif
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- Memastikan hanya user yang login bisa melihat chatbox -->
    @if (Auth::check())
        @include('livechat')
    @endif

    <!-- Footer -->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="center">
                        <div class="footer-info">
                            <h3>Wood Mood</h3>
                            <p>
                                Jl. Raya Sendangmulyo 58, Tembalang<br>
                                Semarang, Jawa Tengah, Indonesia 50192<br><br>
                                <strong>No.Telp:</strong> +62877 3136 0366<br>
                                <strong>Email:</strong> order@woodmood.id<br>
                            </p>
                            <div class="social-links mt-3">
                                <a href="https://www.youtube.com/@woodmoodid" target="_blank" rel="nofollow"
                                    class="youtube"><i class="bi bi-youtube"></i></a>
                                <a href="https://woodmood.id/" target="_blank" rel="nofollow" class="globe"><i
                                        class="bi bi-globe"></i></a>
                                <a href="https://www.instagram.com/woodmoodproject/" target="_blank" rel="nofollow"
                                    class="instagram"><i class="bi bi-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>Wood Mood</span></strong>. All Rights Reserved
            </div>
        </div>
    </footer><!-- End Footer -->
    <!-- Template Main JS File -->
    <script src="{{ asset('js/main.js') }}"></script>
    <script>
        function toggleChat() {
            var chatBox = document.getElementById('chat-box');
            if (chatBox.style.display === 'none' || chatBox.style.display === '') {
                chatBox.style.display = 'block';
            } else {
                chatBox.style.display = 'none';
            }
        }
    </script>
</body>

</html>
