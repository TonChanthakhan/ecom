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
                                <h4>ລາຍຊື່ພະນັກງານ</h4>
                            </div>
                            <div class="col-md-4 pull-right">
                                <a href="{{route('admin.addmanagement')}}" class="btn btn-success">ເພື່ມລາຍຊື່ພະນັກງານ</a>
                            </div>
                        </div>
                    </div>

                    <div class="panel-body" style="margin-bottom: 100px">
                        @if(Session::has('message'))
                            <div class="alert alert-success">{{(Session::get('message'))}}</div>
                        @endif
                        <table class="table table-striped">
                            <thead>
                                <th>ລຳກັບ</th>
                                <th>ຊື່</th>
                                <th class="">ອີເມວ</th>
                                <th class=""></th>

                            </thead>
                            <tbody>
                                @foreach ($managers as $manager)
                                    <tr>
                                        <td>{{$manager->id}}</td>
                                        <td>{{$manager->name}}</td>
                                        <td>{{$manager->email}}</td>
                                        <td class="">

                                            @if ($manager->id == '3' && $manager->utype == 'ADM')
                                            <a href="{{route('admin.editmanagement',['management_id'=>$manager->id])}}" class="btn btn-info">ແກ້ໄຂຂໍ້ມູນ</a>
                                            @else
                                            <a href="{{route('admin.editmanagement',['management_id'=>$manager->id])}}" class="btn btn-info">ແກ້ໄຂຂໍ້ມູນ</a>
                                            <a href="#" onclick="confirm('Are you sure, You want to delete this category') || event.stopImmediatePropagation()" style="margin-left: 10px;" wire:click.prevent="deleteUser({{ $manager->id }})" class="btn btn-danger" >ລົບບັນຊີຜູ້ໃຊ້</a>
                                            @endif

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$managers->links()}}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
