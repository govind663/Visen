@extends('backend.layouts.master')

@section('title')
Visen | Edit Investor Contact
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
                        <h4>Edit Investor Contact</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.dashboard') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('investors-contacts.index') }}">Manage Investors Contact</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Edit Investor Contact
                            </li>
                        </ol>
                    </nav>
                </div>

            </div>
        </div>


        <form method="POST" action="{{ route('investors-contacts.update', $investorsContact->id) }}" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <input type="text" id="id" name="id" hidden  value="{{ $investorsContact->id }}">

            <div class="pd-20 card-box mb-30">
                <div class="form-group row mt-3">
                    <label class="col-sm-2"><b>Name : <span class="text-danger">*</span></b></label>
                    <div class="col-sm-4 col-md-4">
                        <input type="text" name="investor_name" id="investor_name" class="form-control @error('investor_name') is-invalid @enderror" value="{{ $investorsContact->investor_name }}" placeholder="Enter Name.">
                        @error('investor_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <label class="col-sm-2"><b>Upload Profile Image : <span class="text-danger">*</span></b></label>
                    <div class="col-sm-4 col-md-4">
                        <input type="file" onchange="investorImagePreviewFile()" accept=".png, .jpg, .jpeg" name="investor_image" id="investor_image" class="form-control @error('investor_image') is-invalid @enderror" value="{{ $investorsContact->investor_image }}" placeholder="Upload Profile investor_image.">
                        <small class="text-secondary"><b>Note : The file size  should be less than 2MB .</b></small>
                        <br>
                        <small class="text-secondary"><b>Note : Only files in .jpg, .jpeg, .png format can be uploaded .</b></small>
                        <br>
                        @error('investor_image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <br>
                        <div id="preview-image-container">
                            <div id="file-preview-image"></div>
                        </div>
                        <br>
                        @if(!empty($investorsContact->investor_image))
                            <img src="{{ asset('/visen/annual_report/investor_image/' . $investorsContact->investor_image) }}" alt="{{ $investorsContact->investor_image }}" style="width: 100px; height: auto;">
                        @endif
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <label class="col-sm-2"><b>Designation : <span class="text-danger">*</span></b></label>
                    <div class="col-sm-4 col-md-4">
                        <input type="text" name="investor_designation" id="investor_designation" class="form-control @error('investor_designation') is-invalid @enderror" value="{{ $investorsContact->investor_designation }}" placeholder="Enter Designation.">
                        @error('investor_designation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <label class="col-sm-2"><b>Email : <span class="text-danger">*</span></b></label>
                    <div class="col-sm-4 col-md-4">
                        <input type="email" name="investor_email" id="investor_email" class="form-control @error('investor_email') is-invalid @enderror" value="{{ $investorsContact->investor_email }}" placeholder="Enter Email.">
                        @error('investor_email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <label class="col-sm-2"><b>Telephone No. : </b></label>
                    <div class="col-sm-4 col-md-4">
                        <input type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="10" name="investor_tel" id="investor_tel" class="form-control @error('investor_tel') is-invalid @enderror" value="{{ $investorsContact->investor_tel }}" placeholder="Enter Telephone No.">
                        @error('investor_tel')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <label class="col-sm-2"><b>Fax No. : </b></label>
                    <div class="col-sm-4 col-md-4">
                        <input type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="10" name="investor_fax" id="investor_fax" class="form-control @error('investor_fax') is-invalid @enderror" value="{{ $investorsContact->investor_fax }}" placeholder="Enter Fax No.">
                        @error('investor_fax')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <label class="col-sm-2"><b>Website : </b></label>
                    <div class="col-sm-4 col-md-4">
                        <input type="text" name="investor_website" id="investor_website" class="form-control @error('investor_website') is-invalid @enderror" value="{{ $investorsContact->investor_website }}" placeholder="Enter Website.">
                        @error('investor_website')
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
                                <option value="1" {{ $investorsContact->status == '1' ? 'selected' : '' }}>Active</option>
                                <option value="2" {{ $investorsContact->status == '2' ? 'selected' : '' }}>Inactive</option>
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
                    <label class="col-sm-2"><b>Address : <span class="text-danger">*</span></b></label>
                    <div class="col-sm-10 col-md-10">
                        <textarea name="investor_address" id="investor_address" class="textarea_editor form-control border-radius-0 @error('investor_address') is-invalid @enderror" placeholder="Enter Address" value="{!! $investorsContact->investor_address !!}">{!! $investorsContact->investor_address !!}</textarea>
                        @error('investor_address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mt-4">
                    <label class="col-md-3"></label>
                    <div class="col-md-9" style="display: flex; justify-content: flex-end;">
                        <a href="{{ route('investors-contacts.index') }}" class="btn btn-danger">Cancel</a>&nbsp;&nbsp;
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
    function investorImagePreviewFile() {
        const fileInput = document.getElementById('investor_image');
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
                    filePreview.innerHTML = `<img src="${e.target.result}" alt="File Preview" style="height: 50%; width: 50%;">`;
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
