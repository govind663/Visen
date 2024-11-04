 <!-- header start -->
 <section class="main_menu" id="header-sticky">
    <div class="container-fluid">
        <div class="row v-center">
            <div class="header-item item-left">
                <div class="logo">
                    <a href="{{ route('frontend.home') }}"><img src="{{ asset('assets/frontend/img/logo/visen-logo.jpg') }}"></a>
                </div>
            </div>
            <!-- menu start here -->
            <div class="header-item item-center">
                <div class="menu-overlay"></div>
                <nav class="menu">
                    <div class="mobile-menu-head">
                        <div class="go-back"><i class="fa fa-angle-left"></i></div>
                        <div class="current-menu-title"></div>
                        <div class="mobile-menu-close">&times;</div>
                    </div>
                    <ul class="menu-main">
                        <li class="menu-item-has-children">
                            <a href="javascript:;">About <i class="fa fa-angle-down"></i></a>
                            <div class="sub-menu mega-menu mega-menu-column-3 about_dropdown">
                                <div class="list-item">
                                    <div class="megamenu_content">
                                        <h2>About</h2>
                                        <p class="text-justify">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                            sed do eiusmod tempor incididunt ut labore et dolore magna
                                            aliqua.
                                        </p>
                                        <a href="#" type="button" class="btn2">
                                            <span class="button__text">Read More</span>
                                            <span class="button__icon">
                                                <svg fill="#fff" height="18" width="18" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 330 330" xml:space="preserve">
                                                    <path
                                                        id="XMLID_222_" d="M250.606,154.389l-150-149.996c-5.857-5.858-15.355-5.858-21.213,0.001
                                                        c-5.857,5.858-5.857,15.355,0.001,21.213l139.393,139.39L79.393,304.394c-5.857,5.858-5.857,15.355,0.001,21.213
                                                        C82.322,328.536,86.161,330,90,330s7.678-1.464,10.607-4.394l149.999-150.004c2.814-2.813,4.394-6.628,4.394-10.606
                                                        C255,161.018,253.42,157.202,250.606,154.389z"
                                                    />
                                                </svg>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                                <div class="list-item">
                                    <ul>
                                        <li><a href="#">Who we are</a></li>
                                        <li><a href="#">What we do</a></li>
                                        <li><a href="#">Where we are</a></li>
                                        <li><a href="#">Our Vision</a></li>
                                        <li><a href="#">Our Values</a></li>
                                    </ul>
                                </div>
                                <div class="list-item">
                                    <ul>
                                        <li><a href="#">Our History</a></li>
                                        <li><a href="#">About our MD</a></li>
                                        <li><a href="{{ route('frontend.meet-our-minds') }}">Meet our Minds</a></li>
                                        <li><a href="#">Our Brands</a></li>
                                        <li><a href="{{ route('frontend.group-policies') }}">Group Policies</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="javascript:;">Markets & Products <i class="fa fa-angle-down"></i></a>
                            <div class="sub-menu mega-menu mega-menu-column-3 industry_dropdown">
                                <div class="list-item">
                                    <div class="megamenu_content">
                                        <h2>Market and Products</h2>
                                        <p class="text-justify">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                            sed do eiusmod tempor incididunt ut labore et dolore
                                            magna aliqua.
                                        </p>
                                        <a href="#" type="button" class="btn2">
                                            <span class="button__text">Read More</span>
                                            <span class="button__icon">
                                                <svg fill="#fff" height="18" width="18" version="1.1"
                                                    id="Layer_1" xmlns="http://www.w3.org/2000/svg"
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
                                <div class="list-item industry-col">
                                    <!-- the button holds the title of the accordion-->
                                    <button class="course-accordion">Paints & Coatings</button>
                                    <!-- This div holds the content to be displayed-->
                                    <div class="course-panel">
                                        <ul class="industry-listing">
                                            <li><a href="product-details.html">Interior & Exterior paint</a></li>
                                            <!-- <li><a href="#">Exterior paint</a></li> -->
                                            <li><a href="#">High gloss</a></li>
                                            <li><a href="#">Textured finishes</a></li>
                                            <li><a href="#">Low VOC / low odour</a></li>
                                            <li><a href="#">Penetrating primer</a></li>
                                            <li><a href="#">Floor coat</a></li>
                                            <li><a href="#">DTM</a></li>
                                            <li><a href="#">Elastomeric Coating</a></li>
                                            <li><a href="#">Roof coating</a></li>
                                            <li><a href="#">Wood & clear coats</a></li>
                                        </ul>
                                    </div>
                                    <button class="course-accordion">Construction Chemicals</button>
                                    <div class="course-panel">
                                        <ul class="industry-listing">
                                            <li><a href="#">Waterproofing</a></li>
                                            <li><a href="#">Roof coating</a></li>
                                            <li><a href="#">Penetrating primer</a></li>
                                        </ul>
                                    </div>
                                    <button class="course-accordion">Textile & Non-Wovens</button>
                                    <div class="course-panel">
                                        <ul class="industry-listing">
                                            <li><a href="#">Pigment printing</a></li>
                                            <li><a href="#">Screen printing table gum</a></li>
                                            <li><a href="#">Khadi printing</a></li>
                                            <li><a href="#">Textile finishing</a></li>
                                            <li><a href="#">Khadi binder</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="list-item industry-col">
                                    <button class="course-accordion">Adhesives</button>
                                    <!-- This div holds the content to be displayed-->
                                    <div class="course-panel">
                                        <ul class="industry-listing">
                                            <!-- <li><a href="#">Print lamination</a></li> -->
                                            <li><a href="#">Wet Lamination</a></li>
                                            <li><a href="#">BOPP/lamination adhesive</a></li>
                                            <!-- <li><a href="#">Dry/auto  adhesive</a></li> -->
                                            <li><a href="#">PVC lamination adhesive</a></li>
                                            <li><a href="#">Pencil & stationery adhesives</a></li>
                                            <li><a href="#">Sticker adhesive for label stock & bindi</a></li>
                                            <li><a href="#">Wood adhesive</a></li>
                                            <li><a href="#">Textile adhesive & fabric glue</a></li>
                                        </ul>
                                    </div>
                                    <button class="course-accordion">Packaging</button>
                                    <div class="course-panel">
                                        <ul class="industry-listing">
                                            <li><a href="#">BOPP tape/PSA</a></li>
                                        </ul>
                                    </div>
                                    <button class="course-accordion">Additives</button>
                                    <div class="course-panel">
                                        <ul class="industry-listing">
                                            <li><a href="#">Acrylic Thickeners</a></li>
                                            <li><a href="#">Acrylic Dispersing Agents</a></li>
                                            <li><a href="#">Opaque Polymer</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <a href="#">Sustainability</a>
                        </li>
                        <li>
                            <a href="{{ route('frontend.innovation') }}">Innovation</a>
                        </li>
                        <li>
                            <a href="{{ route('frontend.investor-relations') }}">Investor Relations</a>
                        </li>
                        <li>
                            <a href="#">Careers</a>
                        </li>
                        {{-- <li>
                            <a href="{{ route('frontend.contact-us') }}">Contact Us</a>
                        </li> --}}
                    </ul>
                </nav>
            </div>
            <!-- menu end here -->
            <div class="header-item item-right">
                <!-- <a href="contact.html" class="btn-style-1">Get A Quote</a> -->
                <ul class="menuside-icon">
                    <li>
                        <div id="google_translate_element"></div>
                        <script type="text/javascript">
                            function googleTranslateElementInit() {
                                new google.translate.TranslateElement({
                                    pageLanguage: 'en'
                                }, 'google_translate_element');
                            }
                        </script>
                        <label class="dropdown flag">
                            <div class="dd-button">
                                <img src="{{ asset('assets/frontend/img/icon/globe-dark.png') }}">
                            </div>
                            <input type="checkbox" class="dd-input" id="test">
                            <ul class="dd-menu">
                                <li><a class="flag_link eng" data-lang="en">English</a></li>
                                <li><a class="flag_link eng" data-lang="hi">Hindi</a></li>
                                <li><a class="flag_link taj" data-lang="mr">Marathi</a></li>
                                <li><a class="flag_link rus" data-lang="gu">Gujrati</a></li>
                                <li><a class="flag_link rus" data-lang="ml">Malayalam</a></li>
                                <li><a class="flag_link rus" data-lang="ta">Tamil</a></li>
                                <li><a class="flag_link rus" data-lang="ar">Arabic</a></li>
                            </ul>
                        </label>
                    </li>
                    <li>
                        <a href="{{ route('frontend.my-list') }}">
                            <div class="wishlist_icon">
                                <img src="{{ asset('assets/frontend/img/icon/heart.png') }}">
                                <span id="favorites-counter">0</span>
                            </div>
                        </a>
                    <li>
                        <a href="#search">
                            <img src="{{ asset('assets/frontend/img/icon/search-dark.png') }}">
                        </a>
                        <div id="search">
                            <span class="close">&#x2715;</span>
                            <form role="search" id="searchform" action="/search" method="get">
                                <input value="" name="q" type="search" placeholder="Type to search" />
                            </form>
                        </div>
                    </li>
                </ul>
                <!-- mobile menu trigger -->
                <div class="mobile-menu-trigger">
                    <span></span>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- header end here -->
