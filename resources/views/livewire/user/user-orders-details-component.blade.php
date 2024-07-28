<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                @if(Session::has('order_message'))
                    <div class="alert alert-success" role="alert">{{Session::get('order_message')}}</div>
                @endif
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                ລາຍລະອຽດການສັ່ງສິນຄ້າ
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('user.orders')}}" class="btn btn-success pull-right">ກັບ</a>
                                @if($order->status == 'ordered')
                                    <a href="#" style="margin-right: 20px;" class="btn btn-warning pull-right" wire:click.prevent="cancelOrder">ຍົກເລີກການສັ່ງຊື້</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <tr>
                                <th>ລາຍການທີ</th>
                                <td>{{$order->id}}</td>
                                <th>ວັນທີສັ່ງຊື້</th>
                                <td>{{$order->created_at}}</td>
                                <th>ສະຖານະເຄື່ອງ</th>
                                <td style="color:red">{{$order->status}}</td>
                                @if($order->status == "delivered")
                                <th></th>
                                <td>{{$order->delivered_date}}</td>
                                @elseif($order->status == "canceled")
                                <th>ວັນທີຍົກເລີກການສັ່ງຊື້</th>
                                <td>{{$order->canceled_date}}</td>
                                @endif
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">

                    <div class="panel-body">

                        <div class="wrap-iten-in-cart">
                            <h3 class="box-title">ລາຍການສິນຄ້າ</h3>
                            <ul class="products-cart">
                                @foreach ($order->orderItems as $item)
                                <li class="pr-cart-item">
                                    <div class="product-image">
                                        <figure><img src="{{asset('assets/images/products')}}/{{$item->product->image}}" alt="{{$item->product->name}}"></figure>
                                    </div>
                                    <div class="product-name">
                                        <a class="link-to-product" href="{{route('product.details',['slug'=>$item->product->slug])}}">{{$item->product->name}}</a>
                                    </div>

                                    @if ($item->options)
                                        <div class="product-name">
                                            @foreach (unserialize($item->options) as $key => $value)
                                                <p><b>{{ $key }}:{{ $value }}</b></p>
                                            @endforeach
                                        </div>
                                    @endif

                                    <div class="price-field produtc-price"><p class="price">{{$item->price}} KIP</p></div>
                                    <div class="quantity">
                                       <h5>{{$item->quantity}}</h5>
                                    </div>
                                    <div class="price-field sub-total"><p class="price">{{$item->price * $item->quantity}} KIP</p></div>
                                    @if($order->status == 'delivered' && $item->rstatus == false)
                                    <div class="price-field sub-total"><p class="price"><a href="{{route('user.review',['order_item_id'=>$item->id])}}">ຂຽນລີວີວ</a></p></div>
                                    @endif
                                </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="summary">
                            <div class="order-summary">
                                <h4 class="title-box">ຄຳນວນ</h4>
                                <p class="summary-info"><span class="title">ລາຄາລວມສິນຄ້າ</span><b class="index">{{$order->subtotal}} KIP</b></p>
                                <p class="summary-info"><span class="title">ພາສີ</span><b class="index">{{$order->tax}} KIP</b></p>
                                <p class="summary-info"><span class="title">ຄ່າຂົນສົ່ງ</span><b class="index">~~~ KIP</b></p>
                                <p class="summary-info"><span class="title">ລາຄາລວມທັງໝົດ</span><b class="index">{{$order->total}} KIP</b></p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Billing Details
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <tr>
                                <th>ຊື່</th>
                                <td>{{$order->firstname}}</td>
                                <th>ນາມສະກຸນ</th>
                                <td>{{$order->lastname}}</td>
                            </tr>

                            <tr>
                                <th>ເບີໂທ</th>
                                <td>{{$order->mobile}}</td>
                                <th>ອີເມວ</th>
                                <td>{{$order->email}}</td>
                            </tr>
                            <tr>
                                <th>ທີ່ຢູ່</th>
                                <td>{{$order->line1}}</td>
                                <th>ຂົນສົ່ງ</th>
                                <td>{{$order->line2}}</td>
                            </tr>

                        </table>
                    </div>
                </div>
            </div>
        </div>

        @if($order->is_shpping_diffrent)
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Shipping Details
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <tr>
                                <th>ຊື່</th>
                                <td>{{$order->shipping->firstname}}</td>
                                <th>ນາມສະກຸນ</th>
                                <td>{{$order->shipping->lastname}}</td>
                            </tr>

                            <tr>
                                <th>ເບີໂທ</th>
                                <td>{{$order->shipping->mobile}}</td>
                                <th>ອີເມວ</th>
                                <td>{{$order->shipping->email}}</td>
                            </tr>
                            <tr>
                                <th>ທີ່ຢູ່</th>
                                <td>{{$order->shipping->line1}}</td>
                                <th>ຂົນສົ່ງ</th>
                                <td>{{$order->shipping->line2}}</td>
                            </tr>
                            <tr>
                                <th>City</th>
                                <td>{{$order->shipping->city}}</td>
                                <th>Provine</th>
                                <td>{{$order->shipping->province}}</td>
                            </tr>
                            <tr>
                                <th>Country</th>
                                <td>{{$order->shipping->country}}</td>
                                <th>ZipCode</th>
                                <td>{{$order->shipping->zipcode}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Transaction
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <tr>
                                <th>ຮູບແບບການຊຳລະເງີນ</th>
                                <td>{{$order->transaction->mode}}</td>
                            </tr>
                            <tr>
                                <th>ສະຖານະ</th>
                                <td>{{$order->transaction->status}}</td>
                            </tr>
                            <tr>
                                <th>ວັນທີ</th>
                                <td>{{$order->transaction->created_at}}</td>
                            </tr>
                            @if($order->transaction->mode == 'BCEL')
                            <tr>
                                <th>ຮູບການຊຳລະເງີນດ້ວຍ BCEL</th>
                                <td><img src="{{asset('assets/images/transactions')}}/{{$order->transaction->image}}" alt="{{$order->transaction->image}} " width="200"></td>
                            </tr>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
