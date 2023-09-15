@extends('website.layout')
@section('content')
    <section class="slider-area slider-area2">
        <div class="slider-active">
            <!-- Single Slider -->
            <div class="single-slider slider-height2">
                <div class="container">
                    <div class="row mb-5">
                        <div class="col-xl-6 col-lg-6 col-md-6">
                            <div class="hero__caption hero__caption2 ">
                                <h1 data-animation="fadeInLeft" data-delay="0.2s">SEKOLAH DASAR<br> ISLAM TERPADU</h1>

                                {{-- <div class="btn hero-btn" id="galeri" data-animation="fadeInLeft"
                                    data-delay="0.7s">Galeri</div> --}}



                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6">
                            <div class="hero__caption hero__caption2 mb-5">
                                <div class="carousel slide" data-ride="carousel" id="carouselExampleControls">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img alt="First slide" class="d-block w-100" fluid
                                                src="{{ asset('landing-page') }}/assets/img/sdit/1.png">
                                        </div>
                                        <div class="carousel-item">
                                            <img alt="Second slide" class="d-block w-100" fluid
                                                src="{{ asset('landing-page') }}/assets/img/sdit/4.png">
                                        </div>
                                        <div class="carousel-item">
                                            <img alt="Third slide" class="d-block w-100" fluid
                                                src="{{ asset('landing-page') }}/assets/img/sdit/2.png">
                                        </div>
                                    </div>
                                    <a class="carousel-control-prev" data-slide="prev" href="#carouselExampleControls"
                                        role="button">
                                        <span aria-hidden="true" class="carousel-control-prev-icon"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" data-slide="next" href="#carouselExampleControls"
                                        role="button">
                                        <span aria-hidden="true" class="carousel-control-next-icon"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--? About Area-3 Start -->
    <div class="courses-area section-padding40 fix">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-8">
                    <div class="section-tittle text-center mb-55">
                        <h2>Tentang kami</h2>
                    </div>
                </div>
            </div>
            <section class="about-area2 fix pb-padding">
                <div class="support-wrapper align-items-center">
                    <div class="right-content2">
                        <!-- img -->
                        <div class="right-img">
                            <img alt="" src="{{ asset('landing-page') }}/assets/img/sdit/3.png">
                        </div>
                    </div>
                    <div class="left-content2">
                        <!-- section tittle -->
                        <div class="section-tittle section-tittle2 mb-20">
                            <div class="front-text">
                                <h2 class="">Sekolah Dasar Islam Terpadu (SDIT) Teluk Kuantan</h2>
                                <p>Sekolah Dasar Islam Terpadu (SDIT) Teluk Kuantan merupakan jenjang pendidikan bagi anak
                                    usia 6-12 tahun di bawah koordinisasi pendidikan dan mengimplementasikan kurikulum
                                    tambahan berupa pendidikan agama islam yang berlebih dari SD umum. Kurikulum tersebut
                                    disesuaikan dengan mempertimbangkan kemampuan, kebutuhan dan kondisi keagamaan
                                    masyarakat saat ini berlokasi dan melaksanakan kegiatan belajar mengajar (KBM) di Desa
                                    Beringin Teluk Kuantan.
                                </p>
                                <a class="btn" href="/about">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <!-- About Area End -->
    <!-- Gallery -->
    <div class="courses-area section-padding40 fix ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-8">
                    <div class="section-tittle text-center mb-55">
                        <h2>Galeri</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                    <img alt="Boat on Calm Water" class="w-100 shadow-1-strong rounded mb-4"
                        src="{{ asset('landing-page') }}/assets/img/sdit/3.png" />

                    <img alt="Wintry Mountain Landscape" class="w-100 shadow-1-strong rounded mb-4"
                        src="{{ asset('landing-page') }}/assets/img/sdit/5.png" />
                </div>

                <div class="col-lg-4 mb-4 mb-lg-0">
                    <img alt="Mountains in the Clouds" class="w-100 shadow-1-strong rounded mb-4"
                        src="{{ asset('landing-page') }}/assets/img/sdit/6.png" />

                    <img alt="Boat on Calm Water" class="w-100 shadow-1-strong rounded mb-4"
                        src="{{ asset('landing-page') }}/assets/img/sdit/7.png" />
                </div>

                <div class="col-lg-4 mb-4 mb-lg-0">
                    <img alt="Waves at Sea" class="w-100 shadow-1-strong rounded mb-4"
                        src="{{ asset('landing-page') }}/assets/img/sdit/8.png" />

                    <img alt="Yosemite National Park" class="w-100 shadow-1-strong rounded mb-4"
                        src="{{ asset('landing-page') }}/assets/img/sdit/9.png" />
                </div>
                <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                    <img alt="Boat on Calm Water" class="w-100 shadow-1-strong rounded mb-4"
                        src="{{ asset('landing-page') }}/assets/img/sdit/10.png" />

                    <img alt="Wintry Mountain Landscape" class="w-100 shadow-1-strong rounded mb-4"
                        src="{{ asset('landing-page') }}/assets/img/sdit/11.png" />
                </div>

                <div class="col-lg-4 mb-4 mb-lg-0">
                    <img alt="Mountains in the Clouds" class="w-100 shadow-1-strong rounded mb-4"
                        src="{{ asset('landing-page') }}/assets/img/sdit/12.png" />

                    <img alt="Boat on Calm Water" class="w-100 shadow-1-strong rounded mb-4"
                        src="{{ asset('landing-page') }}/assets/img/sdit/13.png" />
                </div>

                <div class="col-lg-4 mb-4 mb-lg-0">
                    <img alt="Waves at Sea" class="w-100 shadow-1-strong rounded mb-4"
                        src="{{ asset('landing-page') }}/assets/img/sdit/14.png" />

                    <img alt="Yosemite National Park" class="w-100 shadow-1-strong rounded mb-4"
                        src="{{ asset('landing-page') }}/assets/img/sdit/15.png" />
                    <img alt="Yosemite National Park" class="w-100 shadow-1-strong rounded mb-4"
                        src="{{ asset('landing-page') }}/assets/img/sdit/16.png" />
                </div>
            </div>
        </div>
    </div>
    <!-- Gallery -->
@endsection
