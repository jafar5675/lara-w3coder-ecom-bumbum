@extends('layouts.admin-master')

@section('admin-content')
@section('stock')
    active
@endsection

@section('admin-content')
    {{-- ==============Start main Panel======== --}}

    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-brudcrumb">
            <a href="index.html" class="breadcrumb-item">Ecom Shop</a>
            <span class="breadcrumb-item active">Stock Management</span>
        </nav>

        <div class="sl-pagebody">
            <div class="row row-sm">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Product List</div>
                        <div class="card-body">
                            <div class="table-wrapper">
                                <table id="datatable1" class="table display responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th class="wd-15p">Product Img</th>
                                            <th class="wd-20p">P English</th>
                                            <th class="wd-10p">P Price</th>
                                            <th class="wd-10p">P Stock</th>
                                            <th class="wd-15p">Status</th>
                                            <th class="wd-25p">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $item)
                                            <tr>
                                                <td>
                                                    <img src="{{ asset($item->product_thumbnail) }}" alt=""
                                                        style="height:60px;width:60px;">
                                                </td>
                                                <td>{{ $item->product_name_en }}</td>
                                                <td>Tk-{{ $item->selling_price }}</td>
                                                <td>
                                                    <span
                                                        class="badge badge-pill badge-success">{{ $item->product_qty }}</span>
                                                </td>
                                                <td>
                                                    @if ($item->status == 1)
                                                        <span class="badge badge-pill badge-success">Active</span>
                                                    @else
                                                        <span class="badge badge-pill badge-danger">InActive</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('stock-edit', $item->id) }}"
                                                        class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>

                                                    <a href="{{ url('admin/product-delete/' . $item->id) }}"
                                                        class="btn btn-danger btn-sm" id="delete"><i
                                                            class="fa fa-trash"></i></a>

                                                    @if ($item->status == 1)
                                                        <a href="{{ url('admin/product-inactive/' . $item->id) }}"
                                                            class="btn btn-danger btn-sm" title="inactive"><i
                                                                class="fa fa-arrow-down"></i></a>
                                                    @else
                                                        <a href="{{ url('admin/product-active/' . $item->id) }}"
                                                            class="btn btn-success btn-sm" title="active"><i
                                                                class="fa fa-arrow-up"></i></a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div><!-- table-wrapper -->
                        </div><!-- table-wrapper -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
