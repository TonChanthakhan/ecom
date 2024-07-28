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
                                <h4>ລາຍຊື່ຜູ້ໃຊ້</h4>
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
                                <th>ອີເມວ</th>
                                <th></th>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>

                                            <a href="#" onclick="confirm('Are you sure, You want to delete this category') || event.stopImmediatePropagation()" style="margin-left: 10px;" wire:click.prevent="deleteUser({{ $user->id }})" class="btn btn-danger" >ລົບບັນຊີຜູ້ໃຊ້</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$users->links()}}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
