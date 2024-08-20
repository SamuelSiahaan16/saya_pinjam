<x-template title="Home">
    <!-- Slider Section Start -->
    <div class="rs-slider style2">
        <div class="rs-carousel owl-carousel" data-loop="true" data-items="1" data-margin="0" data-autoplay="false"
            data-hoverpause="true" data-autoplay-timeout="5000" data-smart-speed="800" data-dots="false"
            data-nav="false" data-nav-speed="false" data-center-mode="false" data-mobile-device="1"
            data-mobile-device-nav="false" data-mobile-device-dots="false" data-ipad-device="1"
            data-ipad-device-nav="false" data-ipad-device-dots="false" data-ipad-device2="1"
            data-ipad-device-nav2="true" data-ipad-device-dots2="false" data-md-device="1" data-md-device-nav="true"
            data-md-device-dots="false">
            <div class="slide-part background-image">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 order-last">
                            <div class="img-part">
                                <img src="{{ asset('assets/img/Judul.png') }}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-6 pr-50">
                            <div class="content">
                                <!-- <div class="sub-title wow bounceInLeft" data-wow-delay="300ms"
                                    data-wow-duration="2000ms">Good Food Good Life</div> -->
                                <h1 class="title wow fadeInRight" data-wow-delay="600ms" data-wow-duration="2000ms">
                                    Butuh Pinjaman yang sudah diawasi OJK?</h1>
                                <div class="sl-btn wow fadeInUp" data-wow-delay="900ms" data-wow-duration="2000ms">
                                    <a class="readon orange-btn" href="#rs-popular-courses">Ajukan Sekarang!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slide-part">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 order-last">
                            <div class="img-part">
                                <img src="{{ asset('assets/img/Judul_2.png') }}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-6 pr-80">
                            <div class="content">
                                <!-- <div class="sub-title wow bounceInLeft" data-wow-delay="300ms"
                                    data-wow-duration="2000ms">Good Food Good Life</div> -->
                                <h1 class="title wow fadeInRight" data-wow-delay="600ms" data-wow-duration="2000ms">
                                    Solusi pinjaman dana tunai mudah, cepat, dan fleksibel</h1>
                                <div class="sl-btn wow fadeInUp" data-wow-delay="900ms" data-wow-duration="2000ms">
                                    <a class="readon orange-btn" href="#rs-popular-courses">Ajukan Sekarang!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Slider Section End -->

    <!-- About Section Start -->
    <div id="rs-about" class="rs-about style8 pt-200 pb-100 md-pt-70 md-pb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 offset-lg-3">
                    <div class="main-content">
                        <div class="img-part">
                            <img src="assets/images/about/home8/1.jpg" alt="">
                        </div>
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <div class="images-title pl-80 md-pl-15 md-mb-40">
                                    <img src="assets/images/about/home8/2.jpg" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="sec-title3 wow fadeInUp" data-wow-delay="300ms" data-wow-duration="2000ms">
                                    <div class="sub-title">Tentang Kami</div>
                                    <h2 class="title">Koperasi Simpan Pinjam (KSP)
                                    </h2>
                                    <div class="desc mb-30">
                                        Kami berpegang pada nilai-nilai kepercayaan, kepedulian, profesionalisme, dan
                                        inklusivitas dalam setiap layanan yang kami berikan. Bergabunglah dengan KSP dan
                                        nikmati berbagai keuntungan serta layanan unggulan yang dirancang khusus untuk
                                        memenuhi kebutuhan finansial Anda.
                                    </div>

                                    <div class="btn-part wow fadeInUp" data-wow-delay="400ms"
                                        data-wow-duration="2000ms">
                                        <a class="readon orange-btn" href="{{ route('about') }}">Baca
                                            Selengkapnya...</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row rs-counter style-home8 pt-40">
                        <div class="col-lg-3 col-md-6 md-mb-30">
                            <div class="counter-item text-center">
                                <h2 class="rs-count plus">20</h2>
                                <h4 class="title mb-0">Cabang</h4>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 md-mb-30">
                            <div class="counter-item text-center">
                                <h2 class="number rs-count plus">1000</h2>
                                <h4 class="title mb-0">Pengguna</h4>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 md-mb-30">
                            <div class="counter-item text-center">
                                <h2 class="number rs-count plus">2000</h2>
                                <h4 class="title mb-0">Pinjaman Berhasil</h4>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="counter-item text-center">
                                <h2 class="number rs-count plus">4</h2>
                                <h4 class="title mb-0">Jenis Pinjaman</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About Section End -->

    <!-- Categories Section Start -->
    <div id="rs-popular-courses" class="rs-popular-courses style5 pt-100 pb-100 md-pt-70 md-pb-70">
        <div class="container">
            <div class="sec-title3 text-center mb-45">
                <div class="sub-title primary">Jenis Pinjaman</div>
                <h2 class="title mb-0">Sesuaikan produk kami dengan kebutuhanmu</h2>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 mb-30">
                    <div class="courses-item">
                        <div class="courses-grid">
                            <div class="img-part">
                                <a href="{{ route('karyawan-swasta') }}">
                                    <img src="{{ asset('assets/img/5.jpg') }}" alt=""></a>
                            </div>
                            <div class="content-part">
                                <h3 class="title"><a href="{{ route('karyawan-swasta') }}">Pinjaman untuk Karyawan
                                        Swasta</a></h3>
                                <a href="{{ route('karyawan-swasta') }}">
                                    <ul class="meta-part">
                                        <li class="user">
                                            <i class="fa fa-file"></i>
                                            Baca Selengkapnya.....
                                        </li>
                                    </ul>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-30">
                    <div class="courses-item">
                        <div class="courses-grid">
                            <div class="img-part">
                                <a href="{{ route('jaminan-motor') }}"><img src="{{ asset('assets/img/1.jpg') }}"
                                        alt=""></a>
                            </div>
                            <div class="content-part">
                                <h3 class="title"><a href="{{ route('jaminan-motor') }}">Pinjaman dengan Agunan
                                        Kendaraan
                                        bermotor</a></h3>
                                <a href="{{ route('jaminan-motor') }}">
                                    <ul class="meta-part">
                                        <li class="user">
                                            <i class="fa fa-file"></i>
                                            Baca Selengkapnya.....
                                        </li>
                                    </ul>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-30">
                    <div class="courses-item">
                        <div class="courses-grid">
                            <div class="img-part">
                                <a href="{{ route('jaminan-tanah') }}"><img src="{{ asset('assets/img/2.jpg') }}"
                                        alt=""></a>
                            </div>
                            <div class="content-part">
                                <h3 class="title"><a href="{{ route('jaminan-tanah') }}">Pinjaman dengan Agunan
                                        Sertifikat Tanah</a>
                                </h3>
                                <a href="{{ route('jaminan-tanah') }}">
                                    <ul class="meta-part">
                                        <li class="user">
                                            <i class="fa fa-file"></i>
                                            Baca Selengkapnya.....
                                        </li>
                                    </ul>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-30">
                    <div class="courses-item">
                        <div class="courses-grid">
                            <div class="img-part">
                                <a href="{{ route('pinjaman-guru-pns') }}"><img src="{{ asset('assets/img/3.jpg') }}"
                                        alt=""></a>
                            </div>
                            <div class="content-part">
                                <h3 class="title"><a href="{{ route('pinjaman-guru-pns') }}">Pinjaman untuk Guru PNS</a>
                                </h3>
                                <a href="{{ route('pinjaman-guru-pns') }}">
                                    <ul class="meta-part">
                                        <li class="user">
                                            <i class="fa fa-file"></i>
                                            Baca Selengkapnya.....
                                        </li>
                                    </ul>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-30">
                    <div class="courses-item">
                        <div class="courses-grid">
                            <div class="img-part">
                                <a href="{{ route('pinjaman-pegawai-negri') }}"><img
                                        src="{{ asset('assets/img/4.jpg') }}" alt=""></a>
                            </div>
                            <div class="content-part">
                                <h3 class="title"><a href="{{ route('pinjaman-pegawai-negri') }}">Pinjaman untuk Pegawai
                                        Negeri</a></h3>
                                <a href="{{ route('pinjaman-pegawai-negri') }}">
                                    <ul class="meta-part">
                                        <li class="user">
                                            <i class="fa fa-file"></i>
                                            Baca Selengkapnya.....
                                        </li>
                                    </ul>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Categories Section End -->
</x-template>