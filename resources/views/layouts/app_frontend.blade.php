<!DOCTYPE html>
<html lang="zxx">
<head>
	<!-- Meta Tag -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name='copyright' content=''>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Title Tag  -->
    <title>Eshop - eCommerce HTML5 Template.</title>
	<!-- Favicon -->
	<link rel="icon" type="image/png" href="{{ asset('frontend') }}/images/favicon.png">
	<!-- Web Font -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

	<!-- StyleSheet -->

	<!-- Bootstrap -->
	<link rel="stylesheet" href="{{ asset('frontend') }}/css/bootstrap.css">
	<!-- Magnific Popup -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/magnific-popup.min.css">
	<!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/font-awesome.css">
	<!-- Fancybox -->
	<link rel="stylesheet" href="{{ asset('frontend') }}/css/jquery.fancybox.min.css">
	<!-- Themify Icons -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/themify-icons.css">
	<!-- Nice Select CSS -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/niceselect.css">
	<!-- Animate CSS -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/animate.css">
	<!-- Flex Slider CSS -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/flex-slider.min.css">
	<!-- Owl Carousel -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/owl-carousel.css">
	<!-- Slicknav -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/slicknav.min.css">

	<!-- Eshop StyleSheet -->
	<link rel="stylesheet" href="{{ asset('frontend') }}/css/reset.css">
	<link rel="stylesheet" href="{{ asset('frontend') }}/css/style.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/responsive.css">



