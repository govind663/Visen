@extends('backend.layouts.master')

@section('title')
Visen | Edit Product Filter
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
                        <h4>Edit Product Filter</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.dashboard') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('product-filter.index') }}">Manage Product Filter</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Edit Product Filter
                            </li>
                        </ol>
                    </nav>
                </div>

            </div>
        </div>


        <form method="POST" action="{{ route('product-filter.update', $productFillter->id) }}" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <input type="text" id="id" name="id" hidden  value="{{ $productFillter->id }}">

            <div class="pd-20 card-box mb-30">
                <div class="form-group row mt-3">
                    <label class="col-sm-2"><b>Industry Name : <span class="text-danger">*</span></b></label>
                    <div class="col-sm-4 col-md-4">
                        <select name="industry_id" id="industry_id" class="custom-select2 form-control @error('industry_id') is-invalid @enderror">
                            <option value=" " >Select Industry Name</option>
                            <optgroup label="Industry Name">
                                @foreach($industriesName as $value)
                                    <option value="{{ $value->id }}" {{ $productFillter->industry_id == $value->id ? 'selected' : '' }}>{{ $value->industries_name }}</option>
                                @endforeach
                            </optgroup>
                        </select>
                        @error('industry_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <label class="col-sm-2"><b>Category Name : <span class="text-danger">*</span></b></label>
                    <div class="col-sm-3 col-md-3">
                        <select name="category_id" id="category_id" class="custom-select2 form-control @error('category_id') is-invalid @enderror">
                            <option value=" " >Select Category Name</option>
                            <optgroup label="Category Name">
                                @foreach($industriesCategoryName as $value)
                                    <option value="{{ $value }}" {{ $productFillter->category_id == $value ? 'selected' : '' }}>{{ $value }}</option>
                                @endforeach
                            </optgroup>
                        </select>
                        @error('category_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <table class="table table-bordered p-3" id="dynamicFilterTable">
                    <thead>
                        <tr>
                            <th>Filter Name : <span class="text-danger">*</span></th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!empty($filterNames))
                            @foreach ($filterNames as $index => $filter)
                            <tr>
                                <td>
                                    <div class="col-sm-12 col-md-12">
                                        <input type="text" name="filter_name[]" value="{{ old('filter_name.' . $index, $filter) }}" class="form-control @error('filter_name.*') is-invalid @enderror" placeholder="Enter Filter Name">
                                        @error('filter_name.*')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </td>
                                <td>
                                    @if($loop->first)
                                        <button type="button" class="btn btn-primary" id="addFilterRow">Add More</button>
                                    @else
                                        <button type="button" class="btn btn-danger removeFilterRow">Remove</button>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        @else
                            <tr>
                                <td>
                                    <div class="col-sm-12 col-md-12">
                                        <input type="text" name="filter_name[]" class="form-control @error('filter_name.*') is-invalid @enderror" value="{{ old('filter_name.0') }}" placeholder="Enter Filter Name">
                                        @error('filter_name.*')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-primary" id="addFilterRow">Add More</button>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>

                <div class="form-group row mt-4">
                    <label class="col-md-3"></label>
                    <div class="col-md-9" style="display: flex; justify-content: flex-end;">
                        <a href="{{ route('product-filter.index') }}" class="btn btn-danger">Cancel</a>&nbsp;&nbsp;
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
    $(document).ready(function(){
        // Listen for changes on the industry_id dropdown
        $(document).on('change', '#industry_id', function() {
            let industry_id = $(this).val();

            // Show the category dropdown if an industry is selected
            if (industry_id) {
                $('#category_id').show();

                $.ajax({
                    method: 'POST',
                    url: "{{ route('fetchCategoryNname') }}",
                    data: {
                        industryID: industry_id,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        // Clear the current options and add the default option
                        $('#category_id').html('<option value="">Select Category Name</option>');

                        // Populate the Category dropdown based on the JSON structure
                        $.each(result, function (key, value) {
                            // console.log(value);
                            $('#category_id').append('<option value="' + value + '">' + value + '</option>');
                        });
                    },
                    error: function(xhr) {
                        console.error(xhr); // Log any errors
                    }
                });
            } else {
                // If no industry is selected, hide the Category dropdown
                $('#category_id').hide();
                $('#category_id').html('<option value="">Select Category Name</option>');
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        // Add a new row when clicking the "Add More" button
        $('#dynamicFilterTable').on('click', '#addFilterRow', function() {
            let newRow = `
                <tr>
                    <td>
                        <div class="col-sm-12 col-md-12">
                            <input type="text" name="filter_name[]" class="form-control @error('filter_name.*') is-invalid @enderror" placeholder="Enter Filter Name">
                        </div>
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger removeFilterRow">Remove</button>
                    </td>
                </tr>`;
            $('#dynamicFilterTable tbody').append(newRow);
        });

        // Remove a row when clicking the "Remove" button
        $('#dynamicFilterTable').on('click', '.removeFilterRow', function() {
            $(this).closest('tr').remove();
        });
    });
</script>
@endpush
