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
                                class="text-warning">{{ Auth::user()->name }}</strong> Update Your Password</h3>
                        <div class="card-body">
                            <form action="{{ route('change-password-store') }}" method="POST">
                                @csrf

                                <div class="form-group">
                                    <label for="">Old_Password</label>
                                    <input type="password" name="old_password" class="form-control">
                                    @error('old_password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">New_Password</label>
                                    <input type="password" name="new_password" class="form-control">
                                    @error('new_password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Confirm Password</label>
                                    <input type="password" name="password_confirmation" class="form-control">
                                    @error('password_confirmation')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-danger">Change Password</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- row -->


        </div><!-- sl-pagebody -->

    </div>
@endsection
