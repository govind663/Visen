@extends('backend.layouts.master')

@section('title')
Visen | Edit Annual Report
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
                        <h4>Edit Annual Report</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.dashboard') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('annual-reports.index') }}">Manage Annual Reports</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Edit Annual Report
                            </li>
                        </ol>
                    </nav>
                </div>

            </div>
        </div>


        <form method="POST" action="{{ route('annual-reports.update', $annualReport->id) }}" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <input type="text" id="id" name="id" hidden  value="{{ $annualReport->id }}">

            <div class="pd-20 card-box mb-30">
                <div class="form-group row mt-3">
                    <label class="col-sm-2"><b>Description : <span class="text-danger">*</span></b></b></label>
                    <div class="col-sm-10 col-md-10">
                        <textarea name="description" id="description" class="textarea_editor form-control border-radius-0 @error('description') is-invalid @enderror" placeholder="Enter Description" value="{{ $annualReport->description }}">{{ $annualReport->description }}</textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <table class="table table-bordered p-3"  id="dynamicAmenitiesTable">
                    <thead>
                        <tr>
                            <th>Uploaded Annual Report Document : <span class="text-danger">*</span></th>
                            <th>Annual Report Name : <span class="text-danger">*</span></th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reportDocs as $index => $doc)
                        <tr>
                            <td>
                                <div class="col-sm-12 col-md-12">
                                    <!-- Show existing document -->
                                    @if($doc)
                                        <embed src="{{ asset('/visen/annual_report/report_doc/' . $doc) }}" type="application/pdf" width="100%" height="25%" />
                                    @endif
                                    <input type="file" onchange="overviewAnnualReportsPreviewFile({{ $index }})" accept=".pdf" name="report_doc[]" id="report_doc_{{ $index }}" class="form-control @error('report_doc.*') is-invalid @enderror">
                                    <!-- Hidden field to store the existing file -->
                                    <input type="hidden" name="existing_report_doc[]" value="{{ $doc }}">

                                    <small class="text-secondary"><b>Note: The file size should be less than 2MB.</b></small>
                                    <br>
                                    <small class="text-secondary"><b>Note: Only files in .pdf format can be uploaded.</b></small>
                                    @error('report_doc.*')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </td>
                            <td>
                                <div class="col-sm-12 col-md-12">
                                    <input type="text" name="report_name[]" value="{{ old('report_name.' . $index, $reportNames[$index]) }}" class="form-control @error('report_name.*') is-invalid @enderror" placeholder="Enter Annual Report Name">
                                    @error('report_name.*')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </td>
                            <td>
                                @if($loop->first)
                                    <button type="button" class="btn btn-primary" id="addAmenitiesRow">Add More</button>
                                @else
                                    <button type="button" class="btn btn-danger removeAmenitiesRow">Remove</button>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="form-group row mt-4">
                    <label class="col-md-3"></label>
                    <div class="col-md-9" style="display: flex; justify-content: flex-end;">
                        <a href="{{ route('annual-reports.index') }}" class="btn btn-danger">Cancel</a>&nbsp;&nbsp;
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
{{-- Add More Amities & Features or View both Image and PDF --}}
<script>
    $(document).ready(function () {
        let rowId = {{ count($reportDocs) }};

        $('#addAmenitiesRow').click(function () {
            rowId++;
            const newRow = `
                <tr>
                    <td>
                        <div class="col-sm-12 col-md-12">
                            <input type="file" onchange="overviewAnnualReportsPreviewFile(${rowId})" accept=".pdf" name="report_doc[]" id="report_doc_${rowId}" class="form-control">
                            <small class="text-secondary"><b>Note: The file size should be less than 2MB.</b></small>
                            <br>
                            <small class="text-secondary"><b>Note: Only files in .pdf format can be uploaded.</b></small>
                        </div>
                    </td>
                    <td>
                        <div class="col-sm-12 col-md-12">
                            <input type="text" name="report_name[]" class="form-control" placeholder="Enter Annual Report Name">
                        </div>
                    </td>
                    <td><button type="button" class="btn btn-danger removeAmenitiesRow">Remove</button></td>
                </tr>`;
            $('#dynamicAmenitiesTable tbody').append(newRow);
        });

        // Remove a row
        $(document).on('click', '.removeAmenitiesRow', function () {
            $(this).closest('tr').remove();
        });
    });

    // Preview file
    function overviewAnnualReportsPreviewFile(rowId) {
        const fileInput = document.getElementById(`report_doc_${rowId}`);
        const previewContainer = document.getElementById(`overview-amenite-container-${rowId}`);
        const filePreview = document.getElementById(`file-overview-amenite-${rowId}`);
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
