@extends('frontend.layouts.master')

@section('title')
    Visen | News, Media & Events
@endsection

@push('styles')
    <style>
        .p {
            text-align: justify;
        }
    </style>
@endpush

@section('content')
    <!-- banner start here -->
    <section class="breadcrum_section"
        style="background-image:linear-gradient(#00000047, #00000075), url({{ asset('assets/frontend/img/bg/news-media-event-bg.jpg') }});">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrum_content">
                        <h1>News, Media & Events</h1>
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
                </div>
            </div>
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
                        <li>News, Media & Events</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrum section end here -->

    <!-- main section start here -->
    <section class="new_media_event_sec" id="main-sec">
        <div class="container-fluid">
            <div class="row investor_tabs_row">
                <div class="col-md-3">
                    <div class="investor_tabs">
                        <div class="tab">
                            <button class="tablinks" onclick="openCity(event, 'news')" id="defaultOpen">News</button>
                            <button class="tablinks" onclick="openCity(event, 'media')" id="defaultOpen">Media</button>
                            <button class="tablinks" onclick="openCity(event, 'events')">Events</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="investor_content">
                        <div id="news" class="tabcontent">
                            <div class="row">
                                <div class="col-md-12">
                                    <h2>News</h2>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="blogpost">
                                        <div class="blogpost-image">
                                            <a href="#"><img src="{{ asset('assets/frontend/img/new-media/1.jpg') }}" alt="BlogImage"></a>
                                        </div>
                                        <div class="blogpost-content">
                                            <h4 class="blogpost-title">
                                                <a href="#">
                                                    Lorem ipsum dolor sit amet conse
                                                    dolor sit
                                                </a>
                                            </h4>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                tempor incididunt ut labore et dolore magna aliqua.
                                            </p>
                                            <a class="blogpost-read-more" href="#">
                                                Read More
                                                <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="blogpost">
                                        <div class="blogpost-image">
                                            <a href="#"><img src="{{ asset('assets/frontend/img/new-media/2.jpg') }}" alt="BlogImage"></a>
                                        </div>
                                        <div class="blogpost-content">
                                            <h4 class="blogpost-title">
                                                <a href="#">
                                                    Lorem ipsum dolor sit amet conse
                                                    dolor sit
                                                </a>
                                            </h4>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                tempor incididunt ut labore et dolore magna aliqua.
                                            </p>
                                            <a class="blogpost-read-more" href="#">
                                                Read More
                                                <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="blogpost">
                                        <div class="blogpost-image">
                                            <a href="#">
                                                <img src="{{ asset('assets/frontend/img/new-media/3.jpg') }}" alt="BlogImage">
                                            </a>
                                        </div>
                                        <div class="blogpost-content">
                                            <h4 class="blogpost-title">
                                                <a href="#">
                                                    Lorem ipsum dolor sit amet conse
                                                    dolor sit
                                                </a>
                                            </h4>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                tempor incididunt ut labore et dolore magna aliqua.
                                            </p>
                                            <a class="blogpost-read-more" href="#">
                                                Read More
                                                <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="blogpost">
                                        <div class="blogpost-image">
                                            <a href="#">
                                                <img src="{{ asset('assets/frontend/img/new-media/1.jpg') }}" alt="BlogImage"></a>
                                        </div>
                                        <div class="blogpost-content">
                                            <h4 class="blogpost-title">
                                                <a href="#">
                                                    Lorem ipsum dolor sit amet conse
                                                    dolor sit
                                                </a>
                                            </h4>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                tempor incididunt ut labore et dolore magna aliqua.
                                            </p>
                                            <a class="blogpost-read-more" href="#">
                                                Read More
                                                <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="blogpost">
                                        <div class="blogpost-image">
                                            <a href="#">
                                                <img src="{{ asset('assets/frontend/img/new-media/2.jpg') }}" alt="BlogImage">
                                            </a>
                                        </div>
                                        <div class="blogpost-content">
                                            <h4 class="blogpost-title">
                                                <a href="#">
                                                    Lorem ipsum dolor sit amet conse
                                                    dolor sit
                                                </a>
                                            </h4>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                tempor incididunt ut labore et dolore magna aliqua.
                                            </p>
                                            <a class="blogpost-read-more" href="#">
                                                Read More
                                                <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="blogpost">
                                        <div class="blogpost-image">
                                            <a href="#"><img src="{{ asset('assets/frontend/img/new-media/3.jpg') }}" alt="BlogImage"></a>
                                        </div>
                                        <div class="blogpost-content">
                                            <h4 class="blogpost-title">
                                                <a href="#">
                                                    Lorem ipsum dolor sit amet conse
                                                    dolor sit
                                                </a>
                                            </h4>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                tempor incididunt ut labore et dolore magna aliqua.
                                            </p>
                                            <a class="blogpost-read-more" href="#">
                                                Read More
                                                <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="media" class="tabcontent">
                            <div class="row">
                                <div class="col-md-12">
                                    <h2>Media</h2>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="blogpost">
                                        <div class="blogpost-image">
                                            <a href="#">
                                                <img src="{{ asset('assets/frontend/img/new-media/1.jpg') }}" alt="BlogImage">
                                            </a>
                                        </div>
                                        <div class="blogpost-content">
                                            <h4 class="blogpost-title">
                                                <a href="#">
                                                    Lorem ipsum dolor sit amet conse
                                                    dolor sit
                                                </a>
                                            </h4>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                                sed do eiusmod tempor incididunt ut labore et dolore magna
                                                aliqua.
                                            </p>
                                            <a class="blogpost-read-more" href="#">Read More
                                                <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="blogpost">
                                        <div class="blogpost-image">
                                            <a href="#">
                                                <img src="{{ asset('assets/frontend/img/new-media/2.jpg') }}" alt="BlogImage">
                                            </a>
                                        </div>
                                        <div class="blogpost-content">
                                            <h4 class="blogpost-title">
                                                <a href="#">
                                                    Lorem ipsum dolor sit amet conse
                                                    dolor sit
                                                </a>
                                            </h4>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                tempor incididunt ut labore et dolore magna aliqua.
                                            </p>
                                            <a class="blogpost-read-more" href="#">
                                                Read More
                                                <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="blogpost">
                                        <div class="blogpost-image">
                                            <a href="#">
                                                <img src="{{ asset('assets/frontend/img/new-media/3.jpg') }}" alt="BlogImage">
                                            </a>
                                        </div>
                                        <div class="blogpost-content">
                                            <h4 class="blogpost-title">
                                                <a href="#">
                                                    Lorem ipsum dolor sit amet conse
                                                    dolor sit
                                                </a>
                                            </h4>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                tempor incididunt ut labore et dolore magna aliqua.
                                            </p>
                                            <a class="blogpost-read-more" href="#">
                                                Read More
                                                <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="blogpost">
                                        <div class="blogpost-image">
                                            <a href="#">
                                                <img src="{{ asset('assets/frontend/img/new-media/1.jpg') }}" alt="BlogImage">
                                            </a>
                                        </div>
                                        <div class="blogpost-content">
                                            <h4 class="blogpost-title">
                                                <a href="#">
                                                    Lorem ipsum dolor sit amet conse
                                                    dolor sit
                                                </a>
                                            </h4>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                tempor incididunt ut labore et dolore magna aliqua.
                                            </p>
                                            <a class="blogpost-read-more" href="#">
                                                Read More
                                                <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="blogpost">
                                        <div class="blogpost-image">
                                            <a href="#">
                                                <img src="{{ asset('assets/frontend/img/new-media/2.jpg') }}" alt="BlogImage">
                                            </a>
                                        </div>
                                        <div class="blogpost-content">
                                            <h4 class="blogpost-title">
                                                <a href="#">
                                                    Lorem ipsum dolor sit amet conse
                                                    dolor sit
                                                </a>
                                            </h4>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                tempor incididunt ut labore et dolore magna aliqua.
                                            </p>
                                            <a class="blogpost-read-more" href="#">
                                                Read More
                                                <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="blogpost">
                                        <div class="blogpost-image">
                                            <a href="#">
                                                <img src="{{ asset('assets/frontend/img/new-media/3.jpg') }}" alt="BlogImage">
                                            </a>
                                        </div>
                                        <div class="blogpost-content">
                                            <h4 class="blogpost-title">
                                                <a href="#">
                                                    Lorem ipsum dolor sit amet conse
                                                    dolor sit
                                                </a>
                                            </h4>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                tempor incididunt ut labore et dolore magna aliqua.
                                            </p>
                                            <a class="blogpost-read-more" href="#">
                                                Read More
                                                <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="events" class="tabcontent">
                            <div class="row">
                                <div class="col-md-12">
                                    <h2>Events</h2>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="blogpost">
                                        <div class="blogpost-image">
                                            <a href="#">
                                                <img src="{{ asset('assets/frontend/img/new-media/1.jpg') }}" alt="BlogImage">
                                            </a>
                                        </div>
                                        <div class="blogpost-content">
                                            <h5 class="event_location">
                                                <i class="fa fa-map-marker"></i>
                                                Dubai
                                            </h5>
                                            <h4 class="blogpost-title">
                                                <a href="#">
                                                    PharmaTech, Dubai 2022
                                                </a>
                                            </h4>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                tempor incididunt ut labore et dolore magna aliqua.
                                            </p>
                                            <a class="blogpost-read-more" href="#">
                                                Read More
                                                <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="blogpost">
                                        <div class="blogpost-image">
                                            <a href="#">
                                                <img src="{{ asset('assets/frontend/img/new-media/2.jpg') }}" alt="BlogImage">
                                            </a>
                                        </div>
                                        <div class="blogpost-content">
                                            <h5 class="event_location">
                                                <i class="fa fa-map-marker"></i>
                                                Mumbai
                                            </h5>
                                            <h4 class="blogpost-title">
                                                <a href="#">
                                                    PainIndia, Mumbai 2023
                                                </a>
                                            </h4>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                tempor incididunt ut labore et dolore magna aliqua.
                                            </p>
                                            <a class="blogpost-read-more" href="#">
                                                Read More
                                                <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="blogpost">
                                        <div class="blogpost-image">
                                            <a href="#">
                                                <img src="{{ asset('assets/frontend/img/new-media/3.jpg') }}" alt="BlogImage">
                                            </a>
                                        </div>
                                        <div class="blogpost-content">
                                            <h5 class="event_location">
                                                <i class="fa fa-map-marker"></i>
                                                Saudi Arabia
                                            </h5>
                                            <h4 class="blogpost-title">
                                                <a href="#">
                                                    Middle East Coatings Show,
                                                    2023
                                                </a>
                                            </h4>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                tempor incididunt ut.
                                            </p>
                                            <a class="blogpost-read-more" href="#">
                                                Read More
                                                <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="blogpost">
                                        <div class="blogpost-image">
                                            <a href="#">
                                                <img src="{{ asset('assets/frontend/img/new-media/1.jpg') }}" alt="BlogImage">
                                            </a>
                                        </div>
                                        <div class="blogpost-content">
                                            <h5 class="event_location">
                                                <i class="fa fa-map-marker"></i>
                                                Dubai
                                            </h5>
                                            <h4 class="blogpost-title">
                                                <a href="#">
                                                    PharmaTech, Dubai 2022
                                                </a>
                                            </h4>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit, sed do eiusmod tempor incididunt ut labore et
                                                dolore magna aliqua.
                                            </p>
                                            <a class="blogpost-read-more" href="#">
                                                Read More
                                                <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="blogpost">
                                        <div class="blogpost-image">
                                            <a href="#">
                                                <img src="{{ asset('assets/frontend/img/new-media/2.jpg') }}" alt="BlogImage">
                                            </a>
                                        </div>
                                        <div class="blogpost-content">
                                            <h5 class="event_location">
                                                <i class="fa fa-map-marker"></i>
                                                Mumbai
                                            </h5>
                                            <h4 class="blogpost-title">
                                                <a href="#">PainIndia, Mumbai 2023</a>
                                            </h4>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                                sed do eiusmod tempor incididunt ut labore et dolore magna
                                                aliqua.
                                            </p>
                                            <a class="blogpost-read-more" href="#">
                                                Read More
                                                <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="blogpost">
                                        <div class="blogpost-image">
                                            <a href="#"><img src="{{ asset('assets/frontend/img/new-media/3.jpg') }}" alt="BlogImage"></a>
                                        </div>
                                        <div class="blogpost-content">
                                            <h5 class="event_location">
                                                <i class="fa fa-map-marker"></i>
                                                Saudi Arabia
                                            </h5>
                                            <h4 class="blogpost-title">
                                                <a href="#">
                                                    Middle East Coatings Show,
                                                    2023
                                                </a>
                                            </h4>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                                sed do eiusmod tempor incididunt ut.
                                            </p>
                                            <a class="blogpost-read-more" href="#">
                                                Read More
                                                <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrum section end here -->
@endsection

@push('scripts')
@endpush
