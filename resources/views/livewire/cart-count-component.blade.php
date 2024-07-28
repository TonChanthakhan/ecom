<div class="wrap-icon-section minicart no-print">
    <a href="{{route('products.cart')}}" class="link-direction">
        <i class="fa fa-shopping-basket" aria-hidden="true"></i>
        <div class="left-info">
            @if(Cart::instance('cart')->count() > 0)
            <span class="index">{{Cart::instance('cart')->count()}} ສິນຄ້າ</span>
            @endif
            <span class="title">ກະຕ່າ</span>
        </div>
    </a>
</div>
