@extends('app')

@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs">
            <div class="page-header d-flex align-items-center"
                style="background-image: url('assets/portfolio/master bed (3).jpg');">
                <div class="container position-relative">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-6 text-center">
                            <h2 class="animate__animated animate__fadeInDown">Tentang Kami</h2>
                            <p class="animate__animated animate__fadeInUp"> Kami berupaya untuk menjadi solusi tepat dalam
                                memenuhi kebutuhan furniture dan desain interior yang anda idamkan.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- End Breadcrumbs -->

        <!-- ======= About Us Section ======= -->
        <section id="about" class="about mt-5">
            <div class="container" data-aos="fade-up">

                <div class="row gy-4">
                    <div class="col-lg-6 position-relative align-self-start order-lg-last order-first">
                        <img src="{{ asset('assets/portfolio/kamar studio japandi (2).jpg') }}" class="img-fluid"
                            alt="">
                    </div>
                    <div class="col-lg-6 content order-last  order-lg-first">
                        <h3>Wood Mood</h3>
                        <p>
                            WoodMood adalah sebuah perusahaan yang bergerak dibidang jasa pembuatan dan penataan interior.
                            Kami
                            hadir guna mewujudkan impian dan keinginan penataan ruang bagi klien kami. Kami sadar bahwa
                            perkembangan interior saat ini sangat maju, karena interior saat ini bukan hanya dipandang
                            sebagai
                            pelengkap rumah atau bangunan semata, melainkan sudah menjadi unsur penting dalam sebuah
                            bangunan.
                            Penataan ruang yang baik akan menimbulkan kesan nyaman dan indah dalam suatu bangunan, sehingga
                            mendatangkan manfaat bagi penghuninya. Untuk itulah kami hadir guna memenuhi solusi
                            permasalahan interior Anda. Kami memiliki tim yang solid dan berpengalaman dibidangnya untuk
                            memberikan kualitas pelayanan prima bagi pelanggan terbaik kami.
                        </p>
                        <ul>
                            <li data-aos="fade-up" data-aos-delay="100">
                                <i class="bi bi-award"></i>
                                <div>
                                    <h5>Produk Berkualitas</h5>
                                    <p>Kami mengedepankan produk yang berkualitas dengan material terbaik.</p>
                                </div>
                            </li>
                            <li data-aos="fade-up" data-aos-delay="200">
                                <i class="bi bi-house-door-fill"></i>
                                <div>
                                    <h5>Workshop dan Pekerja Berpengalaman</h5>
                                    <p>Kami memiliki workshop sendiri yang dikerjakan tenaga berpengalaman.</p>
                                </div>
                            </li>
                            <li data-aos="fade-up" data-aos-delay="300">
                                <i class="bi bi-headset"></i>
                                <div>
                                    <h5>Gratis Konsultasi</h5>
                                    <p>Kami memberikan konsultasi secara gratis untuk membantu menjawab pertanyaan terkait
                                        kebutuhan anda.</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </section><!-- End About Us Section -->

        <!-- ======= Update logo Section ======= -->
        <section id="features" class="features">
            <div class="container">

                <div class="row gy-4 align-items-center features-item" data-aos="fade-up">

                    <div class="col-md-5">
                        <img src="{{ asset('assets/update logo.jpg') }}" class="img-fluid" alt="">
                    </div>
                    <div class="col-md-7">
                        <h3>Wood Mood</h3>
                        <p class="fst-italic">
                            hadir guna melengkapi properti hunian Anda dengan model furniture custom yang dapat disesuaikan
                            dengan kebutuhan ruang. Tentunya dengan penggunaan material terbaik.
                        </p>
                        <ul>
                            <li><i class="bi bi-check"></i> Furniture yang dapat Lebih Menghemat Ruangan</li>
                            <li><i class="bi bi-check"></i> Furniture yang dapat Menyesuaikan Style atau Gaya dari Furniture
                                Anda</li>
                            <li><i class="bi bi-check"></i> Melalui Furniture Custom Dapat Dengan Bebas Mengekspresikan Diri
                                Anda</li>
                        </ul>
                    </div>
                </div>
        </section><!-- End Update logo Section -->
    </main>
@endsection
