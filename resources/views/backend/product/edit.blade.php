@extends('layouts.app')
@section('bradcrum')
<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
    <!--begin::Info-->
    <div class="d-flex align-items-center flex-wrap mr-2">
        <!--begin::Page Title-->
        <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Edit Product</h5>
        <!--end::Page Title-->
    </div>
    <!--end::Info-->
    <!--begin::Toolbar-->
    <div class="d-flex align-items-center">
        <!--begin::Actions-->
        <a href="#" class="btn btn-clean btn-sm font-weight-bold font-size-base mr-1">Today</a>
        <a href="#" class="btn btn-clean btn-sm font-weight-bold font-size-base mr-1">Month</a>
        <a href="#" class="btn btn-clean btn-sm font-weight-bold font-size-base mr-1">Year</a>
        <!--end::Actions-->
        <!--begin::Daterange-->
        <a href="#" class="btn btn-sm btn-light font-weight-bold mr-2" id="kt_dashboard_daterangepicker" data-toggle="tooltip" title="Select dashboard daterange" data-placement="left">
            <span class="text-muted font-size-base font-weight-bold mr-2" id="kt_dashboard_daterangepicker_title">Today</span>
            <span class="text-primary font-size-base font-weight-bolder" id="kt_dashboard_daterangepicker_date">Aug 16</span>
        </a>
        <!--end::Daterange-->
        <!--begin::Dropdowns-->
        <div class="dropdown dropdown-inline" data-toggle="tooltip" title="Quick actions" data-placement="left">
            <a href="#" class="btn btn-sm btn-clean btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="svg-icon svg-icon-success svg-icon-lg">
                    <!--begin::Svg Icon | path:assets/media/svg/icons/Files/File-plus.svg-->
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <polygon points="0 0 24 0 24 24 0 24" />
                            <path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                            <path d="M11,14 L9,14 C8.44771525,14 8,13.5522847 8,13 C8,12.4477153 8.44771525,12 9,12 L11,12 L11,10 C11,9.44771525 11.4477153,9 12,9 C12.5522847,9 13,9.44771525 13,10 L13,12 L15,12 C15.5522847,12 16,12.4477153 16,13 C16,13.5522847 15.5522847,14 15,14 L13,14 L13,16 C13,16.5522847 12.5522847,17 12,17 C11.4477153,17 11,16.5522847 11,16 L11,14 Z" fill="#000000" />
                        </g>
                    </svg>
                    <!--end::Svg Icon-->
                </span>
            </a>
            <div class="dropdown-menu p-0 m-0 dropdown-menu-md dropdown-menu-right py-3">
                <!--begin::Navigation-->
                <ul class="navi navi-hover py-5">
                    <li class="navi-item">
                        <a href="#" class="navi-link">
                            <span class="navi-icon">
                                <i class="flaticon2-drop"></i>
                            </span>
                            <span class="navi-text">New Group</span>
                        </a>
                    </li>
                    <li class="navi-item">
                        <a href="#" class="navi-link">
                            <span class="navi-icon">
                                <i class="flaticon2-list-3"></i>
                            </span>
                            <span class="navi-text">Contacts</span>
                        </a>
                    </li>
                    <li class="navi-item">
                        <a href="#" class="navi-link">
                            <span class="navi-icon">
                                <i class="flaticon2-rocket-1"></i>
                            </span>
                            <span class="navi-text">Groups</span>
                            <span class="navi-link-badge">
                                <span class="label label-light-primary label-inline font-weight-bold">new</span>
                            </span>
                        </a>
                    </li>
                    <li class="navi-item">
                        <a href="#" class="navi-link">
                            <span class="navi-icon">
                                <i class="flaticon2-bell-2"></i>
                            </span>
                            <span class="navi-text">Calls</span>
                        </a>
                    </li>
                    <li class="navi-item">
                        <a href="#" class="navi-link">
                            <span class="navi-icon">
                                <i class="flaticon2-gear"></i>
                            </span>
                            <span class="navi-text">Settings</span>
                        </a>
                    </li>
                    <li class="navi-separator my-3"></li>
                    <li class="navi-item">
                        <a href="#" class="navi-link">
                            <span class="navi-icon">
                                <i class="flaticon2-magnifier-tool"></i>
                            </span>
                            <span class="navi-text">Help</span>
                        </a>
                    </li>
                    <li class="navi-item">
                        <a href="#" class="navi-link">
                            <span class="navi-icon">
                                <i class="flaticon2-bell-2"></i>
                            </span>
                            <span class="navi-text">Privacy</span>
                            <span class="navi-link-badge">
                                <span class="label label-light-danger label-rounded font-weight-bold">5</span>
                            </span>
                        </a>
                    </li>
                </ul>
                <!--end::Navigation-->
            </div>
        </div>
        <!--end::Dropdowns-->
    </div>
    <!--end::Toolbar-->
