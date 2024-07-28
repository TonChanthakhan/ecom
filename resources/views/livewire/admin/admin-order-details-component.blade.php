
<div>
    <div class="container " style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                ລາຍລະອຽດການສັ່ງສິນຄ້າ
                            </div>
                            <div class="col-md-6">
                                <a onclick="window.history.back()" class="btn btn-success pull-right">ກັບ</a>
                                <a onclick="printSection()" class="btn btn-primary pull-right" style="margin-right: 20px;">Print</a>

                                {{-- @if($orders->status == 'ordered')
                                    <a href="#" style="margin-right: 20px;" class="btn btn-warning pull-right" wire:click.prevent="cancelOrder">cancelOrder</a>
                                    <a href="#" style="margin-right: 20px;" class="btn btn-success pull-right" wire:click.prevent="deliveyOrder">deliveyOrder</a>
                                @endif --}}
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <tr>
                                <th>ລາຍການທີ</th>
                                <td>{{$orders->id}}</td>
                                <th>ວັນທີສັ່ງຊື້</th>
                                <td>{{$orders->id}}</td>
                                <th>ສະຖານະເຄື່ອງ</th>
                                <td>{{$orders->status}}</td>
                                @if($orders->status == "delivered")
                                <th>ວັນທີເລີ່ມສົ່ງສິນຄ້າ</th>
                                <td>{{$orders->delivered_date}}</td>
                                @elseif($orders->status == "canceled")
                                <th>ວັນທີຍົກເລີກການສັ່ງຊື້</th>
                                <td>{{$orders->canceled_date}}</td>
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
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Ordered Items
                            </div>
                            <div class="col-md-6">

                            </div>
                        </div>
                    </div>
                    <div class="panel-body" id="printSection">

                        <div class="wrap-iten-in-cart">
                            <div class="row print-only">
                                <div class="col-md-12">
                                    <div class="col-md-4">
                                        <h3 class="" style="text-align: center;">ໃບບິນການຂາຍ</h3>
                                    </div>
                                    <div class="col-md-4 " style="text-align: right;">
                                        <h4>ເລກບິນທີ {{$orders->id}}</h4>
                                    </div>
                                    <div class="col-md-4">
                                        <h4 class="">{{ $orders->user->name }}</h4>
                                    </div>

                                </div>


                            </div>
                            <h3 class="box-title">ລາຍການສິນຄ້າ</h3>

                            <table class="table">
                                @foreach ($orders->orderItems as $item)

                                    <tr>
                                        <td class="hide-img"><img src="{{asset('assets/images/products')}}/{{$item->product->image}}" width="40" alt="{{$item->product->name}}"></td>
                                        <td><b>{{$item->product->name}}</b></td>
                                        <td></td>
                                        @if ($item->options)
                                        <td>
                                            @foreach (unserialize($item->options) as $key => $value)
                                                <p><b>{{ $key }}:{{ $value }}</b></p>
                                            @endforeach
                                        </td>
                                        @endif
                                        <td><b>ລາຄາສິນຄ້າ:{{$item->price}}</b></td>
                                        <td><b>ຈຳນວນ:{{$item->quantity}}</b></td>
                                        <td><b>ລາຄາລວມ{{$item->price * $item->quantity}}</b></td>
                                    </tr>


                                {{-- <li class="pr-cart-item">
                                    <div class="product-image " >
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
                                </li> --}}
                                @endforeach
                            </table>
                        </div>

                        <div class="summary">
                            <div class="order-summary">
                                <h4 class="title-box">ຄຳນວນ</h4>
                                <p class="summary-info"><span class="title">ລາຄາລວມສິນຄ້າ</span><b class="index">{{$orders->subtotal}} KIP</b></p>
                                <p class="summary-info"><span class="title">ພາສີ</span><b class="index">{{$orders->tax}} KIP</b></p>
                                <p class="summary-info"><span class="title">ຄ່າຂົນສົ່ງ</span><b class="index">~~~ KIP</b></p>
                                <p class="summary-info"><span class="title">ລາຄາລວມທັງໝົດ</span><b class="index">{{$orders->total}} KIP</b></p>
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
                                <td>{{$orders->firstname}}</td>
                                <th>ນາມສະກຸນ</th>
                                <td>{{$orders->lastname}}</td>
                            </tr>

                            <tr>
                                <th>ເບີໂທ</th>
                                <td>{{$orders->mobile}}</td>
                                <th>ອີເມວ</th>
                                <td>{{$orders->email}}</td>
                            </tr>
                            <tr>
                                <th>ທີ່ຢູ່</th>
                                <td>{{$orders->line1}}</td>
                                <th>ຂົນສົ່ງ</th>
                                <td>{{$orders->line2}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        @if($orders->is_shpping_diffrent)
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Shipping Details
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <tr>
                                <th>First Name</th>
                                <td>{{$orders->shipping->firstname}}</td>
                                <th>Last Name</th>
                                <td>{{$orders->shipping->lastname}}</td>
                            </tr>

                            <tr>
                                <th>Phone</th>
                                <td>{{$orders->shipping->mobile}}</td>
                                <th>Email</th>
                                <td>{{$orders->shipping->email}}</td>
                            </tr>
                            <tr>
                                <th>Line1</th>
                                <td>{{$orders->shipping->line1}}</td>
                                <th>Line2</th>
                                <td>{{$orders->shipping->line2}}</td>
                            </tr>
                            <tr>
                                <th>City</th>
                                <td>{{$orders->shipping->city}}</td>
                                <th>Provine</th>
                                <td>{{$orders->shipping->province}}</td>
                            </tr>
                            <tr>
                                <th>Country</th>
                                <td>{{$orders->shipping->country}}</td>
                                <th>ZipCode</th>
                                <td>{{$orders->shipping->zipcode}}</td>
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
                                <td>{{$orders->transaction->mode}}</td>
                            </tr>
                            <tr>
                                <th>ສະຖານະ</th>
                                <td>{{$orders->transaction->status}}</td>
                            </tr>
                            <tr>
                                <th>ວັນທີ</th>
                                <td>{{$orders->transaction->created_at}}</td>
                            </tr>
                            @if($orders->transaction->mode == 'BCEL')
                            <tr>
                                <th>Transaction Image</th>
                                <td><img src="{{asset('assets/images/transactions')}}/{{$orders->transaction->image}}" alt="{{$orders->transaction->image}} " width="200"></td>
                            </tr>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<script>
    function printPage() {
        var images = document.querySelectorAll('.product-image');
            images.forEach(function(image) {
                image.style.display = 'none';
            });

            // Trigger print
            window.print();

            // Show images again after printing
            images.forEach(function(image) {
                image.style.display = '';
            });
        }



    </script>
