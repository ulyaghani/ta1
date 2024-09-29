@extends('app')

@section('content')
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="page-header d-flex align-items-center"
            style="background-image: url('assets/portfolio/master bed (3).jpg');">
            <div class="container position-relative">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h2 class="animate__animated animate__fadeInDown">PORTFOLIO</h2>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- End Breadcrumbs -->

    <main id="main" data-aos="fade" data-aos-delay="1500">

        <!-- ======= End Page Header ======= -->
        <div class="page-header d-flex align-items-center mt-5">
            <div class="container position-relative">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h1>Wood Mood</h1>
                        <p>Selalu berupaya menghadirkan desain yang menarik sesuai dengan kebutuhan anda dengan menggunakan
                            material terbaik</p>
                    </div>
                </div>
            </div>
        </div><!-- End Page Header -->

        <!-- ======= Gallery Section ======= -->
        <section id="gallery" class="gallery">
            <div class="container-fluid">
                <div class="row gy-4 justify-content-center">
                    @foreach ($products as $product)
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="gallery-item h-100">
                                <!-- Thumbnail image -->
                                <a class="portfolio-box" href="javascript:void(0);" data-bs-toggle="modal"
                                    data-bs-target="#productModal-{{ $product->product_id }}">
                                    <div class="img-container">
                                        @if ($product->picture)
                                            <img class="img-fluid w-100" style="height: 250px; object-fit: cover;"
                                                src="{{ asset('storage/' . $product->picture) }}"
                                                alt="{{ $product->product_name }}" />
                                        @endif
                                    </div>
                                </a>
                            </div>
                        </div><!-- End Gallery Item -->

                        <!-- Modal -->
                        <div class="modal fade" id="productModal-{{ $product->product_id }}" tabindex="-1"
                            aria-labelledby="productModalLabel-{{ $product->product_id }}" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="productModalLabel-{{ $product->product_id }}">
                                            {{ $product->product_name }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body d-flex">
                                        <div class="col-9">
                                            @if ($product->picture)
                                                <img class="img-fluid" src="{{ asset('storage/' . $product->picture) }}"
                                                    alt="{{ $product->product_name }}"
                                                    style="object-fit: cover; height: 100%; width: 100%;">
                                            @endif
                                        </div>
                                        <div class="col-3 ms-2">
                                            <ul>
                                                @foreach (explode("\n", $product->spesification) as $line)
                                                    <li>{{ $line }}</li>
                                                @endforeach
                                            </ul>
                                            <p><strong>Price:</strong> ${{ $product->price }}</p>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <p>Apakah anda tertarik? </p>
                                        <a href="#konsultasi" class="btn btn-primary float-end">Konsultasi Sekarang</a>
                                        <!-- Konsultasi button -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section><!-- End Gallery Section -->

        {{-- <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="gallery-item h-100">
                                <!-- Menampilkan thumbnail gambar -->
                                <a class="portfolio-box" href="#gambar-11">
                                    <img class="img-fluid" src="{{ asset('assets/portfolio/dapur.jpg') }}"
                                        alt="..." />
                                </a>
                                <!-- Menampilkan popup gambar -->
                                <div class="overlay" id="gambar-11">
                                    <a href="#gallery" class="close">
                                        <svg style="width:50px;height:50px" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M12,20C7.59,20 4,16.41 4,12C4,7.59 7.59,4 12,4C16.41,4 20,7.59 20,12C20,16.41 16.41,20 12,20M12,2C6.47,2 2,6.47 2,12C2,17.53 6.47,22 12,22C17.53,22 22,17.53 22,12C22,6.47 17.53,2 12,2M14.59,8L12,10.59L9.41,8L8,9.41L10.59,12L8,14.59L9.41,16L12,13.41L14.59,16L16,14.59L13.41,12L16,9.41L14.59,8Z" />
                                        </svg>
                                    </a>
                                    <img src="{{ asset('assets/portfolio/dapur.jpg') }}" alt="...">
                                </div>
                            </div>
                        </div><!-- End Gallery Item -->
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="gallery-item h-100">
                                <!-- Menampilkan thumbnail gambar -->
                                <a class="portfolio-box" href="#gambar-12">
                                    <img class="img-fluid" src="{{ asset('assets/portfolio/kamar japandi (1).jpg') }}"
                                        alt="..." />
                                </a>
                                <!-- Menampilkan popup gambar -->
                                <div class="overlay" id="gambar-12">
                                    <a href="#gallery" class="close">
                                        <svg style="width:50px;height:50px" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M12,20C7.59,20 4,16.41 4,12C4,7.59 7.59,4 12,4C16.41,4 20,7.59 20,12C20,16.41 16.41,20 12,20M12,2C6.47,2 2,6.47 2,12C2,17.53 6.47,22 12,22C17.53,22 22,17.53 22,12C22,6.47 17.53,2 12,2M14.59,8L12,10.59L9.41,8L8,9.41L10.59,12L8,14.59L9.41,16L12,13.41L14.59,16L16,14.59L13.41,12L16,9.41L14.59,8Z" />
                                        </svg>
                                    </a>
                                    <img src="{{ asset('assets/portfolio/kamar japandi (1).jpg') }}" alt="...">
                                </div>
                            </div>
                        </div><!-- End Gallery Item -->
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="gallery-item h-100">
                                <!-- Menampilkan thumbnail gambar -->
                                <a class="portfolio-box" href="#gambar-13">
                                    <img class="img-fluid" src="{{ asset('assets/portfolio/kamar japandi (2).jpg') }}"
                                        alt="..." />
                                </a>
                                <!-- Menampilkan popup gambar -->
                                <div class="overlay" id="gambar-13">
                                    <a href="#gallery" class="close">
                                        <svg style="width:50px;height:50px" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M12,20C7.59,20 4,16.41 4,12C4,7.59 7.59,4 12,4C16.41,4 20,7.59 20,12C20,16.41 16.41,20 12,20M12,2C6.47,2 2,6.47 2,12C2,17.53 6.47,22 12,22C17.53,22 22,17.53 22,12C22,6.47 17.53,2 12,2M14.59,8L12,10.59L9.41,8L8,9.41L10.59,12L8,14.59L9.41,16L12,13.41L14.59,16L16,14.59L13.41,12L16,9.41L14.59,8Z" />
                                        </svg>
                                    </a>
                                    <img src="{{ asset('assets/portfolio/kamar japandi (2).jpg') }}" alt="...">
                                </div>
                            </div>
                        </div><!-- End Gallery Item -->
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="gallery-item h-100">
                                <!-- Menampilkan thumbnail gambar -->
                                <a class="portfolio-box" href="#gambar-14">
                                    <img class="img-fluid" src="{{ asset('assets/portfolio/kamar japandi (3).jpg') }}"
                                        alt="..." />
                                </a>
                                <!-- Menampilkan popup gambar -->
                                <div class="overlay" id="gambar-14">
                                    <a href="#gallery" class="close">
                                        <svg style="width:50px;height:50px" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M12,20C7.59,20 4,16.41 4,12C4,7.59 7.59,4 12,4C16.41,4 20,7.59 20,12C20,16.41 16.41,20 12,20M12,2C6.47,2 2,6.47 2,12C2,17.53 6.47,22 12,22C17.53,22 22,17.53 22,12C22,6.47 17.53,2 12,2M14.59,8L12,10.59L9.41,8L8,9.41L10.59,12L8,14.59L9.41,16L12,13.41L14.59,16L16,14.59L13.41,12L16,9.41L14.59,8Z" />
                                        </svg>
                                    </a>
                                    <img src="{{ asset('assets/portfolio/kamar japandi (3).jpg') }}" alt="...">
                                </div>
                            </div>
                        </div><!-- End Gallery Item -->
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="gallery-item h-100">
                                <!-- Menampilkan thumbnail gambar -->
                                <a class="portfolio-box" href="#gambar-15">
                                    <img class="img-fluid" src="{{ asset('assets/portfolio/kamar japandi (4).jpg') }}"
                                        alt="..." />
                                </a>
                                <!-- Menampilkan popup gambar -->
                                <div class="overlay" id="gambar-15">
                                    <a href="#gallery" class="close">
                                        <svg style="width:50px;height:50px" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M12,20C7.59,20 4,16.41 4,12C4,7.59 7.59,4 12,4C16.41,4 20,7.59 20,12C20,16.41 16.41,20 12,20M12,2C6.47,2 2,6.47 2,12C2,17.53 6.47,22 12,22C17.53,22 22,17.53 22,12C22,6.47 17.53,2 12,2M14.59,8L12,10.59L9.41,8L8,9.41L10.59,12L8,14.59L9.41,16L12,13.41L14.59,16L16,14.59L13.41,12L16,9.41L14.59,8Z" />
                                        </svg>
                                    </a>
                                    <img src="{{ asset('assets/portfolio/kamar japandi (4).jpg') }}" alt="...">
                                </div>
                            </div>
                        </div><!-- End Gallery Item -->
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="gallery-item h-100">
                                <!-- Menampilkan thumbnail gambar -->
                                <a class="portfolio-box" href="#gambar-16">
                                    <img class="img-fluid" src="{{ asset('assets/portfolio/kamar japandi (5).jpg') }}"
                                        alt="..." />
                                </a>
                                <!-- Menampilkan popup gambar -->
                                <div class="overlay" id="gambar-16">
                                    <a href="#gallery" class="close">
                                        <svg style="width:50px;height:50px" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M12,20C7.59,20 4,16.41 4,12C4,7.59 7.59,4 12,4C16.41,4 20,7.59 20,12C20,16.41 16.41,20 12,20M12,2C6.47,2 2,6.47 2,12C2,17.53 6.47,22 12,22C17.53,22 22,17.53 22,12C22,6.47 17.53,2 12,2M14.59,8L12,10.59L9.41,8L8,9.41L10.59,12L8,14.59L9.41,16L12,13.41L14.59,16L16,14.59L13.41,12L16,9.41L14.59,8Z" />
                                        </svg>
                                    </a>
                                    <img src="{{ asset('assets/portfolio/kamar japandi (5).jpg') }}" alt="...">
                                </div>
                            </div>
                        </div><!-- End Gallery Item -->
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="gallery-item h-100">
                                <!-- Menampilkan thumbnail gambar -->
                                <a class="portfolio-box" href="#gambar-17">
                                    <img class="img-fluid" src="{{ asset('assets/portfolio/master bed (1).jpg') }}"
                                        alt="..." />
                                </a>
                                <!-- Menampilkan popup gambar -->
                                <div class="overlay" id="gambar-17">
                                    <a href="#gallery" class="close">
                                        <svg style="width:50px;height:50px" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M12,20C7.59,20 4,16.41 4,12C4,7.59 7.59,4 12,4C16.41,4 20,7.59 20,12C20,16.41 16.41,20 12,20M12,2C6.47,2 2,6.47 2,12C2,17.53 6.47,22 12,22C17.53,22 22,17.53 22,12C22,6.47 17.53,2 12,2M14.59,8L12,10.59L9.41,8L8,9.41L10.59,12L8,14.59L9.41,16L12,13.41L14.59,16L16,14.59L13.41,12L16,9.41L14.59,8Z" />
                                        </svg>
                                    </a>
                                    <img src="{{ asset('assets/portfolio/master bed (1).jpg') }}" alt="...">
                                </div>
                            </div>
                        </div><!-- End Gallery Item -->
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="gallery-item h-100">
                                <!-- Menampilkan thumbnail gambar -->
                                <a class="portfolio-box" href="#gambar-18">
                                    <img class="img-fluid"
                                        src="{{ asset('assets/portfolio/kamar studio japandi (2).jpg') }}"
                                        alt="..." />
                                </a>
                                <!-- Menampilkan popup gambar -->
                                <div class="overlay" id="gambar-18">
                                    <a href="#gallery" class="close">
                                        <svg style="width:50px;height:50px" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M12,20C7.59,20 4,16.41 4,12C4,7.59 7.59,4 12,4C16.41,4 20,7.59 20,12C20,16.41 16.41,20 12,20M12,2C6.47,2 2,6.47 2,12C2,17.53 6.47,22 12,22C17.53,22 22,17.53 22,12C22,6.47 17.53,2 12,2M14.59,8L12,10.59L9.41,8L8,9.41L10.59,12L8,14.59L9.41,16L12,13.41L14.59,16L16,14.59L13.41,12L16,9.41L14.59,8Z" />
                                        </svg>
                                    </a>
                                    <img src="{{ asset('assets/portfolio/kamar studio japandi (2).jpg') }}"
                                        alt="...">
                                </div>
                            </div>
                        </div><!-- End Gallery Item -->
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="gallery-item h-100">
                                <!-- Menampilkan thumbnail gambar -->
                                <a class="portfolio-box" href="#gambar-19">
                                    <img class="img-fluid"
                                        src="{{ asset('assets/portfolio/kamar studio japandi (3).jpg') }}"
                                        alt="..." />
                                </a>
                                <!-- Menampilkan popup gambar -->
                                <div class="overlay" id="gambar-19">
                                    <a href="#gallery" class="close">
                                        <svg style="width:50px;height:50px" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M12,20C7.59,20 4,16.41 4,12C4,7.59 7.59,4 12,4C16.41,4 20,7.59 20,12C20,16.41 16.41,20 12,20M12,2C6.47,2 2,6.47 2,12C2,17.53 6.47,22 12,22C17.53,22 22,17.53 22,12C22,6.47 17.53,2 12,2M14.59,8L12,10.59L9.41,8L8,9.41L10.59,12L8,14.59L9.41,16L12,13.41L14.59,16L16,14.59L13.41,12L16,9.41L14.59,8Z" />
                                        </svg>
                                    </a>
                                    <img src="{{ asset('assets/portfolio/kamar studio japandi (3).jpg') }}"
                                        alt="...">
                                </div>
                            </div>
                        </div><!-- End Gallery Item -->
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="gallery-item h-100">
                                <!-- Menampilkan thumbnail gambar -->
                                <a class="portfolio-box" href="#gambar-20">
                                    <img class="img-fluid"
                                        src="{{ asset('assets/portfolio/kamar studio japandi (4).jpg') }}"
                                        alt="..." />
                                </a>
                                <!-- Menampilkan popup gambar -->
                                <div class="overlay" id="gambar-20">
                                    <a href="#gallery" class="close">
                                        <svg style="width:50px;height:50px" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M12,20C7.59,20 4,16.41 4,12C4,7.59 7.59,4 12,4C16.41,4 20,7.59 20,12C20,16.41 16.41,20 12,20M12,2C6.47,2 2,6.47 2,12C2,17.53 6.47,22 12,22C17.53,22 22,17.53 22,12C22,6.47 17.53,2 12,2M14.59,8L12,10.59L9.41,8L8,9.41L10.59,12L8,14.59L9.41,16L12,13.41L14.59,16L16,14.59L13.41,12L16,9.41L14.59,8Z" />
                                        </svg>
                                    </a>
                                    <img src="{{ asset('assets/portfolio/kamar studio japandi (4).jpg') }}"
                                        alt="...">
                                </div>
                            </div>
                        </div><!-- End Gallery Item -->
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="gallery-item h-100">
                                <!-- Menampilkan thumbnail gambar -->
                                <a class="portfolio-box" href="#gambar-21">
                                    <img class="img-fluid"
                                        src="{{ asset('assets/portfolio/kamar studio japandi (1).jpg') }}"
                                        alt="..." />
                                </a>
                                <!-- Menampilkan popup gambar -->
                                <div class="overlay" id="gambar-21">
                                    <a href="#gallery" class="close">
                                        <svg style="width:50px;height:50px" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M12,20C7.59,20 4,16.41 4,12C4,7.59 7.59,4 12,4C16.41,4 20,7.59 20,12C20,16.41 16.41,20 12,20M12,2C6.47,2 2,6.47 2,12C2,17.53 6.47,22 12,22C17.53,22 22,17.53 22,12C22,6.47 17.53,2 12,2M14.59,8L12,10.59L9.41,8L8,9.41L10.59,12L8,14.59L9.41,16L12,13.41L14.59,16L16,14.59L13.41,12L16,9.41L14.59,8Z" />
                                        </svg>
                                    </a>
                                    <img src="{{ asset('assets/portfolio/kamar studio japandi (1).jpg') }}"
                                        alt="...">
                                </div>
                            </div>
                        </div><!-- End Gallery Item -->
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="gallery-item h-100">
                                <!-- Menampilkan thumbnail gambar -->
                                <a class="portfolio-box" href="#gambar-22">
                                    <img class="img-fluid" src="{{ asset('assets/portfolio/master bed (2).jpg') }}"
                                        alt="..." />
                                </a>
                                <!-- Menampilkan popup gambar -->
                                <div class="overlay" id="gambar-22">
                                    <a href="#gallery" class="close">
                                        <svg style="width:50px;height:50px" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M12,20C7.59,20 4,16.41 4,12C4,7.59 7.59,4 12,4C16.41,4 20,7.59 20,12C20,16.41 16.41,20 12,20M12,2C6.47,2 2,6.47 2,12C2,17.53 6.47,22 12,22C17.53,22 22,17.53 22,12C22,6.47 17.53,2 12,2M14.59,8L12,10.59L9.41,8L8,9.41L10.59,12L8,14.59L9.41,16L12,13.41L14.59,16L16,14.59L13.41,12L16,9.41L14.59,8Z" />
                                        </svg>
                                    </a>
                                    <img src="{{ asset('assets/portfolio/master bed (2).jpg') }}" alt="...">
                                </div>
                            </div>
                        </div><!-- End Gallery Item -->
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="gallery-item h-100">
                                <!-- Menampilkan thumbnail gambar -->
                                <a class="portfolio-box" href="#gambar-23">
                                    <img class="img-fluid" src="{{ asset('assets/portfolio/master bed (3).jpg') }}"
                                        alt="..." />
                                </a>
                                <!-- Menampilkan popup gambar -->
                                <div class="overlay" id="gambar-23">
                                    <a href="#gallery" class="close">
                                        <svg style="width:50px;height:50px" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M12,20C7.59,20 4,16.41 4,12C4,7.59 7.59,4 12,4C16.41,4 20,7.59 20,12C20,16.41 16.41,20 12,20M12,2C6.47,2 2,6.47 2,12C2,17.53 6.47,22 12,22C17.53,22 22,17.53 22,12C22,6.47 17.53,2 12,2M14.59,8L12,10.59L9.41,8L8,9.41L10.59,12L8,14.59L9.41,16L12,13.41L14.59,16L16,14.59L13.41,12L16,9.41L14.59,8Z" />
                                        </svg>
                                    </a>
                                    <img src="{{ asset('assets/portfolio/master bed (3).jpg') }}" alt="...">
                                </div>
                            </div>
                        </div><!-- End Gallery Item -->
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="gallery-item h-100">
                                <!-- Menampilkan thumbnail gambar -->
                                <a class="portfolio-box" href="#gambar-24">
                                    <img class="img-fluid" src="{{ asset('assets/portfolio/master bed (4).jpg') }}"
                                        alt="..." />
                                </a>
                                <!-- Menampilkan popup gambar -->
                                <div class="overlay" id="gambar-24">
                                    <a href="#gallery" class="close">
                                        <svg style="width:50px;height:50px" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M12,20C7.59,20 4,16.41 4,12C4,7.59 7.59,4 12,4C16.41,4 20,7.59 20,12C20,16.41 16.41,20 12,20M12,2C6.47,2 2,6.47 2,12C2,17.53 6.47,22 12,22C17.53,22 22,17.53 22,12C22,6.47 17.53,2 12,2M14.59,8L12,10.59L9.41,8L8,9.41L10.59,12L8,14.59L9.41,16L12,13.41L14.59,16L16,14.59L13.41,12L16,9.41L14.59,8Z" />
                                        </svg>
                                    </a>
                                    <img src="{{ asset('assets/portfolio/master bed (4).jpg') }}" alt="...">
                                </div>
                            </div>
                        </div><!-- End Gallery Item -->
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="gallery-item h-100">
                                <!-- Menampilkan thumbnail gambar -->
                                <a class="portfolio-box" href="#gambar-25">
                                    <img class="img-fluid" src="{{ asset('assets/portfolio/master bed 2 (1).jpg') }}"
                                        alt="..." />
                                </a>
                                <!-- Menampilkan popup gambar -->
                                <div class="overlay" id="gambar-25">
                                    <a href="#gallery" class="close">
                                        <svg style="width:50px;height:50px" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M12,20C7.59,20 4,16.41 4,12C4,7.59 7.59,4 12,4C16.41,4 20,7.59 20,12C20,16.41 16.41,20 12,20M12,2C6.47,2 2,6.47 2,12C2,17.53 6.47,22 12,22C17.53,22 22,17.53 22,12C22,6.47 17.53,2 12,2M14.59,8L12,10.59L9.41,8L8,9.41L10.59,12L8,14.59L9.41,16L12,13.41L14.59,16L16,14.59L13.41,12L16,9.41L14.59,8Z" />
                                        </svg>
                                    </a>
                                    <img src="{{ asset('assets/portfolio/master bed 2 (1).jpg') }}" alt="...">
                                </div>
                            </div>
                        </div><!-- End Gallery Item -->
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="gallery-item h-100">
                                <!-- Menampilkan thumbnail gambar -->
                                <a class="portfolio-box" href="#gambar-26">
                                    <img class="img-fluid" src="{{ asset('assets/portfolio/master bed 2 (3).jpg') }}"
                                        alt="..." />
                                </a>
                                <!-- Menampilkan popup gambar -->
                                <div class="overlay" id="gambar-26">
                                    <a href="#gallery" class="close">
                                        <svg style="width:50px;height:50px" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M12,20C7.59,20 4,16.41 4,12C4,7.59 7.59,4 12,4C16.41,4 20,7.59 20,12C20,16.41 16.41,20 12,20M12,2C6.47,2 2,6.47 2,12C2,17.53 6.47,22 12,22C17.53,22 22,17.53 22,12C22,6.47 17.53,2 12,2M14.59,8L12,10.59L9.41,8L8,9.41L10.59,12L8,14.59L9.41,16L12,13.41L14.59,16L16,14.59L13.41,12L16,9.41L14.59,8Z" />
                                        </svg>
                                    </a>
                                    <img src="{{ asset('assets/portfolio/master bed 2 (3).jpg') }}" alt="...">
                                </div>
                            </div>
                        </div><!-- End Gallery Item -->
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="gallery-item h-100">
                                <!-- Menampilkan thumbnail gambar -->
                                <a class="portfolio-box" href="#gambar-27">
                                    <img class="img-fluid" src="{{ asset('assets/portfolio/master bed 2 (4).jpg') }}"
                                        alt="..." />
                                </a>
                                <!-- Menampilkan popup gambar -->
                                <div class="overlay" id="gambar-27">
                                    <a href="#gallery" class="close">
                                        <svg style="width:50px;height:50px" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M12,20C7.59,20 4,16.41 4,12C4,7.59 7.59,4 12,4C16.41,4 20,7.59 20,12C20,16.41 16.41,20 12,20M12,2C6.47,2 2,6.47 2,12C2,17.53 6.47,22 12,22C17.53,22 22,17.53 22,12C22,6.47 17.53,2 12,2M14.59,8L12,10.59L9.41,8L8,9.41L10.59,12L8,14.59L9.41,16L12,13.41L14.59,16L16,14.59L13.41,12L16,9.41L14.59,8Z" />
                                        </svg>
                                    </a>
                                    <img src="{{ asset('assets/portfolio/master bed 2 (4).jpg') }}" alt="...">
                                </div>
                            </div>
                        </div><!-- End Gallery Item -->
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="gallery-item h-100">
                                <!-- Menampilkan thumbnail gambar -->
                                <a class="portfolio-box" href="#gambar-28">
                                    <img class="img-fluid" src="{{ asset('assets/portfolio/master bed 2 (5).jpg') }}"
                                        alt="..." />
                                </a>
                                <!-- Menampilkan popup gambar -->
                                <div class="overlay" id="gambar-28">
                                    <a href="#gallery" class="close">
                                        <svg style="width:50px;height:50px" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M12,20C7.59,20 4,16.41 4,12C4,7.59 7.59,4 12,4C16.41,4 20,7.59 20,12C20,16.41 16.41,20 12,20M12,2C6.47,2 2,6.47 2,12C2,17.53 6.47,22 12,22C17.53,22 22,17.53 22,12C22,6.47 17.53,2 12,2M14.59,8L12,10.59L9.41,8L8,9.41L10.59,12L8,14.59L9.41,16L12,13.41L14.59,16L16,14.59L13.41,12L16,9.41L14.59,8Z" />
                                        </svg>
                                    </a>
                                    <img src="{{ asset('assets/portfolio/master bed 2 (5).jpg') }}" alt="...">
                                </div>
                            </div>
                        </div><!-- End Gallery Item -->
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="gallery-item h-100">
                                <!-- Menampilkan thumbnail gambar -->
                                <a class="portfolio-box" href="#gambar-29">
                                    <img class="img-fluid" src="{{ asset('assets/portfolio/mushola 1.jpg') }}"
                                        alt="..." />
                                </a>
                                <!-- Menampilkan popup gambar -->
                                <div class="overlay" id="gambar-29">
                                    <a href="#gallery" class="close">
                                        <svg style="width:50px;height:50px" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M12,20C7.59,20 4,16.41 4,12C4,7.59 7.59,4 12,4C16.41,4 20,7.59 20,12C20,16.41 16.41,20 12,20M12,2C6.47,2 2,6.47 2,12C2,17.53 6.47,22 12,22C17.53,22 22,17.53 22,12C22,6.47 17.53,2 12,2M14.59,8L12,10.59L9.41,8L8,9.41L10.59,12L8,14.59L9.41,16L12,13.41L14.59,16L16,14.59L13.41,12L16,9.41L14.59,8Z" />
                                        </svg>
                                    </a>
                                    <img src="{{ asset('assets/portfolio/mushola 1.jpg') }}" alt="...">
                                </div>
                            </div>
                        </div><!-- End Gallery Item -->
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="gallery-item h-100">
                                <!-- Menampilkan thumbnail gambar -->
                                <a class="portfolio-box" href="#gambar-30">
                                    <img class="img-fluid" src="{{ asset('assets/portfolio/ruang direksi (1).jpg') }}"
                                        alt="..." />
                                </a>
                                <!-- Menampilkan popup gambar -->
                                <div class="overlay" id="gambar-30">
                                    <a href="#gallery" class="close">
                                        <svg style="width:50px;height:50px" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M12,20C7.59,20 4,16.41 4,12C4,7.59 7.59,4 12,4C16.41,4 20,7.59 20,12C20,16.41 16.41,20 12,20M12,2C6.47,2 2,6.47 2,12C2,17.53 6.47,22 12,22C17.53,22 22,17.53 22,12C22,6.47 17.53,2 12,2M14.59,8L12,10.59L9.41,8L8,9.41L10.59,12L8,14.59L9.41,16L12,13.41L14.59,16L16,14.59L13.41,12L16,9.41L14.59,8Z" />
                                        </svg>
                                    </a>
                                    <img src="{{ asset('assets/portfolio/ruang direksi (1).jpg') }}" alt="...">
                                </div>
                            </div>
                        </div><!-- End Gallery Item -->
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="gallery-item h-100">
                                <!-- Menampilkan thumbnail gambar -->
                                <a class="portfolio-box" href="#gambar-31">
                                    <img class="img-fluid" src="{{ asset('assets/portfolio/ruang direksi (2).jpg') }}"
                                        alt="..." />
                                </a>
                                <!-- Menampilkan popup gambar -->
                                <div class="overlay" id="gambar-31">
                                    <a href="#gallery" class="close">
                                        <svg style="width:50px;height:50px" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M12,20C7.59,20 4,16.41 4,12C4,7.59 7.59,4 12,4C16.41,4 20,7.59 20,12C20,16.41 16.41,20 12,20M12,2C6.47,2 2,6.47 2,12C2,17.53 6.47,22 12,22C17.53,22 22,17.53 22,12C22,6.47 17.53,2 12,2M14.59,8L12,10.59L9.41,8L8,9.41L10.59,12L8,14.59L9.41,16L12,13.41L14.59,16L16,14.59L13.41,12L16,9.41L14.59,8Z" />
                                        </svg>
                                    </a>
                                    <img src="{{ asset('assets/portfolio/ruang direksi (2).jpg') }}" alt="...">
                                </div>
                            </div>
                        </div><!-- End Gallery Item -->
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="gallery-item h-100">
                                <!-- Menampilkan thumbnail gambar -->
                                <a class="portfolio-box" href="#gambar-32">
                                    <img class="img-fluid"
                                        src="{{ asset('assets/portfolio/showroom bio paint (1).jpg') }}"
                                        alt="..." />
                                </a>
                                <!-- Menampilkan popup gambar -->
                                <div class="overlay" id="gambar-32">
                                    <a href="#gallery" class="close">
                                        <svg style="width:50px;height:50px" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M12,20C7.59,20 4,16.41 4,12C4,7.59 7.59,4 12,4C16.41,4 20,7.59 20,12C20,16.41 16.41,20 12,20M12,2C6.47,2 2,6.47 2,12C2,17.53 6.47,22 12,22C17.53,22 22,17.53 22,12C22,6.47 17.53,2 12,2M14.59,8L12,10.59L9.41,8L8,9.41L10.59,12L8,14.59L9.41,16L12,13.41L14.59,16L16,14.59L13.41,12L16,9.41L14.59,8Z" />
                                        </svg>
                                    </a>
                                    <img src="{{ asset('assets/portfolio/showroom bio paint (1).jpg') }}" alt="...">
                                </div>
                            </div>
                        </div><!-- End Gallery Item -->
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="gallery-item h-100">
                                <!-- Menampilkan thumbnail gambar -->
                                <a class="portfolio-box" href="#gambar-33">
                                    <img class="img-fluid"
                                        src="{{ asset('assets/portfolio/showroom bio paint (3).jpg') }}"
                                        alt="..." />
                                </a>
                                <!-- Menampilkan popup gambar -->
                                <div class="overlay" id="gambar-33">
                                    <a href="#gallery" class="close">
                                        <svg style="width:50px;height:50px" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M12,20C7.59,20 4,16.41 4,12C4,7.59 7.59,4 12,4C16.41,4 20,7.59 20,12C20,16.41 16.41,20 12,20M12,2C6.47,2 2,6.47 2,12C2,17.53 6.47,22 12,22C17.53,22 22,17.53 22,12C22,6.47 17.53,2 12,2M14.59,8L12,10.59L9.41,8L8,9.41L10.59,12L8,14.59L9.41,16L12,13.41L14.59,16L16,14.59L13.41,12L16,9.41L14.59,8Z" />
                                        </svg>
                                    </a>
                                    <img src="{{ asset('assets/portfolio/showroom bio paint (3).jpg') }}" alt="...">
                                </div>
                            </div>
                        </div><!-- End Gallery Item -->
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="gallery-item h-100">
                                <!-- Menampilkan thumbnail gambar -->
                                <a class="portfolio-box" href="#gambar-34">
                                    <img class="img-fluid" src="{{ asset('assets/portfolio/ruang majelis.jpg') }}"
                                        alt="..." />
                                </a>
                                <!-- Menampilkan popup gambar -->
                                <div class="overlay" id="gambar-34">
                                    <a href="#gallery" class="close">
                                        <svg style="width:50px;height:50px" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M12,20C7.59,20 4,16.41 4,12C4,7.59 7.59,4 12,4C16.41,4 20,7.59 20,12C20,16.41 16.41,20 12,20M12,2C6.47,2 2,6.47 2,12C2,17.53 6.47,22 12,22C17.53,22 22,17.53 22,12C22,6.47 17.53,2 12,2M14.59,8L12,10.59L9.41,8L8,9.41L10.59,12L8,14.59L9.41,16L12,13.41L14.59,16L16,14.59L13.41,12L16,9.41L14.59,8Z" />
                                        </svg>
                                    </a>
                                    <img src="{{ asset('assets/portfolio/ruang majelis.jpg') }}" alt="...">
                                </div>
                            </div>
                        </div><!-- End Gallery Item -->
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="gallery-item h-100">
                                <!-- Menampilkan thumbnail gambar -->
                                <a class="portfolio-box" href="#gambar-36">
                                    <img class="img-fluid"
                                        src="{{ asset('assets/portfolio/showroom bio paint (4).jpg') }}"
                                        alt="..." />
                                </a>
                                <!-- Menampilkan popup gambar -->
                                <div class="overlay" id="gambar-36">
                                    <a href="#gallery" class="close">
                                        <svg style="width:50px;height:50px" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M12,20C7.59,20 4,16.41 4,12C4,7.59 7.59,4 12,4C16.41,4 20,7.59 20,12C20,16.41 16.41,20 12,20M12,2C6.47,2 2,6.47 2,12C2,17.53 6.47,22 12,22C17.53,22 22,17.53 22,12C22,6.47 17.53,2 12,2M14.59,8L12,10.59L9.41,8L8,9.41L10.59,12L8,14.59L9.41,16L12,13.41L14.59,16L16,14.59L13.41,12L16,9.41L14.59,8Z" />
                                        </svg>
                                    </a>
                                    <img src="{{ asset('assets/portfolio/showroom bio paint (4).jpg') }}" alt="...">
                                </div>
                            </div>
                        </div><!-- End Gallery Item --> --}}
        {{-- </div>
        </div>
        </section><!-- End Gallery Section --> --}}

    </main><!-- End #main -->
@endsection
