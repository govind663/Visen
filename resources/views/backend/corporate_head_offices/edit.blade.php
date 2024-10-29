@extends('backend.layouts.master')

@section('title')
Visen | Edit Corporate Head Office
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
                        <h4>Edit Corporate Head Office</h4>
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
                                Edit Corporate Head Office
                            </li>
                        </ol>
                    </nav>
                </div>

            </div>
        </div>


        <form method="POST" action="{{ route('corporate-head-office.update', $corporateHeadOffice->id) }}" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <input type="text" id="id" name="id" hidden  value="{{ $corporateHeadOffice->id }}">

            <div class="pd-20 card-box mb-30">
                <div class="form-group row mt-3">
                    <label class="col-sm-2"><b>Title : <span class="text-danger">*</span></b></label>
                    <div class="col-sm-10 col-md-10 mb-3">
                        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ $corporateHeadOffice->title }}" placeholder="Enter Title.">
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <label class="col-sm-2"><b>Description : <span class="text-danger">*</span></b></label>
                    <div class="col-sm-10 col-md-10">
                        <textarea name="description" id="description" class="textarea_editor form-control border-radius-0 @error('description') is-invalid @enderror" placeholder="Enter Description" value="{{ $corporateHeadOffice->description }}">{{ $corporateHeadOffice->description }}</textarea>
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
                        <textarea type="text" name="address" id="address" class="form-control @error('address') is-invalid @enderror" value="{{ $corporateHeadOffice->address }}" placeholder="Enter Address.">{{ $corporateHeadOffice->address }}</textarea>
                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <label class="col-sm-2"><b>Map Link : <span class="text-danger">*</span></b></label>
                    <div class="col-sm-4 col-md-4">
                        <input type="text" name="mapLink" id="mapLink" class="form-control @error('mapLink') is-invalid @enderror" value="{{ $corporateHeadOffice->mapLink }}" placeholder="Enter Map Link.">
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
                        <input type="text" maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" name="phoneNo" id="phoneNo" class="form-control @error('phoneNo') is-invalid @enderror" value="{{ $corporateHeadOffice->phoneNo }}" placeholder="Enter Phone Number.">
                        @error('phoneNo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <label class="col-sm-2"><b>What's App Number : <span class="text-danger">*</span></b></label>
                    <div class="col-sm-4 col-md-4 mb-3">
                        <input type="text" maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" name="whatsAppNo" id="whatsAppNo" class="form-control @error('whatsAppNo') is-invalid @enderror" value="{{ $corporateHeadOffice->whatsAppNo }}" placeholder="Enter What's App Number.">
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
                        <input type="text" data-role="tagsinput" name="emailId" id="emailId" class="form-control @error('emailId') is-invalid @enderror" value="{{ implode(', ', $emailIds) }}" placeholder="Enter Email Id.">
                        @error('emailId')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <label class="col-sm-2"><b>Website : <span class="text-danger">*</span></b></label>
                    <div class="col-sm-4 col-md-4 mb-3">
                        <input type="text" name="websiteLink" id="websiteLink" class="form-control @error('websiteLink') is-invalid @enderror" value="{{ $corporateHeadOffice->websiteLink }}" placeholder="Enter websiteLink.">
                        @error('websiteLink')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                {{-- Banner Image Title --}}
                <div class="col-sm-12 col-md-12">
                    <table class="table table-bordered p-3" id="dynamicBannerImageTable">
                        <thead>
                            <tr>
                                <th>Banner Image: <span class="text-danger">*</span></th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!empty($bannerImages))
                                @foreach ($bannerImages as $index => $image)
                                <tr>
                                    <td>
                                        <div class="col-sm-8 col-md-8">
                                            <div id="banner-container-{{ $index }}">
                                                <div id="file-banner-{{ $index }}">
                                                    <img src="{{ asset($image) }}" alt="Banner Image" width="100" height="100" style="object-fit: cover;"/>
                                                </div>
                                            </div>
                                            <input type="file" onchange="bannerPreviewFiles({{ $index }})" accept=".png, .jpg, .jpeg" name="bannerImage[]" id="bannerImage_{{ $index }}" class="form-control @error('bannerImage.*') is-invalid @enderror">
                                            <small class="text-secondary"><b>Note: The file size should be less than 2MB.</b></small>
                                            <br>
                                            <small class="text-secondary"><b>Note: Only files in .jpg, .jpeg, .png format can be uploaded.</b></small>
                                            <br>
                                            @error('bannerImage.*')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </td>
                                    <td>
                                        @if($loop->first)
                                            <button type="button" class="btn btn-primary" id="addBannerImageRow">Add More</button>
                                        @else
                                            <button type="button" class="btn btn-danger removeBannerImageRow">Remove</button>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td>
                                        <div class="col-sm-8 col-md-8">
                                            <div id="banner-container-0">
                                                <div id="file-banner-0"></div>
                                            </div>
                                            <input type="file" onchange="bannerPreviewFiles(0)" accept=".png, .jpg, .jpeg" name="bannerImage[]" id="bannerImage_0" class="form-control @error('bannerImage.*') is-invalid @enderror">
                                            <small class="text-secondary"><b>Note: The file size should be less than 2MB.</b></small>
                                            <br>
                                            <small class="text-secondary"><b>Note: Only files in .jpg, .jpeg, .png format can be uploaded.</b></small>
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
                            @endif
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
                        <div id="banner-container-${rowId}" style="display: none;">
                            <div id="file-banner-${rowId}"></div>
                        </div>
                        <input type="file" onchange="bannerPreviewFiles(${rowId})" accept=".png, .jpg, .jpeg, .pdf" name="bannerImage[]" id="bannerImage_${rowId}" class="form-control @error('bannerImage.*') is-invalid @enderror">
                        <small class="text-secondary"><b>Note: The file size should be less than 2MB.</b></small>
                        <br>
                        <small class="text-secondary"><b>Note: Only files in .jpg, .jpeg, .png, and .pdf format can be uploaded.</b></small>
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

            // Check file size (2MB limit)
            if (file.size > 2 * 1024 * 1024) {
                alert('File size should be less than 2MB.');
                fileInput.value = ''; // Reset the input
                previewContainer.style.display = 'none';
                return;
            }

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
                    `<embed src="${URL.createObjectURL(file)}" type="application/pdf" width="100%" height="200px" />`;
            } else {
                // Unsupported file type
                alert('Unsupported file type. Please upload a .jpg, .jpeg, .png, or .pdf file.');
                fileInput.value = ''; // Reset the input
                previewContainer.style.display = 'none';
                return;
            }

            previewContainer.style.display = 'block';
        } else {
            // No file selected
            previewContainer.style.display = 'none';
        }
    }
</script>
@endpush