</head>
<body class="js">

	<!-- Preloader -->
	{{-- <div class="preloader">
		<div class="preloader-inner">
			<div class="preloader-icon">
				<span></span>
				<span></span>
			</div>
		</div>
	</div> --}}
	<!-- End Preloader -->


	<!-- Header -->
	<header class="header shop">
		<!-- Topbar -->
		<div class="topbar">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-12 col-12">
						<!-- Top Left -->
						<div class="top-left">
							<ul class="list-main">
                                @foreach (headerandfooterinfo() as $data)
                                    <li><i class="ti-headphone-alt"></i> {{ $data->phone }}</li>
                                    <li><i class="ti-email"></i> {{ $data->email }}</li>
                                @endforeach
							</ul>
						</div>
						<!--/ End Top Left -->
					</div>
					<div class="col-lg-8 col-md-12 col-12">
						<!-- Top Right -->
						<div class="right-content">
							<ul class="list-main">
                                @foreach (headerandfooterinfo() as $data)
								    <li><i class="ti-location-pin"></i> {{ $data->store_location }}</li>
                                @endforeach
								<li><i class="ti-alarm-clock"></i> <a href="#">Daily deal</a></li>
								<li><i class="ti-user"></i> <a href="#">My account</a></li>


                                @auth
                                {{ auth()->user()->name }}
                                <li><i class="ti-power-off"></i><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                @else
								    <li><a href="{{ route('customer.login') }}">Login/Register</a></li>
								    {{-- <li><i class="fa fa-user-plus"></i><a href="{{ route('customer.login') }}"></a></li> --}}
                                @endauth

                                {{-- <form action="{{ route('customer.login') }}" method="POST">
                                </form> --}}
							</ul>
						</div>
						<!-- End Top Right -->
					</div>
				</div>
			</div>
		</div>
		<!-- End Topbar -->
		<div class="middle-inner">
			<div class="container">
				<div class="row">
					<div class="col-lg-2 col-md-2 col-12">
						<!-- Logo -->
						<div class="logo">
                            @foreach (headerandfooterinfo() as $data)
							    <a href="{{ url('/') }}"><img src='{{ asset("uploads/logo/{$data->header_logo}") }}' alt="logo"></a>
                            @endforeach
						</div>
						<!--/ End Logo -->
						<!-- Search Form -->
						<div class="search-top">
							<div class="top-search"><a href="#0"><i class="ti-search"></i></a></div>
							<!-- Search Form -->
							<div class="search-top">
								<form class="search-form">
									<input type="text" placeholder="Search here..." name="search">
									<button value="search" type="submit"><i class="ti-search"></i></button>
								</form>
							</div>
							<!--/ End Search Form -->
						</div>
						<!--/ End Search Form -->
						<div class="mobile-nav"></div>
					</div>
					<div class="col-lg-8 col-md-7 col-12">
						<div class="search-bar-top">
							<div class="search-bar">
								<select>
									<option selected="selected" value="">All Category</option>
                                    @foreach (allCategories() as $category)
									    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
								</select>
								<form>
									<input name="search" placeholder="Search Products Here....." type="search">
									<button class="btnn"><i class="ti-search"></i></button>
								</form>
							</div>
						</div>
					</div>
					<div class="col-lg-2 col-md-3 col-12">
						<div class="right-bar">
							<!-- Search Form -->

                            <div class="sinlge-bar shopping">
								    <a href="#" class="single-icon"><i class="fa fa-heart-o"></i> <span class="total-count">{{ count(getWishlist()) }}</span></a>
								<!-- Shopping Item -->
								<div class="shopping-item">
									<div class="dropdown-cart-header">
										<span>{{ count(getWishlist()) }} Items</span>
										<a href="{{ route('wishlist.index') }}">View Wishlist</a>
									</div>
									<ul class="shopping-list">
                                        @forelse (getWishlist() as $wishlist)
                                            <li>
                                                <a href="{{ route('wishlist.remove', Crypt::encrypt(wishList($wishlist->product_id)->id)) }}" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>
                                                <a class="cart-img" href="{{ route('product.details', cart($wishlist->product_id)->slug) }}"><img src="{{ asset('uploads/product_photo') }}/{{wishList($wishlist->product_id)->product_image }}" alt="#"></a>
                                                <h4><a href="{{ route('product.details', wishList($wishlist->product_id)->slug) }}">{{ wishList($wishlist->product_id)->product_name }}</a></h4>
                                                <p class="quantity"><span class="amount">{{ wishList($wishlist->product_id)->product_price.' Tk.' }}</span></p>
                                            </li>
                                            @if ($loop->index == 1)
                                                @break
                                            @endif
                                        @empty
                                        No Product added
                                        @endforelse
									</ul>
									<div class="bottom">
										<a href="{{ route('wishlist.index') }}" class="btn animate">Wishlist</a>
									</div>
								</div>
								<!--/ End Shopping Item -->
							</div>

							<div class="sinlge-bar">
								<a href="#" class="single-icon"><i class="fa fa-user-circle-o" aria-hidden="true"></i></a>
							</div>

							<div class="sinlge-bar shopping">
								<a href="#" class="single-icon"><i class="ti-bag"></i> <span class="total-count">{{ count(totalCart()) }}</span></a>
								<!-- Shopping Item -->
								<div class="shopping-item">
									<div class="dropdown-cart-header">
										<span>{{ count(totalCart()) }} Items</span>
										<a href="{{ route('cart.index') }}">View Cart</a>
									</div>
									<ul class="shopping-list">
                                            @php
                                                $totalCart = 0;
                                            @endphp
										@forelse (getCart() as $cart)
                                            <li>
                                                <a href="{{ route('cart.remove', Crypt::encrypt(cart($cart->product_id)->id)) }}" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>
                                                <a class="cart-img" href="{{ route('product.details', cart($cart->product_id)->slug) }}"><img src="{{ asset('uploads/product_photo') }}/{{cart($cart->product_id)->product_image }}" alt="#"></a>
                                                <h4><a href="{{ route('product.details', cart($cart->product_id)->slug) }}">{{cart($cart->product_id)->product_name }}</a></h4>
                                                <p class="quantity">{{ cartAmount($cart->product_id) }} * <span class="amount">{{ cart($cart->product_id)->product_price*cartAmount($cart->product_id).' Tk.' }}</span></p>
                                            </li>

                                                @php
                                                    $totalCart += $cart->quantity*$cart->relationtoproduct->product_price
                                                @endphp
                                            {{-- @if ($loop->index == 1)
                                                @break
                                            @endif --}}
                                        @empty
                                        No Product added
                                        @endforelse
									</ul>
									<div class="bottom">
										<div class="total">
											<span>Total</span>
											<span class="total-amount">{{ $totalCart }}</span>
										</div>
										<a href="{{ route('cart.index') }}" class="btn animate">View Cart</a>
										<a href="" class="btn animate">Checkout</a>
									</div>
								</div>
								<!--/ End Shopping Item -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Header Inner -->
		<div class="header-inner">
			<div class="container">
				<div class="cat-nav-head">
					<div class="row">
                        @if (Request::url() == url('/'))
						<div class="col-lg-3">
                            <div class="all-category">
								<h3 class="cat-heading"><i class="fa fa-bars" aria-hidden="true"></i>CATEGORIES</h3>
								<ul class="main-category">
                                    @foreach (tenCategoryShow() as $tenCategory)
									    <li><a href="#">{{ $tenCategory->category_name }}</a></li>
                                    @endforeach
								</ul>
							</div>
						</div>
                            @endif
						<div class="col-lg-{{ Request::url() == url('/') ? 9 : 12 }} col-12">
							<div class="menu-area">
								<!-- Main Menu -->
								<nav class="navbar navbar-expand-lg">
									<div class="navbar-collapse">
										<div class="nav-inner">
											<ul class="nav main-menu menu navbar-nav">
													<li class="active"><a href="{{ url('/') }}">Home</a></li>
													<li><a href="#">Service</a></li>
													{{-- <li><a href="#">Shop<i class="ti-angle-down"></i><span class="new">New</span></a>
														<ul class="dropdown">
															<li><a href="shop-grid.html">Shop Grid</a></li>
															<li><a href="cart.html">Cart</a></li>
															<li><a href="checkout.html">Checkout</a></li>
														</ul>
													</li> --}}
													<li><a href="contact.html">Contact Us</a></li>
												</ul>
										</div>
									</div>
								</nav>
								<!--/ End Main Menu -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/ End Header Inner -->
	</header>
	<!--/ End Header -->

    @yield('content')
	<!-- Start Shop Services Area -->
	<section class="shop-services section home">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-rocket"></i>
						<h4>Free shiping</h4>
						<p>Orders over $100</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-reload"></i>
						<h4>Free Return</h4>
						<p>Within 30 days returns</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-lock"></i>
						<h4>Sucure Payment</h4>
						<p>100% secure payment</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-tag"></i>
						<h4>Best Peice</h4>
						<p>Guaranteed price</p>
					</div>
					<!-- End Single Service -->
				</div>
			</div>
		</div>
	</section>
	<!-- End Shop Services Area -->

	<!-- Start Shop Newsletter  -->
	<section class="shop-newsletter section">
		<div class="container">
			<div class="inner-top">
				<div class="row">
					<div class="col-lg-8 offset-lg-2 col-12">
						<!-- Start Newsletter Inner -->
						<div class="inner">
							<h4>Newsletter</h4>
							<p> Subscribe to our newsletter and get <span>10%</span> off your first purchase</p>
							<form action="" method="get" target="_blank" class="newsletter-inner">
								<input name="EMAIL" placeholder="Your email address" type="email">
								<button class="btn">Subscribe</button>
							</form>
						</div>
						<!-- End Newsletter Inner -->
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Shop Newsletter -->

	<!-- Modal -->
    {{-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close" aria-hidden="true"></span></button>
                    </div>
                    <div class="modal-body">
                        <div class="row no-gutters">
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                <!-- Product Slider -->
									<div class="product-gallery">
										<div class="quickview-slider-active">
											<div class="single-slider">
												<img src="https://via.placeholder.com/569x528" alt="#">
											</div>
											<div class="single-slider">
												<img src="https://via.placeholder.com/569x528" alt="#">
											</div>
											<div class="single-slider">
												<img src="https://via.placeholder.com/569x528" alt="#">
											</div>
											<div class="single-slider">
												<img src="https://via.placeholder.com/569x528" alt="#">
											</div>
										</div>
									</div>
								<!-- End Product slider -->
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                <div class="quickview-content">
                                    <h2>Flared Shift Dress</h2>
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
                                            <span><i class="fa fa-check-circle-o"></i> in stock</span>
                                        </div>
                                    </div>
                                    <h3>$29.00</h3>
                                    <div class="quickview-peragraph">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia iste laborum ad impedit pariatur esse optio tempora sint ullam autem deleniti nam in quos qui nemo ipsum numquam.</p>
                                    </div>
									<div class="size">
										<div class="row">
											<div class="col-lg-6 col-12">
												<h5 class="title">Size</h5>
												<select>
													<option selected="selected">s</option>
													<option>m</option>
													<option>l</option>
													<option>xl</option>
												</select>
											</div>
											<div class="col-lg-6 col-12">
												<h5 class="title">Color</h5>
												<select>
													<option selected="selected">orange</option>
													<option>purple</option>
													<option>black</option>
													<option>pink</option>
												</select>
											</div>
										</div>
									</div>
                                    <div class="quantity">
										<!-- Input Order -->
										<div class="input-group">
											<div class="button minus">
												<button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
													<i class="ti-minus"></i>
												</button>
											</div>
											<input type="text" name="quant[1]" class="input-number"  data-min="1" data-max="1000" value="1">
											<div class="button plus">
												<button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]">
													<i class="ti-plus"></i>
												</button>
											</div>
										</div>
										<!--/ End Input Order -->
									</div>
									<div class="add-to-cart">
										<a href="#" class="btn">Add to cart</a>
										<a href="#" class="btn min"><i class="ti-heart"></i></a>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div> --}}
    <!-- Modal end -->

	<!-- Start Footer Area -->
	<footer class="footer">
		<!-- Footer Top -->
		<div class="footer-top section">
			<div class="container">
				<div class="row">
					<div class="col-lg-5 col-md-6 col-12">
						<!-- Single Widget -->
						<div class="single-footer about">
                            @foreach (headerandfooterinfo() as $data)
							<div class="logo">
								    <a href="{{ url('/') }}"><img src='{{ asset("uploads/logo/{$data->footer_logo}") }}' alt="#"></a>
                                </div>
                                <p class="text">{{ $data->footer_description }}</p>
                                <p class="call">Got Question? Call us 24/7<span><a href="tel:123456789">{{ $data->phone }}</a></span></p>
                                @endforeach
						</div>
						<!-- End Single Widget -->
					</div>
					<div class="col-lg-2 col-md-6 col-12">
						<!-- Single Widget -->
						<div class="single-footer links">
							<h4>Information</h4>
							<ul>
								<li><a href="#">About Us</a></li>
								<li><a href="#">Faq</a></li>
								<li><a href="#">Terms & Conditions</a></li>
								<li><a href="#">Contact Us</a></li>
								<li><a href="#">Help</a></li>
							</ul>
						</div>
						<!-- End Single Widget -->
					</div>
					<div class="col-lg-2 col-md-6 col-12">
						<!-- Single Widget -->
						<div class="single-footer links">
							<h4>Customer Service</h4>
							<ul>
								<li><a href="#">Payment Methods</a></li>
								<li><a href="#">Money-back</a></li>
								<li><a href="#">Returns</a></li>
								<li><a href="#">Shipping</a></li>
								<li><a href="#">Privacy Policy</a></li>
							</ul>
						</div>
						<!-- End Single Widget -->
					</div>
					<div class="col-lg-3 col-md-6 col-12">
						<!-- Single Widget -->
						<div class="single-footer social">
							<h4>Get In Tuch</h4>
							<!-- Single Widget -->
                            @foreach (headerandfooterinfo() as $data)
                                <div class="contact">
                                    <ul>
                                        <li>{{ $data->office_location }}</li>
                                        <li>{{ $data->city.', '.$data->country }}</li>
                                        <li>{{ $data->info_email }}</li>
                                        <li>{{ $data->info_number }}</li>
                                    </ul>
                                </div>
                            @endforeach
							<!-- End Single Widget -->
							<ul>
								<li><a href="#"><i class="ti-facebook"></i></a></li>
								<li><a href="#"><i class="ti-twitter"></i></a></li>
								<li><a href="#"><i class="ti-flickr"></i></a></li>
								<li><a href="#"><i class="ti-instagram"></i></a></li>
							</ul>
						</div>
						<!-- End Single Widget -->
					</div>
				</div>
			</div>
		</div>
		<!-- End Footer Top -->
		<div class="copyright">
			<div class="container">
				<div class="inner">
					<div class="row">
						<div class="col-lg-6 col-12">
							<div class="left">
                                @foreach (headerandfooterinfo() as $data)
								    <p>Copyright © {{ date('Y') }} <a href="{{ $data->copyright_link }}" target="_blank">{{ $data->copyright_text }}</a>  -  All Rights Reserved.</p>
                                @endforeach
							</div>
						</div>
						<div class="col-lg-6 col-12">
							<div class="right">
								<img src="images/payments.png" alt="#">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- /End Footer Area -->

	<!-- Jquery -->
    <script src="{{ asset('frontend') }}/js/jquery.min.js"></script>
    <script src="{{ asset('frontend') }}/js/jquery-migrate-3.0.0.js"></script>
	<script src="{{ asset('frontend') }}/js/jquery-ui.min.js"></script>
	<!-- Popper JS -->
	<script src="{{ asset('frontend') }}/js/popper.min.js"></script>
	<!-- Bootstrap JS -->
	<script src="{{ asset('frontend') }}/js/bootstrap.min.js"></script>
	<!-- Color JS -->
	<script src="{{ asset('frontend') }}/js/colors.js"></script>
	<!-- Slicknav JS -->
	<script src="{{ asset('frontend') }}/js/slicknav.min.js"></script>
	<!-- Owl Carousel JS -->
	<script src="{{ asset('frontend') }}/js/owl-carousel.js"></script>
	<!-- Magnific Popup JS -->
	<script src="{{ asset('frontend') }}/js/magnific-popup.js"></script>
	<!-- Waypoints JS -->
	<script src="{{ asset('frontend') }}/js/waypoints.min.js"></script>
	<!-- Countdown JS -->
	<script src="{{ asset('frontend') }}/js/finalcountdown.min.js"></script>
	<!-- Nice Select JS -->
	{{-- <script src="{{ asset('frontend') }}/js/nicesellect.js"></script> --}}
	<!-- Flex Slider JS -->
	<script src="{{ asset('frontend') }}/js/flex-slider.js"></script>
	<!-- ScrollUp JS -->
	<script src="{{ asset('frontend') }}/js/scrollup.js"></script>
	<!-- Onepage Nav JS -->
	<script src="{{ asset('frontend') }}/js/onepage-nav.min.js"></script>
	<!-- Easing JS -->
	<script src="{{ asset('frontend') }}/js/easing.js"></script>
	<!-- Active JS -->
	<script src="{{ asset('frontend') }}/js/active.js"></script>
    @yield('footer_script')
</body>
</html>
