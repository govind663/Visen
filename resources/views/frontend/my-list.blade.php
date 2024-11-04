@extends('frontend.layouts.master')

@section('title')
    Visen | My list
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
        style="background-image:linear-gradient(#00000047, #00000075), url({{ asset('assets/frontend/img/bg/wishlist_bg.jpg') }});">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrum_content">
                        <h1>My list</h1>
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
                        <li>My list</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrum section end here -->

    <!-- main section start here -->
    <section class="wishlist_section" id="main-sec">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading text-center">
                        <h2>Saved Products</h2>
                        <p class="text-justify">
                            Below are the products you are interested in.
                            Click the Submit button to receive TDS, SDS and
                            sample for your evaluation.
                        </p>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-3">
                    <div class="wishlist_box">
                        <div class="wishlist_box_icon">
                            <div class='control-group'>
                                <input class='red-heart-checkbox' checked="checked" id='wishlist1' type='checkbox'>
                                <label for='wishlist1'>
                                </label>
                            </div>
                        </div>
                        <div class="wishlist_product_name">
                            <h4>VISICRYL <span>7650</span></h4>
                        </div>
                        <div class="wishlist_product_details">
                            <p>Suitable for interior / exterior paints & textured finishes.</p>
                            <ul>
                                <li><b>Solid Content % :</b> 50 ± 1</li>
                                <li><b>Viscosity :</b> 20 – 70 Ps</li>
                                <li><b>MFFT :</b> 22⁰C</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="wishlist_box">
                        <div class="wishlist_box_icon">
                            <div class='control-group'>
                                <input class='red-heart-checkbox' checked="checked" id='wishlist2' type='checkbox'>
                                <label for='wishlist2'>
                                </label>
                            </div>
                        </div>
                        <div class="wishlist_product_name">
                            <h4>VISICRYL <span>7545 HV </span></h4>
                        </div>
                        <div class="wishlist_product_details">
                            <p>High viscosity emulsion for textured finishes & interior paints.</p>
                            <ul>
                                <li><b>Solid Content % :</b> 45 ± 1</li>
                                <li><b>Viscosity :</b> 80 – 120 Ps</li>
                                <li><b>MFFT :</b> 13⁰C</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="my_list_btn">
                        <a type="button" class="btn2" data-toggle="modal" data-target="#download_tds_sample">
                            <span class="button__text">Submit</span>
                            <span class="button__icon">
                                <svg fill="#fff" height="18" width="18" version="1.1" id="Layer_1"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    viewBox="0 0 330 330" xml:space="preserve">
                                    <path id="XMLID_222_" d="M250.606,154.389l-150-149.996c-5.857-5.858-15.355-5.858-21.213,0.001
                                            c-5.857,5.858-5.857,15.355,0.001,21.213l139.393,139.39L79.393,304.394c-5.857,5.858-5.857,15.355,0.001,21.213
                                            C82.322,328.536,86.161,330,90,330s7.678-1.464,10.607-4.394l149.999-150.004c2.814-2.813,4.394-6.628,4.394-10.606
                                            C255,161.018,253.42,157.202,250.606,154.389z">
                                    </path>
                                </svg>
                                <!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" stroke-width="2" stroke-linejoin="round" stroke-linecap="round" stroke="currentColor" height="24" fill="none" class="svg"><line y2="19" y1="5" x2="12" x1="12"></line><line y2="12" y1="12" x2="19" x1="5"></line></svg> -->
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- main section end here -->

    <div id="download_tds_sample" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <!--  <h4 class="modal-title">Download TDS</h4> -->
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
                            <div class="col-md-6">
                                <input type="text" id="mobile_code_two" class="form-control"
                                    placeholder="Phone Number" name="name">
                            </div>
                            <div class="col-md-6">
                                <select class="form-control">
                                    <option value="">-- Select Country--</option>
                                    <option value="India">India</option>
                                    <option value="UAE">UAE</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <div class="checkbox-group">
                                    <label>Inquiry Type :</label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" id="inlineCheckbox1" value="TDS"> TDS
                                    </label>

                                    <label class="checkbox-inline">
                                        <input type="checkbox" id="inlineCheckbox2" value="SDS"> SDS
                                    </label>

                                    <label class="checkbox-inline" id="options" name="options">
                                        <input type="checkbox" id="myCheckbox" value="Request A Sample"> Request A Sample
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div id="additionalInput" class="hidden">
                                    <select class="form-control" id="extraInput" name="extraInput">
                                        <option value="">-- Select Quantity --</option>
                                        <option value="1kg">1kg</option>
                                        <option value="2kg">2kg</option>
                                        <option value="3kg">3kg</option>
                                        <option value="4kg">4kg</option>
                                        <option value="5kg">5kg</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <center><button class="btn btn-lg" type="submit">Submit</button></center>
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

<script>
    // Get references to the checkbox and the additional input field
    const checkbox = document.getElementById('myCheckbox');
    const additionalInput = document.getElementById('additionalInput');

    // Function to show or hide the additional input field
    function toggleAdditionalInput() {
        if (checkbox.checked) {
            additionalInput.classList.remove('hidden');
        } else {
            additionalInput.classList.add('hidden');
        }
    }

    // Attach event listener to the checkbox
    checkbox.addEventListener('change', toggleAdditionalInput);
</script>
@endpush
