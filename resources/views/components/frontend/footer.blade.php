<hr>
<!-- Wrap Subscribe Section Start -->
<section class="subscribe_section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="newsletter_title">
                    <h3>Subscribe our newsletter to get the latest news & updates</h3>
                </div>
            </div>
            <div class="col-md-6">
                <div class="newsletter_form">
                    <form class="form-subscribe" action="#">
                        <div class="input-group">
                            <input type="text" class="form-control input-lg"
                                placeholder="Enter Email Address">
                            <span class="input-group-btn">
                                <button class="btn btn-success btn-lg" type="submit">Subscribe</button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Wrap Subscribe Section End -->
<!-- Footer Section Start -->
<footer>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <div class="footer-widgets">
                    <!-- <h3 class="footer-title">About Us</h3> -->
                    <div class="footer-about">
                        <img src="{{ asset('assets/frontend/img/logo/footer-logo.png') }}" class="footer-logo">
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-4">
                        <div class="footer-widgets">
                            <h3 class="footer-title">Corporate</h3>
                            <ul class="footer-links">
                                <li><a href="#">About</a></li>
                                <li><a href="#">Sustainability</a></li>
                                <li><a href="#">CSR</a></li>
                                <li><a href="{{ route('frontend.innovation') }}">Innovation</a></li>
                                <li><a href="our-certifications.html">Our Certifications</a></li>
                                <li><a href="{{ route('frontend.news-media-events') }}">News, Media & Events</a></li>
                                <li><a href="{{ route('frontend.investor-relations') }}">Investor Relations</a></li>
                                <li><a href="#">Careers</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="footer-widgets">
                            <h3 class="footer-title">Markets and Products</h3>
                            <ul class="footer-links">
                                @if(!empty($industry))
                                    @foreach($industry as $index => $value)
                                        <li><a href="#">{{ $value->industries_name }}</a></li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="footer-widgets">
                            <h3 class="footer-title">Resources</h3>
                            <ul class="footer-links">
                                <li><a href="#">Find Product</a></li>
                                <li><a href="#">Download TDS / MSDS</a></li>
                                <li><a href="{{ route('frontend.download-brochure') }}">Download Brochure</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="footer-widgets">
                    <h3 class="footer-title">Contact Us</h3>
                    <ul class="footer-links contact_footer">
                        <li>
                            <i class="fa fa-phone"></i>
                            <a href="tel:912266443333">+91 22 6644 3333</a>
                        </li>
                        <li>
                            <i class="fa fa-envelope"></i>
                            <a href="mailto:info@visen.net">info@visen.net</a>
                            <!-- / <a href="mailto:marketing@visen.net">marketing@visen.net --></a>
                        </li>
                        <li><a href="{{ route('frontend.contact-us') }}"><b>Our Locations</b></a></li>
                    </ul>
                    <ul class="footer-social-links">
                        <!-- <li>Follow Us:</li> -->
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <div class="copyright-left">
                    <p>
                        Copyright © 2024 Visen All Rights Reserved.
                        <!-- Developed By <a href="https://matrixbricks.com/">Matrix Bricks</a> -->
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="copyright-right">
                    <ul class="legal-links">
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms & Conditions</a></li>
                        <li><a href="#">Cookie Policy</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer End -->
<a id="button"></a>
