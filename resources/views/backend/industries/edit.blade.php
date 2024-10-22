@extends('backend.layouts.master')

@section('title')
Visen | Edit Industry
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
                        <h4>Edit Industry</h4>
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
                                Edit Industry
                            </li>
                        </ol>
                    </nav>
                </div>

            </div>
        </div>


        <form method="POST" action="{{ route('industry.update', $industries->id) }}" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <input type="text" id="id" name="id" hidden  value="{{ $industries->id }}">

            <div class="pd-20 card-box mb-30">

                <div class="form-group row mt-3">
                    <label class="col-sm-2"><b>Industry Name : <span class="text-danger">*</span></b></label>
                    <div class="col-sm-4 col-md-4">
                        <input type="text"  id="industries_name" name="industries_name" class="form-control @error('industries_name') is-invalid @enderror" value="{{ $industries->industries_name }}" placeholder="Enter Industry Name">
                        @error('industries_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <label class="col-sm-2"><b>Status : <span class="text-danger">*</span></b></label>
                    <div class="col-sm-4 col-md-4">
                        <select name="status" id="status" class="custom-select2 form-control @error('status') is-invalid @enderror">
                            <option value=" " >Select Status</option>
                            <optgroup label="Status">
                                <option value="1" {{ $industries->status == '1' ? 'selected' : '' }}>Active</option>
                                <option value="2" {{ $industries->status == '2' ? 'selected' : '' }}>Inactive</option>
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
                    <label class="col-sm-3"><b>Upload Industry Image : <span class="text-danger">*</span></b></b></label>
                    <div class="col-sm-6 col-md-6">
                        <input type="file" onchange="agentPreviewFile()" accept=".png, .jpg, .jpeg" name="industries_image" id="industries_image" class="form-control @error('industries_image') is-invalid @enderror" value="{{ $industries->industries_image }}" placeholder="Upload Industry Image.">
                        <small class="text-secondary"><b>Note : The file size  should be less than 2MB .</b></small>
                        <br>
                        <small class="text-secondary"><b>Note : Only files in .jpg, .jpeg, .png format can be uploaded .</b></small>
                        <br>
                        @error('industries_image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <br>
                        <div id="preview-industries-image-container">
                            <div id="file-preview-industries-image"></div>
                        </div>
                        <br>
                        @if (!empty($industries->industries_image))
                            <img src="{{ asset('/visen/industries/industries_image/'.$industries->industries_image) }}" width="100%" height="50%">
                        @endif
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <label class="col-sm-2"><b>Industry Description : <span class="text-danger">*</span></b></b></label>
                    <div class="col-sm-10 col-md-10">
                        <textarea name="description" id="description" class="textarea_editor form-control border-radius-0 @error('description') is-invalid @enderror" placeholder="Enter Industry Description" value="{!! $industries->description !!}">{!! $industries->description !!}</textarea>
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
{{-- Add More Industry or View both Image and PDF --}}
<script>
    $(document).ready(function () {
        let rowId = 0;

        // Add a new row
        $('#addIndustriesRow').click(function () {
            rowId++;
            const newRow = `
                <tr>
                    <td>
                        <div class="col-sm-12 col-md-12">
                            <div id="overview-amenite-container-${rowId}">
                                <div id="file-overview-amenite-${rowId}"></div>
                            </div>
                            <input type="file" onchange="overviewIndustriePreviewFiles(${rowId})" accept=".png, .jpg, .jpeg" name="industries_image[]" id="industries_image_${rowId}" class="form-control @error('industries_image.${rowId}') is-invalid @enderror">
                            <small class="text-secondary"><b>Note : The file size should be less than 2MB.</b></small>
                            <br>
                            <small class="text-secondary"><b>Note : Only files in .jpg, .jpeg, .png format can be uploaded.</b></small>
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
                            <input type="text" name="industries_name[]" id="industries_name_${rowId}" class="form-control @error('industries_name.${rowId}') is-invalid @enderror" placeholder="Enter Industry Name" value="{{ old('industries_name.${rowId}') }}">
                            @error('industries_name.${rowId}')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </td>
                    <td>
                        <textarea name="description[]" id="description_${rowId}" class="form-control @error('description.${rowId}') is-invalid @enderror" placeholder="Enter Description">{{ old('description.${rowId}') }}</textarea>
                        @error('description.${rowId}')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger removeIndustriesRow">Remove</button>
                    </td>
                </tr>`;
            $('#dynamicIndustriesTable tbody').append(newRow);
        });

        // Remove a row
        $(document).on('click', '.removeIndustriesRow', function () {
            $(this).closest('tr').remove();
        });
    });

    // Preview file
    function overviewIndustriePreviewFiles(rowId) {
        const fileInput = document.getElementById(`industries_image_${rowId}`);
        const previewContainer = document.getElementById(`preview-industries-image-container-${rowId}`);
        const filePreview = document.getElementById(`file-preview-industries-image-${rowId}`);
        const file = fileInput.files[0];

        if (!fileInput || !previewContainer || !filePreview) return; // Guard clause

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
                filePreview.innerHTML = `<embed src="${URL.createObjectURL(file)}" type="application/pdf" width="100%" height="25%" />`;
            } else {
                // Unsupported file type
                filePreview.innerHTML = '<p>Unsupported file type</p>';
                filePreview.innerHTML += `<p>Please select a valid image or PDF file.</p>`;
            }

            previewContainer.style.display = 'block';
        } else {
            // No file selected
            previewContainer.style.display = 'none';
        }
    }
</script>
@endpush
