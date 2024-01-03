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
                                class="text-warning">{{ Auth::user()->name }}</strong> Update Your Profile</h3>
                        <div class="card-body">
                            <form action="{{ route('update-data') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" name="name" class="form-control"
                                        value="{{ Auth::user()->name }}">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="text" name="email" class="form-control"
                                        value="{{ Auth::user()->email }}">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Phone</label>
                                    <input type="text" name="phone" class="form-control"
                                        value="{{ Auth::user()->phone }}">
                                    @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-danger">Update Data</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- row -->


        </div><!-- sl-pagebody -->

    </div>
@endsection
