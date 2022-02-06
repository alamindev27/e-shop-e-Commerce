@extends('layouts.app_frontend')
@section('content')
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bread-inner">
                    <ul class="bread-list">
                        <li><a href="{{ url('/') }}">Home<i class="ti-arrow-right"></i></a></li>
                        <li>Cart</li>
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
                <!-- Shopping Summery -->
                @if (session('update'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('update') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                @endif
                <form action="{{ route('update.cart') }}" method="POST">
                    @csrf
                <table class="table shopping-summery">
                    <thead>
                        <tr class="main-hading">
                            <th>PRODUCT</th>
                            <th>NAME</th>
                            <th class="text-center">UNIT PRICE</th>
                            <th class="text-center">QUANTITY</th>
                            <th class="text-center">TOTAL</th>
                            <th class="text-center"><i class="ti-trash remove-icon"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $cartTotal = 0;
                        @endphp
                        @forelse ($carts as $cart)
                        <tr>
                            <td class="image" data-title="No"><img src="{{ asset('uploads/product_photo') }}/{{ $cart->relationtoproduct->product_image }}" alt="#"></td>
                            <td class="product-des" data-title="Description">
                                <p class="product-name"><a href="{{ route('product.details', $cart->relationtoproduct->slug) }}">{{ $cart->relationtoproduct->product_name }}</a></p>
                                <span class="text-muted">{{ getVendor($cart->relationtoproduct->id) }}</span>
                                {{-- <p class="product-des">Maboriosam in a tonto nesciung eget  distingy magndapibus.</p> --}}
                            </td>
                            <td class="price" data-title="Price"><span>{{ $cart->relationtoproduct->product_price.' TK' }} </span></td>
                            <td class="qty" data-title="Qty"><!-- Input Order -->
                                {{-- <div class="input-group">
                                    <div class="button minus">
                                        <button type="button" class="btn btn-primary btn-number" data-type="minus" data-field="quant[1]">
                                            <i class="ti-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text" name="quant[1]" class="input-number"  data-min="1" value="{{ $cart->quantity }}">
                                    <div class="button plus">
                                        <button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]">
                                            <i class="ti-plus"></i>
                                        </button>
                                    </div>
                                </div> --}}
                                <div class="input-group">
                                    <div class="button minus">
                                        <button type="button" class="btn btn-primary btn-number" data-type="minus" data-field="quantity[{{ $cart->id }}]">
                                            <i class="ti-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text" name="quantity[{{ $cart->id }}]" class="input-number" data-min="1" data-max="100" value="{{ $cart->quantity }}">
                                    <div class="button plus">
                                        <button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quantity[{{ $cart->id }}]">
                                            <i class="ti-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <!--/ End Input Order -->
                            </td>
                            <td class="total-amount" data-title="Total"><span>{{ $cart->relationtoproduct->product_price * $cart->quantity.' TK' }}</span></td>
                            <td class="action" data-title="Remove"><a href="{{ route('cart.remove', Crypt::encrypt($cart->product_id)) }}"><i class="ti-trash remove-icon"></i></a></td>
                            @php
                                $cartTotal += $cart->quantity* $cart->relationtoproduct->product_price;
                                Session::put('s_cart_total', $cartTotal);
                            @endphp
                        </tr>
                        @empty
                        <tr><td colspan="50">No Product Added</td></tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-lg-5"></div>
                    <div class="col-lg-4">
                        <div class="button5">
                            <button type="submit" class="btn mb-3">Update Shoping Cart</button>
                        </div>
                    </div>
                    <div class="col-lg-3"></div>
                </div>
            </form>
                <!--/ End Shopping Summery -->
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <!-- Total Amount -->
                <div class="total-amount">
                    @if (session('couponError'))
                    <div class="alert alert-danger">{{ session('couponError') }}</div>
                    @endif
                    <div class="row">
                        <div class="col-lg-8 col-md-5 col-12">
                            <div class="left">
                                <div class="coupon">
                                    <form>
                                        <input type="text" name="coupon" placeholder="Enter Your Coupon" value="{{ $coupon }}">
                                        <button type="submit" class="btn">Apply</button>
                                    </form>
                                </div>
                                <form action="{{ route('checkout.index') }}" method="POST">
                                {{-- <div class="checkbox">
                                    <label class="checkbox-inline" for="2">
                                        <input name="radio" id="2" type="radio" value="{{ Crypt::encrypt(30) }}">
                                        Shipping (+30.TK)
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label class="checkbox-inline" for="1">
                                        <input name="radio" id="1" type="radio" value="{{ Crypt::encrypt(30) }}">
                                        Shipping (+30.TK)
                                    </label>
                                </div> --}}
                                <div class="radio mt-3">
                                    <label style="font-size:17px;">
                                        <input type="radio" style="margin-right: 15px;" name="shiping" value="{{ Crypt::encrypt(0) }}" checked>Free
                                    </label>
                                  </div>
                                  <div class="radio">
                                    <label style="font-size:17px;">
                                        <input type="radio" style="margin-right: 15px;" name="shiping" value="{{ Crypt::encrypt(30) }}"> Express (+30 TK.)
                                    </label>
                                  </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-7 col-12">
                            <div class="right">
                                <ul>
                                    <li>Cart Total<span id="total">{{ $cartTotal }} TK.</span></li>
                                    @if ($coupon)
                                        <li>You Save ({{ $coupon ? $coupon : '' }})<span>{{ $discount }} TK.</span></li>
                                    @else
                                        <li>You Save ({{ $coupon ? $coupon : 'N/A' }})<span>00 TK.</span></li>
                                    @endif
                                    <li>Subtotal<span id="subtotal">{{ $cartTotal - $discount.' TK' }}</span></li>
                                    {{-- <li>Shipping<span id="shipingValue">Free</span></li> --}}

                                    <li class="last">You Pay<span id="pay">{{ $cartTotal - $discount .' TK' }}</span></li>
                                </ul>
                                @php
                                    Session::put('discount_total', $discount)
                                @endphp
                                <div class="button5">
                                    {{-- <a href="{{ route('checkout.index') }}" id="checkoutBTN" class="btn">Checkout</a> --}}
                                    <a href="{{ route('checkout.index') }}" class="btn">Checkout</a>
                                    <a href="{{ url('/') }}" class="btn">Continue shopping</a>
                                </div>
                            </div>
                        </div>
                        @csrf
                    </form>
                    </div>
                </div>
                <!--/ End Total Amount -->
            </div>
        </div>
    </div>
</div>

@endsection

@section('footer_script')
<script  type="text/javascript">

    // $(document).ready(function() {

    //     $("#2").click(function () {
    //         $('#shipingValue').html(30+' TK');
    //         $('#pay').html(parseInt($('#subtotal').html())+30+' TK');
    //         $('.checkbox-inline').addClass('checked');
    //     });

    // });

</script>
@endsection
