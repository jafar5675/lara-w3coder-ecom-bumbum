@extends('layouts.admin-master')

@section('review')
    active
@endsection

@section('admin-content')
    {{-- ==============Start main Panel======== --}}

    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-brudcrumb">
            <a href="index.html" class="breadcrumb-item">Ecom Shop</a>
            <span class="breadcrumb-item active">Customer Review</span>
        </nav>

        <div class="sl-pagebody">
            <div class="row row-sm">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Review List</div>
                        <div class="card-body">

                            <div class="table-wrapper">
                                <table id="datatable1" class="table display responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th class="wd-20p">Product Image</th>
                                            <th class="wd-15p">Customer Name</th>
                                            <th class="wd-15p">Comment</th>
                                            <th class="wd-15p">Rating</th>
                                            <th class="wd-15p">Status</th>
                                            <th class="wd-20p">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($reviews as $review)
                                            <tr>
                                                <td>
                                                    <img src="{{ asset($review->product->product_thumbnail) }}"
                                                        alt="picture" style="width:50px;">
                                                </td>
                                                <td>{{ $review->user->name }}</td>
                                                <td>
                                                    <textarea name="" id="" cols="30" rows="2">{{ $review->comment }}</textarea>
                                                </td>
                                                <td>{{ $review->rating }}</td>
                                                <td>
                                                    <span class="badge badge-pill badge-success">
                                                        {{ $review->status }}</span>
                                                    @if ($review->status == 'pending')
                                                        <a href="{{ url('admin/review-approve/' . $review->id) }}"
                                                            class="btn btn-sm btn-primary">Approve Now</a>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ url('admin/review-delete/' . $review->id) }}"
                                                        class="btn btn-danger btn-sm" id="delete"><i
                                                            class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div><!-- table-wrapper -->
                        </div><!-- table-wrapper -->
                    </div><!-- card -->
                </div>
            </div>
        </div>
    </div>
@endsection
