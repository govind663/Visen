@extends('backend.layouts.master')

@section('title')
Visen | Add Factory Datails
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
                        <h4>Add Factory Datails</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.dashboard') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('factory-details.index') }}">Manage Factory Datailss</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Add Factory Datails
                            </li>
                        </ol>
                    </nav>
                </div>

            </div>
        </div>


        <form method="POST" action="{{ route('factory-details.store') }}" class="form-horizontal" enctype="multipart/form-data">
            @csrf

            <div class="pd-20 card-box mb-30">
                <div class="form-group row mt-3">
                    <label class="col-sm-2"><b>Factory Name : <span class="text-danger">*</span></b></label>
                    <div class="col-sm-4 col-md-4">
                        <input type="text" name="factoryName" id="factoryName" class="form-control @error('factoryName') is-invalid @enderror" placeholder="Enter Factory Name" value="{{ old('factoryName') }}">
                        @error('factoryName')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <label class="col-sm-2"><b>Factory Location Name : <span class="text-danger">*</span></b></label>
                    <div class="col-sm-4 col-md-4">
                        <input type="text" name="factoryLocationName" id="factoryLocationName" class="form-control @error('factoryLocationName') is-invalid @enderror" placeholder="Enter Factory Location Name" value="{{ old('factoryLocationName') }}">
                        @error('factoryLocationName')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <label class="col-sm-3"><b>Factory Location Link : <span class="text-danger">*</span></b></label>
                    <div class="col-sm-4 col-md-4">
                        <input type="text" name="factoryLocationLink" id="factoryLocationLink" class="form-control @error('factoryLocationLink') is-invalid @enderror" placeholder="Enter Factory Location Link" value="{{ old('factoryLocationLink') }}">
                        @error('factoryLocationLink')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <label class="col-sm-1"><b>Status : <span class="text-danger">*</span></b></label>
                    <div class="col-sm-4 col-md-4">
                        <select name="status" id="status" class="custom-select2 form-control @error('status') is-invalid @enderror" style="width: 350px !important;">
                            <option value=" " >Select Status</option>
                            <optgroup label="Status">
                                <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Active</option>
                                <option value="2" {{ old('status') == '2' ? 'selected' : '' }}>Inactive</option>
                            </optgroup>
                        </select>
                        @error('status')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <label class="col-sm-3"><b>Upload Factory Image : <span class="text-danger">*</span></b></label>
                    <div class="col-sm-9 col-md-9 mb-4">
                        <input type="file" onchange="agentPreviewFile()" accept=".png, .jpg, .jpeg" name="factoryImage" id="factoryImage" class="form-control @error('factoryImage') is-invalid @enderror" value="{{ old('factoryImage') }}" placeholder="Upload Factory Image.">
                        <small class="text-secondary"><b>Note : The file size  should be less than 2MB .</b></small>
                        <br>
                        <small class="text-secondary"><b>Note : Only files in .jpg, .jpeg, .png format can be uploaded .</b></small>
                        <br>
                        @error('factoryImage')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <br>
                        <div id="preview-factoryImage-container">
                            <div id="file-preview-factoryImage"></div>
                        </div>
                    </div>

                    <label class="col-sm-3"><b>Member Factory Address : <span class="text-danger">*</span></b></label>
                    <div class="col-sm-9 col-md-9">
                        <textarea name="factoryAddress" id="factoryAddress" class="textarea_editor form-control border-radius-0 @error('factoryAddress') is-invalid @enderror" placeholder="Enter Factory Address" value="{{ old('factoryAddress') }}">{{ old('factoryAddress') }}</textarea>
                        @error('factoryAddress')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mt-4">
                    <label class="col-md-3"></label>
                    <div class="col-md-9" style="display: flex; justify-content: flex-end;">
                        <a href="{{ route('factory-details.index') }}" class="btn btn-danger">Cancel</a>&nbsp;&nbsp;
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
{{-- Factory View Both Image & PDF --}}
<script>
    // Existing function for agent image/PDF preview (if needed)
    function agentPreviewFile() {
        const fileInput = document.getElementById('factoryImage');
        const previewContainer = document.getElementById('preview-factoryImage-container');
        const filePreview = document.getElementById('file-preview-factoryImage');
        const file = fileInput.files[0];

        if (file) {
            const fileType = file.type;
            const validImageTypes = ['image/jpeg', 'image/jpg', 'image/png'];
            const validPdfTypes = ['application/pdf'];

            if (validImageTypes.includes(fileType)) {
                // Image preview
                const reader = new FileReader();
                reader.onload = function(e) {
                    filePreview.innerHTML = `<img src="${e.target.result}" alt="File Preview" style="height: 40%; width: 40%;">`;
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
