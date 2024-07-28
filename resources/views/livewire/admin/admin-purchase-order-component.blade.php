<div>
    <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block  !important;
        }
    </style>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">

                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-4">
                                <h4>ລາຍການສັ່ງຊື້</h4>
                            </div>
                            <div class="col-md-8">
                                <a href="{{route('admin.addpurchaseorder')}}" class="btn btn-success pull-right">Send Order</a>
                            </div>

                        </div>
                    </div>

                    <div class="panel-body">
                        @if(Session::has('message'))
                            <div class="alert alert-success">{{(Session::get('message'))}}</div>
                        @endif
                        <table class="table table-striped">
                            <thead>
                                <th>ລຳດັບ</th>
                                <th>ລະຫັດຜູ້ສະໜອງ</th>
                                <th>ສະຖານະ</th>


                                <th>Date</th>
                                <th class="pull-right">ລາຍລະອຽດ</th>
                                <th>action</th>
                            </thead>
                            <tbody>
                                @foreach ($purchaseorders as $purchaseorder)
                                    <tr>
                                        <td>{{ $purchaseorder->id }}</td>
                                        <td>{{ $purchaseorder->supplier->name }}</td>
                                        <td>{{ $purchaseorder->status }}</td>
                                        <td>{{ $purchaseorder->created_at }}</td>
                                        <td><a href="{{route('admin.purchaseorderdetail',['purchaseorder_id'=>$purchaseorder->id])}}"  class="btn btn-info btn-sm pull-right">Details</a></td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-success btn-sm dropdown-toggle" type="button" data-toggle="dropdown">Status
                                                    <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a href="#" wire:click.prevent="updateOrderStatus({{$purchaseorder->id}},'confirmed')">Confirmed</a></li>
                                                    <li><a href="#" wire:click.prevent="updateOrderStatus({{$purchaseorder->id}},'canceled')">Canceled</a></li>
                                                </ul>
                                            </div>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
