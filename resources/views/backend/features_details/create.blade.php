@extends('backend.layouts.master')

@section('title')
Visen | Add Feature
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
                        <h4>Add Feature</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.dashboard') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('features-details.index') }}">Manage Features</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Add Feature
                            </li>
                        </ol>
                    </nav>
                </div>

            </div>
        </div>


        <form method="POST" action="{{ route('features-details.store') }}" class="form-horizontal" enctype="multipart/form-data">
            @csrf

            <div class="pd-20 card-box mb-30">
                <div class="form-group row mt-3">
                    <label class="col-sm-2"><b>Feature Name : <span class="text-danger">*</span></b></label>
                    <div class="col-sm-4 col-md-4">
                        <select name="features_id" id="features_id" class="custom-select2 form-control @error('features_id') is-invalid @enderror" style="width: 350px !important;">
                            <option value=" " >Select Feature Name</option>
                            <optgroup label="Feature Name">
                                @foreach($features as $value)
                                    <option value="{{ $value->id }}" {{ old('features_id') == $value->id ? 'selected' : '' }}>{{ $value->title }}</option>
                                @endforeach
                            </optgroup>
                        </select>
                        @error('features_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <label class="col-sm-2"><b>Title : </b></label>
                    <div class="col-sm-4 col-md-4">
                        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" placeholder="Enter Title.">
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <label class="col-sm-3"><b>Upload Feature Image : </b></label>
                    <div class="col-sm-9 col-md-9">
                        <input type="file" onchange="agentPreviewFile()" accept=".png, .jpg, .jpeg" name="featureImage" id="featureImage" class="form-control @error('featureImage') is-invalid @enderror" value="{{ old('featureImage') }}" placeholder="Upload Feature Image.">
                        <small class="text-secondary"><b>Note : The file size  should be less than 2MB .</b></small>
                        <br>
                        <small class="text-secondary"><b>Note : Only files in .jpg, .jpeg, .png format can be uploaded .</b></small>
                        <br>
                        @error('featureImage')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <br>
                        <div id="preview-featureImage-container">
                            <div id="file-preview-featureImage"></div>
                        </div>
                    </div>

                    <label class="col-sm-2"><b>Description : </b></label>
                    <div class="col-sm-10 col-md-10">
                        <textarea name="description" id="description" class="textarea_editor form-control border-radius-0 @error('description') is-invalid @enderror" placeholder="Enter Description" value="{{ old('description') }}">{{ old('description') }}</textarea>
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
                        <a href="{{ route('features-details.index') }}" class="btn btn-danger">Cancel</a>&nbsp;&nbsp;
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
    // Existing function for agent Image/PDF preview (if needed)
    function agentPreviewFile() {
        const fileInput = document.getElementById('featureImage');
        const previewContainer = document.getElementById('preview-featureImage-container');
        const filePreview = document.getElementById('file-preview-featureImage');
        const file = fileInput.files[0];

        if (file) {
            const fileType = file.type;
            const validImageTypes = ['image/jpeg', 'image/jpg', 'image/png'];
            const validPdfTypes = ['application/pdf'];

            if (validImageTypes.includes(fileType)) {
                // Image preview
                const reader = new FileReader();
                reader.onload = function(e) {
                    filePreview.innerHTML = `<img src="${e.target.result}" alt="File Preview" style="height: 40% !important; width: 60%;">`;
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
