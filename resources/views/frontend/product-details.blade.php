@extends('frontend.layouts.master')

@section('title')
    Visen | {{ $categoryName }}
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
        style="background-image:linear-gradient(#00000047, #00000075), url({{ asset('assets/frontend/img/bg/interior-and-exterior-paint-banner.jpg') }});">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrum_content">
                        <h1>{{ $categoryName }}</h1>
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
                        <li><a href="#">Markets & Products</a></li>
                        <li><a href="#">{{ $industryName }}</a></li>
                        <li>{{ $categoryName }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrum section end here -->

    <!-- Product Details section start here -->
    <section class="product_details">
        <div class="container-fluid">
            <div class="row row_reverse">
                
                <div class="col-md-3">
                    <div class="product_sidebar">
                        <ul class="list-unstyled">
                            @if(!empty($industry))
                                @foreach($industry as $value)
                                    <li>
                                        <button class="course-accordion {{ $value->industries_name == $industryName ? 'active' : '' }}">
                                            {{ $value->industries_name }}
                                        </button>
                                        <div class="course-panel" style="max-height: {{ $value->industries_name == $industryName ? '100%' : '0' }};">
                                            <ul class="product_sidebar_listing">
                                                @if(!empty($value->industry_category))
                                                    @foreach($value->industry_category as $category)
                                                        <li class="{{ $category == $categoryName ? 'active' : '' }}">
                                                            <a href="{{ route('frontend.product-details', [
                                                                'industry' => $value->industries_name,
                                                                'category' => $category
                                                            ]) }}">
                                                                {{ $category }}
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                @endif
                                            </ul>
                                        </div>
                                    </li>
                                @endforeach
                            @endif
                        </ul>                        
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="product_discription">
                        <p class="text-justify">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                            voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                            non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </p>
                        <h4>Key Features:</h4>
                        <ul class="listing">
                            <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                            <li>Duis aute irure dolor in reprehenderit in voluptate.</li>
                            <li>Ut enim ad minim veniam, quis nostrud.</li>
                            <li>Excepteur sint occaecat cupidatat non proident.</li>
                            <li>Duis aute irure dolor in reprehenderit in voluptate.</li>
                        </ul>
                        <p class="text-justify">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                            voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                            non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </p>
                    </div>
                    <hr>
                    <div class="table_content" id="product_details_sec">
                        <h4>Filter by Chemistry</h4>
                        <select id="size_select" class="form-control">
                            <option value="all">All </option>
                            <option value="styrene-acrylic">Styrene Acrylic </option>
                            <option value="pure-acrylic">Pure Acrylic</option>
                            <option value="vam">VAM</option>
                        </select>
                        <!--Size dropdown content-->
                        <div id="all" class="size_chart">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table_title">
                                        <h2>STYRENE & PURE ACRYLATES FOR PAINTS & COATINGS</h2>
                                        <h3>Styrene Acrylic Emulsions</h3>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <th width="20%" colspan="2">PRODUCT</th>
                                                <th width="16%">SOLID CONTENT %</th>
                                                <th width="14%">VISCOSITY</th>
                                                <th width="5%">MFFT</th>
                                                <th width="25%">FEATURES / RECOMMENDED APPLICATION</th>
                                                <th width="20%">RESOURCES</th>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" class="togglePopup">
                                                    <div id="popup" class="popup"><i class="fa fa-check"></i>
                                                        Product Saved</div>
                                                </td>
                                                <td>
                                                    VISICRYL 7650
                                                </td>
                                                <td>50 ± 1</td>
                                                <td>20 - 70 Ps</td>
                                                <td>22⁰C</td>
                                                <td>Suitable for interior / exterior paints & textured finishes</td>
                                                <td class="pdf_link">
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#download_tds">Download TDS/ SDS</a><br>
                                                    <hr>
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#request_sample">Request A Sample</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" class="togglePopup">
                                                    <div id="popup" class="popup"><i class="fa fa-check"></i>
                                                        Product Saved</div>
                                                </td>
                                                <td>
                                                    VISICRYL 7298
                                                </td>
                                                <td>50 ± 1</td>
                                                <td>20 - 80 Ps</td>
                                                <td>30⁰C</td>
                                                <td>APEO & Formaldehyde free emulsion with good gloss and dirt pick up
                                                    resistance suitable for interior / exterior paints & textured finishes
                                                </td>
                                                <td class="pdf_link">
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#download_tds">Download TDS/ SDS</a><br>
                                                    <hr>
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#request_sample">Request A Sample</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" class="togglePopup">
                                                    <div id="popup" class="popup"><i class="fa fa-check"></i>
                                                        Product Saved</div>
                                                </td>
                                                <td>
                                                    VISICRYL 7296
                                                </td>
                                                <td>50 ± 1</td>
                                                <td>40 - 100 Ps</td>
                                                <td>21⁰C</td>
                                                <td>APEO & Formaldehyde free emulsion offering excellent pigment binding and
                                                    stability to paint. Suitable for interior /exterior paints</td>
                                                <td class="pdf_link">
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#download_tds">Download TDS/ SDS</a><br>
                                                    <hr>
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#request_sample">Request A Sample</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" class="togglePopup">
                                                    <div id="popup" class="popup"><i class="fa fa-check"></i>
                                                        Product Saved</div>
                                                </td>
                                                <td>
                                                    VISICRYL 7796 E
                                                </td>
                                                <td>50 ± 1</td>
                                                <td>4 - 12 Ps</td>
                                                <td>20⁰C</td>
                                                <td>APEO, Formaldehyde & Ammonia free emulsion suitable for interior /
                                                    exterior paints and textured finishes with good sheen and exterior
                                                    durability</td>
                                                <td class="pdf_link">
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#download_tds">Download TDS/ SDS</a><br>
                                                    <hr>
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#request_sample">Request A Sample</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" class="togglePopup">
                                                    <div id="popup" class="popup"><i class="fa fa-check"></i>
                                                        Product Saved</div>
                                                </td>
                                                <td>
                                                    VISICRYL 7501
                                                </td>
                                                <td>50 ± 1</td>
                                                <td>40 - 80 Ps</td>
                                                <td>17⁰C</td>
                                                <td>APEO & Formaldehyde free emulsion suitable for Interior / exterior
                                                    paints & textured finishes</td>
                                                <td class="pdf_link">
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#download_tds">Download TDS/ SDS</a><br>
                                                    <hr>
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#request_sample">Request A Sample</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" class="togglePopup">
                                                    <div id="popup" class="popup"><i class="fa fa-check"></i>
                                                        Product Saved</div>
                                                </td>
                                                <td> VISICRYL 7290</td>
                                                <td>50 ± 1</td>
                                                <td>35 - 70 Ps</td>
                                                <td>20⁰C</td>
                                                <td>High performance APEO & Formaldehyde free emulsion with excellent scrub
                                                    resistance for interior / exterior paints</td>
                                                <td class="pdf_link">
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#download_tds">Download TDS/ SDS</a><br>
                                                    <hr>
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#request_sample">Request A Sample</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" class="togglePopup">
                                                    <div id="popup" class="popup"><i class="fa fa-check"></i>
                                                        Product Saved</div>
                                                </td>
                                                <td> VISICRYL 7669 E</td>
                                                <td>50 ± 1</td>
                                                <td>20 - 70 Ps</td>
                                                <td>22⁰C</td>
                                                <td>APEO & Formaldehyde free emulsion suitable for premium interior /
                                                    exterior paints & textured finishes</td>
                                                <td class="pdf_link">
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#download_tds">Download TDS/ SDS</a><br>
                                                    <hr>
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#request_sample">Request A Sample</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" class="togglePopup">
                                                    <div id="popup" class="popup"><i class="fa fa-check"></i>
                                                        Product Saved</div>
                                                </td>
                                                <td> VISICRYL 7668</td>
                                                <td>50 ± 1</td>
                                                <td>20 - 70 Ps</td>
                                                <td>22⁰C</td>
                                                <td>Suitable for all types of coatings, textured finishes, adhesives &
                                                    surfacing compounds</td>
                                                <td class="pdf_link">
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#download_tds">Download TDS/ SDS</a><br>
                                                    <hr>
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#request_sample">Request A Sample</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" class="togglePopup">
                                                    <div id="popup" class="popup"><i class="fa fa-check"></i>
                                                        Product Saved</div>
                                                </td>
                                                <td> VISICRYL 7748</td>
                                                <td>48 ± 1</td>
                                                <td>20 - 70 Ps</td>
                                                <td>+20⁰C</td>
                                                <td>APEO & Formaldehyde free emulsion with superior stability & high wet
                                                    scrub resistance suitable for interior / exterior paints</td>
                                                <td class="pdf_link">
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#download_tds">Download TDS/ SDS</a><br>
                                                    <hr>
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#request_sample">Request A Sample</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" class="togglePopup">
                                                    <div id="popup" class="popup"><i class="fa fa-check"></i>
                                                        Product Saved</div>
                                                </td>
                                                <td> VISICRYL 7545 HV</td>
                                                <td>45 ± 1</td>
                                                <td>80 - 120 Ps</td>
                                                <td>13⁰C</td>
                                                <td>High viscosity emulsion for textured finishes & interior paints</td>
                                                <td class="pdf_link">
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#download_tds">Download TDS/ SDS</a><br>
                                                    <hr>
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#request_sample">Request A Sample</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" class="togglePopup">
                                                    <div id="popup" class="popup"><i class="fa fa-check"></i>
                                                        Product Saved</div>
                                                </td>
                                                <td> VISICRYL 7645</td>
                                                <td>45 ± 1</td>
                                                <td>5 - 15 Ps</td>
                                                <td>+20⁰C</td>
                                                <td>APEO & Formaldehyde free emulsion with better stability & high wet scrub
                                                    resistance suitable for interior / exterior paints</td>
                                                <td class="pdf_link">
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#download_tds">Download TDS/ SDS</a><br>
                                                    <hr>
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#request_sample">Request A Sample</a>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="table_title">
                                        <h3>Pure Acrylic Emulsions</h3>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <th width="20%" colspan="2">PRODUCT</th>
                                                <th width="16%">SOLID CONTENT %</th>
                                                <th width="14%">VISCOSITY</th>
                                                <th width="5%">MFFT</th>
                                                <th width="25%">FEATURES / RECOMMENDED APPLICATION</th>
                                                <th width="20%">RESOURCES</th>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" class="togglePopup">
                                                    <div id="popup" class="popup"><i class="fa fa-check"></i>
                                                        Product Saved</div>
                                                </td>
                                                <td>VISICRYL 8351 E</td>
                                                <td>50 ± 1</td>
                                                <td>100 - 500 Cps</td>
                                                <td>13⁰C</td>
                                                <td>APEO, Formaldehyde & Ammonia free emulsion suitable for premium quality
                                                    coatings with sheen offering excellent balance of overall paint
                                                    properties for interior / exterior paints</td>
                                                <td class="pdf_link">
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#download_tds">Download TDS/ SDS</a><br>
                                                    <hr>
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#request_sample">Request A Sample</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" class="togglePopup">
                                                    <div id="popup" class="popup"><i class="fa fa-check"></i>
                                                        Product Saved</div>
                                                </td>
                                                <td>VISICRYL 8354 GN</td>
                                                <td>50 ± 1</td>
                                                <td>50 - 500 Cps</td>
                                                <td>13⁰C</td>
                                                <td>APEO, Formaldehyde & Ammonia free emulsion suitable for low odour
                                                    premium quality coatings</td>
                                                <td class="pdf_link">
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#download_tds">Download TDS/ SDS</a><br>
                                                    <hr>
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#request_sample">Request A Sample</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" class="togglePopup">
                                                    <div id="popup" class="popup"><i class="fa fa-check"></i>
                                                        Product Saved</div>
                                                </td>
                                                <td>VISICRYL 8054 E</td>
                                                <td>50 ± 1</td>
                                                <td>50 - 500 Cps</td>
                                                <td>17⁰C</td>
                                                <td>APEO, Formaldehyde & Ammonia free emulsion suitable for premium quality
                                                    interior / exterior paints with good wet adhesion</td>
                                                <td class="pdf_link">
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#download_tds">Download TDS/ SDS</a><br>
                                                    <hr>
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#request_sample">Request A Sample</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" class="togglePopup">
                                                    <div id="popup" class="popup"><i class="fa fa-check"></i>
                                                        Product Saved</div>
                                                </td>
                                                <td>VISICRYL 8155 E 1</td>
                                                <td>55 ± 1</td>
                                                <td>300 - 1000 Cps</td>
                                                <td>23⁰C</td>
                                                <td>High solids premium APEO, Formaldehyde & Ammonia free emulsion suitable
                                                    for high sheen interior / exterior paints & weather coats</td>
                                                <td class="pdf_link">
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#download_tds">Download TDS/ SDS</a><br>
                                                    <hr>
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#request_sample">Request A Sample</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" class="togglePopup">
                                                    <div id="popup" class="popup"><i class="fa fa-check"></i>
                                                        Product Saved</div>
                                                </td>
                                                <td>VISICRYL 8055 E</td>
                                                <td>50 ± 1</td>
                                                <td>100 - 1000 Cps</td>
                                                <td>17⁰C</td>
                                                <td>APEO, Formaldehyde & Ammonia free emulsion suitable for premium quality
                                                    interior / exterior paints with good wet adhesion</td>
                                                <td class="pdf_link">
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#download_tds">Download TDS/ SDS</a><br>
                                                    <hr>
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#request_sample">Request A Sample</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" class="togglePopup">
                                                    <div id="popup" class="popup"><i class="fa fa-check"></i>
                                                        Product Saved</div>
                                                </td>
                                                <td>VISICRYL 8347</td>
                                                <td>47 ± 1</td>
                                                <td>100 - 1000 Cps</td>
                                                <td>+48⁰C</td>
                                                <td>APEO, Formaldehyde & Ammonia Free Hard and robust emulsion with
                                                    Ultrafine particle size and excellent resistance to UV and dirt pick up.
                                                    Ideal for sheen paints, floor coatings, tile coatings, penetrating
                                                    primers etc. Binder for high performance coatings with excellent
                                                    exterior durability</td>
                                                <td class="pdf_link">
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#download_tds">Download TDS/ SDS</a><br>
                                                    <hr>
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#request_sample">Request A Sample</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" class="togglePopup">
                                                    <div id="popup" class="popup"><i class="fa fa-check"></i>
                                                        Product Saved</div>
                                                </td>
                                                <td>VISICRYL 8826</td>
                                                <td>50 ± 1</td>
                                                <td>10 - 20 Ps</td>
                                                <td>+12⁰C</td>
                                                <td>High Performance emulsion free from formaldehyde with excellent alkali
                                                    and weathering resistance. It has superior compatibility with variety of
                                                    decorative colorants and ideal for wide range of PVC paints, fine,
                                                    medium heavy texture and stone finishes</td>
                                                <td class="pdf_link">
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#download_tds">Download TDS/ SDS</a><br>
                                                    <hr>
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#request_sample">Request A Sample</a>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="table_title">
                                        <h2>VAM ACRYLATE BASED EMULSIONS FOR PAINTS & COATINGS</h2>
                                        <h3>Vinyl Acrylic Emulsions</h3>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <th width="20%" colspan="2">PRODUCT</th>
                                                <th width="16%">SOLID CONTENT %</th>
                                                <th width="14%">VISCOSITY</th>
                                                <th width="5%">MFFT</th>
                                                <th width="25%">FEATURES / RECOMMENDED APPLICATION</th>
                                                <th width="20%">RESOURCES</th>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" class="togglePopup">
                                                    <div id="popup" class="popup"><i class="fa fa-check"></i>
                                                        Product Saved</div>
                                                </td>
                                                <td>VISICRYL 6555</td>
                                                <td>55 ± 1</td>
                                                <td>300-700 Cps</td>
                                                <td>11⁰C</td>
                                                <td>APEO & Formaldehyde free emulsion suitable for Interior paints with
                                                    medium to high PVC</td>
                                                <td class="pdf_link">
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#download_tds">Download TDS/ SDS</a><br>
                                                    <hr>
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#request_sample">Request A Sample</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" class="togglePopup">
                                                    <div id="popup" class="popup"><i class="fa fa-check"></i>
                                                        Product Saved</div>
                                                </td>
                                                <td>VISICRYL 6510</td>
                                                <td>50 ± 1</td>
                                                <td>100-600 Cps</td>
                                                <td>12⁰C</td>
                                                <td>APEO & Formaldehyde free emulsion suitable for interior paints with
                                                    excellent wet scrub</td>
                                                <td class="pdf_link">
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#download_tds">Download TDS/ SDS</a><br>
                                                    <hr>
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#request_sample">Request A Sample</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" class="togglePopup">
                                                    <div id="popup" class="popup"><i class="fa fa-check"></i>
                                                        Product Saved</div>
                                                </td>
                                                <td>VISICRYL 6520</td>
                                                <td>50 ± 1</td>
                                                <td>1500-4000 Cps</td>
                                                <td>12⁰C</td>
                                                <td>APEO & Formaldehyde free emulsion suitable for interior paints with
                                                    excellent wet scrub</td>
                                                <td class="pdf_link">
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#download_tds">Download TDS/ SDS</a><br>
                                                    <hr>
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#request_sample">Request A Sample</a>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="table_title">
                                        <h3>VAM Veova Emulsions</h3>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <th width="20%" colspan="2">PRODUCT</th>
                                                <th width="16%">SOLID CONTENT %</th>
                                                <th width="14%">VISCOSITY</th>
                                                <th width="5%">MFFT</th>
                                                <th width="25%">FEATURES / RECOMMENDED APPLICATION</th>
                                                <th width="20%">RESOURCES</th>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" class="togglePopup">
                                                    <div id="popup" class="popup"><i class="fa fa-check"></i>
                                                        Product Saved</div>
                                                </td>
                                                <td>VISIMER 4556</td>
                                                <td>55 ± 1</td>
                                                <td>5-20 Ps</td>
                                                <td>14⁰C</td>
                                                <td>APEO, Formaldehyde & Ammonia free emulsion suitable for economical
                                                    interior/exterior paints & primers</td>
                                                <td class="pdf_link">
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#download_tds">Download TDS/ SDS</a><br>
                                                    <hr>
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#request_sample">Request A Sample</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" class="togglePopup">
                                                    <div id="popup" class="popup"><i class="fa fa-check"></i>
                                                        Product Saved</div>
                                                </td>
                                                <td>VISIMER 4571 E</td>
                                                <td>55 ± 1</td>
                                                <td>20-50 Ps</td>
                                                <td>13⁰C</td>
                                                <td>APEO, Formaldehyde & Ammonia free emulsion suitable for economical
                                                    interior/exterior paints & primers</td>
                                                <td class="pdf_link">
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#download_tds">Download TDS/ SDS</a><br>
                                                    <hr>
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#request_sample">Request A Sample</a>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="table_title">
                                        <h3>VAM Veova Ter Polymer Emulsions</h3>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <th width="20%" colspan="2">PRODUCT</th>
                                                <th width="16%">SOLID CONTENT %</th>
                                                <th width="14%">VISCOSITY</th>
                                                <th width="7%">MFFT</th>
                                                <th width="25%">FEATURES / RECOMMENDED APPLICATION</th>
                                                <th width="20%">RESOURCES</th>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" class="togglePopup">
                                                    <div id="popup" class="popup"><i class="fa fa-check"></i>
                                                        Product Saved</div>
                                                </td>
                                                <td>VISIMER 4954 E</td>
                                                <td>55 ± 1</td>
                                                <td>10-25 Ps</td>
                                                <td>+ 13⁰C</td>
                                                <td>APEO & Formaldehyde free emulsion for interior & exterior coatings &
                                                    textured finishes offering high resistance to yellowing / discoloration
                                                    of paints</td>
                                                <td class="pdf_link">
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#download_tds">Download TDS/ SDS</a><br>
                                                    <hr>
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#request_sample">Request A Sample</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" class="togglePopup">
                                                    <div id="popup" class="popup"><i class="fa fa-check"></i>
                                                        Product Saved</div>
                                                </td>
                                                <td>VISIMER 4955 E</td>
                                                <td>55 ± 1</td>
                                                <td>30-50 Ps</td>
                                                <td>+ 13⁰C</td>
                                                <td>APEO & Formaldehyde free emulsion with higher viscosity for interior and
                                                    exterior coatings and textured finishes offering high resistance to
                                                    yellowing / discoloration of paints</td>
                                                <td class="pdf_link">
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#download_tds">Download TDS/ SDS</a><br>
                                                    <hr>
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#request_sample">Request A Sample</a>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="styrene-acrylic" class="size_chart">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table_title">
                                        <h2>STYRENE & PURE ACRYLATES FOR PAINTS & COATINGS</h2>
                                        <h3>Styrene Acrylic Emulsions</h3>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <th width="20%" colspan="2">PRODUCT</th>
                                                <th width="16%">SOLID CONTENT %</th>
                                                <th width="14%">VISCOSITY</th>
                                                <th width="5%">MFFT</th>
                                                <th width="25%">FEATURES / RECOMMENDED APPLICATION</th>
                                                <th width="20%">RESOURCES</th>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" class="togglePopup">
                                                    <div id="popup" class="popup"><i class="fa fa-check"></i>
                                                        Product Saved</div>
                                                </td>
                                                <td>
                                                    VISICRYL 7650
                                                </td>
                                                <td>50 ± 1</td>
                                                <td>20 - 70 Ps</td>
                                                <td>22⁰C</td>
                                                <td>Suitable for interior / exterior paints & textured finishes</td>
                                                <td class="pdf_link">
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#download_tds">Download TDS/ SDS</a><br>
                                                    <hr>
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#request_sample">Request A Sample</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" class="togglePopup">
                                                    <div id="popup" class="popup"><i class="fa fa-check"></i>
                                                        Product Saved</div>
                                                </td>
                                                <td>
                                                    VISICRYL 7298
                                                </td>
                                                <td>50 ± 1</td>
                                                <td>20 - 80 Ps</td>
                                                <td>30⁰C</td>
                                                <td>APEO & Formaldehyde free emulsion with good gloss and dirt pick up
                                                    resistance suitable for interior / exterior paints & textured finishes
                                                </td>
                                                <td class="pdf_link">
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#download_tds">Download TDS/ SDS</a><br>
                                                    <hr>
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#request_sample">Request A Sample</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" class="togglePopup">
                                                    <div id="popup" class="popup"><i class="fa fa-check"></i>
                                                        Product Saved</div>
                                                </td>
                                                <td>
                                                    VISICRYL 7296
                                                </td>
                                                <td>50 ± 1</td>
                                                <td>40 - 100 Ps</td>
                                                <td>21⁰C</td>
                                                <td>APEO & Formaldehyde free emulsion offering excellent pigment binding and
                                                    stability to paint. Suitable for interior /exterior paints</td>
                                                <td class="pdf_link">
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#download_tds">Download TDS/ SDS</a><br>
                                                    <hr>
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#request_sample">Request A Sample</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" class="togglePopup">
                                                    <div id="popup" class="popup"><i class="fa fa-check"></i>
                                                        Product Saved</div>
                                                </td>
                                                <td>
                                                    VISICRYL 7796 E
                                                </td>
                                                <td>50 ± 1</td>
                                                <td>4 - 12 Ps</td>
                                                <td>20⁰C</td>
                                                <td>APEO, Formaldehyde & Ammonia free emulsion suitable for interior /
                                                    exterior paints and textured finishes with good sheen and exterior
                                                    durability</td>
                                                <td class="pdf_link">
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#download_tds">Download TDS/ SDS</a><br>
                                                    <hr>
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#request_sample">Request A Sample</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" class="togglePopup">
                                                    <div id="popup" class="popup"><i class="fa fa-check"></i>
                                                        Product Saved</div>
                                                </td>
                                                <td>
                                                    VISICRYL 7501
                                                </td>
                                                <td>50 ± 1</td>
                                                <td>40 - 80 Ps</td>
                                                <td>17⁰C</td>
                                                <td>APEO & Formaldehyde free emulsion suitable for Interior / exterior
                                                    paints & textured finishes</td>
                                                <td class="pdf_link">
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#download_tds">Download TDS/ SDS</a><br>
                                                    <hr>
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#request_sample">Request A Sample</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" class="togglePopup">
                                                    <div id="popup" class="popup"><i class="fa fa-check"></i>
                                                        Product Saved</div>
                                                </td>
                                                <td> VISICRYL 7290</td>
                                                <td>50 ± 1</td>
                                                <td>35 - 70 Ps</td>
                                                <td>20⁰C</td>
                                                <td>High performance APEO & Formaldehyde free emulsion with excellent scrub
                                                    resistance for interior / exterior paints</td>
                                                <td class="pdf_link">
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#download_tds">Download TDS/ SDS</a><br>
                                                    <hr>
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#request_sample">Request A Sample</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" class="togglePopup">
                                                    <div id="popup" class="popup"><i class="fa fa-check"></i>
                                                        Product Saved</div>
                                                </td>
                                                <td> VISICRYL 7669 E</td>
                                                <td>50 ± 1</td>
                                                <td>20 - 70 Ps</td>
                                                <td>22⁰C</td>
                                                <td>APEO & Formaldehyde free emulsion suitable for premium interior /
                                                    exterior paints & textured finishes</td>
                                                <td class="pdf_link">
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#download_tds">Download TDS/ SDS</a><br>
                                                    <hr>
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#request_sample">Request A Sample</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" class="togglePopup">
                                                    <div id="popup" class="popup"><i class="fa fa-check"></i>
                                                        Product Saved</div>
                                                </td>
                                                <td> VISICRYL 7668</td>
                                                <td>50 ± 1</td>
                                                <td>20 - 70 Ps</td>
                                                <td>22⁰C</td>
                                                <td>Suitable for all types of coatings, textured finishes, adhesives &
                                                    surfacing compounds</td>
                                                <td class="pdf_link">
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#download_tds">Download TDS/ SDS</a><br>
                                                    <hr>
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#request_sample">Request A Sample</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" class="togglePopup">
                                                    <div id="popup" class="popup"><i class="fa fa-check"></i>
                                                        Product Saved</div>
                                                </td>
                                                <td> VISICRYL 7748</td>
                                                <td>48 ± 1</td>
                                                <td>20 - 70 Ps</td>
                                                <td>+20⁰C</td>
                                                <td>APEO & Formaldehyde free emulsion with superior stability & high wet
                                                    scrub resistance suitable for interior / exterior paints</td>
                                                <td class="pdf_link">
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#download_tds">Download TDS/ SDS</a><br>
                                                    <hr>
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#request_sample">Request A Sample</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" class="togglePopup">
                                                    <div id="popup" class="popup"><i class="fa fa-check"></i>
                                                        Product Saved</div>
                                                </td>
                                                <td> VISICRYL 7545 HV</td>
                                                <td>45 ± 1</td>
                                                <td>80 - 120 Ps</td>
                                                <td>13⁰C</td>
                                                <td>High viscosity emulsion for textured finishes & interior paints</td>
                                                <td class="pdf_link">
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#download_tds">Download TDS/ SDS</a><br>
                                                    <hr>
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#request_sample">Request A Sample</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" class="togglePopup">
                                                    <div id="popup" class="popup"><i class="fa fa-check"></i>
                                                        Product Saved</div>
                                                </td>
                                                <td> VISICRYL 7645</td>
                                                <td>45 ± 1</td>
                                                <td>5 - 15 Ps</td>
                                                <td>+20⁰C</td>
                                                <td>APEO & Formaldehyde free emulsion with better stability & high wet scrub
                                                    resistance suitable for interior / exterior paints</td>
                                                <td class="pdf_link">
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#download_tds">Download TDS/ SDS</a><br>
                                                    <hr>
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#request_sample">Request A Sample</a>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="pure-acrylic" class="size_chart">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table_title">
                                        <h2>STYRENE & PURE ACRYLATES FOR PAINTS & COATINGS</h2>
                                        <h3>Pure Acrylic Emulsions</h3>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <th width="20%" colspan="2">PRODUCT</th>
                                                <th width="16%">SOLID CONTENT %</th>
                                                <th width="14%">VISCOSITY</th>
                                                <th width="5%">MFFT</th>
                                                <th width="25%">FEATURES / RECOMMENDED APPLICATION</th>
                                                <th width="20%">RESOURCES</th>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" class="togglePopup">
                                                    <div id="popup" class="popup"><i class="fa fa-check"></i>
                                                        Product Saved</div>
                                                </td>
                                                <td>VISICRYL 8351 E</td>
                                                <td>50 ± 1</td>
                                                <td>100 - 500 Cps</td>
                                                <td>13⁰C</td>
                                                <td>APEO, Formaldehyde & Ammonia free emulsion suitable for premium quality
                                                    coatings with sheen offering excellent balance of overall paint
                                                    properties for interior / exterior paints</td>
                                                <td class="pdf_link">
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#download_tds">Download TDS/ SDS</a><br>
                                                    <hr>
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#request_sample">Request A Sample</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" class="togglePopup">
                                                    <div id="popup" class="popup"><i class="fa fa-check"></i>
                                                        Product Saved</div>
                                                </td>
                                                <td>VISICRYL 8354 GN</td>
                                                <td>50 ± 1</td>
                                                <td>50 - 500 Cps</td>
                                                <td>13⁰C</td>
                                                <td>APEO, Formaldehyde & Ammonia free emulsion suitable for low odour
                                                    premium quality coatings</td>
                                                <td class="pdf_link">
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#download_tds">Download TDS/ SDS</a><br>
                                                    <hr>
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#request_sample">Request A Sample</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" class="togglePopup">
                                                    <div id="popup" class="popup"><i class="fa fa-check"></i>
                                                        Product Saved</div>
                                                </td>
                                                <td>VISICRYL 8054 E</td>
                                                <td>50 ± 1</td>
                                                <td>50 - 500 Cps</td>
                                                <td>17⁰C</td>
                                                <td>APEO, Formaldehyde & Ammonia free emulsion suitable for premium quality
                                                    interior / exterior paints with good wet adhesion</td>
                                                <td class="pdf_link">
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#download_tds">Download TDS/ SDS</a><br>
                                                    <hr>
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#request_sample">Request A Sample</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" class="togglePopup">
                                                    <div id="popup" class="popup"><i class="fa fa-check"></i>
                                                        Product Saved</div>
                                                </td>
                                                <td>VISICRYL 8155 E 1</td>
                                                <td>55 ± 1</td>
                                                <td>300 - 1000 Cps</td>
                                                <td>23⁰C</td>
                                                <td>High solids premium APEO, Formaldehyde & Ammonia free emulsion suitable
                                                    for high sheen interior / exterior paints & weather coats</td>
                                                <td class="pdf_link">
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#download_tds">Download TDS/ SDS</a><br>
                                                    <hr>
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#request_sample">Request A Sample</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" class="togglePopup">
                                                    <div id="popup" class="popup"><i class="fa fa-check"></i>
                                                        Product Saved</div>
                                                </td>
                                                <td>VISICRYL 8055 E</td>
                                                <td>50 ± 1</td>
                                                <td>100 - 1000 Cps</td>
                                                <td>17⁰C</td>
                                                <td>APEO, Formaldehyde & Ammonia free emulsion suitable for premium quality
                                                    interior / exterior paints with good wet adhesion</td>
                                                <td class="pdf_link">
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#download_tds">Download TDS/ SDS</a><br>
                                                    <hr>
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#request_sample">Request A Sample</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" class="togglePopup">
                                                    <div id="popup" class="popup"><i class="fa fa-check"></i>
                                                        Product Saved</div>
                                                </td>
                                                <td>VISICRYL 8347</td>
                                                <td>47 ± 1</td>
                                                <td>100 - 1000 Cps</td>
                                                <td>+48⁰C</td>
                                                <td>APEO, Formaldehyde & Ammonia Free Hard and robust emulsion with
                                                    Ultrafine particle size and excellent resistance to UV and dirt pick up.
                                                    Ideal for sheen paints, floor coatings, tile coatings, penetrating
                                                    primers etc. Binder for high performance coatings with excellent
                                                    exterior durability</td>
                                                <td class="pdf_link">
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#download_tds">Download TDS/ SDS</a><br>
                                                    <hr>
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#request_sample">Request A Sample</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" class="togglePopup">
                                                    <div id="popup" class="popup"><i class="fa fa-check"></i>
                                                        Product Saved</div>
                                                </td>
                                                <td>VISICRYL 8826</td>
                                                <td>50 ± 1</td>
                                                <td>10 - 20 Ps</td>
                                                <td>+12⁰C</td>
                                                <td>High Performance emulsion free from formaldehyde with excellent alkali
                                                    and weathering resistance. It has superior compatibility with variety of
                                                    decorative colorants and ideal for wide range of PVC paints, fine,
                                                    medium heavy texture and stone finishes</td>
                                                <td class="pdf_link">
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#download_tds">Download TDS/ SDS</a><br>
                                                    <hr>
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#request_sample">Request A Sample</a>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="vam" class="size_chart">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table_title">
                                        <h2>VAM ACRYLATE BASED EMULSIONS FOR PAINTS & COATINGS</h2>
                                        <h3>Vinyl Acrylic Emulsions</h3>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <th width="20%" colspan="2">PRODUCT</th>
                                                <th width="16%">SOLID CONTENT %</th>
                                                <th width="14%">VISCOSITY</th>
                                                <th width="5%">MFFT</th>
                                                <th width="25%">FEATURES / RECOMMENDED APPLICATION</th>
                                                <th width="20%">RESOURCES</th>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" class="togglePopup">
                                                    <div id="popup" class="popup"><i class="fa fa-check"></i>
                                                        Product Saved</div>
                                                </td>
                                                <td>VISICRYL 6555</td>
                                                <td>55 ± 1</td>
                                                <td>300-700 Cps</td>
                                                <td>11⁰C</td>
                                                <td>APEO & Formaldehyde free emulsion suitable for Interior paints with
                                                    medium to high PVC</td>
                                                <td class="pdf_link">
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#download_tds">Download TDS/ SDS</a><br>
                                                    <hr>
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#request_sample">Request A Sample</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" class="togglePopup">
                                                    <div id="popup" class="popup"><i class="fa fa-check"></i>
                                                        Product Saved</div>
                                                </td>
                                                <td>VISICRYL 6510</td>
                                                <td>50 ± 1</td>
                                                <td>100-600 Cps</td>
                                                <td>12⁰C</td>
                                                <td>APEO & Formaldehyde free emulsion suitable for interior paints with
                                                    excellent wet scrub</td>
                                                <td class="pdf_link">
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#download_tds">Download TDS/ SDS</a><br>
                                                    <hr>
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#request_sample">Request A Sample</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" class="togglePopup">
                                                    <div id="popup" class="popup"><i class="fa fa-check"></i>
                                                        Product Saved</div>
                                                </td>
                                                <td>VISICRYL 6520</td>
                                                <td>50 ± 1</td>
                                                <td>1500-4000 Cps</td>
                                                <td>12⁰C</td>
                                                <td>APEO & Formaldehyde free emulsion suitable for interior paints with
                                                    excellent wet scrub</td>
                                                <td class="pdf_link">
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#download_tds">Download TDS/ SDS</a><br>
                                                    <hr>
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#request_sample">Request A Sample</a>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="table_title">
                                        <h3>VAM Veova Emulsions</h3>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <th width="20%" colspan="2">PRODUCT</th>
                                                <th width="16%">SOLID CONTENT %</th>
                                                <th width="14%">VISCOSITY</th>
                                                <th width="5%">MFFT</th>
                                                <th width="25%">FEATURES / RECOMMENDED APPLICATION</th>
                                                <th width="20%">RESOURCES</th>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" class="togglePopup">
                                                    <div id="popup" class="popup"><i class="fa fa-check"></i>
                                                        Product Saved</div>
                                                </td>
                                                <td>VISIMER 4556</td>
                                                <td>55 ± 1</td>
                                                <td>5-20 Ps</td>
                                                <td>14⁰C</td>
                                                <td>APEO, Formaldehyde & Ammonia free emulsion suitable for economical
                                                    interior/exterior paints & primers</td>
                                                <td class="pdf_link">
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#download_tds">Download TDS/ SDS</a><br>
                                                    <hr>
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#request_sample">Request A Sample</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" class="togglePopup">
                                                    <div id="popup" class="popup"><i class="fa fa-check"></i>
                                                        Product Saved</div>
                                                </td>
                                                <td>VISIMER 4571 E</td>
                                                <td>55 ± 1</td>
                                                <td>20-50 Ps</td>
                                                <td>13⁰C</td>
                                                <td>APEO, Formaldehyde & Ammonia free emulsion suitable for economical
                                                    interior/exterior paints & primers</td>
                                                <td class="pdf_link">
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#download_tds">Download TDS/ SDS</a><br>
                                                    <hr>
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#request_sample">Request A Sample</a>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="table_title">
                                        <h3>VAM Veova Ter Polymer Emulsions</h3>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <th width="20%" colspan="2">PRODUCT</th>
                                                <th width="16%">SOLID CONTENT %</th>
                                                <th width="14%">VISCOSITY</th>
                                                <th width="7%">MFFT</th>
                                                <th width="25%">FEATURES / RECOMMENDED APPLICATION</th>
                                                <th width="20%">RESOURCES</th>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" class="togglePopup">
                                                    <div id="popup" class="popup"><i class="fa fa-check"></i>
                                                        Product Saved</div>
                                                </td>
                                                <td>VISIMER 4954 E</td>
                                                <td>55 ± 1</td>
                                                <td>10-25 Ps</td>
                                                <td>+ 13⁰C</td>
                                                <td>APEO & Formaldehyde free emulsion for interior & exterior coatings &
                                                    textured finishes offering high resistance to yellowing / discoloration
                                                    of paints</td>
                                                <td class="pdf_link">
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#download_tds">Download TDS/ SDS</a><br>
                                                    <hr>
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#request_sample">Request A Sample</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" class="togglePopup">
                                                    <div id="popup" class="popup"><i class="fa fa-check"></i>
                                                        Product Saved</div>
                                                </td>
                                                <td>VISIMER 4955 E</td>
                                                <td>55 ± 1</td>
                                                <td>30-50 Ps</td>
                                                <td>+ 13⁰C</td>
                                                <td>APEO & Formaldehyde free emulsion with higher viscosity for interior and
                                                    exterior coatings and textured finishes offering high resistance to
                                                    yellowing / discoloration of paints</td>
                                                <td class="pdf_link">
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#download_tds">Download TDS/ SDS</a><br>
                                                    <hr>
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#request_sample">Request A Sample</a>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->

    <!-- About Product Contact Form section start here -->
    <section class="about_product_form">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="heading text-center">
                        <h2>Contact Us About Our Products</h2>
                        <p class="text-justify">
                            Looking for the ideal products that match your needs?
                            Submit your contact information and we’ll
                            connect with you to explore the best options together.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <form class="product_form">
                    <div class="col-md-6">
                        <input type="text" class="form-control" placeholder="First and Last Name">
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" placeholder="Enter Email Address">
                    </div>
                    <div class="col-md-4">
                        <input type="text" id="mobile_code" class="form-control" placeholder="Phone Number"
                            name="name">
                    </div>
                    <div class="col-md-4">
                        <select class="form-control">
                            <option value="">-- Inquiry Type --</option>
                            <option value="General enquiry">General enquiry</option>
                            <option value="Product information">Product information</option>
                            <option value="Technical question">Technical question</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <select class="form-control">
                            <option value="">-- Your Country --</option>
                            <option value="Albania">Albania (Shqipëria)</option>
                            <option value="Algeria">Algeria (Algérie)</option>
                            <option value="Angola">Angola (Angola)</option>
                            <option value="Argentina">Argentina (Argentina)</option>
                            <option value="Aruba">Aruba (Aruba)</option>
                            <option value="Australia">Australia (Australia)</option>
                            <option value="Azerbaijan">Azerbaijan (Azərbaycan)</option>
                            <option value="Bahrain">Bahrain (مملكة البحرين)</option>
                            <option value="Bangladesh">Bangladesh (বাংলাদেশ)</option>
                            <option value="Barbados">Barbados (Barbados)</option>
                            <option value="Belarus">Belarus (Biélorussie)</option>
                            <option value="Belgium">Belgium (België)</option>
                            <option value="Bonaire">Bonaire (Bonaire)</option>
                            <option value="Bosnia and Herzegovina">Bosnia and Herzegovina (Bosna i Hercegovina)</option>
                            <option value="Brazil">Brazil (Brasil)</option>
                            <option value="Bulgaria">Bulgaria (България)</option>
                            <option value="Cambodia">Cambodia (កម្ពុជា)</option>
                            <option value="Canada">Canada (Canada)</option>
                            <option value="Chile">Chile (Chile)</option>
                            <option value="China">China (中华人民共和国)</option>
                            <option value="Croatia">Croatia (Hrvatska)</option>
                            <option value="Curacao">Curacao (Curacao)</option>
                            <option value="Cyprus">Cyprus (Κυπριακή)</option>
                            <option value="Czech Republic">Czech Republic (Česká republika)</option>
                            <option value="Denmark">Denmark (Danmark)</option>
                            <option value="Dominican Republic">Dominican Republic (República Dominicana)</option>
                            <option value="Ecuador">Ecuador (Ecuador)</option>
                            <option value="Egypt">Egypt (جمهورية مصر العربية)</option>
                            <option value="Estonia">Estonia (Eesti Vabariik)</option>
                            <option value="Ethiopia">Ethiopia (Ethiopia)</option>
                            <option value="Finland">Finland (Suomen tasavalta)</option>
                            <option value="France">France (France)</option>
                            <option value="Germany">Germany (Deutschland)</option>
                            <option value="Greece">Greece (Ελλάδα)</option>
                            <option value="Grenada">Grenada (Grenada)</option>
                            <option value="Guyana">Guyana (Guyana)</option>
                            <option value="Hungary">Hungary (Magyarország)</option>
                            <option value="Iceland">Iceland (Ísland)</option>
                            <option value="India">India (India)</option>
                            <option value="Indonesia">Indonesia (Indonesia)</option>
                            <option value="Iraq">Iraq (الْعِرَاق)</option>
                            <option value="Ireland">Ireland (Ireland)</option>
                            <option value="Italy">Italy (Italia)</option>
                            <option value="Jamaica">Jamaica (Jamaica)</option>
                            <option value="Japan">Japan (日本)</option>
                            <option value="Jordan">Jordan (الأردن)</option>
                            <option value="Kazakhstan">Kazakhstan (Қазақстан)</option>
                            <option value="Kenya">Kenya (Kenya)</option>
                            <option value="Korea, Republic of">Korea, Republic of (한국)</option>
                            <option value="Kuwait">Kuwait (الكويت)</option>
                            <option value="Latvia">Latvia (Latvija)</option>
                            <option value="Lebanon">Lebanon (لُبْنَان)</option>
                            <option value="Libya">Libya (ليبيا)</option>
                            <option value="Lithuania">Lithuania (Lietuva)</option>
                            <option value="Malaysia">Malaysia (məlejsiə])</option>
                            <option value="Malta">Malta (Malta)</option>
                            <option value="Mexico">Mexico (Mexico)</option>
                            <option value="Montenegro">Montenegro (Crna Gora)</option>
                            <option value="Morocco">Morocco (المملكة المغربية)</option>
                            <option value="Myanmar">Myanmar (ပြည်ထောင်စု သမ္မတ မြန်မာနိုင်ငံတော်&zwnj;)</option>
                            <option value="Namibia">Namibia (Namibia)</option>
                            <option value="Netherlands">Netherlands (Netherlands)</option>
                            <option value="Netherlands Antilles">Netherlands Antilles (Antillen)</option>
                            <option value="New Zealand">New Zealand (New Zealand)</option>
                            <option value="Nigeria">Nigeria (Nigeria)</option>
                            <option value="Norway">Norway (Norge)</option>
                            <option value="Oman">Oman (عُمَان)</option>
                            <option value="Pakistan">Pakistan (پاکِستان)</option>
                            <option value="Panama">Panama (Panamá)</option>
                            <option value="Peru">Peru (Peru)</option>
                            <option value="Philippines">Philippines (Pilipinas)</option>
                            <option value="Poland">Poland (Polska)</option>
                            <option value="Portugal">Portugal (Portugal)</option>
                            <option value="Qatar">Qatar (قطر)</option>
                            <option value="Romania">Romania (România)</option>
                            <option value="Saudi Arabia">Saudi Arabia (ٱلسُّعُوْدِيَّة)</option>
                            <option value="Serbia">Serbia (Србија)</option>
                            <option value="Singapore">Singapore (Singapore)</option>
                            <option value="Slovak Republic">Slovak Republic (Slovenská republika)</option>
                            <option value="Slovenia">Slovenia (Slovenija)</option>
                            <option value="South Africa">South Africa (South Africa)</option>
                            <option value="Spain">Spain (Espania)</option>
                            <option value="Sri Lanka">Sri Lanka (ශ්&zwj;රී ලංකාව)</option>
                            <option value="St. Vincent and the Grenadines">St. Vincent and the Grenadines (St. Vincent and
                                the Grenadines)</option>
                            <option value="Sweden">Sweden (Sverige)</option>
                            <option value="Taiwan, Province of China">Taiwan, Province of China (中國臺灣省)</option>
                            <option value="Tanzania, United Republic of">Tanzania, United Republic of (Tanzania)</option>
                            <option value="Thailand">Thailand (ประเทศไทย)</option>
                            <option value="Trinidad and Tobago">Trinidad and Tobago (Trinidad and Tobago)</option>
                            <option value="Tunisia">Tunisia (تونس&nbsp;)</option>
                            <option value="Turkey">Turkey (Türkiye)</option>
                            <option value="Turkmenistan">Turkmenistan (Türkmenistan)</option>
                            <option value="U.A.E.">U.A.E. (الإمارات)</option>
                            <option value="Ukraine">Ukraine (Україна)</option>
                            <option value="United Kingdom">United Kingdom (United Kingdom)</option>
                            <option value="United States">United States (United States)</option>
                            <option value="Uruguay">Uruguay (Uruguai)</option>
                            <option value="Vietnam">Vietnam (Việt Nam)</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <textarea type="text" class="form-control" placeholder="Message"></textarea>
                    </div>
                    <div class="col-md-6">
                        <div class="form-check disclaimer_checkbox">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked"
                                checked>
                            <label class="form-check-label" for="flexCheckChecked">
                                I would like to subscribe to newsletters from Visen. I understand that I can unsubscribe at
                                any time.
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-check disclaimer_checkbox">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked"
                                checked>
                            <label class="form-check-label" for="flexCheckChecked">
                                By submitting this contact form, I consent to Visen using the information entered by me to
                                process my request. For more information, see Visen's privacy policy.
                            </label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <center><button class="btn btn-lg" type="submit">Submit</button></center>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- About Product Contact Form Section End -->

    <!-- Request Sample -->
    <div id="request_sample" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Request A Sample</h4>
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
                                <input type="text" id="mobile_code_one" class="form-control" placeholder="Phone Number"
                                    name="name">
                            </div>
                            <div class="col-md-6">
                                <select class="form-control">
                                    <option value="">-- Select Country --</option>
                                    <option value="India">India</option>
                                    <option value="UAE">UAE</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <select class="form-control">
                                    <option value="">-- Select Quantity --</option>
                                    <option value="1kg">1kg</option>
                                    <option value="2kg">2kg</option>
                                    <option value="3kg">3kg</option>
                                    <option value="4kg">4kg</option>
                                    <option value="5kg">5kg</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <textarea type="text" class="form-control" placeholder="Address"></textarea>
                            </div>
                            <div class="col-md-6">
                                <textarea type="text" class="form-control" placeholder="Subject/Message"></textarea>
                            </div>
                            <div class="col-md-12">
                                <center><button class="btn btn-lg" type="submit">Submit</button></center>
                            </div>
                        </form>
                    </div>
                </div>
                <!--  <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div> -->
            </div>
        </div>
    </div>

    <!-- Download TDS -->
    <div id="download_tds" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Download TDS/SDS</h4>
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
                                <input type="text" id="mobile_code_two" class="form-control" placeholder="Phone Number"
                                    name="name">
                            </div>
                            <div class="col-md-6">
                                <select class="form-control">
                                    <option value="">-- Select Country --</option>
                                    <option value="India">India</option>
                                    <option value="UAE">UAE</option>
                                </select>
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

    <!-- Download SDS -->
    <div id="download_sds" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Download SDS</h4>
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
                                <input type="text" id="mobile_code_two" class="form-control" placeholder="Phone Number"
                                    name="name">
                            </div>
                            <div class="col-md-6">
                                <select class="form-control">
                                    <option value="">-- Select Country --</option>
                                    <option value="India">India</option>
                                    <option value="UAE">UAE</option>
                                </select>
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
    document.addEventListener('DOMContentLoaded', function () {
        const accordions = document.querySelectorAll('.course-accordion');

        accordions.forEach(button => {
            button.addEventListener('click', function () {
                // Close all panels
                accordions.forEach(btn => {
                    const panel = btn.nextElementSibling;
                    btn.classList.remove('active');
                    panel.style.maxHeight = '0';
                });

                // Open the clicked panel
                const panel = this.nextElementSibling;
                if (this.classList.contains('active')) {
                    this.classList.remove('active');
                    panel.style.maxHeight = '0';
                } else {
                    this.classList.add('active');
                    panel.style.maxHeight = panel.scrollHeight + 'px'; // Set to the scrollHeight to expand
                }
            });
        });
    });
</script>
@endpush
