@extends('layouts.admin-master')
@section('orders')
    active show-sub
@endsection
@section('pending-orders')
    active
@endsection
@section('admin-content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="index.html">SHopMama</a>
            <span class="breadcrumb-item active">Pending Orders</span>
        </nav>

        <div class="sl-pagebody">
            <div class="row row-sm">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Pending Orders List</div>
                        <div class="card-body">
                            <div class="table-wrapper">
                                <table id="datatable1" class="table display responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th class="wd-30p">Date</th>
                                            <th class="wd-30p">Invoice</th>
                                            <th class="wd-25p">Amount</th>
                                            <th class="wd-25p">TNX Id</th>
                                            <th class="wd-25p">Status</th>
                                            <th class="wd-20p">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $order)
                                            <tr>
                                                <td>{{ $order->order_date }}</td>
                                                <td>{{ $order->invoice_no }}</td>
                                                <td>{{ $order->amount }}Tk</td>
                                                <td>{{ $order->transaction_id }}</td>
                                                <td>
                                                    <span class="badge badge-pill badge-primary">{{ $order->status }}</span>
                                                </td>
                                                <td>
                                                    <a href="{{ url('admin/orders-view/' . $order->id) }}"
                                                        class="btn btn-sm btn-primary" title="view data"> <i
                                                            class="fa fa-eye"></i></a>

                                                    <a href="{{ url('admin/pending/orders-delete/' . $order->id) }}"
                                                        class="btn btn-sm btn-danger" id="delete" title="delete data"><i
                                                            class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div><!-- table-wrapper -->
                        </div>
                    </div><!-- card -->
                </div>
            </div>
        </div>


    </div>
@endsection
