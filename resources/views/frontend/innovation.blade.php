@extends('frontend.layouts.master')

@section('title')
    Visen | Innovation
@endsection

@push('styles')
<style>
    .p {
        text-align:justify;
    }
</style>
@endpush

@section('content')
    <!-- banner start here -->
    <section class="bannr_video">
        <video src="{{ asset('assets/frontend/img/video/banner-video.mp4') }}" autoplay muted loop></video>
        <div class="content">
            <h1>From idea to impact to income.</h1>
            <a href="#main-sec" class="see-below scroll">
                <div class="mouse_scroll">
                    <div class="mouse">
                        <div class="wheel"></div>
                    </div>
                    <div>
                        <span class="m_scroll_arrows unu"></span>
                        <span class="m_scroll_arrows doi"></span>
                        <span class="m_scroll_arrows trei"></span>
                    </div>
                </div>
            </a>
        </div>
    </section>
    <!-- banner end here -->

    <!-- Breadcrum section start here -->
    <section class="breadcrum_list_sec">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrum_list">
                        <li><a href="{{ route('frontend.home') }}">Home</a></li>
                        <li>Innovation</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrum section end here -->

    <!-- Innovation Area Start -->
    <section class="innovation_sec" id="main-sec">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading">
                        <h3>
                            Driven by innovation and a focus on impact, Visen’s R&D crafts sustainable solutions
                            to deliver lasting value for our customers.
                        </h3>
                        <p class="text-justify">
                            Visen channels its innovation efforts to be fast, fluid, flexible, and future-focused, delivering
                            cutting-edge technologies and exceptional service. Our dedicated team of scientists is committed
                            to exploring emerging technologies, developing new products, and enhancing existing ones. A
                            customer-centric approach is the core of our R&D, as we collaborate closely with customers to
                            create tailored solutions that meet their unique needs. Our labs are equipped with
                            industry-leading, state-of-the-art equipment’s to ensure the highest standards in research &
                            development, analysis and application. We also work closely with industry associations,
                            universities and leading suppliers to dive forward into the next wave of sustainable
                            innovations.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Innovation Area End -->

    <!-- Latest Innovations Start -->
    <section class="about_wrap">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="about-section-content innovation-text">
                        <div class="heading-one">
                            <div class="heading">
                                <h2>Discover Our Latest Innovations</h2>
                                <!-- <h3 class="big-title">Innovation</h3> -->
                            </div>
                            <p class="text-justify"><b>Visicryl 8800</b><br>
                                Pure Acrylic emulsion suitable for Top Coat for stone and texture finish coatings to impart
                                excellent water resistance properties and no blanching. Visicryl 8800 offers a glossy wet
                                look to surfaces. Matt finish product also available.
                            </p>
                            <p class="innovation-info"><b>Industry:</b> Paints & Coatings<br>
                                <b>Application:</b> Top Coat / Clear Coat <br>
                                <b>Chemistry:</b> Pure Acrylic
                            </p>
                            <a type="button" class="btn2">
                                <span class="button__text">Read More</span>
                                <span class="button__icon">
                                    <svg fill="#fff" height="18" width="18" version="1.1" id="Layer_1"
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        viewBox="0 0 330 330" xml:space="preserve">
                                        <path id="XMLID_222_" d="M250.606,154.389l-150-149.996c-5.857-5.858-15.355-5.858-21.213,0.001
                              c-5.857,5.858-5.857,15.355,0.001,21.213l139.393,139.39L79.393,304.394c-5.857,5.858-5.857,15.355,0.001,21.213
                              C82.322,328.536,86.161,330,90,330s7.678-1.464,10.607-4.394l149.999-150.004c2.814-2.813,4.394-6.628,4.394-10.606
                              C255,161.018,253.42,157.202,250.606,154.389z" />
                                    </svg>
                                    <!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" stroke-width="2" stroke-linejoin="round" stroke-linecap="round" stroke="currentColor" height="24" fill="none" class="svg"><line y2="19" y1="5" x2="12" x1="12"></line><line y2="12" y1="12" x2="19" x1="5"></line></svg> -->
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="about-image">
                        <img src="{{ asset('assets/frontend/img/innovation/innovations.jpg') }}" class="img-responsive">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest Innovations End -->

    <!-- How We Operate Start -->
    <section class="how_operate_sec">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading text-center">
                        <h2>How We Operate</h2>
                        <h3 class="big-title">Industries</h3>
                    </div>
                </div>
            </div>
            <div class="row how_operate_boxes">
                <div class="col-md-4">
                    <div class="single-team">
                        <div class="team-img">
                            <img src="{{ asset('assets/frontend/img/innovation/instrumentation-and-analytical.jpg') }}" alt="" class="img-responsive">
                        </div>
                        <div class="team-content">
                            <div class="team-info">
                                <h3>Instrumentation & Analytical</h3>
                            </div>
                            <p class="team-text text-justify">
                                Our analytical laboratory is dedicated to assessing chemical and physical
                                properties, with a focus on detailed product characterization, including
                                particle size analysis and detection of inorganic and organic traces. Equipped
                                with advanced technology, our lab thoroughly inspects raw materials and provides
                                in-depth chemical profiling to ensure precision and quality across all stages
                                of R&D.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-team">
                        <div class="team-img">
                            <img src="{{ asset('assets/frontend/img/innovation/synthesis-and-development.jpg') }}" alt="" class="img-responsive">
                        </div>
                        <div class="team-content">
                            <div class="team-info">
                                <h3>Synthesis & Development</h3>
                            </div>
                            <p class="team-text text-justify">
                                At the heart of our R&D, the Synthesis Lab is where innovation takes
                                shape. Guided by market trends and customer needs, our team is dedicated
                                to developing sustainable, value-driven, and customized solutions. We are
                                committed to exploring new raw materials to enhance product functionality
                                and optimize costs, while ensuring greater efficiency and faster delivery
                                to market.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-team">
                        <div class="team-img">
                            <img src="{{ asset('assets/frontend/img/innovation/application-and-testing.jpg') }}" alt="" class="img-responsive">
                        </div>
                        <div class="team-content">
                            <div class="team-info">
                                <h3>Application & Testing</h3>
                            </div>
                            <p class="team-text text-justify">
                                Our fully-equipped Application & Testing Lab ensures that every batch of
                                emulsion meets the highest standards for diverse applications and industries.
                                Our expert technologists thoroughly understand and address the unique requirements
                                of our local and global customers, leveraging state-of-the-art testing equipment
                                to provide accurate, reliable results.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- How We Operate End -->

    <!-- Innovation Facts Start -->
    <section class="facts_sec innovation_facts">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="counter_items">
                        <div class="counter">
                            <h2><strong class="count-digit">20</strong><span>+</span><br> Research Scientists</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="counter_items">
                        <div class="counter">
                            <h2><strong class="count-digit">3</strong><span>+</span><br> Research & Testing Facilities</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="counter_items">
                        <div class="counter">
                            <h2><strong class="count-digit">30</strong><span>+</span><br> New innovations in Last 3 years
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="counter_items">
                        <div class="counter">
                            <h2><strong class="count-digit">2000</strong><span>+</span><br> Satisfied customers</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Innovation Facts End -->

    <!-- Innovates & Inspire Start -->
    <section class="innovate_inspire_sec">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading text-center">
                        <h2>Innovates & Inspire with us </h2>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-md-4">
                    <div class="innovate_inspire_text">
                        <p class="text-justify">
                            <span>V</span>isen operates three innovation sites across India and the UAE. Our Innovation
                            Centers in India & UAE, drives cutting-edge research and development, fueling new innovations
                            for the industries we serve.
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="innovate_inspire_img">
                        <img src="{{ asset('assets/frontend/img/innovation/indian-r-and-d.png') }}" class="img-responsive">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="innovate_inspire_img">
                        <img src="{{ asset('assets/frontend/img/innovation/dubai-r-and-d.png') }}" class="img-responsive">
                    </div>
                </div>
            </div>
            <hr>
            <div class="row align-items-center">
                <div class="col-md-4">
                    <div class="innovate_inspire_img">
                        <img src="{{ asset('assets/frontend/img/innovation/application-lab.jpg') }}" class="img-responsive">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="innovate_inspire_img">
                        <img src="{{ asset('assets/frontend/img/innovation/UAE-lab.jpg') }}" class="img-responsive">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="innovate_inspire_text">
                        <p class="text-justify">
                            <span>O</span>ur Application & Testing Labs work closely with customers to demonstrate the
                            superior performance of our emulsions in their products, responding swiftly to their unique
                            needs.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Innovates & Inspire End -->

@endsection

@push('scripts')
@endpush
