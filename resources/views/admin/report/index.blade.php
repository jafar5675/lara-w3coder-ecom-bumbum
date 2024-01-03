@extends('layouts.admin-master')

@section('reports')
    active
@endsection

@section('admin-content')
    {{-- ==============Start main Panel======== --}}

    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-brudcrumb">
            <a href="index.html" class="breadcrumb-item">Ecom Shop</a>
            <span class="breadcrumb-item active">Reports</span>
        </nav>

        <div class="sl-pagebody">
            <div class="row row-sm">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Select By Date</div>
                        <div class="card-body">
                            <form action="{{ route('search-by-date') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="" class="form-control-label">Select Date:
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="date" class="form-control" name="date">
                                    @error('date')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-layout-footer">
                                    <button type="submit" class="btn btn-info">Search</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Select By Month</div>
                        <div class="card-body">
                            <form action="{{ route('search-by-month') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="" class="form-control-label">Select Month:
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-control select2" name="month_name" id=""
                                        data-placeholder="Choose One" data-validation="required">
                                        <option value="Choose One"></option>
                                        <option value="January">January</option>
                                        <option value="February">February</option>
                                        <option value="March">March</option>
                                        <option value="April">April</option>
                                        <option value="May">May</option>
                                        <option value="June">June</option>
                                        <option value="July">July</option>
                                        <option value="August">August</option>
                                        <option value="September">September</option>
                                        <option value="October">October</option>
                                        <option value="November">November</option>
                                        <option value="December">December</option>
                                    </select>
                                    @error('month_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-control-label">Select Year:
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-control select2" name="year_name" id=""
                                        data-placeholder="Choose One" data-validation="required">
                                        <option value="Choose One"></option>
                                        <option value="2019">2019</option>
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                    </select>
                                    @error('year_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-layout-footer">
                                    <button type="submit" class="btn btn-info">Search</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Select By Month</div>
                        <div class="card-body">
                            <form action="{{ route('search-by-year') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="" class="form-control-label">Select Year:
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-control select2" name="year" id=""
                                        data-placeholder="Choose One" data-validation="required">
                                        <option value="Choose One"></option>
                                        <option value="2019">2019</option>
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                    </select>
                                    @error('year')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-layout-footer">
                                    <button type="submit" class="btn btn-info">Search</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
