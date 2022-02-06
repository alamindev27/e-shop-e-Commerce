@extends('layouts.app_frontend')
@section('content')
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bread-inner">
                    <ul class="bread-list">
                        <li><a href="{{ url('/') }}">Home<i class="ti-arrow-right"></i></a></li>
                        <li>Wishlist</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="shopping-cart section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('success') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                @endif
                <!-- Shopping Summery -->
                <table class="table shopping-summery">
                    <thead>
                        @if (session('errorStock'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ session('errorStock') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        @endif
                        <tr class="main-hading">
                            <th>PRODUCT</th>
                            <th>NAME</th>
                            <th class="text-center">UNIT PRICE</th>
                            {{-- <th class="text-center">TOTAL</th> --}}
                            <th class="text-center">ADD TO CART</th>
                            <th class="text-center"><i class="ti-trash remove-icon"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($allWishlists as $wishlist)
                        <tr>
                            <td class="image" data-title="No"><img src="{{ asset('uploads/product_photo') }}/{{ $wishlist->relationtoproduct->product_image }}" alt="{{ $wishlist->relationtoproduct->product_image }}"></td>
                            <td class="product-des" data-title="Description">
                                <p class="product-name"><a href="{{ route('product.details', $wishlist->relationtoproduct->slug) }}">{{ $wishlist->relationtoproduct->product_name }}</a></p>
                                <p class="product-des"><b>Category</b> : {{ getCetegory($wishlist->relationtoproduct->id) }} | <span class="font-weight-bold  {{ ($wishlist->relationtoproduct->stock < 1 ? 'text-danger' : 'text-success') }}">{{ ($wishlist->relationtoproduct->stock < 1 ? 'Stock Out, Please remove it' : 'In Stock') }}</span></p>
                                <p class="product-des"><b>Vendor</b> : {{ getVendor($wishlist->relationtoproduct->id) }}</p>

                            </td>
                            <td class="price" data-title="Price"><span>{{ $wishlist->relationtoproduct->product_price.' TK.' }} </span></td>

                            {{-- <td class="total-amount" data-title="Total"><span>$220.88</span></td> --}}
                            <td class="total-amount" data-title="Total">
                                <div class="button5">
                                    <a href="{{ route('cart.insert', $wishlist->relationtoproduct->slug) }}" style="width: 177px" class="btn text-white">ADD TO CART</a>
                                </div>
                            </td>
                            <td class="action" data-title="Remove"><a href="{{ route('wishlist.remove', Crypt::encrypt($wishlist->relationtoproduct->id)) }}"><i class="ti-trash remove-icon"></i></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <!--/ End Shopping Summery -->
            </div>
        </div>
    </div>
</div>




@endsection
