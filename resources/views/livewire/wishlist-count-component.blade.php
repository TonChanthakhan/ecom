<div class="wrap-icon-section wishlist no-print">
    <a href="{{route('products.wishlist')}}" class="link-direction">
        <i class="fa fa-heart" aria-hidden="true"></i>
        <div class="left-info">
            @if (Cart::instance('wishlist')->count() > 0)
                <span class="index">{{Cart::instance('wishlist')->count()}} ລາຍການ</span>
            @endif
            <span class="title">ສີ່ງທີ່ຕ້ອງການ</span>
        </div>
    </a>
</div>
