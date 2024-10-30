@extends('frontend.layouts.master')

@section('title')
    Visen | Contact Us
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
    <section class="breadcrum_section contact_page_breadcrum"
        style="background-image:linear-gradient(#00000038, #00000038), url('{{ asset('assets/frontend/img/contact-banner.jpg') }}');">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrum_content">
                        <h1>Contact Us</h1>
                        <a href="#main_id" class="see-below scroll">
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
                        <li>Innovation</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrum section end here -->

    <!-- contact us start here -->
    <section class="contact_us_page" id="main_id">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading text-center">
                        <h2>Let’s Connect, Communicate & Create.</h2>
                        <p>Whether you are curious to know more about Visen, join our team, ask a question, or provide
                            feedback, we’d love to listen & engage.</p>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <div class="contact_details">
                        <h3>Corporate Head Office</h3>
                        <div class="contact-us__info-item">
                            <div class="contact-us__info-item__icon">
                                <i class="fa fa-map-marker"></i>
                            </div>
                            <div class="contact-us__info-item__text">
                                <h4>Address</h4>
                                <span><b>Visen Industries Limited</b><br>
                                    501/601, Stanford, Plot No. 554, Above Mahindra Showroom,<br>
                                    Junction of S.V. Road & Juhu Lane, Andheri (West), Mumbai - 400 058, India.
                                    <a href="https://maps.app.goo.gl/EAtcYLwaUn3RiMVSA" target="_blank"
                                        class="view_map">View Map</a></span>
                            </div>
                        </div>
                        <div class="contact-us__info-item">
                            <div class="contact-us__info-item__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="contact-us__info-item__text">
                                <h4>Phone Number</h4>
                                <span><a href="tel:912266443333">+ 91 22 6644 3333</a></span>
                            </div>
                        </div>
                        <div class="contact-us__info-item">
                            <div class="contact-us__info-item__icon">
                                <i class="fa fa-fax"></i>
                            </div>
                            <div class="contact-us__info-item__text">
                                <h4>What’s App Chat </h4>
                                <span><a href="#">+ 91 22 6644 3344</a></span>
                            </div>
                        </div>
                        <div class="contact-us__info-item">
                            <div class="contact-us__info-item__icon">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <div class="contact-us__info-item__text">
                                <h4>Email Address</h4>
                                <span><a href="mailto:info@visen.net">info@visen.net</a> , <a
                                        href="mailto:marketing@Visen.net">marketing@Visen.net</a></span>
                            </div>
                        </div>
                        <div class="contact-us__info-item">
                            <div class="contact-us__info-item__icon">
                                <i class="fa fa-globe"></i>
                            </div>
                            <div class="contact-us__info-item__text">
                                <h4>Website</h4>
                                <span><a href="https://www.visen.net/">www.visen.net</a></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="contact_page_img">
                        <div class="owl-carousel owl-theme" id="contact_img">
                            <div class="item">
                                <div class="contact_imgs">
                                    <img src="{{ asset('assets/frontend/img/contact_us1.jpg') }}" class="img-responsive">
                                </div>
                            </div>
                            <div class="item">
                                <div class="contact_imgs">
                                    <img src="{{ asset('assets/frontend/img/contact_us2.jpg') }}" class="img-responsive">
                                </div>
                            </div>
                            <div class="item">
                                <div class="contact_imgs">
                                    <img src="{{ asset('assets/frontend/img/contact_us3.jpg') }}" class="img-responsive">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="locations_section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#plant_details">Factory Details</a></li>
                        <li><a data-toggle="tab" href="#branch_details">Branch Office Details</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="plant_details" class="tab-pane fade  in active">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="contact_info plant_details">
                                        <img src="{{ asset('assets/frontend/img/plant_img.jpg') }}" class="img-responsive">
                                        <h5>Silvasa Plant</h5>
                                        <ul>
                                            <li><b>Visen Industries Limited</b><br>
                                                Plot no, 68, 69, 88,
                                                B-Nanji Industrial Estate,
                                                Village Kharadpada, Silvasa,
                                                Dadra & Nagar Haveli 396 235.<a
                                                    href="https://maps.app.goo.gl/8YziDKitv4wj3Duc7" target="_blank"
                                                    class="view_map">View Map</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="contact_info plant_details">
                                        <img src="{{ asset('assets/frontend/img/plant_img.jpg') }}" class="img-responsive">
                                        <h5>Jammu Plant</h5>
                                        <ul>
                                            <li><b>Visen Industries Limited</b><br>
                                                Phase I, SIDCO Indl Estate,
                                                Bari Brahmana, Jammu,
                                                Jammu and Kashmir, 181133.<a
                                                    href="https://maps.app.goo.gl/KDhdkP1c7xXA1WCd6" target="_blank"
                                                    class="view_map">View Map</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="contact_info plant_details">
                                        <img src="{{ asset('assets/frontend/img/plant_img.jpg') }}" class="img-responsive">
                                        <h5>Tarapur Plant</h5>
                                        <ul>
                                            <li><b>Visen Industries Limited</b><br>
                                                Plot No K 30 31 32,
                                                Midc Tarapur Indl Area, Boisar,
                                                Tarapur, Thane, Maharashtra, 401506.<a
                                                    href="https://maps.app.goo.gl/PZQr8ALghn2iBP966" target="_blank"
                                                    class="view_map">View Map</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="contact_info plant_details">
                                        <img src="{{ asset('assets/frontend/img/plant_img.jpg') }}" class="img-responsive">
                                        <h5>UAE Plant</h5>
                                        <ul>
                                            <li><b>Visen Industries FZE</b><br>
                                                1E- 03D Hamriyah Free Zone
                                                Sharjah UAE P.O.Box -42380.<a
                                                    href="https://maps.app.goo.gl/35dYHtsjhQmgi9C39" target="_blank"
                                                    class="view_map">View Map</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="contact_info plant_details">
                                        <img src="{{ asset('assets/frontend/img/plant_img.jpg') }}" class="img-responsive">
                                        <h5>Chennai Plant</h5>
                                        <ul>
                                            <li><b>Visen Industries Limited</b><br>
                                                Plot No. D2; Sipcot Industrial Park
                                                Mambakka Sriperumbudur;
                                                Kanchipuram;
                                                Tamil Nadu : 602105.<a href="https://maps.app.goo.gl/CS6iRHEqTCZJ7npB9"
                                                    target="_blank" class="view_map">View Map</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="branch_details" class="tab-pane fade">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="contact_info branch_details">
                                        <h5>Delhi</h5>
                                        <ul>
                                            <li><b>Visen Industries Limited</b><br>
                                                12/04, Aditya Complex,
                                                Preet Vihar Commercial Complex,
                                                Vikas Marg, Laxmi Nagar
                                                Delhi - 110 092.<a href="https://maps.app.goo.gl/8xY7piaUN2jGeMU77"
                                                    target="_blank" class="view_map">View Map</a>
                                            </li>
                                            <li><b>Telephone</b> : <a href="tel:01152420579">011 - 5242 0579</a></li>
                                            <li><b>Fax</b> : <a href="#">011 - 2204 6432</a></li>
                                            <li><b>Mobile</b> : <a href="tel:9811079692">+91 98110 79692</a></li>
                                            <li><b>Email</b> : <a href="mailto:arun@visen.net">arun@visen.net</a></li>
                                            <li><b>Contact Person</b> : Mr. Arun Mehta</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="contact_info branch_details">
                                        <h5>East India</h5>
                                        <ul>
                                            <li><b>Visen Industries Limited</b><a
                                                    href="https://maps.app.goo.gl/9XmuQfjFBQehEyrD6" target="_blank"
                                                    class="view_map">View Map</a></li>
                                            <li><b>Telephone</b> : <a href="tel:912266443333">+ 91 22 6644 3333</a></li>
                                            <li><b>Mobile</b> : <a href="tel:918657950487">+91 86579 50487</a></li>
                                            <li><b>Email</b> : <a href="mailto:sonali@visen.net">sonali@visen.net</a></li>
                                            <li><b>Contact Person</b> : Ms. Sonali Goswami</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="contact_info branch_details1">
                                        <h5>Kochi</h5>
                                        <ul>
                                            <li><b>Visen Industries Limited</b><br>
                                                C32/2977, A-5, 2nd floor,
                                                Opp: Anchumuri bus stop,
                                                Ponnurunni, Vyttila.<a href="https://maps.app.goo.gl/7f3JsoNEatHPqsWs9"
                                                    target="_blank" class="view_map">View Map</a>
                                            </li>
                                            <li><b>Telephone</b> : <a href="tel:682019">682 019,</a> <a
                                                    href="tel:04842346043">0484 2346043</a></li>
                                            <li><b>Mobile</b> : <a href="tel:09447790298">+91 94477 90298</a></li>
                                            <li><b>Email</b> : <a href="mailto:avinash@visen.net">avinash@visen.net</a></li>
                                            <li><b>Contact Person</b> : Mr. Avinash Nair</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="about_product_form">
        <div class="container-fluid">
            <div class="row contact_form_row">
                <div class="col-md-5 no-padding">
                    <div class="contact_form_img">
                        <img src="{{ asset('assets/frontend/img/contact_form.jpg') }}" class="img-responsive">
                    </div>
                </div>
                <div class="col-md-7 no-padding">
                    <div class="contact_form">
                        <div class="heading text-center">
                            <h2>Contact Form</h2>
                            <p>Do you want to know more about products and how we can help you find the<br> best
                                alternatives for your needs? Submit your contact details here and we'll get in touch.</p>
                        </div>
                        <form class="product_form">
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="Enter Name">
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="Enter Email Address">
                            </div>
                            <div class="col-md-6">
                                <input type="text" id="mobile_code" class="form-control" placeholder="Phone Number"
                                    name="name">
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="Company">
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="Designation">
                            </div>
                            <div class="col-md-6">
                                <select class="form-control">
                                    <option value="">-- Inquiry Type --</option>
                                    <option value="General enquiry">General enquiry</option>
                                    <option value="Product information">Product information</option>
                                    <option value="Technical question">Technical question</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <textarea type="text" class="form-control" placeholder="Your Location"></textarea>
                            </div>
                            <div class="col-md-6">
                                <textarea type="text" class="form-control" placeholder="Message"></textarea>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check disclaimer_checkbox">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                    <label class="form-check-label" for="flexCheckChecked">
                                        Subscribe me to Visen newsletters. I understand I can unsubscribe at any time.
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check disclaimer_checkbox">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                    <label class="form-check-label" for="flexCheckChecked">
                                        By submitting the contact form, I consent to Visen using the information entered by
                                        me to process my request.
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <center><button class="btn btn-lg" type="submit">Submit</button></center>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact section end -->
@endsection

@push('scripts')
@endpush
