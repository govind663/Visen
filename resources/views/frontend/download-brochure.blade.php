@extends('frontend.layouts.master')

@section('title')
    Visen | Download Brochure
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
        style="background-image:linear-gradient(#00000047, #00000075), url({{ asset('assets/frontend/img/bg/brochure_bg.jpg') }});">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrum_content">
                        <h1>Download Brochure</h1>
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
                        <li>Download Brochure</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrum section end here -->

    <!-- main section start here -->
    <section class="download_brochure_sec" id="main-sec">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="brochure_box">
                        <div class="brochure_img">
                            <img src="{{ asset('assets/frontend/img/pdf_thumbnail/paints-and-coatings.jpg') }}"
                                class="img-responsive">
                        </div>
                        <div class="brochure_content">
                            <h2>Paints & Coatings</h2>
                            <div class="brochure_content_btn">
                                <a type="button" data-toggle="modal" data-target="#download_brochure" class="btn2"
                                    href="{{ asset('assets/frontend/img/pdf/paints-and-coatings.pdf') }}">
                                    <span class="button__text">Read More</span>
                                    <span class="button__icon">
                                        <svg fill="#fff" height="13" width="13" version="1.1" id="Layer_1"
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
                                <a type="button" data-toggle="modal" data-target="#download_brochure"
                                    class="btn2 brochure_pdf">
                                    <span class="button__text">Download PDF</span>
                                    <span class="button__icon">
                                        <svg fill="#fff" height="13" width="13" version="1.1" id="Layer_1"
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
                </div>
                <div class="col-md-3">
                    <div class="brochure_box">
                        <div class="brochure_img">
                            <img src="{{ asset('assets/frontend/img/pdf_thumbnail/textile-and-non-woven.jpg') }}"
                                class="img-responsive">
                        </div>
                        <div class="brochure_content">
                            <h2>Textile & Non-Wovens</h2>
                            <div class="brochure_content_btn">
                                <a type="button" data-toggle="modal" data-target="#download_brochure" class="btn2"
                                    href="{{ asset('assets/frontend/img/pdf/textile-and-non-woven.pdf') }}">
                                    <span class="button__text">Read More</span>
                                    <span class="button__icon">
                                        <svg fill="#fff" height="13" width="13" version="1.1" id="Layer_1"
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
                                <a type="button" class="btn2 brochure_pdf" data-toggle="modal"
                                    data-target="#download_brochure">
                                    <span class="button__text">Download PDF</span>
                                    <span class="button__icon">
                                        <svg fill="#fff" height="13" width="13" version="1.1" id="Layer_1"
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
                </div>
                <div class="col-md-3">
                    <div class="brochure_box">
                        <div class="brochure_img">
                            <img src="{{ asset('assets/frontend/img/pdf_thumbnail/adhesives.jpg') }}"
                                class="img-responsive">
                        </div>
                        <div class="brochure_content">
                            <h2>Adhesives</h2>
                            <div class="brochure_content_btn">
                                <a type="button" data-toggle="modal" data-target="#download_brochure" class="btn2"
                                    href="{{ asset('assets/frontend/img/pdf_thumbnail/pdf/adhesives.pdf') }}">
                                    <span class="button__text">Read More</span>
                                    <span class="button__icon">
                                        <svg fill="#fff" height="13" width="13" version="1.1" id="Layer_1"
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
                                <a type="button" class="btn2 brochure_pdf" data-toggle="modal"
                                    data-target="#download_brochure">
                                    <span class="button__text">Download PDF</span>
                                    <span class="button__icon">
                                        <svg fill="#fff" height="13" width="13" version="1.1" id="Layer_1"
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
                </div>
                <div class="col-md-3">
                    <div class="brochure_box">
                        <div class="brochure_img">
                            <img src="{{ asset('assets/frontend/img/pdf_thumbnail/paints-and-coatings.jpg') }}"
                                class="img-responsive">
                        </div>
                        <div class="brochure_content">
                            <h2>Construction Chemicals</h2>
                            <div class="brochure_content_btn">
                                <a type="button" data-toggle="modal" data-target="#download_brochure" class="btn2"
                                    href="{{ asset('assets/frontend/img/pdf_thumbnail/pdf/paint-and-coatings.pdf') }}">
                                    <span class="button__text">Read More</span>
                                    <span class="button__icon">
                                        <svg fill="#fff" height="13" width="13" version="1.1" id="Layer_1"
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
                                <a type="button" class="btn2 brochure_pdf" data-toggle="modal"
                                    data-target="#download_brochure">
                                    <span class="button__text">Download PDF</span>
                                    <span class="button__icon">
                                        <svg fill="#fff" height="13" width="13" version="1.1" id="Layer_1"
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
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrum section end here -->

    <!-- Download TDS -->
    <div id="download_brochure" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Download Brochure</h4>
                    <p>Please fill the required fields</p>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <form class="product_form">
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="Enter Your Name">
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="Enter Email Address">
                            </div>
                            <div class="col-md-12">
                                <input type="text" id="mobile_code_two" class="form-control"
                                    placeholder="Phone Number" name="name">
                            </div>
                            <div class="col-md-12">
                                <textarea type="text" class="form-control" placeholder="Subject"></textarea>
                            </div>
                            <div class="col-md-12">
                                <center>
                                    <button class="btn btn-lg" type="submit">Submit</button>
                                </center>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div> -->
            </div>
        </div>
    </div>
    <a id="button"></a>
@endsection

@push('scripts')
<script>
    /* When the user clicks on the button,
      toggle between hiding and showing the dropdown content */
      function myFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
      }

      // Close the dropdown if the user clicks outside of it
      window.onclick = function(event) {
        if (!event.target.matches('.dropbtn')) {
          var dropdowns = document.getElementsByClassName("dropdown-content");
          var i;
          for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
              openDropdown.classList.remove('show');
            }
          }
        }
      }
</script>
@endpush
