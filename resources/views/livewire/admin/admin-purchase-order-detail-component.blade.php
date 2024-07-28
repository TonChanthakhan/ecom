<div>
    <div class="container" style="padding: 30px 0;">
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
                                 {{-- @if ($porder->status == 'pending')
                                    <a href="#" style="margin-right: 20px;" class="btn btn-warning pull-right" wire:click.prevent="cancelOrders">ຍົກເລີກ</a>
                                    <a href="#" style="margin-right: 20px;" class="btn btn-success pull-right" wire:click.prevent="deliveyOrders">ໄດ້ຮັບເຄື່ອງແລ້ວ</a>
                                @endif --}}
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <tr>
                                <th>ລາຍການທີ</th>
                                <td>{{ $porder->id }}</td>
                                <th>ວັນທີສັ່ງຊື້</th>
                                <td>{{ $porder->created_at }}</td>
                                <th>ສະຖານະເຄື່ອງ</th>
                                <td>{{ $porder->status }}</td>

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
                                PurchaseOrdered Items
                            </div>
                            <div class="col-md-6">

                            </div>
                        </div>
                    </div>
                    <div class="panel-body " id="printSection">

                        <div class="wrap-iten-in-cart">
                            <div class="row print-only">
                                <div class="col-md-12">
                                    <h4 class="text-center">ສາທາລະນະລັດ ປະຊາທິປະໄຕ ປະຊາຊົນລາວ</h4>
                                <h4 class="text-center">ສັນຕິພາບ ເອກະລາດ ປະຊາທິປະໄຕ ເອກະພາບ ວັດທະນາຖາວອນ</h4>
                                <hr>
                                <hr>
                                    <div class="col-md-4">
                                        <h3 class="" style="text-align: center;">ລາຍງານການສັ່ງຊື້</h3>
                                    </div>
                                    <div class="col-md-4 " style="text-align: right;">
                                        <h4>ເລກບິນທີ {{$porder->id}}</h4>
                                    </div>
                                    <div class="col-md-4">
                                        <h4 class="">{{ $porder->supplier->name }}</h4>
                                    </div>

                                </div>


                            </div>
                            <h3 class="box-title">ລາຍການສິນຄ້າ</h3>
                            <table class="table">
                                @foreach ($porder->purchaseOrderDetails as $item)

                                <tr>
                                    <td class="hide-img" style="text-align: center;"><img src="{{asset('assets/images/products')}}/{{$item->product->image}}" width="40" alt="{{$item->product->name}}"></td>
                                    <td class=""><b>{{$item->product->name}}</b></td>
                                    <td></td>

                                    <td style="text-align: right;"><b>ຈຳນວນ: {{$item->quantity}}</b></td>
                                    <td><b>{{$item->unit}}</b></td>
                                </tr>

                                    {{-- <li class="pr-cart-item">
                                        <div class="product-image">
                                            <figure><img
                                                    src="{{ asset('assets/images/products') }}/{{ $item->product->image }}" width="40"
                                                    alt="{{ $item->product->name }}"></figure>
                                        </div>
                                        <div class="product-name">
                                            <a class="link-to-product"
                                                href="{{ route('product.details', ['slug' => $item->product->slug]) }}">{{ $item->product->name }}</a>
                                        </div>

                                        <div class="price-field produtc-price">
                                            <p class="price">ຈຳນວນ: </p>
                                        </div>
                                        <div class="price-field produtc-price">
                                            <p class="price">{{ $item->quantity }}</p>
                                        </div>
                                        <div class="price-field sub-total">
                                            <p class="price">{{ $item->unit }}</p>
                                        </div>
                                    </li> --}}
                                @endforeach
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>






    </div>
</div>
