@extends('backend.layouts.master')

@section('title')
Visen | Edit Product Category
@endsection

@push('styles')
@endpush

@section('content')
<div class="pd-ltr-20 xs-pd-20-10">
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4>Edit Product Category</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.dashboard') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('product-category.index') }}">Manage Product Category</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Edit Product Category
                            </li>
                        </ol>
                    </nav>
                </div>

            </div>
        </div>


        <form method="POST" action="{{ route('product-category.update', $productCategory->id) }}" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <input type="text" id="id" name="id" hidden  value="{{ $productCategory->id }}">

            <div class="pd-20 card-box mb-30">
                <div class="form-group row mt-3">
                    <label class="col-sm-2"><b>Product Name : <span class="text-danger">*</span></b></label>
                    <div class="col-sm-4 col-md-4">
                        <select name="product_id" id="product_id" class="custom-select2 form-control @error('product_id') is-invalid @enderror" style="width: 350px !important;">
                            <option value=" " >Select Product Name</option>
                            <optgroup label="Product Name">
                                @foreach($products as $value)
                                    <option value="{{ $value->id }}" {{ $productCategory->product_id == $value->id ? 'selected' : '' }}>{{ $value->productName }}</option>
                                @endforeach
                            </optgroup>
                        </select>
                        @error('product_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <label class="col-sm-2"><b>Category Name : <span class="text-danger">*</span></b></label>
                    <div class="col-sm-4 col-md-4">
                        <select name="productCategoryName" id="productCategoryName" class="custom-select2 form-control @error('productCategoryName') is-invalid @enderror" style="width: 350px !important;">
                            <option value=" " >Select Category Name</option>
                            <optgroup label="Category Name">
                                @foreach($productCategories as $value)
                                    <option value="{{ $value }}" {{ $productCategory->productCategoryName == $value ? 'selected' : '' }}>{{ $value }}</option>
                                @endforeach
                            </optgroup>
                        </select>
                        @error('productCategoryName')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <label class="col-sm-2"><b>Sub Product Name : <span class="text-danger">*</span></b></label>
                    <div class="col-sm-4 col-md-4">
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Sub Product Name" value="{{ $productCategory->name }}">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <label class="col-sm-2"><b>Solid Content % : <span class="text-danger">*</span></b></label>
                    <div class="col-sm-4 col-md-4">
                        <input type="text" name="solidContentInPercentage" id="solidContentInPercentage" class="form-control @error('solidContentInPercentage') is-invalid @enderror" placeholder="Enter Solid Content %" value="{{ $productCategory->solidContentInPercentage }}">
                        @error('solidContentInPercentage')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <label class="col-sm-2"><b>Viscosity : <span class="text-danger">*</span></b></label>
                    <div class="col-sm-4 col-md-4">
                        <input type="text" name="viscosity" id="viscosity" class="form-control @error('viscosity') is-invalid @enderror" value="{{ $productCategory->viscosity }}" placeholder="Enter Viscosity.">
                        @error('viscosity')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <label class="col-sm-2"><b>MEFT : <span class="text-danger">*</span></b></label>
                    <div class="col-sm-4 col-md-4">
                        <input type="text" name="mfet" id="mfet" class="form-control @error('mfet') is-invalid @enderror" value="{{ $productCategory->mfet }}" placeholder="Enter MEFT.">
                        @error('mfet')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <label class="col-sm-3"><b>Features / Recommended Application : <span class="text-danger">*</span></b></label>
                    <div class="col-sm-9 col-md-9 mb-4">
                        <textarea name="description" id="description" class="textarea_editor form-control border-radius-0 @error('description') is-invalid @enderror" placeholder="Enter Features / Recommended Application" value="{{ $productCategory->description }}">{{ $productCategory->description }}</textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <label class="col-sm-3"><b>Upload Resources Document : </b></label>
                    <div class="col-sm-9 col-md-9">
                        <input type="file" onchange="agentPreviewFile()" accept=".png, .jpg, .jpeg, .pdf" name="resource_doc" id="resource_doc" class="form-control @error('resource_doc') is-invalid @enderror" value="{{ $productCategory->resource_doc }}" placeholder="Upload Resources Document.">
                        <small class="text-secondary"><b>Note : The file size  should be less than 2MB .</b></small>
                        <br>
                        <small class="text-secondary"><b>Note : Only files in .jpg, .jpeg, .png format can be uploaded .</b></small>
                        <br>
                        @error('resource_doc')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <br>
                        <div id="preview-resource-doc-container">
                            <div id="file-preview-resource-doc"></div>
                        </div>
                        <br>
                        @if (!empty($productCategory->resource_doc))
                            <a href="{{ asset('/visen/product_category/resource_doc/' . $productCategory->resource_doc) }}" target="_blank" class="btn btn-primary btn-sm">
                                <i class="fa fa-download"></i>
                                    View Document
                            </a>
                        @endif

                    </div>
                </div>

                <div class="form-group row mt-4">
                    <label class="col-md-3"></label>
                    <div class="col-md-9" style="display: flex; justify-content: flex-end;">
                        <a href="{{ route('product-category.index') }}" class="btn btn-danger">Cancel</a>&nbsp;&nbsp;
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>

            </div>

        </form>

    </div>

    <!-- Footer Start -->
    <x-backend.footer />
    <!-- Footer Start -->
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function(){

        // Listen for changes on the product_id dropdown
        $(document).on('change', '#product_id', function() {
            let product_id = $(this).val();

            // Show the category dropdown if an industry is selected
            if (product_id) {
                $('#productCategoryName').show();

                $.ajax({
                    method: 'POST',
                    url: "{{ route('getProductCategoryName') }}",
                    data: {
                        productID: product_id,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        // Clear the current options and add the default option
                        $('#productCategoryName').html('<option value="">Select Category Name</option>');

                        // Populate the Category dropdown based on the JSON structure
                        $.each(result, function (key, categoryName) {
                            // console.log(value);
                            $('#productCategoryName').append('<option value="' + categoryName + '">' + categoryName + '</option>');
                        });
                    },
                    error: function(xhr) {
                        console.error(xhr); // Log any errors
                        $('#productCategoryName').html('<option value="">Select Category Name</option>');
                    }
                });
            } else {
                // If no industry is selected, hide the Category dropdown
                $('#productCategoryName').hide();
                $('#productCategoryName').html('<option value="">Select Category Name</option>');
            }
        });
    });
