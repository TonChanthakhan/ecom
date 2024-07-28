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
                    <div class="panel-heading">
                        All Orders
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ລຳດັບ</th>
                                    <th>ຊື່</th>
                                    <th>ນາມສະກຸມ</th>
                                    <th>ລາຄາລວມສິນຄ້າ</th>
                                    <th>ສ່ວນລົດ</th>
                                    <th>ພາສີ</th>
                                    <th>ລາຄາລວມທັງໝົດ</th>
                                    <th>ເບີໂທ</th>
                                    <th>ອີເມວ</th>
                                    <th>ສະຖານນະ</th>
                                    <th>ເວລາ ສັ່ງຊື້</th>
                                    <th colspan="2" class="text-center">ສະຖານະຂົນສົ່ງ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                <tr>
                                    <td>{{$order->id}}</td>
                                    <td>{{$order->firstname}}</td>
                                    <td>{{$order->lastname}}</td>

                                    <td>{{$order->subtotal}} KIP</td>
                                    <td>{{$order->discount}} KIP</td>
                                    <td>{{$order->tax}} KIP</td>
                                    <td>{{$order->total}} KIP</td>

                                    <td>{{$order->mobile}}</td>
                                    <td>{{$order->email}}</td>

                                    <td>{{$order->status}}</td>
                                    <td>{{$order->created_at}}</td>
                                    <td><a href="{{route('user.orderdetails',['order_id'=>$order->id])}}"  class="btn btn-info btn-sm">Details</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$orders->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
