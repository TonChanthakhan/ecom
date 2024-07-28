<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"  >
                        <div class="row" >
                            <div class="col-md-4" >
                                <h4>ລາຍງານສັ່ງຊື່</h4>
                            </div>
                            <div class="col-md-8">
                                <a href="{{route('admin.reportcenter')}}" class="btn btn-success pull-right">ກັບ</a>
                            </div>
                        </div>
                    </div>

                    <div class="panel-body" style="margin-bottom: 100px">
                        <table class="table table-striped">
                            <thead>
                                <th>ລຳດັບ</th>
                                <th>ລະຫັດຜູ້ສະໜອງ</th>
                                <th>ສະຖານະ</th>


                                <th>Date</th>
                                <th class="pull-right">ລາຍລະອຽດ</th>
                                <th></th>
                            </thead>
                            <tbody>
                                @foreach ($purchaseorders as $purchaseorder)
                                    <tr>
                                        <td>{{ $purchaseorder->id }}</td>
                                        <td>{{ $purchaseorder->supplier->name }}</td>
                                        <td>{{ $purchaseorder->status }}</td>
                                        <td>{{ $purchaseorder->created_at }}</td>
                                        <td><a href="{{route('admin.purchaseorderdetail',['purchaseorder_id'=>$purchaseorder->id])}}"  class="btn btn-info btn-sm pull-right">Details</a></td>


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
