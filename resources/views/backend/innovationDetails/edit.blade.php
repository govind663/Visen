@extends('backend.layouts.master')

@section('title')
Visen | Edit Innovation Details
@endsection

@push('styles')
<style>
    .table-bordered, .table-bordered td, .table-bordered th {
        border: 1px solid #0924b9;
    }
</style>
@endpush

@section('content')
<div class="pd-ltr-20 xs-pd-20-10">
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4>Edit Innovation Details</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.dashboard') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('innovation-details.index') }}">Manage Innovation Details</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Edit Innovation Details
                            </li>
                        </ol>
                    </nav>
                </div>

            </div>
        </div>


        <form method="POST" action="{{ route('innovation-details.update', $innovationDetails->id) }}" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <input type="text" id="id" name="id" hidden  value="{{ $innovationDetails->id }}">

            <div class="pd-20 card-box mb-30">

                <div class="form-group row mt-3">
                    <label class="col-sm-2"><b>Upload Banner Image : </b></label>
                    <div class="col-sm-4 col-md-4">
                        <input type="file" onchange="agentPreviewFile()" accept=".png, .jpg, .jpeg" name="banner_image" id="banner_image" class="form-control @error('banner_image') is-invalid @enderror" value="{{ $innovationDetails->banner_image }}" placeholder="Upload Banner Image.">
                        <small class="text-secondary"><b>Note : The file size  should be less than 2MB .</b></small>
                        <br>
                        <small class="text-secondary"><b>Note : Only files in .jpg, .jpeg, .png format can be uploaded .</b></small>
                        <br>
                        @error('banner_image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <br>
                        <div id="preview-container">
                            <div id="file-preview"></div>
                        </div>
                        <br>
                        <div class="col-sm-6 col-md-6">
                            @if(!empty($innovationDetails->banner_image))
                            <img src="{{ asset('/visen/innovation_details/banner_image/' . $innovationDetails->banner_image) }}" alt="Banner Image" style="width: 100px; height: auto;">
                            @endif
                        </div>
                    </div>


                    <label class="col-sm-2"><b>Upload Banner Video : </b></label>
                    <div class="col-sm-4 col-md-4">
                        <input type="file" onchange="bannerVideoPreviewFile()" accept=".mp4" name="banner_video" id="banner_video" class="form-control @error('banner_video') is-invalid @enderror" value="{{ $innovationDetails->banner_video }}" placeholder="Upload Banner Video.">
                        <small class="text-secondary"><b>Note : The file size  should be less than 8MB .</b></small>
                        <br>
                        <small class="text-secondary"><b>Note : Only files in .mp4 format can be uploaded .</b></small>
                        <br>
                        @error('banner_video')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <br>
                        <div id="preview-banner-video-container">
                            <div id="file-banner-video-preview"></div>
                        </div>
                        <br>
                        <div class="col-sm-6 col-md-6">
                            @if(!empty($innovationDetails->banner_video))
                            <video controls style="width: 100%; height: 100%;">
                                <source src="{{ asset('/visen/innovation_details/banner_video/' . $innovationDetails->banner_video) }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                            @endif
                        </div>
                    </div>

                </div>

                <div class="form-group row mt-3">
                    <label class="col-sm-3"><b>Title : <span class="text-danger">*</span></b></label>
                    <div class="col-sm-9 col-md-9 mb-3">
                        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ $innovationDetails->title }}" placeholder="Enter Title.">
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <label class="col-sm-3"><b>Description : <span class="text-danger">*</span></b></label>
                    <div class="col-sm-9 col-md-9">
                        <textarea name="description" id="description" class="textarea_editor form-control border-radius-0 @error('description') is-invalid @enderror" placeholder="Enter Description" value="{{ $innovationDetails->description }}">{{ $innovationDetails->description }}</textarea>
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
                        <a href="{{ route('innovation-details.index') }}" class="btn btn-danger">Cancel</a>&nbsp;&nbsp;
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
