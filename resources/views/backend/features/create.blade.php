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
                                <a href="{{ route('features.index') }}">Manage Features</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Add Feature
                            </li>
                        </ol>
                    </nav>
                </div>

            </div>
        </div>


        <form method="POST" action="{{ route('features.store') }}" class="form-horizontal" enctype="multipart/form-data">
            @csrf

            <div class="pd-20 card-box mb-30">

                <div class="form-group row mt-3">
                    <label class="col-sm-3"><b>Title : <span class="text-danger">*</span></b></b></label>
                    <div class="col-sm-6 col-md-6">
                        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" placeholder="Enter Title.">
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mt-4">
                    <label class="col-md-3"></label>
                    <div class="col-md-9" style="display: flex; justify-content: flex-end;">
                        <a href="{{ route('features.index') }}" class="btn btn-danger">Cancel</a>&nbsp;&nbsp;
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
@endpush
