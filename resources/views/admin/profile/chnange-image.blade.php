@extends('layouts.admin-master')
@section('admin-content')
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="index.html">Shopping</a>
            <span class="breadcrumb-item active">Profile</span>
        </nav>

        <div class="sl-pagebody">

            <div class="row row-sm">
                <div class="col-md-5">
                    @include('admin.profile.inc.sidebar')
                </div>
                <div class="col-md-7 mt-1">
                    <div class="card">
                        <h3 class="text-center"><span class="text-danger">Hi.... </span><strong
                                class="text-warning">{{ Auth::user()->name }}</strong> Update Your Image</h3>
                        <div class="card-body">
                            <form action="{{ route('store-image') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="old_image" value="{{ Auth::user()->image }}">
                                <div class="form-group">
                                    <label for="">Image</label>
                                    <input type="file" name="image" class="form-control">
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-danger">Upload</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- row -->


        </div><!-- sl-pagebody -->

    </div>
@endsection
