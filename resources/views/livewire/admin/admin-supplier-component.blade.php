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
                            <div class="col-md-6">
                                ລາຍຊື່ຜູ້ສະໜອງ
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.addsupplier')}}" class="btn btn-success pull-right">ເພີ່ມລາຍຊື່</a>
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
                                <th>ຊື່</th>
                                <th>ອີເມວ</th>
                                <th>ທີ່ຢູ່</th>
                                <th>ເບີໂທ</th>
                            </thead>
                            <tbody>
                                @foreach ($suppliers as $supplier)
                                    <tr>
                                       <td>{{$supplier->id}}</td>
                                        <td>{{$supplier->name}}</td>
                                        <td>{{$supplier->email}}</td>
                                        <td>{{$supplier->address}}</td>
                                        <td>{{$supplier->tel}}</td>

                                        <td>
                                            <a href="{{route('admin.editsupplier',['supplier_id'=>$supplier->id])}}"><i class="fa fa-edit fa-2x text-into"></i></a>
                                            <a href="#" onclick="confirm('Are you sure, You want to delete this category') || event.stopImmediatePropagation()" style="margin-left: 10px;" wire:click.prevent="deleteProduct({{$supplier->id}})" ><i class="fa fa-times fa-2x text-danger"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$suppliers->links()}}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
