<main id="main" class="main-site left-sidebar">
    <div class="container">
        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="#" class="link">ໜ້າຫຼັກ</a></li>
                <li class="item-link"><span>ສິນຄ້າທີ່ຕ້ອງການ</span></li>
            </ul>
        </div>

        <style>
            .product-wish{
                position: absolute;
                top:10%;
                left:0;
                z-index:99;
                right:30px;
                text-align: right;
                padding-top: 0;
            }
            .product-wish .fa{
                color:#cbcbcb;
                font-size: 32px;
            }
            .product-wish .fa:hover{
                color:red;
            }
            .fill-heart{
                color:red !important;
            }
        </style>

        <div class="row">
            @if (Cart::instance('wishlist')->content()->count() > 0)
            <ul class="product-list grid-products equal-container">
                @foreach (Cart::instance('wishlist')->content() as $item)
                <li class="col-lg-2 col-md-6 col-sm-6 col-xs-6 ">
                    <div class="product product-style-3 equal-elem ">
                        <div class="product-thumnail">
                            <a href="{{route('product.details',['slug'=>$item->model->slug])}}" title="{{$item->model->name}}">
                                <figure><img src="{{ asset('assets/images/products') }}/{{$item->model->image}}" alt="{{$item->model->name}}"></figure>
                            </a>
                        </div>
                        <div class="product-info">
                            <a href="{{route('product.details',['slug'=>$item->model->slug])}}" class="product-name"><span>{{$item->model->name}}</span></a>
                            <div class="wrap-price"><span class="product-price">{{$item->model->regular_price}}</span></div>
                            <a href="#" class="btn add-to-cart" wire:click.prevent="moveProductFromWishlistToCart('{{$item->rowId}}')" >ເພີ່ມລົງກະຕ່າ</a>
                            <div class="product-wish">
                                <a href="#" wire:click.prevent="removeFromWishlist({{$item->model->id}})" ><i class="fa fa-heart fill-heart"></i></a>
                            </div>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
            @else
            <div class="text-center" style="padding: 30px 0;margin: 50px 0 100px;">
                <h1>ທ່ານບໍ່ມີສິນຄ້າທີ່ຕ້ອງການ!</h1>
                <p>ເພີ່ມສີ່ງທີ່ທ່ານສົນໃຈ</p>
                <a href="/shop" class="btn btn-success">ໄປທີ່ຮ້ານ</a>
            </div>
            @endif
        </div>
    </div>
</main>
