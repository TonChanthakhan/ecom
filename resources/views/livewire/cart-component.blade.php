<main id="main" class="main-site">

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="/" class="link">ໜ້າຫຼັກ</a></li>
                <li class="item-link"><span>ກະຕ່າ</span></li>
            </ul>
        </div>
        <div class=" main-content-area">
            @if(Cart::instance('cart')->count() > 0)
            <div class="wrap-iten-in-cart">
                @if(Session::has('success_message'))
                    <div class="alert alert-success">
                        <strong>Success!</strong> {{session::get('success_message')}}
                    </div>
                @endif
                @if(Cart::instance('cart')->count() > 0)
                <div class="row summary">
                    <div class="col-md-10">
                        <h3 class="box-title">ລາຍການສິນຄ້າ</h3>
                    </div>
                    <div class="col-md-2 update-clear">
                        <a class="btn btn-clear" href="#" wire:click.prevent="destroyAll()">ລົບສິນຄ້າທັງໝົດ</a>
                    </div>

                </div>


                <ul class="products-cart">
                    @foreach (Cart::instance('cart')->content() as $item)


                    <li class="pr-cart-item">
                        <div class="product-image">
                            <figure><img src="{{asset('assets/images/products')}}/{{$item->model->image}}" alt="{{$item->model->name}}"></figure>
                        </div>
                        <div class="product-name">
                            <a class="link-to-product" href="{{route('product.details',['slug'=>$item->model->slug])}}">{{$item->model->name}}</a>
                        </div>

                         @foreach($item->options as $key => $value)
                            <div style="vertical-align:middle; width:180px;">
                                <p><b>{{$key}}: {{$value}}</b></p>
                            </div>
                        @endforeach

                        <div class="price-field produtc-price"><p class="price">{{$item->model->regular_price}} KIP</p></div>
                        <div class="quantity">
                            <div class="quantity-input">
                                <input type="text" name="product-quatity" value="{{$item->qty}}" data-max="120" pattern="[0-9]*" >
                                <a class="btn btn-increase" href="#" wire:click.prevent="increaseQuantity('{{$item->rowId}}')"></a>
                                <a class="btn btn-reduce" href="#" wire:click.prevent="decreaseQuantity('{{$item->rowId}}')"></a>
                            </div>

                        </div>
                        <div class="price-field sub-total"><p class="price">{{$item->subtotal}} KIP</p></div>
                        <div class="delete">
                            <a href="#" class="btn btn-delete" title="" wire:click.prevent="destroy('{{$item->rowId}}')">
                                <span>Delete from your cart</span>
                                <i class="fa fa-times-circle" aria-hidden="true"></i>
                            </a>
                        </div>
                    </li>
                    @endforeach
                </ul>
                @else
                    <p>No item in cart</p>
                @endif

            </div>

            <div class="summary">
                <div class="order-summary">
                    <h4 class="title-box">Order Summary</h4>
                    <p class="summary-info"><span class="title">ລວມສິນຄ້າ</span><b class="index">{{Cart::instance('cart')->subtotal()}} KIP</b></p>
                    @if(Session::has('coupon'))
                    <p class="summary-info"><span class="title">Discount ({{Session::get('coupon')['code']}})<a href="#" wire:click.prevent="removeCoupon"><i class="fa fa-times text-danger"></i></a></span><b class="index">-{{number_format($discount,2)}} KIP</b></p>
                    <p class="summary-info"><span class="title">Subtotal with Discount</span><b class="index">{{number_format($subtotalAfterDiscount,2)}} KIP</b></p>
                    <p class="summary-info"><span class="title">Tax ({{config('cart.tax')}}%) </span><b class="index">{{number_format($taxAfterDiscount,2)}} KIP</b></p>
                    <p class="summary-info total-info "><span class="title">Total</span><b class="index">{{number_format($totalAfterDiscount,2)}} KIP</b></p>
                    @else
                        <p class="summary-info"><span class="title">ພາສີ</span><b class="index">{{Cart::instance('cart')->tax()}} KIP</b></p>
                        <p class="summary-info"><span class="title">ຄ່າຂົນສົງ</span><b class="index">*********</b></p>
                        <p class="summary-info total-info "><span class="title">ລວມ</span><b class="index">{{Cart::instance('cart')->total()}} KIP</b></p>
                    @endif

                </div>

                    <div class="checkout-info">
                        @if(!Session::has('coupon'))
                        <label class="checkbox-field">
                            <input class="frm-input " name="have-code" id="have-code" value="1" wire:model="haveCouponCode" type="checkbox"><span>ໂຄດສ່ວນລົດ</span>
                        </label>
                        @if($haveCouponCode == 1)
                            <div class="summary-item">
                                <form wire:submit.prevent="applyCouponCode">
                                    <h4>Coupon Code</h4>
                                    @if(Session::has('coupon_message'))
                                        <div class="alert alert-danger" role="danger">{{Session::get('coupon_message')}}</div>
                                    @endif
                                    <p class="row-in-form">
                                        <label for="coupon-code">Enter Your Coupon Code:</label>
                                        <input type="text" name="coupon-code" wire:model="couponCode" />
                                    </p>
                                    <button type="submit" class="btn btn-small">Apply</button>
                                </form>
                            </div>
                        @endif
                    @endif
                    <a class="btn btn-checkout" href="#" wire:click.prevent="checkout" >ຊຳລະເງີນ</a>
                    {{-- <a class="link-to-shop" href="shop.html">Continue Shopping<i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a> --}}
                </div>
                <div class="update-clear">
                    {{-- <a class="btn btn-clear" href="#" wire:click.prevent="destroyAll()">ລົບສິນຄ້າທັງໝົດ</a> --}}
                    {{-- <a class="btn btn-update" href="#">Update Shopping Cart</a> --}}
                </div>
            </div>
            @else
                <div class="text-center" style="padding: 30px 0;margin: 50px 0 100px;">
                    <h1>ກະຕ່າຂອງທານວ່າງເປົ່າ!</h1>
                    <p>ລອງໄປເພີ່ມສິນຄ້າບໍ່?</p>
                    <a href="/shop" class="btn btn-success">ໄປທີ່ຮ້ານ</a>
                </div>
            @endif



        </div><!--end main content area-->
    </div><!--end container-->

</main>
