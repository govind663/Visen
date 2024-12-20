@extends('backend.layouts.master')

@section('title')
Visen | Add Industry
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
                        <h4>Add Industry</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.dashboard') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('industry.index') }}">Manage Industry</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Add Industry
                            </li>
                        </ol>
                    </nav>
                </div>

            </div>
        </div>


        <form method="POST" action="{{ route('industry.store') }}" class="form-horizontal" enctype="multipart/form-data">
            @csrf

            <div class="pd-20 card-box mb-30">

                <div class="form-group row mt-3">
                    <label class="col-sm-2"><b>Industry Name : <span class="text-danger">*</span></b></label>
                    <div class="col-sm-4 col-md-4">
                        <input type="text"  id="industries_name" name="industries_name" class="form-control @error('industries_name') is-invalid @enderror" value="{{ old('industries_name') }}" placeholder="Enter Industry Name">
                        @error('industries_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <label class="col-sm-1"><b>Status : <span class="text-danger">*</span></b></label>
                    <div class="col-sm-4 col-md-4">
                        <select name="status" id="status" class="custom-select2 form-control @error('status') is-invalid @enderror">
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
                    <label class="col-sm-2"><b>Industry Title : <span class="text-danger">*</span></b></b></label>
                    <div class="col-sm-4 col-md-4 mb-3">
                        <input type="text" name="industryTitle" id="industryTitle" class="form-control @error('industryTitle') is-invalid @enderror" placeholder="Enter Industry Title" value="{{ old('industryTitle') }}">
                        @error('industryTitle')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <label class="col-sm-2"><b>Upload Industry Banner Image : <span class="text-danger">*</span></b></label>
                    <div class="col-sm-4 col-md-4 mb-3">
                        <input type="file" onchange="industryBannerImagePreviewFile()" accept=".png, .jpg, .jpeg" name="industryBannerImage" id="industryBannerImage" class="form-control @error('industryBannerImage') is-invalid @enderror" value="{{ old('industryBannerImage') }}" placeholder="Upload Industry Banner Image.">
                        <small class="text-secondary"><b>Note : The file size  should be less than 2MB .</b></small>
                        <br>
                        <small class="text-secondary"><b>Note : Only files in .jpg, .jpeg, .png format can be uploaded .</b></small>
                        <br>
                        @error('industryBannerImage')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <br>
                        <div id="preview-industryBannerImage-container">
                            <div id="file-preview-industryBannerImage"></div>
                        </div>
                    </div>                    
                </div>

                <div class="form-group row mt-3">
                    <label class="col-sm-2"><b>Industry Description : <span class="text-danger">*</span></b></b></label>
                    <div class="col-sm-10 col-md-10">
                        <textarea name="description" id="description" class="textarea_editor form-control border-radius-0 @error('description') is-invalid @enderror" placeholder="Enter Industry Description" value="{{ old('description') }}">{{ old('description') }}</textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <table class="table table-bordered p-3"  id="dynamicTable">
                    <thead>
                        <tr>
                            <th>Uploaded Industry Image : <span class="text-danger">*</span></th>
                            <th>Industry Category : <span class="text-danger">*</span></th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="col-sm-12 col-md-12">
                                    <div id="overview-industry-container-0">
                                        <div id="file-overview-industry-0"></div>
                                    </div>
                                    <input type="file" onchange="overviewIndustryPreviewFiles(0)" accept=".png, .jpg, .jpeg"  name="industries_image[]" id="industries_image_0" class="form-control @error('industries_image.0') is-invalid @enderror" value="{{ old('industries_image.0') }}" placeholder="Upload Industry Image">
                                    <small class="text-secondary"><b>Note : The file size  should be less than 2MB .</b></small>
                                    <br>
                                    <small class="text-secondary"><b>Note : Only files in .jpg, .jpeg, .png format can be uploaded .</b></small>
                                    <br>
                                    @error('industries_image.0')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </td>

                            <td>
                                <div class="col-sm-12 col-md-12">
                                    <input type="text" name="industry_category[]" id="industry_category_0" class="form-control @error('industry_category.0') is-invalid @enderror" value="{{ old('industry_category.0') }}" placeholder="Enter Industry Category">
                                    @error('industry_category.0')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </td>
                            <td>
                                <button type="button" class="btn btn-primary" id="addRow">Add More</button>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="form-group row mt-4">
                    <label class="col-md-3"></label>
                    <div class="col-md-9" style="display: flex; justify-content: flex-end;">
                        <a href="{{ route('industry.index') }}" class="btn btn-danger">Cancel</a>&nbsp;&nbsp;
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
{{-- Industry both Image and PDF --}}
<script>
    // Existing function for agent image/PDF preview (if needed)
    function industryBannerImagePreviewFile() {
        const fileInput = document.getElementById('industryBannerImage');
        const previewContainer = document.getElementById('preview-industryBannerImage-container');
        const filePreview = document.getElementById('file-preview-industryBannerImage');
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

{{-- Add More Industry Category --}}
<script>

    $(document).ready(function () {
        let rowId = 0;

        // Add a new row
        $('#addRow').click(function () {
            rowId++;
            const newRow = `
                <tr>
                    <td>
                        <div class="col-sm-12 col-md-12">
                            <div id="overview-industry-container-${rowId}">
                                <div id="file-overview-industry-${rowId}"></div>
                            </div>
                            <input type="file" onchange="overviewIndustryPreviewFiles(${rowId})" accept=".png, .jpg, .jpeg, .pdf" name="industries_image[]" id="industries_image_${rowId}" class="form-control @error('industries_image.${rowId}') is-invalid @enderror" value="{{ old('industries_image.${rowId}') }}" placeholder="Upload Industry Image">
                            <small class="text-secondary"><b>Note : The file size should be less than 2MB.</b></small>
                            <br>
                            <small class="text-secondary"><b>Note : Only files in .jpg, .jpeg, .png, .pdf format can be uploaded.</b></small>
                            <br>
                            @error('industries_image.${rowId}')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </td>
                    <td>
                        <div class="col-sm-12 col-md-12">
                            <input type="text" name="industry_category[]" id="industry_category_${rowId}" class="form-control @error('industry_category.${rowId}') is-invalid @enderror" value="{{ old('industry_category.${rowId}') }}" placeholder="Enter Industry Category">
                            @error('industry_category.${rowId}')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </td>
                    <td><button type="button" class="btn btn-danger removeRow">Remove</button></td>
                </tr>`;
            $('#dynamicTable tbody').append(newRow);
        });

        // Remove a row
        $(document).on('click', '.removeRow', function () {
            $(this).closest('tr').remove();
        });
    });

    // Preview function for industry files
    function overviewIndustryPreviewFiles(rowId) {
        const fileInput = document.getElementById(`industries_image_${rowId}`);
        const previewContainer = document.getElementById(`overview-industry-container-${rowId}`);
        const filePreview = document.getElementById(`file-overview-industry-${rowId}`);
        const file = fileInput.files[0];

        if (!fileInput || !previewContainer || !filePreview) return;

        if (file) {
            const fileType = file.type;
            const validImageTypes = ['image/jpeg', 'image/jpg', 'image/png'];
            const validPdfTypes = ['application/pdf'];

            if (validImageTypes.includes(fileType)) {
                // Image preview
                const reader = new FileReader();
                reader.onload = function (e) {
                    filePreview.innerHTML = `<img src="${e.target.result}" alt="File Preview" style="width:120px; height:100px !important;">`;
                };
                reader.readAsDataURL(file);
            } else if (validPdfTypes.includes(fileType)) {
                // PDF preview
                filePreview.innerHTML = `<embed src="${URL.createObjectURL(file)}" type="application/pdf" width="100%" height="100px" />`;
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
