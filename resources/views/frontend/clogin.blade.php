@extends('layouts.app_frontend')
@section('content')
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bread-inner">
                    <ul class="bread-list">
                        <li><a href="index1.html">Home<i class="ti-arrow-right"></i></a></li>
                        <li class="active"><a href="blog-single.html">Author</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>



<section id="contact-us" class="contact-us section" >
    <div class="container">
            <div class="contact-head">
                <div class="row">
                    <div class="col-lg-10 m-auto col-12">
                        <div class="form-main">
                            <div class="title">
                                <h3>Welcome to E-Shop</h3>
                            </div>
                            <form class="form" method="post" action="{{ route('login') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group">
                                            <label>Email<span>*</span></label>
                                            <input name="email" type="text" placeholder="Enter Your Email">
                                            <span class="text-danger">
                                                @error('email')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <label>Password<span>*</span></label>
                                            <input name="password" type="password" placeholder="Enter Your Password">
                                            <span class="text-danger">
                                                @error('password')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12 p-3">
                                        <div class="form-group button">
                                            <button style="width: 100%;border-radius:5px;" type="submit" class="btn ">Login</button>
                                        </div>
                                        <label style="margin: 10px">Or, login with </label>
                                        <div class="form-group text-center">
                                            <a href="{{ route('github.redirect') }}" class="btn-block" style="color: #fff; background: #333;height:40px;border-radius:5px;font-size:18px"> <i class="fa fa-github mr-3" style="font-size: 25px; margin-top:7px"></i> Github</a>
                                        </div>
                                        <label for=""></label>
                                        <div class="form-group text-center">
                                            <a href="{{ route('google.redirect') }}" class="btn-block" style="color: #fff; background: #D34836;height:40px;border-radius:5px;font-size:18px"> <i class="fa fa-google-plus mr-3" style="font-size: 25px; margin-top:7px"></i> Gmail</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                        {{-- <div class="col-lg-6 col-12">
                            <div class="single-head">
                                <div class="single-info">
                                    <i class="fa fa-phone"></i>
                                    <h4 class="title">Call us Now:</h4>
                                    <ul>
                                        <li>+123 456-789-1120</li>
                                        <li>+522 672-452-1120</li>
                                    </ul>
                                </div>
                                <div class="single-info">
                                    <i class="fa fa-envelope-open"></i>
                                    <h4 class="title">Email:</h4>
                                    <ul>
                                        <li><a href="mailto:info@yourwebsite.com">info@yourwebsite.com</a></li>
                                        <li><a href="mailto:info@yourwebsite.com">support@yourwebsite.com</a></li>
                                    </ul>
                                </div>
                                <div class="single-info">
                                    <i class="fa fa-location-arrow"></i>
                                    <h4 class="title">Our Address:</h4>
                                    <ul>
                                        <li>KA-62/1, Travel Agency, 45 Grand Central Terminal, New York.</li>
                                    </ul>
                                </div>
                            </div>
                        </div> --}}

                </div>
            </div>
        </div>
</section>
@endsection
