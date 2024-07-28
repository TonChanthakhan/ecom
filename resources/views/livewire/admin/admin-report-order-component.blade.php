<div>
    <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block !important;
        }
    </style>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"  >
                        <div class="row" >
                            <div class="col-md-4" >
                                <h4>ລາຍງານການຂາຍສິນຄ້າ</h4>
                            </div>
                            <div class="col-md-8">
                                <a href="{{route('admin.reportcenter')}}" class="btn btn-success pull-right">ກັບ</a>
                                <a onclick="printSection()" class="btn btn-primary pull-right" style="margin-right: 20px;">Print</a>
                            </div>
                        </div>
                    </div>

                    <div class="panel-body" id="printSection">
                        <div class="row print-only">
                            <div class="col-md-12" style="text-align: center">
                                <h4>ສາທາລະນະລັດ ປະຊາທິປະໄຕ ປະຊາຊົນລາວ</h4>
                                <h4>ສັນຕິພາບ ເອກະລາດ ປະຊາທິປະໄຕ ເອກະພາບ ວັດທະນາຖາວອນ</h4>
                                <hr>
                                <hr>
                                <div class="col-md-4">
                                    <h4 class="" style="text-align: center;">ລາຍງານການຂາຍສິນຄ້າ</h4>
                                </div>
                                <div class="col-md-4 " style="text-align: right;">
                                    <h4> </h4>
                                </div>
                                <div class="col-md-4">
                                    <h4 class=""></h4>
                                </div>

                            </div>


                        </div>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ລຳດັບ</th>
                                    <th>ຊື່</th>
                                    <th>ນາມສະກຸມ</th>
                                    <th class="hide-img">ລາຄາລວມສິນຄ້າ</th>
                                    <th class="hide-img">ສ່ວນລົດ</th>
                                    <th class="hide-img">ພາສີ</th>
                                    <th>ລາຄາລວມທັງໝົດ</th>
                                    <th>ເບີໂທ</th>
                                    <th>ອີເມວ</th>
                                    <th class="hide-img">ສະຖານນະ</th>
                                    <th>ເວລາ ສັ່ງຊື້</th>
                                    <th colspan="2" class="text-center hide-img">ສະຖານະຂົນສົ່ງ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                <tr>
                                    <td>{{$order->id}}</td>
                                    <td>{{$order->firstname}}</td>
                                    <td>{{$order->lastname}}</td>

                                    <td class="hide-img">{{$order->subtotal}} KIP</td>
                                    <td class="hide-img">{{$order->discount}} KIP</td>
                                    <td class="hide-img">{{$order->tax}} KIP</td>
                                    <td>{{$order->total}} KIP</td>

                                    <td>{{$order->mobile}}</td>
                                    <td>{{$order->email}}</td>

                                    <td class="hide-img">{{$order->status}}</td>
                                    <td>{{$order->created_at}}</td>
                                    <td><a href="{{route('admin.orderdetails',['order_id'=>$order->id])}}"  class="btn btn-info btn-sm hide-img">Details</a></td>
                                    <td class="hide-img">
                                        {{ $order->status }}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="wrap-pagination-info">
                         {{-- {{$orders->links()}} --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
