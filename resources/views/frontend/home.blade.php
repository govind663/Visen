@extends('frontend.layouts.master')

@section('title')
Visen | Home
@endsection

@push('styles')
@endpush

@section('content')

    <!-- banner start here -->
    <section class="bannr_video">
        @if (!empty($banners->banner_video))
            <video src="{{ asset('/visen/banner/banner_video/' . $banners->banner_video) }}" autoplay muted loop ></video>
        @elseif (!empty($banners->banner_image))
            <img src="{{ asset('/visen/banner/banner_image/' . $banners->banner_image) }}" alt="Banner Image">
        @endif
        <!-- <h1>AMONG THE STARS</h1> -->
    </section>
    <!-- banner end here -->

    <!-- industries serve start here -->
    <section class="industries_serve_wrap">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading text-center">
                        <h2>Markets and Products</h2>
                        <h3 class="big-title">Industries</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($industries as $industry)
                    <div class="col-md-4  p-3">
                        <div class="industries-box">
                            <div class="thumb">
                                @if (!empty($industry->industryBannerImage))
                                <img src="{{ asset('/visen/industries/industryBannerImage/' . $industry->industryBannerImage) }}" alt="img" class="overflow-hidden w-100">
                                @endif
                            </div>
                            <div class="content">
                                <h5 class="">
                                    <a href="#" class="black-clr">{{ $industry->industries_name }}</a>
                                </h5>
                                {{-- Apply Word Limit --}}
                                <p class="text-justify">
                                    {!! \Illuminate\Support\Str::words($industry->description, 50, '') !!}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- industries serve end here -->

    <!-- About Area Start -->
    <div class="about-area">
        <!-- <div class="about_float_text">VISEN</div> -->
        <div class="container-fluid">
            <div class="row align-center">
                <div class="col-md-5">
                    <div class="thumb">
                        <img src="{{ asset('assets/frontend/img/about-img.jpg') }}" alt="Image Not Found" class="img-responsive">
                    </div>
                </div>
                <div class="about-style-two col-md-7">
                    <div class="heading">
                        <h2>About Us</h2>
                    </div>
                    <p>For close to four decades, Visen has been the invisible bond in constructing happiness with our
                        high-performance water-based solutions. Our emulsions enhance the relationship between your
                        product and its surface, ensuring a perfect bond. By creating this seamless connection, we
                        foster Bonds for Life, reflecting our commitment to durability and performance.</p>
                    <p>Visen embodies the visionary journey of Vijay S. Nair, a farmer turned entrepreneur. Discover the
                        narrative behind Visen, exploring the essence of who we are, our core values, and the innovation
                        that propels us forward.</p>
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
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- About Area End -->

    <!-- Counter Area Start -->
    <section class="counter_wrap" id="counter-stats">
        <div class="container-fluid">
            <div class="row counter_row">
                @foreach ($counters as $counter)
                <div class="counter_items">
                    <div class="counter">
                        <h2>
                            <strong class="count-digit">{!! $counter->description !!}</strong><span>+</span><br>
                            {{ $counter->title }}
                        </h2>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Counter Area End -->

    <!-- Sustainability Area Start -->
    <section class="sustainability_wrap_one">
        <div id="carousel-example" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carousel-example" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example" data-slide-to="1"></li>
            </ol>
            <div class="carousel-inner">
                <div class="item active">
                    <img src="{{ asset('assets/frontend/img/bg/sustainability-bg.jpg') }}" />
                    <div class="carousel-caption">
                        <div class="row">
                            <div class="col-md-5"></div>
                            <div class="col-md-7">
                                <div class="sustainability-content">
                                    <div class="heading">
                                        <h2>Sustainable is attainable</h2>
                                    </div>
                                    <p>Sustainability is ingrained in Visen's DNA across products, processes, and
                                        people. We are committed to eco-friendly practices, resource efficiency, and
                                        community well-being, paving the way for a future where innovation meets
                                        environmental stewardship.</p>
                                    <a type="button" class="btn2">
                                        <span class="button__text">Read More</span>
                                        <span class="button__icon">
                                            <svg fill="#fff" height="18" width="18" version="1.1"
                                                id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 330 330"
                                                xml:space="preserve">
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
                    </div>
                </div>
                <div class="item">
                    <img src="{{ asset('assets/frontend/img/bg/csr-bg.jpg') }}" />
                    <div class="carousel-caption">
                        <div class="row">
                            <div class="col-md-5"></div>
                            <div class="col-md-7">
                                <div class="sustainability-content">
                                    <div class="heading">
                                        <h2>CSR</h2>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                        nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    </p>
                                    <a type="button" class="btn2">
                                        <span class="button__text">Read More</span>
                                        <span class="button__icon">
                                            <svg fill="#fff" height="18" width="18" version="1.1"
                                                id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 330 330"
                                                xml:space="preserve">
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
                    </div>
                </div>
            </div>
            <a class="left carousel-control" href="#carousel-example" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a class="right carousel-control" href="#carousel-example" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
        </div>
    </section>
    <!-- Sustainability Area End -->

    <!-- Wrap About Section Start -->
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
                            <p><b>Visicryl 8800</b><br>
                                Pure Acrylic emulsion suitable for Top Coat for stone and texture finish coatings to
                                impart excellent water resistance properties and no blanching. Visicryl 8800 offers a
                                glossy wet look to surfaces. Matt finish product also available.
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
                        <img src="{{ asset('assets/frontend/img/innovations.jpg') }}" class="img-responsive">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Wrap About Section End -->

    <!-- Wrap Customer Section Start -->
    <section class="customers_wrap">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading text-center">
                        <h2><span>Trusted </span>by the best</h2>
                        <h3 class="big-title">Clientele</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="owl-carousel owl-theme" id="client">
                        @foreach ($customers as $customer)
                            <div class="items">
                                <div class="clients-wrap">
                                    <img src="{{ asset('/visen/customer/image/'.$customer->image) }}" alt="client" class="img-responsive">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Wrap Customer Section End -->
@endsection

@push('scripts')
@endpush
