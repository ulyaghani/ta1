@extends('app')

@section('content')
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="page-header d-flex align-items-center"
            style="background-image: url('assets/portfolio/master bed (3).jpg');">
            <div class="container position-relative">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h2 class="animate__animated animate__fadeInDown">Contact</h2>
                        <p class="animate__animated animate__fadeInUp">Hubungi kami untuk mewujudkan impian furniture anda
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">
            <div>
                <iframe style="border:0; width: 100%; height: 340px;"
                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15838.654079474587!2d110.470612!3d-7.0487679!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708d02e594629b%3A0x4fe38933688a4ad3!2sWood%20Mood!5e0!3m2!1sen!2sid!4v1706682195351!5m2!1sen!2sid"
                    frameborder="0" allowfullscreen></iframe>
            </div><!-- End Google Maps -->

            <div class="row gy-4 mt-4">
                <div class="col-lg-4">
                    <div class="info-item d-flex">
                        <i class="bi bi-geo-alt flex-shrink-0"></i>
                        <div>
                            <h4>Alamat:</h4>
                            <p>Jl. Raya Sendangmulyo 58, Tembalang<br> Semarang, Jawa Tengah, Indonesia 50192</p>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="info-item d-flex">
                        <i class="bi bi-envelope flex-shrink-0"></i>
                        <div>
                            <h4>Email:</h4>
                            <p>order@woodmood.id</p>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="info-item d-flex">
                        <i class="bi bi-phone flex-shrink-0"></i>
                        <div>
                            <h4>No.Telp:</h4>
                            <p>+62877 3136 0366</p>
                        </div>
                    </div><!-- End Info Item -->
                </div>

                <div class="col-lg-8">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Nama">
                            </div>
                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="Alamat Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Pilih Kebutuhan Anda</label>
                            <select name="kebutuhan" class="form-control" id="product">
                                <option value="">-- Pilih Kebutuhan --</option>
                                <option value="kantor">Kantor</option>
                                <option value="rumah">Rumah</option>
                                <option value="usaha">Usaha</option>
                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <textarea class="form-control" name="message" id="message" rows="5"
                                placeholder="Pertanyaan yang ingin anda ajukan"></textarea>
                        </div>
                        <div id="text-info"></div>
                        <div class="form-group text-center">
                            <button class="btn btn-success send">Ajukan Pertanyaan</button>
                        </div>
                    </div><!-- End Contact Form -->
                </div>
            </div>
        </div>
    </section><!-- End Contact Section -->
@endsection