</div>
@endsection
@section('content')
   <div class="container">
       @if (session('productSuccess'))
       <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session('productSuccess') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       @endif

    <div class="row">
        <div class="col-md-10 m-auto">
            <!--begin::Card-->
            <div class="card card-custom gutter-b example example-compact">
                <div class="card-header">
                    <h3 class="card-title">Edit Product</h3>
                </div>
                <!--begin::Form-->
                <form action="{{ route('product.update', Crypt::encrypt($data->id)) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="card-body">
                        <div class="form-group">
                            <label>Product Name
                            <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="product_name" placeholder="Enter product name" value="{{ $data->product_name }}">
                            <span class="text-danger">
                                @error('product_name')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Product Price
                                    <span class="text-danger">*</span></label>
                                    <input type="number" value="{{ $data->product_price }}" class="form-control" name="product_price" placeholder="Enter product price">
                                    <span class="text-danger">
                                        @error('product_price')
                                        {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Stock
                                    <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" name="stock" placeholder="Enter product stock" value="{{ $data->stock }}">
                                    <span class="text-danger">
                                        @error('stock')
                                        {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Category
                                    <span class="text-danger">*</span></label>
                                    <select name="category_id" class="form-control">
                                        <option value="">-----Select Category</option>
                                        @foreach ($categories as $category)
                                            <option {{ $category->id == $data->category_id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">
                                        @error('category_id')
                                        {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Product Description
                            <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="description" id="summernote" rows="5" placeholder="Enter product description">{!! strip_tags($data->description) !!}</textarea>
                            <span class="text-danger">
                                @error('description')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group">
                            <label>Product Long Description
                            <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="long_description" id="summernote2" rows="5" placeholder="Enter product long description">{!! strip_tags($data->long_description) !!}</textarea>
                            <span class="text-danger">
                                @error('long_description')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <div class="form-group">
                                    <label>Product Image
                                    <span class="text-danger">*</span></label>
                                    <input type="file" class="form-control" name="product_image">
                                    <span class="text-danger">
                                        @error('product_image')
                                        {{ $message }}
                                        @enderror
                                    </span>
                                    <img style="width: 50px; margin-top:10px" src="{{ asset('uploads/product_photo') }}/{{ $data->product_image }}" alt="">
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group">
                                    <label>Product Thumbnails
                                    <span class="text-danger">*</span></label>
                                    <input type="file" class="form-control" name="product_thumbnails[]" multiple>
                                    <span class="text-danger">
                                        @error('product_thumbnails')
                                        {{ $message }}
                                        @enderror
                                    </span>
                                    @foreach ($thumbnails as $thumbnail)
                                        <img style="width: 50px; margin-top:10px" class="m-2" src="{{ asset('uploads/product_thumbnails_photo') }}/{{ $thumbnail->product_thumbnails }}" alt="">
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Product Size
                                    <span class="text-danger"></span></label>
                                    <select name="size_id[]" class="form-control select2class2" multiple="multiple">
                                        @foreach ($sizes as $size)
                                            @if ($sizeCheeck)
                                                @foreach ($productsizeid as $sid)
                                                    <option {{ $size->id == $sid->size_id ? 'selected' : ''}} value="{{ $size->id }}">{{ $size->size_name }}</option>
                                                @endforeach
                                            @else
                                                <option value="{{ $size->id }}">{{ $size->size_name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    {{-- <span class="text-danger">
                                        @error('size_id')
                                        {{ $message }}
                                        @enderror
                                    </span> --}}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Product Color
                                    <span class="text-danger"></span></label>
                                    <select name="color_id[]" class="form-control select2class1" multiple="multiple">
                                        @foreach ($colors as $color)
                                            @if ($colorCheck)
                                                @foreach ($productcolorid as $cid)
                                                    <option {{ $color->id == $cid->id ? 'selected' : ''}} value="{{ $color->id }}">{{ $color->color_name }}</option>
                                                @endforeach
                                                @else
                                                <option value="{{ $color->id }}">{{ $color->color_name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    {{-- <span class="text-danger">
                                        @error('color_id')
                                        {{ $message }}
                                        @enderror
                                    </span> --}}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Product Brand
                                    <span class="text-danger"></span></label>
                                    <input type="text" class="form-control" name="brand" placeholder="Enter brand name" value="{{ $data->brand }}">
                                    <span class="text-danger">
                                        @error('brand')
                                        {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Product Weight
                                    <span class="text-danger"></span></label>
                                    <input type="text" class="form-control" name="weight" placeholder="Enter brand name" value="{{ $data->weight }}">
                                    <span class="text-danger">
                                        @error('weight')
                                        {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Product Dimension
                                    <span class="text-danger"></span></label>
                                    <input type="text" class="form-control" name="dimension" placeholder="Enter dimension" value="{{ $data->dimension }}">
                                    <span class="text-danger">
                                        @error('dimension')
                                        {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Product Material
                                    <span class="text-danger"></span></label>
                                    <input type="text" class="form-control" name="material" placeholder="Enter material" value="{{ $data->material }}">
                                    <span class="text-danger">
                                        @error('material')
                                        {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Others Info
                                    <span class="text-danger"></span></label>
                                    <input type="text" class="form-control" name="others_info" placeholder="Enter others info" value="{{ $data->others_info }}">
                                    <span class="text-danger">
                                        @error('others_info')
                                        {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>SKU-Code
                                    <span class="text-danger"></span></label>
                                    <input type="text" class="form-control" name="sku" placeholder="Enter sku code" value="{{ old('sku') }}">
                                    <span class="text-danger">
                                        @error('sku')
                                        {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary mr-2">Add Product</button>
                    </div>
                </form>
                <!--end::Form-->
            </div>
            <!--end::Card-->
        </div>
    </div>
</div>


@endsection

@section('footer_script')
<script>
    $(document).ready(function() {
        $('.select2class1').select2();
        $('.select2class2').select2();
        $('.select2Class3').select2();

        $('#summernote').summernote({
            height: 150,
            placeholder: 'Enter product description with out image',
        });
        $('#summernote2').summernote({
            height: 150,
            placeholder: 'Enter product description with out image',
        });

    });
  </script>
@endsection
