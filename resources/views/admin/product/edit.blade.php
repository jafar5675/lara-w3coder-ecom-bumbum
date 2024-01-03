@extends('layouts.admin-master')

@section('admin-content')
@section('products')
    active show-sub
@endsection
@section('manage-product')
    active
@endsection


<div class="sl-mainpanel">
    <nav class="breadcrumb sl-brudcrumb">
        <a href="index.html" class="breadcrumb-item">Ecom Shop</a>
        <span class="breadcrumb-item active">UPdate Product</span>
    </nav>
    <div class="sl-pagebody">
        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">UPdate Product</h6>
            <form action="{{ route('update-product') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
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
                                    <option value="{{ $brand->id }}"
                                        {{ $brand->id == $product->brand_id ? 'selected' : '' }}>
                                        {{ $brand->brand_name_en }} </option>
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
                                    <option value="{{ $cat->id }}"
                                        {{ $cat->id == $product->category_id ? 'selected' : '' }}>
                                        {{ $cat->category_name_en }} </option>
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
                                value="{{ $product->product_name_en }}" placeholder="Enter product_name_en">
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
                                value="{{ $product->product_name_bn }}" placeholder="Enter product_name_bn">
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
                                value="{{ $product->product_code }}" placeholder="Enter product_code">
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
                                value="{{ $product->product_qty }}" placeholder="Enter product_qty">
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
                                value="{{ $product->product_tags_en }}" data-role="tagsinput"
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
                                value="{{ $product->product_tags_bn }}" data-role="tagsinput"
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
                                value="{{ $product->product_size_en }}" placeholder="Enter product_size_en">
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
                                value="{{ $product->product_size_bn }}" placeholder="Enter product_size_bn">
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
                                value="{{ $product->product_color_en }}" placeholder="Enter product_color_en">
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
                                value="{{ $product->product_color_bn }}" placeholder="Enter product_color_bn">
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
                                value="{{ $product->selling_price }}" placeholder="Enter selling_price">
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
                                value="{{ $product->discount_price }}" placeholder="Enter discount_price">
                            @error('discount_price')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="" class="form-control-label">Short Description English:
                                <span class="text-danger">*</span>
                            </label>
                            <textarea name="short_descp_en" id="summernote">{{ $product->short_descp_en }}</textarea>
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
                            <textarea name="short_descp_bn" id="summernote2">{{ $product->short_descp_bn }}</textarea>
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
                            <textarea name="long_descp_en" id="summernote3">{{ $product->long_descp_en }}</textarea>
                            @error('long_descp_en')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="" class="form-control-label">Long Description Bangla:
                                <span class="text-danger">*</span>
                            </label>
                            <textarea name="long_descp_bn" id="summernote4">{{ $product->long_descp_bn }}</textarea>
                            @error('long_descp_bn')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label class="ckbox">
                            <input type="checkbox" name="hot_deals" value="1"
                                {{ $product->hot_deals == 1 ? 'checked' : '' }}><span>Hot deals</span>
                        </label>
                    </div>
                    <div class="col-md-4">
                        <label class="ckbox">
                            <input type="checkbox" name="featured"
                                value="1"{{ $product->featured == 1 ? 'checked' : '' }}><span>Featured</span>
                        </label>
                    </div>
                    <div class="col-md-4">
                        <label class="ckbox">
                            <input type="checkbox" name="special_offer"
                                value="1"{{ $product->special_offer == 1 ? 'checked' : '' }}><span>Special
                                Offer</span>
                        </label>
                    </div>
                    <div class="col-md-4">
                        <label class="ckbox">
                            <input type="checkbox" name="special_deals"
                                value="1"{{ $product->special_deals == 1 ? 'checked' : '' }}><span>Special
                                deals</span>
                        </label>
                    </div>
                </div>
                <div class="form-layout-footer mt-3">
                    <button class="btn btn-info mg-r-5" type="submit" style="cursor:pointer;">Update
                        Product</button>
                </div>
            </form>
            <h4 style="margin-top: 30px;">Thumbnail Update</h4>
            <form action="{{ route('update-product-thumbnail') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <input type="hidden" name="old_img" value="{{ $product->product_thumbnail }}">
                <div class="row row-sm" style="margin-top: 30px;">
                    <div class="col-md-3">
                        <div class="card">
                            <img src="{{ asset($product->product_thumbnail) }}" alt="card img" class="card-img-top">
                            <div class="card-body">
                                <p class="card-text">
                                <div class="form-group">
                                    <label class="form-control-label">Change Image</label>
                                    <input type="file" class="form-control" name="product_thumbnail"
                                        onchange="mainThumbUrl(this)">
                                </div>
                                <img src="" id="mainThumb">
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-layout-footer">
                    <button type="submit" class="btn btn-info">Update Thumbnail Image</button>
                </div>
            </form>
            <h4 style="margin-top: 30px;">Product Image Update</h4>
            <form action="{{ route('update-product-image') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row row-sm">
                    @foreach ($multiImgs as $img)
                        <div class="col-md-3">
                            <div class="card">
                                <img src="{{ asset($img->photo_name) }}" alt="card img" class="card-img-top">
                                <div class="card-body">
                                    <h3 class="card-title">
                                        <a href="{{ url('admin/product/multiImg/delete/' . $img->id) }}"
                                            class="btn btn-danger btn-sm" id="delete"><i class="fa fa-trash"></i>
                                            delete</a>
                                    </h3>
                                    <p class="card-text">
                                    <div class="form-group">
                                        <label class="form-control-label">Change Image</label>
                                        <input type="file" class="form-control"
                                            name="multiImg[{{ $img->id }}]">
                                    </div>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="form-layout-footer">
                    <button type="submit" class="btn btn-info">Update Image</button>
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
