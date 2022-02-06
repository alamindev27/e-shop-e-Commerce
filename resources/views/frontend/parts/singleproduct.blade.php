<div class="single-product">
    <div class="product-img">
        <a href="{{ route('product.details', $product->slug) }}">
            <img class="default-img" src="{{ asset('uploads/product_photo') }}/{{ $product->product_image }}" alt="#">
            {{-- <span class="new">New</span> --}}
            @if ($product->stock < 1)
                <span class="out-of-stock">Stock Out</span>
            @endif
        </a>
        <div class="button-head">
            <div class="product-action">
                <a data-toggle="modal" data-target="#exampleModal{{ $product->id }}" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                @auth
                @if (getWishlistStatus($product->slug))
                <a href="{{ route('wishlist.remove', Crypt::encrypt($product->id)) }}" class="btn min"><i class="fa fa-heart text-danger"></i></a>
                @else
                <a href="{{ route('wishlist.store', Crypt::encrypt($product->id)) }}" class="btn min"><i class="fa fa-heart-o"></i></a>
                @endif
                @endauth
                @guest
                <a href="{{ route('customer.login') }}" class="btn min"><i class="ti-heart"></i></a>
                @endguest
            </div>
            <div class="product-action-2">
                @auth
                <a title="Add to cart" href="{{ route('cart.insert', $product->slug) }}">Add to cart</a>
                @else
                <a title="Add to cart" href="{{ route('customer.login') }}">Add to cart</a>
                @endauth
            </div>
        </div>
    </div>
    <div class="product-content">
        <h3><a href="{{ route('product.details', $product->slug) }}">{{ $product->product_name }}</a></h3>
        <div class="product-price">
            <span>{{ $product->product_price.' TK' }}</span>
            <span class="pull-right text-info">{{ $product->relationtouser->name }}</span>
        </div>
    </div>
</div>
