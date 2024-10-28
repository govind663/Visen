@extends('backend.layouts.master')

@section('title')
Visen | Add Member
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
                        <h4>Add Member</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.dashboard') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('members.index') }}">Manage Members</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Add Member
                            </li>
                        </ol>
                    </nav>
                </div>

            </div>
        </div>


        <form method="POST" action="{{ route('members.store') }}" class="form-horizontal" enctype="multipart/form-data">
            @csrf

            <div class="pd-20 card-box mb-30">
                <div class="form-group row mt-3">
                    <label class="col-sm-2"><b>Team Name : <span class="text-danger">*</span></b></label>
                    <div class="col-sm-4 col-md-4">
                        <select name="meet_our_minds_id" id="meet_our_minds_id" class="custom-select2 form-control @error('meet_our_minds_id') is-invalid @enderror" style="width: 350px !important;">
                            <option value=" " >Select Team Name</option>
                            <optgroup label="Team Name">
                                @foreach($meetOurMinds as $value)
                                    <option value="{{ $value->id }}" {{ old('meet_our_minds_id') == $value->id ? 'selected' : '' }}>{{ $value->title }}</option>
                                @endforeach
                            </optgroup>
                        </select>
                        @error('meet_our_minds_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <label class="col-sm-2"><b>Member Name : <span class="text-danger">*</span></b></label>
                    <div class="col-sm-4 col-md-4">
                        <input type="text" name="memberName" id="memberName" class="form-control @error('memberName') is-invalid @enderror" placeholder="Enter Member Name" value="{{ old('memberName') }}">
                        @error('memberName')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <label class="col-sm-2"><b>Member Position : <span class="text-danger">*</span></b></label>
                    <div class="col-sm-4 col-md-4">
                        <input type="text" name="memberPosition" id="memberPosition" class="form-control @error('memberPosition') is-invalid @enderror" placeholder="Enter Member Position" value="{{ old('memberPosition') }}">
                        @error('memberPosition')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <label class="col-sm-2"><b>Status : <span class="text-danger">*</span></b></label>
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
                    <label class="col-sm-3"><b>Upload Member Profile Image : <span class="text-danger">*</span></b></label>
                    <div class="col-sm-9 col-md-9 mb-4">
                        <input type="file" onchange="agentPreviewFile()" accept=".png, .jpg, .jpeg" name="memberProfilePic" id="memberProfilePic" class="form-control @error('memberProfilePic') is-invalid @enderror" value="{{ old('memberProfilePic') }}" placeholder="Upload Member Profile Imaget.">
                        <small class="text-secondary"><b>Note : The file size  should be less than 2MB .</b></small>
                        <br>
                        <small class="text-secondary"><b>Note : Only files in .jpg, .jpeg, .png format can be uploaded .</b></small>
                        <br>
                        @error('memberProfilePic')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <br>
                        <div id="preview-memberProfilePic-container">
                            <div id="file-preview-memberProfilePic"></div>
                        </div>
                    </div>

                    <label class="col-sm-3"><b>Member Description : <span class="text-danger">*</span></b></label>
                    <div class="col-sm-9 col-md-9">
                        <textarea name="memberDescription" id="memberDescription" class="textarea_editor form-control border-radius-0 @error('memberDescription') is-invalid @enderror" placeholder="Enter Member Description" value="{{ old('memberDescription') }}">{{ old('memberDescription') }}</textarea>
                        @error('memberDescription')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-12">
                    <h4 class="text-blue h4">Social Media Details :- </h4>

                    <table class="table table-bordered p-3"  id="dynamicAmenitiesTable">
                        <thead>
                            <tr>
                                <th>Uploaded Social Media Icon : </th>
                                <th>Social Media Url : </th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="col-sm-12 col-md-12">
                                        <div id="overview-socialMediaIcon-container-0">
                                            <div id="file-overview-socialMediaIcon-0"></div>
                                        </div>
                                        <input type="file" onchange="overviewSocialMediaIconPreviewFiles(0)" accept=".png, .jpg, .jpeg"  name="socialMediaIcon[]" id="socialMediaIcon_0" class="form-control @error('socialMediaIcon.*') is-invalid @enderror">
                                        <small class="text-secondary"><b>Note : The file size  should be less than 2MB .</b></small>
                                        <br>
                                        <small class="text-secondary"><b>Note : Only files in .jpg, .jpeg, .png format can be uploaded .</b></small>
                                        <br>
                                        @error('socialMediaIcon.*')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </td>

                                <td>
                                    <div class="col-sm-12 col-md-12">
                                        <input type="text" name="socialMediaUrl[]" id="socialMediaUrl_0" class="form-control @error('socialMediaUrl.*') is-invalid @enderror" placeholder="Enter Social Media Url">
                                        @error('socialMediaUrl.*')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </td>

                                <td>
                                    <button type="button" class="btn btn-primary" id="addAmenitiesRow">Add More</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="form-group row mt-4">
                    <label class="col-md-3"></label>
                    <div class="col-md-9" style="display: flex; justify-content: flex-end;">
                        <a href="{{ route('members.index') }}" class="btn btn-danger">Cancel</a>&nbsp;&nbsp;
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
{{-- Member Profile Pic View Both Image & PDF --}}
<script>
    // Existing function for agent image/PDF preview (if needed)
    function agentPreviewFile() {
        const fileInput = document.getElementById('memberProfilePic');
        const previewContainer = document.getElementById('preview-memberProfilePic-container');
        const filePreview = document.getElementById('file-preview-memberProfilePic');
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

{{-- Add More Social Media or View both Image and PDF --}}
<script>
    $(document).ready(function () {
        let rowId = 0;

        // Add a new row
        $('#addAmenitiesRow').click(function () {
            rowId++;
            const newRow = `
                <tr>
                    <td>
                        <div class="col-sm-12 col-md-12">
                            <div id="overview-socialMediaIcon-container-${rowId}">
                                <div id="file-overview-socialMediaIcon-${rowId}"></div>
                            </div>
                            <input type="file" onchange="overviewSocialMediaIconPreviewFiles(${rowId})" accept=".png, .jpg, .jpeg" name="socialMediaIcon[]" id="socialMediaIcon_${rowId}" class="form-control @error('socialMediaIcon.*') is-invalid @enderror">
                            <small class="text-secondary"><b>Note : The file size should be less than 2MB.</b></small>
                            <br>
                            <small class="text-secondary"><b>Note : Only files in .jpg, .jpeg, .png format can be uploaded.</b></small>
                            <br>
                            @error('socialMediaIcon.*')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </td>
                    <td>
                        <div class="col-sm-12 col-md-12">
                            <input type="text" name="socialMediaUrl[]" id="socialMediaUrl_${rowId}" class="form-control @error('socialMediaUrl.*') is-invalid @enderror" placeholder="Enter Social Media Url">
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
    function overviewSocialMediaIconPreviewFiles(rowId) {
        const fileInput = document.getElementById(`socialMediaIcon_${rowId}`);
        const previewContainer = document.getElementById(`overview-socialMediaIcon-container-${rowId}`);
        const filePreview = document.getElementById(`file-overview-socialMediaIcon-${rowId}`);
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
                    filePreview.innerHTML = `<img src="${e.target.result}" alt="File Preview" style="width:14%; height:14%;">`;
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
