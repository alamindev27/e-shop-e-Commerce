@extends('layouts.app_frontend')
@section('content')
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bread-inner">
                    <ul class="bread-list">
                        <li><a href="{{ url('/') }}">Home<i class="ti-arrow-right"></i></a></li>
                        <li>Product-Details</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


    <div class="row">
        <div class="col-lg-9 col-md-8 m-auto">
            <div class="card-content">
                <div class="card-body">
                    <div class="row no-gutters">
                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            <!-- Product Slider -->
                                <div class="product-gallery">
                                    <div class="quickview-slider-active">
                                        @foreach ($productThumbnails as $productThumbnail)
                                            <div class="single-slider">
                                                <img src="{{ asset('uploads/product_thumbnails_photo') }}/{{ $productThumbnail->product_thumbnails }}" alt="{{ $productThumbnail->product_thumbnails }}">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            <!-- End Product slider -->
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            @if (session('successCart'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session('successCart') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                            @endif
                            @if (session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>{{ session('error') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                            @endif
                            <form action="{{ route('cart.store', Crypt::encrypt($product->id)) }}" method="POST">
                                @csrf
                            <div class="quickview-content">
                                <h2>{{ $product->product_name }}</h2>
                                <label>Category : {{ $product->relationtocategory->category_name }}</label>
                                <label class="pull-right">SKU : {{ $product->sku }}</label>
                                <div class="quickview-ratting-review">
                                    <div class="quickview-ratting-wrap">
                                        <div class="quickview-ratting">
                                            <i class="yellow fa fa-star"></i>
                                            <i class="yellow fa fa-star"></i>
                                            <i class="yellow fa fa-star"></i>
                                            <i class="yellow fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a href="#"> (1 customer review)</a>
                                    </div>
                                    <div class="quickview-stock">
                                        @if ($product->stock > 0)
                                            <span><i class="fa fa-check-circle-o"></i> in stock</span>
                                        @else
                                            <span class="text-danger"><i class="fa fa-times-circle-o text-danger"></i> stock out</span>
                                        @endif
                                    </div>
                                </div>
                                <h3>{{ $product->product_price.' TK.' }}</h3>
                                <div class="quickview-peragraph">
                                    <p>{!! $product->description !!}</p>
                                </div>
                                <div class="size">
                                    <div class="row">
                                        <div class="col-lg-6 col-12">
                                            <h5 class="title">Size</h5>
                                            @if ($sizeStatus)
                                            <select name="size_id">
                                                @forelse ($size_id as $size)
                                                    <option {{ ($loop->index == 0 ? 'selected="selected"' : '') }} value="{{ $size->id }}">{{ getsize($size->size_id) }}</option>
                                                @empty
                                                    No Size Availble
                                                @endforelse
                                            </select>
                                            @else
                                            <select name="size_id" class="disabled">
                                                <option selected="selected" value="">No Size</option>
                                            </select>
                                            @endif
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <h5 class="title">Color</h5>
                                            @if ($clolorStatus)
                                            <select name="color_id">
                                                @forelse ($color_id as $color)
                                                    <option {{ ($loop->index == 0 ? 'selected="selected"' : '') }} value="{{ $color->id }}">{{ getcolor($color->color_id) }}</option>
                                                @empty
                                                    No Color Availble
                                                @endforelse
                                            </select>
                                            @else
                                            <select name="color_id" class="disabled">
                                                <option selected="selected" value="">No Color</option>
                                            </select>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="quantity">
                                    <!-- Input Order -->
                                    <div class="input-group">
                                        <div class="button minus">
                                            <button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quantity">
                                                <i class="ti-minus"></i>
                                            </button>
                                        </div>
                                        <input type="text" name="quantity" class="input-number" data-min="1" data-max="1000" value="{{ $quantiryValue }}">
                                        <div class="button plus">
                                            <button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quantity">
                                                <i class="ti-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <!--/ End Input Order -->
                                </div>
                                <div class="add-to-cart">
                                    @auth
                                        <button type="submit" class="btn">Add to cart</button>
                                        @if ($wishlistStatus)
                                            <a href="{{ route('wishlist.remove', Crypt::encrypt($product->id)) }}" class="btn min"><i class="fa fa-heart text-danger"></i></a>
                                        @else
                                            <a href="{{ route('wishlist.store', Crypt::encrypt($product->id)) }}" class="btn min"><i class="fa fa-heart-o"></i></a>
                                        @endif
                                        @endauth
                                    @guest
                                        <a href="{{ route('customer.login') }}" class="btn">Add to cart</a>
                                        <a href="{{ route('customer.login') }}" class="btn min"><i class="ti-heart"></i></a>
                                    @endguest
                                </div>

                                <div class="default-social">
                                    <h4 class="share-now">Share:</h4>
                                    <ul>
                                        <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a class="youtube" href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                        <li><a class="dribbble" href="#"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>

            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Information</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Description</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Review (06)</a>
                </li>
              </ul>
              <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <ul>
                        <li class="m-3 font-weight-bold">Brand : <span class="ml-5">{{ $product->brand }}</span></li>
                        <li class="m-3 font-weight-bold">Weight : <span class="ml-5">{{ $product->weight }}</span></li>
                        <li class="m-3 font-weight-bold">Dimensions : <span class="ml-4">{{ $product->dimension }}</span></li>
                        <li class="m-3 font-weight-bold">Materials : <span class="ml-5">{{ $product->material }}</span></li>
                        <li class="m-3 font-weight-bold">Other Info : <span class="ml-5">{{ $product->others_info }}</span></li>
                    </ul>
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <p class="text-center">{!! $product->long_description !!}</p>
                </div>
                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">...</div>
              </div>

              <div class="product-area most-popular section">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-title">
                                <h2>Related Product</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="owl-carousel popular-slider">
                                @forelse ($related_products as $product)
                                <!-- Start Single Product -->
                                @include('frontend.parts.singleproduct')
                                <!-- End Single Product -->

                                @empty
                                <h4>No Related Products</h4>
                                @endforelse
                            </div>
                        </div>
                        @foreach ($related_products as $product)
                            @foreach (getProduct($product->category_id) as $product)
                                @include('frontend.parts.productmodals')
                            @endforeach
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