</script>

<script>
    // Existing function for agent image/PDF preview (if needed)
    function agentPreviewFile() {
        const fileInput = document.getElementById('resource_doc');
        const previewContainer = document.getElementById('preview-resource-doc-container');
        const filePreview = document.getElementById('file-preview-resource-doc');
        const file = fileInput.files[0];

        if (file) {
            const fileType = file.type;
            const validImageTypes = ['image/jpeg', 'image/jpg', 'image/png'];
            const validPdfTypes = ['application/pdf'];

            if (validImageTypes.includes(fileType)) {
                // Image preview
                const reader = new FileReader();
                reader.onload = function(e) {
                    filePreview.innerHTML = `<img src="${e.target.result}" alt="File Preview" style="height: 50%; width: 100%;">`;
                };
                reader.readAsDataURL(file);
            } else if (validPdfTypes.includes(fileType)) {
                // PDF preview using an embed element
                filePreview.innerHTML =
                    `<embed src="${URL.createObjectURL(file)}" type="application/pdf" width="100%" height="150px" />`;
            } else {
                // Unsupported file type
                filePreview.innerHTML = '<p>Unsupported file type</p>';
            }

            previewContainer.style.display = 'block';
        } else {
            // No file selected
            previewContainer.style.display = 'none';
        }
    }
</script>
@endpush
