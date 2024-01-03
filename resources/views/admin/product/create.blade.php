@extends('layouts.admin-master')

@section('admin-content')
@section('products')
    active show-sub
@endsection
@section('add-product')
    active
@endsection


<div class="sl-mainpanel">
    <nav class="breadcrumb sl-brudcrumb">
        <a href="index.html" class="breadcrumb-item">Ecom Shop</a>
        <span class="breadcrumb-item active">Add Product</span>
    </nav>
    <div class="sl-pagebody">
        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Add Product</h6>
            <form action="{{ route('store-product') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row row-sm">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="" class="form-control-label">Select Brand:
                                <span class="text-danger">*</span>
                            </label>
                            <select class="form-control select2-show-search" name="brand_id"
                                data-placeholder="Select one">
                                <option label="Choose one"></option>
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->brand_name_en }} </option>
                                @endforeach
                            </select>
                            @error('brand_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="" class="form-control-label">Select Category:
                                <span class="text-danger">*</span>
                            </label>
                            <select class="form-control select2-show-search" name="category_id"
                                data-placeholder="Select one">
                                <option label="Choose one"></option>
                                @foreach ($categories as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->category_name_en }} </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="" class="form-control-label">Select Sub Category:
                                <span class="text-danger">*</span>
                            </label>
                            <select class="form-control select2-show-search" name="subcategory_id"
                                data-placeholder="Select one">

                            </select>
                            @error('subcategory_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="" class="form-control-label">Select Sub Sub Category:
                                <span class="text-danger">*</span>
                            </label>
                            <select class="form-control select2-show-search" name="subsubcategory_id"
                                data-placeholder="Select one">

                            </select>
                            @error('subsubcategory_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="" class="form-control-label">Product Name English:
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" name="product_name_en"
                                value="{{ old('product_name_en') }}" placeholder="Enter product_name_en">
                            @error('product_name_en')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="" class="form-control-label">Product Name Bangla:
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" name="product_name_bn"
                                value="{{ old('product_name_bn') }}" placeholder="Enter product_name_bn">
                            @error('product_name_bn')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="" class="form-control-label">Product Code:
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" name="product_code"
                                value="{{ old('product_code') }}" placeholder="Enter product_code">
                            @error('product_code')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="" class="form-control-label">Product Quantity:
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" name="product_qty"
                                value="{{ old('product_qty') }}" placeholder="Enter product_qty">
                            @error('product_qty')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="" class="form-control-label">Product Tags English:
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" name="product_tags_en"
                                value="{{ old('product_tags_en') }}" data-role="tagsinput"
                                placeholder="Enter product_tags_en">
                            @error('product_tags_en')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="" class="form-control-label">Product Tags Bangla:
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" name="product_tags_bn"
                                value="{{ old('product_tags_bn') }}" data-role="tagsinput"
                                placeholder="Enter product_tags_bn">
                            @error('product_tags_bn')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="" class="form-control-label">Product Size English:
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" name="product_size_en"
                                value="{{ old('product_size_en') }}" placeholder="Enter product_size_en">
                            @error('product_size_en')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="" class="form-control-label">Product Size Bangla:
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" name="product_size_bn"
                                value="{{ old('product_size_bn') }}" placeholder="Enter product_size_bn">
                            @error('product_size_bn')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="" class="form-control-label">Product Color English:
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" name="product_color_en"
                                value="{{ old('product_color_en') }}" placeholder="Enter product_color_en">
                            @error('product_color_en')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="" class="form-control-label">Product Color Bangla:
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" name="product_color_bn"
                                value="{{ old('product_color_bn') }}" placeholder="Enter product_color_bn">
                            @error('product_color_bn')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="" class="form-control-label">Product Selling Price:
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" name="selling_price"
                                value="{{ old('selling_price') }}" placeholder="Enter selling_price">
                            @error('selling_price')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="" class="form-control-label">Product Discount Price:
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" name="discount_price"
                                value="{{ old('discount_price') }}" placeholder="Enter discount_price">
                            @error('discount_price')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="" class="form-control-label">Product Thumbnail:
                                <span class="text-danger">*</span>
                            </label>
                            <input type="file" class="form-control" name="product_thumbnail"
                                value="{{ old('product_thumbnail') }}" onchange="mainThumbUrl(this)">
                            @error('product_thumbnail')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <img src="" id="mainThumb">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="" class="form-control-label">Multiple Image:
                                <span class="text-danger">*</span>
                            </label>
                            <input type="file" class="form-control" name="multi_img[]"
                                value="{{ old('multi_img') }}" multiple id="multiImg">
                            @error('multi_img')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="row" id="preview_img">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="form-control-label">Short Description English:
                                <span class="text-danger">*</span>
                            </label>
                            <textarea name="short_descp_en" id="summernote"></textarea>
                            @error('short_descp_en')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="form-control-label">Short Description Bangla:
                                <span class="text-danger">*</span>
                            </label>
                            <textarea name="short_descp_bn" id="summernote2"></textarea>
                            @error('short_descp_bn')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="form-control-label">Long Description English:
                                <span class="text-danger">*</span>
                            </label>
                            <textarea name="long_descp_en" id="summernote3"></textarea>
                            @error('long_descp_en')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="form-control-label">Long Description Bangla:
                                <span class="text-danger">*</span>
                            </label>
                            <textarea name="long_descp_bn" id="summernote4"></textarea>
                            @error('long_descp_bn')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label class="ckbox">
                            <input type="checkbox" name="hot_deals" value="1"><span>Hot deals</span>
                        </label>
                    </div>
                    <div class="col-md-4">
                        <label class="ckbox">
                            <input type="checkbox" name="featured" value="1"><span>Featured</span>
                        </label>
                    </div>
                    <div class="col-md-4">
                        <label class="ckbox">
                            <input type="checkbox" name="special_offer" value="1"><span>Special
                                Offer</span>
                        </label>
                    </div>
                    <div class="col-md-4">
                        <label class="ckbox">
                            <input type="checkbox" name="special_deals" value="1"><span>Special
                                deals</span>
                        </label>
                    </div>
                </div>
                <div class="form-layout-footer mt-3">
                    <button class="btn btn-info mg-r-5" type="submit" style="cursor:pointer;">Add Product</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="{{ asset('backend') }}/lib/jquery/jquery.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="category_id"]').on('change', function() {
            var category_id = $(this).val();
            if (category_id) {
                $.ajax({
                    url: "{{ url('/admin/subcategory/ajax') }}/" + category_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="subsubcategory_id"]').html('')
                        var d = $('select[name="subcategory_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="subcategory_id"]').append(
                                '<option value="' + value.id + '">' + value
                                .subcategory_name_en + '</option>');
                        });
                    },
                });
            } else {
                alert('danger');
            }
        })


        $('select[name="subcategory_id"]').on('change', function() {
            var subcategory_id = $(this).val();
            if (subcategory_id) {
                $.ajax({
                    url: "{{ url('/admin/sub-subcategory/ajax') }}/" + subcategory_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        var d = $('select[name="subsubcategory_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="subsubcategory_id"]').append(
                                '<option value="' + value.id + '">' + value
                                .subsubcategory_name_en + '</option>');
                        });
                    },
                });
            } else {
                alert('danger');
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#multiImg').on('change', function() { //on file input change
            if (window.File && window.FileReader && window.FileList && window
                .Blob) //check File API supported browser
            {
                var data = $(this)[0].files; //this file data
                $.each(data, function(index, file) { //loop though each file
                    if (/(\.|\/)(gif|jpe?g|png)$/i.test(file
                            .type)) { //check supported file type
                        var fRead = new FileReader(); //new filereader
                        fRead.onload = (function(file) { //trigger function on successful read
                            return function(e) {
                                var img = $('<img/>').addClass('thumb').attr('src',
                                        e.target.result).width(80)
                                    .height(80); //create image element
                                $('#preview_img').append(
                                    img); //append image to output element
                            };
                        })(file);
                        fRead.readAsDataURL(file); //URL representing the file's data.
                    }
                });
            } else {
                alert("Your browser doesn't support File API!"); //if File API is absent
            }
        });
    });
</script>
<script>
    function mainThumbUrl(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#mainThumb').attr('src', e.target.result).width(80).height(80);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection
