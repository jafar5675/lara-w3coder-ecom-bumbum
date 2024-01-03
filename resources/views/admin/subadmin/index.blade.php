@extends('layouts.admin-master')

@section('admin-content')
@section('role')
    active show-sub
@endsection
@section('all-role')
    active
@endsection


@section('admin-content')
    {{-- ==============Start main Panel======== --}}

    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-brudcrumb">
            <a href="index.html" class="breadcrumb-item">Ecom Shop</a>
            <span class="breadcrumb-item active">Users</span>
        </nav>

        <div class="sl-pagebody">
            <div class="row row-sm">
                <div class="col-md-10 m-auto">
                    <div class="card">
                        <div class="card-header">Subadmin List</div>
                        <div class="card-body">

                            <div class="table-wrapper">
                                <table id="datatable1" class="table display responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th class="wd-30p">sl</th>
                                            <th class="wd-25p">Name</th>
                                            <th class="wd-25p">Email</th>
                                            <th class="wd-25p">Role</th>
                                            <th class="wd-20p">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>
                                                    <span class="badge badge-pill badge-success">{{ $item->role->name }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <a href="{{ route('subadmin.edit', $item->id) }}"
                                                        class="btn btn-info btn-sm"><i class="fa fa-pencil"></i></a>
                                                    <form action="{{ route('subadmin.destroy', $item->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-danger btn-sm"><i
                                                                class="fa fa-trash"></i></button>
                                                    </form>
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
