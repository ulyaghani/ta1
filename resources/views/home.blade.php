@extends('app')

@section('content')
    <!-- Masthead -->
    <header class="masthead">
        <div class="container px-4 px-lg-5 h-100">
            <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-8 align-self-end">
                    <h1 class="text-white font-weight-bold animate__animated animate__fadeInDown">Wood Mood</h1>
                    <hr class="divider" />
                </div>
                <div class="col-lg-8 align-self-baseline">
                    <p class="text-white-75 mb-5 animate__animated animate__fadeInUp">Kami menyediakan berbagai produk
                        furniture berkualitas untuk rumah maupun kantor, furniture apartemen dan hotel, furniture cafe dan
                        furniture untuk berbagai keperluan anda. Dapatkan pengalaman custom furniture terbaik anda di Wood
                        Mood</p>
                    <a class="btn btn-dark btn-xl animate__animated animate__fadeInUp" href="#about">Selengkapnya</a>
                </div>
            </div>
        </div>
    </header>

    <!-- Tentang -->
    <section class="page-section bg-dark" id="about">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="text-white mt-0 animate__animated animate__fadeInDown">Kami Hadir Untuk Wujudkan Furniture
                        Impian Anda!</h2>
                    <hr class="divider divider-light" />
                    <p class="text-white-75 mb-4 animate__animated animate__fadeInUp">Konsultasi GRATIS mulai dari desain
                        hingga material sesuai spesifikasi furnitur yang Anda inginkan. Tenaga kerja profesional dan
                        desainer berpengalaman kami dapat menjadi solusi, Ketika anda bimbang membuat furniture custom
                        terbaik dengan ide yang lebih tepat dan sesuai harapan.</p>
                    <a class="btn btn-light btn-xl animate__animated animate__fadeInUp" href="#services">Layanan Kami</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Layanan -->
    <section class="page-section" id="services">
        <div class="container px-4 px-lg-5">
            <h2 class="text-center mt-0 animate__animated animate__fadeInDown">Layanan</h2>
            <hr class="divider" />
            <div class="row gx-4 gx-lg-5">
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <div class="mb-2"><i class="bi bi-headset fs-1 text-dark"></i></div>
                        <h3 class="h4 mb-2">Konsultasi GRATIS</h3>
                        <p class="text-muted mb-0">Konsultasikan kebutuhan dan konsep furniture-interior impian anda kepada
                            kami</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <div class="mb-2"><i class="bi bi-laptop fs-1 text-dark"></i></div>
                        <h3 class="h4 mb-2">Desain 3D</h3>
                        <p class="text-muted mb-0">Desainer kami akan membantu anda menciptakan furniture-interior dengan
                            ide dan konsep terbaik</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <div class="mb-2"><i class="bi bi-bar-chart fs-1 text-dark"></i></div>
                        <h3 class="h4 mb-2">Anggaran Biaya</h3>
                        <p class="text-muted mb-0">Kami akan rencanakan dan anggarkan furniture-interior anda dengan harga
                            terbaik</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <div class="mb-2"><i class="bi bi-hammer fs-1 text-dark"></i></div>
                        <h3 class="h4 mb-2">Instalasi</h3>
                        <p class="text-muted mb-0">Kami Instalasi furniture dan interior anda hingga selesai</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio -->
    <section id="portfolio">
        <div class="container-fluid p-0">
            <div class="row g-0">
                @foreach ([['src' => 'beauty clinic.jpg', 'title' => 'Beauty Clinic'], ['src' => 'kamar japandi (1).jpg', 'title' => 'Japan Bed Room'], ['src' => 'master bed (1).jpg', 'title' => 'Master Bed'], ['src' => 'dapur.jpg', 'title' => 'Kitchen'], ['src' => 'mushola 1.jpg', 'title' => 'Mushola'], ['src' => 'master bed 2 (5).jpg', 'title' => 'Master Bed']] as $index => $project)
                    <div class="col-lg-4 col-sm-6">
                        <!-- Menampilkan thumbnail gambar -->
                        <a class="portfolio-box" href="#gambar-{{ $index + 1 }}">
                            <img class="img-fluid" src="{{ asset('assets/portfolio/' . $project['src']) }}"
                                alt="{{ $project['title'] }}" />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">Project</div>
                                <div class="project-name">{{ $project['title'] }}</div>
                            </div>
                        </a>
                        <!-- Menampilkan popup gambar -->
                        <div class="overlay" id="gambar-{{ $index + 1 }}">
                            <a href="#portfolio" class="close">
                                <svg style="width:50px;height:50px" viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M12,20C7.59,20 4,16.41 4,12C4,7.59 7.59,4 12,4C16.41,4 20,7.59 20,12C20,16.41 16.41,20 12,20M12,2C6.47,2 2,6.47 2,12C2,17.53 6.47,22 12,22C17.53,22 22,17.53 22,12C22,6.47 17.53,2 12,2M14.59,8L12,10.59L9.41,8L8,9.41L10.59,12L8,14.59L9.41,16L12,13.41L14.59,16L16,14.59L13.41,12L16,9.41L14.59,8Z" />
                                </svg>
                            </a>
                            <img src="{{ asset('assets/portfolio/' . $project['src']) }}" alt="{{ $project['title'] }}">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Furniture? -->
    <section class="page-section bg-dark text-white">
        <div class="container px-4 px-lg-5 text-center">
            <h2 class="mb-4">Furniture Apa Yang Kami Buat?</h2>
            <hr class="divider divider-light" />
            <p class="text-white mb-0">Kami dapat membuat berbagai macam Furniture mulai dari kebutuhan Kantor, Apartemen,
                serta Rumah. Antara lain Meja Kantor, Partisi Ruangan, Meja Kursi Cafe, Kitchen Set, Lemari Minimalis, Rak &
                Backdrop TV, Lemari Bawah Tangga serta Sofa Ruang Tamu.</p>
        </div>
    </section>

    <!-- Tentang Wood Mood -->
    <section id="features" class="features">
        <div class="container">
            <div class="row gy-4 align-items-center features-item" data-aos="fade-up">
                <div class="col-md-5">
                    <img src="{{ asset('assets/update logo.jpg') }}" class="img-fluid" alt="Wood Mood Logo">
                </div>
                <div class="col-md-7">
                    <h3>Wood Mood</h3>
                    <p class="fst-italic">Hadir guna melengkapi properti hunian Anda dengan model furniture custom yang
                        dapat disesuaikan dengan kebutuhan ruang. Tentunya dengan penggunaan material terbaik.</p>
                    <ul>
                        <li><i class="bi bi-check"></i> Furniture yang dapat Lebih Menghemat Ruangan</li>
                        <li><i class="bi bi-check"></i> Furniture yang dapat Menyesuaikan Style atau Gaya dari Furniture
                            Anda</li>
                        <li><i class="bi bi-check"></i> Melalui Furniture Custom Dapat Dengan Bebas Mengekspresikan Ide
                            Anda.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection
