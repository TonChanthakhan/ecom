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
                        @if(Session::has('order_message'))
                            <div class="alert alert-success" role="alert">{{Session::get('order_message')}}</div>
                        @endif
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
                                    <td><a href="{{route('admin.orderdetails',['order_id'=>$order->id])}}"  class="btn btn-info btn-sm">Details</a></td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-success btn-sm dropdown-toggle" type="button" data-toggle="dropdown">Status
                                                <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a href="#" wire:click.prevent="updateOrderStatus({{$order->id}},'delivered')">Delivered</a></li>
                                                <li><a href="#" wire:click.prevent="updateOrderStatus({{$order->id}},'canceled')">Canceled</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="wrap-pagination-info">
                        {{$orders->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
