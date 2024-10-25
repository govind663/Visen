@extends('backend.layouts.master')

@section('title')
Visen | Add Product Details
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
                        <h4>Add Product Details</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.dashboard') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('industryDetails.index') }}">Manage Product Details</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Add Product Details
                            </li>
                        </ol>
                    </nav>
                </div>

            </div>
        </div>


        <form method="POST" action="{{ route('industryDetails.update', $industryDetails->id) }}" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <input type="text" id="id" name="id" hidden  value="{{ $industryDetails->id }}">

            <div class="pd-20 card-box mb-30">
                <div class="form-group row mt-3">
                    <label class="col-sm-2"><b>Industry Name : <span class="text-danger">*</span></b></label>
                    <div class="col-sm-4 col-md-4">
                        <select name="industry_id" id="industry_id" class="custom-select2 form-control @error('industry_id') is-invalid @enderror" style="width: 350px !important;">
                            <option value=" " >Select Industry Name</option>
                            <optgroup label="Industry Name">
                                @foreach($industriesName as $value)
                                    <option value="{{ $value->id }}" {{ $industryDetails->industry_id == $value->id ? 'selected' : '' }}>{{ $value->industries_name }}</option>
                                @endforeach
                            </optgroup>
                        </select>
                        @error('industry_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <label class="col-sm-2"><b>Category Name : <span class="text-danger">*</span></b></label>
                    <div class="col-sm-4 col-md-4">
                        <select name="categoryName" id="categoryName" class="custom-select2 form-control @error('categoryName') is-invalid @enderror" style="width: 350px !important;">
                            <option value=" " >Select Category Name</option>
                            <optgroup label="Category Name">
                                @foreach($industriesCategoryName as $categories)
                                    @foreach($categories as $category)
                                        <option value="{{ $category }}"
                                            {{ $industryDetails->categoryName === $category ? 'selected' : '' }}>
                                            {{ $category }}
                                        </option>
                                    @endforeach
                                @endforeach
                            </optgroup>
                        </select>
                        @error('categoryName')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <label class="col-sm-2"><b>Upload Product Banner Image : <span class="text-danger">*</span></b></label>
                    <div class="col-sm-4 col-md-4">
                        <input type="file" onchange="agentPreviewFile()" accept=".png, .jpg, .jpeg" name="image" id="image" class="form-control @error('image') is-invalid @enderror" value="{{ $industryDetails->image }}" placeholder="Upload Product Banner Image.">
                        <small class="text-secondary"><b>Note : The file size  should be less than 2MB .</b></small>
                        <br>
                        <small class="text-secondary"><b>Note : Only files in .jpg, .jpeg, .png format can be uploaded .</b></small>
                        <br>
                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <br>
                        <div id="preview-image-container">
                            <div id="file-preview-image"></div>
                        </div>
                        @if (!empty($industryDetails->image))
                            <img src="{{ asset('/visen/industry_details/image/' . $industryDetails->image) }}" alt="{{ $industryDetails->image }}" style="width: 100%; height: 50%;">
                        @endif
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <label class="col-sm-2"><b>Product Description : <span class="text-danger">*</span></b></label>
                    <div class="col-sm-10 col-md-10">
                        <textarea name="description" id="description" class="textarea_editor form-control border-radius-0 @error('description') is-invalid @enderror" placeholder="Enter Product Description" value="{{ $industryDetails->description }}">{{ $industryDetails->description }}</textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mt-4">
                    <label class="col-md-3"></label>
                    <div class="col-md-9" style="display: flex; justify-content: flex-end;">
                        <a href="{{ route('industryDetails.index') }}" class="btn btn-danger">Cancel</a>&nbsp;&nbsp;
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

        // Listen for changes on the industry_id dropdown
        $(document).on('change', '#industry_id', function() {
            let industry_id = $(this).val();

            // Show the category dropdown if an industry is selected
            if (industry_id) {
                $('#categoryName').show();

                $.ajax({
                    method: 'POST',
                    url: "{{ route('fetchCategoryNname') }}",
                    data: {
                        industryID: industry_id,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        // Clear the current options and add the default option
                        $('#categoryName').html('<option value="">Select Category Name</option>');

                        // Populate the Category dropdown based on the JSON structure
                        $.each(result, function (key, value) {
                            // console.log(value);
                            $('#categoryName').append('<option value="' + value + '">' + value + '</option>');
                        });
                    },
                    error: function(xhr) {
                        console.error(xhr); // Log any errors
                        $('#categoryName').html('<option value="">Select Category Name</option>');
                    }
                });
            } else {
                // If no industry is selected, hide the Category dropdown
                $('#categoryName').hide();
                $('#categoryName').html('<option value="">Select Category Name</option>');
            }
        });
    });
</script>

<script>
    // Existing function for agent image/PDF preview (if needed)
    function agentPreviewFile() {
        const fileInput = document.getElementById('image');
        const previewContainer = document.getElementById('preview-image-container');
        const filePreview = document.getElementById('file-preview-image');
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
