@extends('frontend.layouts.master')

@section('title')
    Visen | Investor Relations
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
        style="background-image:linear-gradient(#00000047, #00000075), url({{ asset('assets/frontend/img/bg/investor-relation-bg.jpg') }});">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrum_content">
                        <h1>Investor Relations</h1>
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
                        <li>Investor Relations</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrum section end here -->

    <!-- main section start here -->
    <section class="investor_relations_sec" id="main-sec">
        <div class="container-fluid">
            <div class="row investor_tabs_row">
                <div class="col-md-3">
                    <div class="investor_tabs">
                        <div class="tab">
                            <button class="tablinks" onclick="openCity(event, 'annual-report')" id="defaultOpen">
                                Annual Reports
                            </button>
                            <button class="tablinks" onclick="openCity(event, 'group-report')" id="defaultOpen">
                                Group Reports
                            </button>
                            <div class="corporate-governance-div">
                                <button class="tablinks" onclick="openCity(event, 'corporate-governance')">
                                    Corporate Governance
                                </button>
                                <a class="tablinks" href="meet-our-minds.html">
                                    - Board & Top Management
                                </a>
                                <a class="tablinks" href="group-policies.html">
                                    - Group Policies
                                </a>
                            </div>
                            <button class="tablinks" onclick="openCity(event, 'investor-contacts')">
                                Investors Contacts
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="investor_content">
                        <div id="annual-report" class="tabcontent">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="corporate-governance-text">
                                        <h2>Annual Reports</h2>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                            nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                                            fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                                            culpa qui officia deserunt mollit anim id est laborum.
                                        </p>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                            nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                                            fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                                            culpa qui officia deserunt mollit anim id est laborum.
                                        </p>
                                        <div class="annual-return-pdf">
                                            <h2>Download</h2>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="brochure_box">
                                                        <div class="brochure_img">
                                                            <img src="{{ asset('assets/frontend/img/dummy-img1.jpg') }}" class="img-responsive">
                                                        </div>
                                                        <div class="brochure_content">
                                                            <h2>Annual Return 2022-23</h2>
                                                            <div class="brochure_content_btn">
                                                                <a type="button" class="btn2"
                                                                    href="{{ asset('assets/frontend/pdf/annual-return/Visen-Annual-Return-22-23.pdf') }}">
                                                                    <span class="button__text">Download</span>
                                                                    <span class="button__icon">
                                                                        <svg fill="#fff" height="13" width="13"
                                                                            version="1.1" id="Layer_1"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                            viewBox="0 0 330 330" xml:space="preserve">
                                                                            <path id="XMLID_222_" d="M250.606,154.389l-150-149.996c-5.857-5.858-15.355-5.858-21.213,0.001
                                                                                c-5.857,5.858-5.857,15.355,0.001,21.213l139.393,139.39L79.393,304.394c-5.857,5.858-5.857,15.355,0.001,21.213
                                                                                C82.322,328.536,86.161,330,90,330s7.678-1.464,10.607-4.394l149.999-150.004c2.814-2.813,4.394-6.628,4.394-10.606
                                                                                C255,161.018,253.42,157.202,250.606,154.389z"
                                                                            />
                                                                        </svg>
                                                                    </span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="brochure_box">
                                                        <div class="brochure_img">
                                                            <img src="{{ asset('assets/frontend/img/dummy-img1.jpg') }}" class="img-responsive">
                                                        </div>
                                                        <div class="brochure_content">
                                                            <h2>Annual Return 2021-22</h2>
                                                            <div class="brochure_content_btn">
                                                                <a type="button" class="btn2"
                                                                    href="{{ asset('assets/frontend/pdf/annual-return/Visen-Annual-Return-21-22.pdf') }}">
                                                                    <span class="button__text">Download</span>
                                                                    <span class="button__icon">
                                                                        <svg fill="#fff" height="13" width="13"
                                                                            version="1.1" id="Layer_1"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                            viewBox="0 0 330 330" xml:space="preserve">
                                                                            <path id="XMLID_222_" d="M250.606,154.389l-150-149.996c-5.857-5.858-15.355-5.858-21.213,0.001
                                                                                c-5.857,5.858-5.857,15.355,0.001,21.213l139.393,139.39L79.393,304.394c-5.857,5.858-5.857,15.355,0.001,21.213
                                                                                C82.322,328.536,86.161,330,90,330s7.678-1.464,10.607-4.394l149.999-150.004c2.814-2.813,4.394-6.628,4.394-10.606
                                                                                C255,161.018,253.42,157.202,250.606,154.389z"
                                                                            />
                                                                        </svg>
                                                                    </span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="brochure_box">
                                                        <div class="brochure_img">
                                                            <img src="{{ asset('assets/frontend/img/dummy-img1.jpg') }}" class="img-responsive">
                                                        </div>
                                                        <div class="brochure_content">
                                                            <h2>Annual Return 2020-21</h2>
                                                            <div class="brochure_content_btn">
                                                                <a type="button" class="btn2"
                                                                    href="{{ asset('assets/frontend/pdf/annual-return/Visen-Annual-Return-20-21.pdf') }}">
                                                                    <span class="button__text">Download</span>
                                                                    <span class="button__icon">
                                                                        <svg fill="#fff" height="13" width="13"
                                                                            version="1.1" id="Layer_1"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                            viewBox="0 0 330 330" xml:space="preserve">
                                                                            <path id="XMLID_222_" d="M250.606,154.389l-150-149.996c-5.857-5.858-15.355-5.858-21.213,0.001
                                                                                c-5.857,5.858-5.857,15.355,0.001,21.213l139.393,139.39L79.393,304.394c-5.857,5.858-5.857,15.355,0.001,21.213
                                                                                C82.322,328.536,86.161,330,90,330s7.678-1.464,10.607-4.394l149.999-150.004c2.814-2.813,4.394-6.628,4.394-10.606
                                                                                C255,161.018,253.42,157.202,250.606,154.389z"
                                                                            />
                                                                        </svg>
                                                                    </span>
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
                        </div>

                        <div id="group-report" class="tabcontent">
                            <div class="row">

                            </div>
                        </div>

                        <div id="corporate-governance" class="tabcontent">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="corporate-governance-text">
                                        <h2>Corporate Governance</h2>
                                        <p class="text-justify">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                            nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                                            fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                                            culpa qui officia deserunt mollit anim id est laborum.
                                        </p>
                                        <p class="text-justify">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                            nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                                            fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                                            culpa qui officia deserunt mollit anim id est laborum.
                                        </p>
                                        <p class="text-justify">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                            nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                                            fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                                            culpa qui officia deserunt mollit anim id est laborum.
                                        </p>
                                        <p class="text-justify">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                            nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                                            fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                                            culpa qui officia deserunt mollit anim id est laborum.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="investor-contacts" class="tabcontent corporate-governance-text">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="investor-contacts-box">
                                        <div class="thumb">
                                            <img src="{{ asset('assets/frontend/img/team1.jpg') }}" alt="img" class="overflow-hidden w-100">
                                        </div>
                                        <div class="content">
                                            <h4>Secretarial Department</h4>
                                            <ul>
                                                <li><b>Ms. Binita Gosalia</b></li>
                                                <li>Company Secretary<br>
                                                    501, Stanford, Plot No. 554,<br>
                                                    Junction of S V Road & Juhu Lane,<br>
                                                    Andheri (West), Mumbai – 400058, India.
                                                </li>
                                                <li><b>Tel:</b> <a href="tel:912266443333"> + 91 22 6644 3333</a></li>
                                                <li><b>Fax:</b> <a href="tel:912266443344"> + 91 22 6644 3344</a></li>
                                                <li><b>Email:</b> <a href="mailto:info@visen.net">info@visen.net</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="investor-contacts-box">
                                        <div class="thumb">
                                            <img src="{{ asset('assets/frontend/img/team2.jpg') }}" alt="img" class="overflow-hidden w-100">
                                        </div>
                                        <div class="content">
                                            <h4>Registrar & Transfer Agent</h4>
                                            <ul>
                                                <li><b>Ms. Divya Nadar</b></li>
                                                <li>Adroit Corporate Services Pvt. Ltd.<br>
                                                    CIN No. U67190MH1994PTC079160<br>
                                                    18-20, Jafferbhoy Ind. Estate,1st Floor,<br>
                                                    Makhwana Road, Marol Naka, Andheri (E),<br>
                                                    Mumbai 400059, India.
                                                </li>
                                                <li>
                                                    <b>Tel:</b> <a href="tel:9102242270400">+91 022 42270400</a>
                                                </li>
                                                <li>
                                                    <b>Email:</b> <a href="mailto:info@adroitcorporate.com">info@adroitcorporate.com</a>
                                                </li>
                                                <li>
                                                    <b>Website:</b> <a href="https://www.adroitcorporate.com/">www.adroitcorporate.com</a>
                                                </li>
                                            </ul>
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
