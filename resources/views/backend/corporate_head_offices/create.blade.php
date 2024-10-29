@extends('backend.layouts.master')

@section('title')
Visen | Add Corporate Head Office
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
                        <h4>Add Corporate Head Office</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.dashboard') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('corporate-head-office.index') }}">Manage Corporate Head Office</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Add Corporate Head Office
                            </li>
                        </ol>
                    </nav>
                </div>

            </div>
        </div>


        <form method="POST" action="{{ route('corporate-head-office.store') }}" class="form-horizontal" enctype="multipart/form-data">
            @csrf

            <div class="pd-20 card-box mb-30">
                <div class="form-group row mt-3">
                    <label class="col-sm-2"><b>Title : <span class="text-danger">*</span></b></label>
                    <div class="col-sm-10 col-md-10 mb-3">
                        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" placeholder="Enter Title.">
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <label class="col-sm-2"><b>Description : <span class="text-danger">*</span></b></label>
                    <div class="col-sm-10 col-md-10">
                        <textarea name="description" id="description" class="textarea_editor form-control border-radius-0 @error('description') is-invalid @enderror" placeholder="Enter Description" value="{{ old('description') }}">{{ old('description') }}</textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <label class="col-sm-2"><b>Address : <span class="text-danger">*</span></b></label>
                    <div class="col-sm-4 col-md-4 mb-3">
                        <textarea type="text" name="address" id="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}" placeholder="Enter Address.">{{ old('address') }}</textarea>
                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <label class="col-sm-2"><b>Map Link : <span class="text-danger">*</span></b></label>
                    <div class="col-sm-4 col-md-4">
                        <input type="text" name="mapLink" id="mapLink" class="form-control @error('mapLink') is-invalid @enderror" value="{{ old('mapLink') }}" placeholder="Enter Map Link.">
                        @error('mapLink')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <label class="col-sm-2"><b>Phone Number : <span class="text-danger">*</span></b></label>
                    <div class="col-sm-4 col-md-4 mb-3">
                        <input type="text" maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" name="phoneNo" id="phoneNo" class="form-control @error('phoneNo') is-invalid @enderror" value="{{ old('phoneNo') }}" placeholder="Enter Phone Number.">
                        @error('phoneNo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <label class="col-sm-2"><b>What's App Number : <span class="text-danger">*</span></b></label>
                    <div class="col-sm-4 col-md-4 mb-3">
                        <input type="text" maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" name="whatsAppNo" id="whatsAppNo" class="form-control @error('whatsAppNo') is-invalid @enderror" value="{{ old('whatsAppNo') }}" placeholder="Enter What's App Number.">
                        @error('whatsAppNo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <label class="col-sm-2"><b>Email Id : <span class="text-danger">*</span></b></label>
                    <div class="col-sm-4 col-md-4 mb-3 bootstrap-tagsinput">
                        <input type="text" data-role="tagsinput" name="emailId" id="emailId" class="form-control @error('emailId') is-invalid @enderror" value="{{ old('emailId') }}" placeholder="Enter Email Id.">
                        @error('emailId')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <label class="col-sm-2"><b>Website : <span class="text-danger">*</span></b></label>
                    <div class="col-sm-4 col-md-4 mb-3">
                        <input type="text" name="websiteLink" id="websiteLink" class="form-control @error('websiteLink') is-invalid @enderror" value="{{ old('websiteLink') }}" placeholder="Enter websiteLink.">
                        @error('websiteLink')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                {{-- Banner Image Title --}}
                <div class="col-sm-12 col-md-12">
                    <table class="table table-bordered p-3"  id="dynamicBannerImageTable">
                        <thead>
                            <tr>
                                <th>Banner Image : <span class="text-danger">*</span></th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="col-sm-8 col-md-8">
                                        <div id="banner-container-0">
                                            <div id="file-banner-0"></div>
                                        </div>
                                        <input type="file" onchange="bannerPreviewFiles(0)" accept=".png, .jpg, .jpeg" name="bannerImage[]" id="bannerImage_0" class="form-control @error('bannerImage.*') is-invalid @enderror">
                                        <small class="text-secondary"><b>Note : The file size  should be less than 2MB .</b></small>
                                        <br>
                                        <small class="text-secondary"><b>Note : Only files in .jpg, .jpeg, .png format can be uploaded .</b></small>
                                        <br>
                                        @error('bannerImage.*')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-primary" id="addBannerImageRow">Add More</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="form-group row mt-4">
                    <label class="col-md-3"></label>
                    <div class="col-md-9" style="display: flex; justify-content: flex-end;">
                        <a href="{{ route('corporate-head-office.index') }}" class="btn btn-danger">Cancel</a>&nbsp;&nbsp;
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
{{-- Add More Banner Image or View both Image and PDF --}}
<script>
    $(document).ready(function () {
        let rowId = 0;

        // Add a new row with validation
        $('#addBannerImageRow').click(function () {
            rowId++;
            var newRow = `<tr>
                <td>
                    <div class="col-sm-8 col-md-8">
                        <div id="banner-container-${rowId}">
                            <div id="file-banner-${rowId}"></div>
                        </div>
                        <input type="file" onchange="bannerPreviewFiles(${rowId})" accept=".png, .jpg, .jpeg" name="bannerImage[]" id="bannerImage_${rowId}" class="form-control @error('bannerImage.*') is-invalid @enderror">
                        <small class="text-secondary"><b>Note : The file size  should be less than 2MB .</b></small>
                        <br>
                        <small class="text-secondary"><b>Note : Only files in .jpg, .jpeg, .png format can be uploaded .</b></small>
                        <br>
                        @error('bannerImage.*')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </td>
                <td><button type="button" class="btn btn-danger removeBannerImageRow">Remove</button></td>
            </tr>`;
            $('#dynamicBannerImageTable tbody').append(newRow);
        });

        // Remove a row
        $(document).on('click', '.removeBannerImageRow', function () {
            $(this).closest('tr').remove();
        });
    });

    // Banner Image Preview
    function bannerPreviewFiles(rowId) {
        const fileInput = document.getElementById(`bannerImage_${rowId}`);
        const previewContainer = document.getElementById(`banner-container-${rowId}`);
        const filePreview = document.getElementById(`file-banner-${rowId}`);
        const file = fileInput.files[0];

        if (file) {
            const fileType = file.type;
            const validImageTypes = ['image/jpeg', 'image/jpg', 'image/png'];
            const validPdfTypes = ['application/pdf'];

            if (validImageTypes.includes(fileType)) {
                // Image preview
                const reader = new FileReader();
                reader.onload = function(e) {
                    filePreview.innerHTML = `<img src="${e.target.result}" alt="File Preview" style="width:150px; height:60px !important;">`;
                };
                reader.readAsDataURL(file);
            } else if (validPdfTypes.includes(fileType)) {
                // PDF preview using an embed element
                filePreview.innerHTML =
                    `<embed src="${URL.createObjectURL(file)}" type="application/pdf" width="100%" height="25%" />`;
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
