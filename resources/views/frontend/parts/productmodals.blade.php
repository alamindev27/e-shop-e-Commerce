<div class="modal fade" id="exampleModal{{ $product->id }}" tabindex="-1" role="dialog">
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
                                    @foreach (get_thumbnails($product->id) as $productThumbnail)
                                        <div class="single-slider">
                                            <img src="{{ asset('uploads/product_thumbnails_photo') }}/{{ $productThumbnail->product_thumbnails }}" alt="{{ $productThumbnail->product_thumbnails }}">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        <!-- End Product slider -->
                    </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            <form action="{{ route('cart.store', Crypt::encrypt($product->id)) }}" method="POST">
                                @csrf
                            <div class="quickview-content">
                                <h2>{{ $product->product_name }}</h2>
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
                                <h3>{{ $product->product_price.' TK' }}</h3>
                                <div class="quickview-peragraph">
                                    <p>{!! $product->description !!}</p>
                                </div>
                                <div class="size">
                                    <div class="row">
                                        <div class="col-lg-6 col-12">
                                            <h5 class="title">Size</h5>
                                            @if (getSizeStatus($product->id))
                                            <select name="size_id">
                                                @forelse (getSizeForWlcome($product->id) as $size)
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
                                            @if (getColorStatus($product->id))
                                            <select name="color_id">
                                                @forelse (getColorForWlcome($product->id) as $color)
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
                                        <input type="text" name="quantity" class="input-number" data-min="1" data-max="1000" value="1">
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
                                        @if (getWishlistStatus($product->slug))
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
    </div>
</div>
