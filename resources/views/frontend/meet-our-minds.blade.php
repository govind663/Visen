@extends('frontend.layouts.master')

@section('title')
    Visen | Meet Our Minds
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
        style="background-image:linear-gradient(#00000047, #00000075), url({{ asset('assets/frontend/img/bg/team_bg.jpg') }});">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrum_content">
                        <h1>Meet Our Minds</h1>
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
                        <li>Meet Our Minds</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrum section end here -->

    <!-- main section start here -->
    <section class="meet_our_minds" id="main-sec">
        <div class="container-fluid">
            <div class="row teams_main_title">
                <div class="col-md-6">
                    <div class="heading">
                        <h2>Board of Directors VIL</h2>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class=" text-justify">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                            sed do eiusmod tempor incididunt ut labore et dolore
                            magna aliqua.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="single-team">
                        <div class="team-img">
                            <img src="{{ asset('assets/frontend/img/team/2.jpg') }}" alt="" class="img-responsive">
                        </div>
                        <div class="team-content">
                            <div class="team-info">
                                <h3>Vijayasankaran Nair</h3>
                                <p>
                                    Managing Director <br>
                                    <a href="#"><i class="fa fa-linkedin"></i></a>
                                </p>
                            </div>
                            <p class="team-text text-justify">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
                                in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur
                                sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
                                laborum.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-team">
                        <div class="team-img">
                            <img src="{{ asset('assets/frontend/img/team/1.jpg') }}" alt="" class="img-responsive">
                        </div>
                        <div class="team-content">
                            <div class="team-info">
                                <h3>Cherry Nair</h3>
                                <p>
                                    Whole Time Director <br>
                                    <a href="#"><i class="fa fa-linkedin"></i></a>
                                </p>
                            </div>
                            <p class="team-text text-justify">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
                                in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur
                                sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
                                laborum.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-team">
                        <div class="team-img">
                            <img src="{{ asset('assets/frontend/img/team/3.jpg') }}" alt="" class="img-responsive">
                        </div>
                        <div class="team-content">
                            <div class="team-info">
                                <h3>Ashok Rao</h3>
                                <p>
                                    Independent Director <br>
                                    <a href="#"><i class="fa fa-linkedin"></i></a>
                                </p>
                            </div>
                            <p class="team-text text-justify">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
                                in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur
                                sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
                                laborum.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-team">
                        <div class="team-img">
                            <img src="{{ asset('assets/frontend/img/team/6.jpg') }}" alt="" class="img-responsive">
                        </div>
                        <div class="team-content">
                            <div class="team-info">
                                <h3>Louis Zacharias</h3>
                                <p>
                                    Independent Director <br>
                                    <a href="#"><i class="fa fa-linkedin"></i></a>
                                </p>
                            </div>
                            <p class="team-text text-justify">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
                                in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur
                                sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
                                laborum.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-team">
                        <div class="team-img">
                            <img src="{{ asset('assets/frontend/img/team/6.jpg') }}" alt="" class="img-responsive">
                        </div>
                        <div class="team-content">
                            <div class="team-info">
                                <h3>Rohnit Nair</h3>
                                <p>
                                    Non Executive Director <br>
                                    <a href="#"><i class="fa fa-linkedin"></i></a>
                                </p>
                            </div>
                            <p class="team-text text-justify">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
                                in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur
                                sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
                                laborum.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row teams_main_title">
                <div class="col-md-6">
                    <div class="heading">
                        <h2>Top Management</h2>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="">
                        <p class="text-justify">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                            sed do eiusmod tempor incididunt ut labore et dolore
                            magna aliqua.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="single-team">
                        <div class="team-img">
                            <img src="{{ asset('assets/frontend/img/team/2.jpg') }}" alt="" class="img-responsive">
                        </div>
                        <div class="team-content">
                            <div class="team-info">
                                <h3>Vivek Thakur</h3>
                                <p>
                                    Managing Director <br>
                                    <a href="#"><i class="fa fa-linkedin"></i></a>
                                </p>
                            </div>
                            <p class="team-text text-justify">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
                                in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur
                                sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
                                laborum.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row teams_main_title">
                <div class="col-md-6">
                    <div class="heading">
                        <h2>Board of Directors FZE</h2>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="text-justify">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                            sed do eiusmod tempor incididunt ut labore et dolore
                            magna aliqua.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="single-team">
                        <div class="team-img">
                            <img src="{{ asset('assets/frontend/img/team/2.jpg') }}" alt="" class="img-responsive">
                        </div>
                        <div class="team-content">
                            <div class="team-info">
                                <h3>Vijayasankaran Nair</h3>
                                <p>
                                    Managing Director <br>
                                    <a href="#"><i class="fa fa-linkedin"></i></a>
                                </p>
                            </div>
                            <p class="team-text text-justify">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
                                in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur
                                sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
                                laborum.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-team">
                        <div class="team-img">
                            <img src="{{ asset('assets/frontend/img/team/1.jpg') }}" alt="" class="img-responsive">
                        </div>
                        <div class="team-content">
                            <div class="team-info">
                                <h3>Cherry Nair</h3>
                                <p>
                                    Whole Time Director <br>
                                    <a href="#"><i class="fa fa-linkedin"></i></a>
                                </p>
                            </div>
                            <p class="team-text text-justify">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
                                in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur
                                sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
                                laborum.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-team">
                        <div class="team-img">
                            <img src="{{ asset('assets/frontend/img/team/3.jpg') }}" alt="" class="img-responsive">
                        </div>
                        <div class="team-content">
                            <div class="team-info">
                                <h3>Ashok Rao</h3>
                                <p>
                                    Independent Director <br>
                                    <a href="#"><i class="fa fa-linkedin"></i></a>
                                </p>
                            </div>
                            <p class="team-text text-justify">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
                                in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur
                                sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
                                laborum.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-team">
                        <div class="team-img">
                            <img src="{{ asset('assets/frontend/img/team/5.jpg') }}" alt="" class="img-responsive">
                        </div>
                        <div class="team-content">
                            <div class="team-info">
                                <h3>Louis Zacharias</h3>
                                <p>
                                    Independent Director <br>
                                    <a href="#"><i class="fa fa-linkedin"></i></a>
                                </p>
                            </div>
                            <p class="team-text text-justify">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
                                in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur
                                sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
                                laborum.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-team">
                        <div class="team-img">
                            <img src="{{ asset('assets/frontend/img/team/6.jpg') }}" alt="" class="img-responsive">
                        </div>
                        <div class="team-content">
                            <div class="team-info">
                                <h3>Rohnit Nair</h3>
                                <p>
                                    Non Executive Director <br>
                                    <a href="#"><i class="fa fa-linkedin"></i></a>
                                </p>
                            </div>
                            <p class="team-text text-justify">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
                                in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur
                                sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
                                laborum.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- main section end here -->
@endsection

@push('scripts')
@endpush
