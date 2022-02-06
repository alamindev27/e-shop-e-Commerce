@extends('layouts.app_frontend')
@section('content')
	<!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="{{ url('/') }}">Home<i class="ti-arrow-right"></i></a></li>
                            <li><a href="{{ route('cart.index') }}">Cart<i class="ti-arrow-right"></i></a></li>
                            <li class="active">Checkout</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->
		<!-- Start Checkout -->
		<section class="shop checkout section">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-12">
						<div class="checkout-form">
							<h2>Make Your Checkout Here</h2>
							<p>Please register in order to checkout more quickly</p>
							<!-- Form -->
                            <form class="form" id="orderForm" method="POST" action="{{ route('checkout.submit') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group">
                                            <label>First Name<span>*</span></label>
                                            <input type="text" name="fname" id="fname" placeholder="Enter your first name">
<span class="text-danger" id="fnameError"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Last Name<span>*</span></label>
                                            <input type="text" name="lname" id="lname" placeholder="Enter your last name">
<span class="text-danger" id="lnameError"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Email Address<span>*</span></label>
                                            <input type="email" name="email" id="email" placeholder="Enter your email">
<span class="text-danger" id="emailError"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Phone Number<span>*</span></label>
                                            <input type="number" name="phone" id="phone" placeholder="Enter your phone">
<span class="text-danger" id="phoneError"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Country<span>*</span></label>
                                            <select name="country_id" id="country" class="form-control">
                                                <option value="">------------Select a country</option>
                                                @foreach ($countries as $country)
                                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                @endforeach
                                            </select>
<span class="text-danger" id="countryError"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group">
                                            <label>State / Divition<span>*</span></label>
                                            <select name="city_id" id="city" class="form-control">
                                                <option value="">---------Select a city</option>
                                            </select>
<span class="text-danger" id="cityError"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Address Line 1<span>*</span></label>
                                            <input type="text" name="address" id="address" placeholder="Address">
<span class="text-danger" id="addressError"></span>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Postal Code<span>*</span></label>
                                            <input type="text" name="postcode" id="postcode" placeholder="Enter postcode">
<span class="text-danger" id="postcodeError"></span>
                                        </div>
                                    </div>
                                    {{-- <div class="col-12">
                                        <div class="form-group create-account">
                                            <input id="cbox" type="checkbox">
                                            <label>Create an account?</label>
                                        </div>
                                    </div> --}}
                                </div>

							<!--/ End Form -->
						</div>
					</div>
					<div class="col-lg-4 col-12">
						<div class="order-details">
							<!-- Order Widget -->
							<div class="single-widget">
								<h2>CART  TOTALS</h2>
								<div class="content">
									<ul>
										<li>Cart Total<span>{{ Session::get('s_cart_total').' TK' }}</span></li>
										<li>Coupon Discount<span>{{ Session::get('discount_total') == '' ? 00 : Session::get('discount_total') }} TK</span></li>
										<li>(+) Shipping <small>()</small><span> TK</span></li>
										<li class="last">Total<span>{{ Session::get('s_cart_total') - Session::get('discount_total') + 30 }} TK</span></li>
									</ul>
								</div>
							</div>
							<!--/ End Order Widget -->
							<!-- Order Widget -->
							<div class="single-widget">
								<h2>Payments</h2>
								<div class="content">
                                    {{-- <div class="checkbox">
                                        <label class="checkbox-inline" for="1"><input name="" id="1" type="radio"> Check Payments</label>
                                        <label class="checkbox-inline" for="2"><input name="" id="2" type="radio"> Cash On Delivery</label>
                                        <label class="checkbox-inline" for="3"><input name="" id="3" type="radio"> PayPal</label>
                                    </div> --}}
                                    <style>
                                        .shop.checkout .single-widget .radioBtn label {
                                        color: #555555;
                                        position: relative;
                                        font-size: 14px;
                                        padding-left: 20px;
                                        margin-top: -5px;
                                        font-weight: 400;
                                        display: block;
                                        margin-bottom: 15px;
                                    }
                                    .shop.checkout .single-widget .radioBtn {
                                        text-align: left;
                                        margin: 0;
                                        padding: 0px 30px;
                                        margin-top: 30px;
                                    }
                                    </style>
                                    <div class="radioBtn">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" checked name="payment" id="cod" value="{{ Crypt::encrypt(1) }}">
                                            <label class="form-check-label" for="cod">
                                            Cash on Delivery (COD)
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="payment" value="{{ Crypt::encrypt(2) }}" id="onlinePayment">
                                            <label class="form-check-label" for="onlinePayment">
                                            Online Payment
                                            </label>
                                        </div>
                                    </div>
								</div>
							</div>
							<!--/ End Order Widget -->
							<!-- Payment Method Widget -->
							<div class="single-widget payement">
								<div class="content">
									<img src="{{ asset('frontend') }}/images/payment-method.png" alt="#">
								</div>
							</div>
							<!--/ End Payment Method Widget -->
							<!-- Button Widget -->
							<div class="single-widget get-button">
								<div class="content">
									<div class="button">
										<button type="submit" class="btn">proceed to checkout</button>
									</div>
								</div>
							</div>
							<!--/ End Button Widget -->
						</div>
					</div>
				</div>
			</div>
        </form>
		</section>
		<!--/ End Checkout -->

@endsection

@section('footer_script')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#country').change(function(){
        var countryId = $(this).val();
        $.ajax({
            type: 'POST',
            url: '/get/city/list',
            data: {countryId:countryId},
            success:function(data){
                $('#city').html(data);
            }
        });
    });

// function clearData (){
//     fname = $('#fname').val('');
//     lname = $('#lname').val('');
//     email = $('#email').val('');
//     phone = $('#phone').val('');
//     country = $('#country').val('');
//     city = $('#city').val('');
//     address = $('#address').val('');
//     postcode = $('#postcode').val('');
// }

    // $('#orderForm').submit(function(e){
    //     e.preventDefault();
    //     var fname = $('#fname').val();
    //     var lname = $('#lname').val();
    //     var email = $('#email').val();
    //     var phone = $('#phone').val();
    //     var country = $('#country').val();
    //     var city = $('#city').val();
    //     var address = $('#address').val();
    //     var postcode = $('#postcode').val();
    //     var cod = $('#cod').val();
    //     var onlinePayment = $('#onlinePayment').val();

    //     $.ajax({
    //         type: 'POST',
    //         url: '/checkout/submit',
    //         data: {fname:fname, lname:lname, email:email, phone:phone, country:country, city:city, address:address, postcode:postcode, cod:cod, onlinePayment:onlinePayment},
    //         success:function(data){
    //             clearData();
    //             console.log(data);
    //         },error:function(error){
    //             $('#fnameError').text(error.responseJSON.errors.fname);
    //             $('#lnameError').text(error.responseJSON.errors.lname);
    //             $('#emailError').text(error.responseJSON.errors.email);
    //             $('#phoneError').text(error.responseJSON.errors.phone);
    //             $('#countryError').text(error.responseJSON.errors.country);
    //             $('#cityError').text(error.responseJSON.errors.city);
    //             $('#addressError').text(error.responseJSON.errors.address);
    //             $('#postcodeError').text(error.responseJSON.errors.postcode);
    //             $('#codError').text(error.responseJSON.errors.cod);
    //             $('#onlinePaymentError').text(error.responseJSON.errors.onlinePayment);

    //         }
    //     });
    // })
</script>

@endsection
