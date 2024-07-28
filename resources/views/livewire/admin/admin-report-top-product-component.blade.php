
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
                    <div class="panel-heading" >
                       <div class="row" >
                        <div class="col-md-4" >
                            <h4>ລາຍງານສິນຄ້າຂາຍດີ</h4>
                        </div>
                        <div class="col-md-8">
                            <a href="{{route('admin.reportcenter')}}" class="btn btn-success pull-right">ກັບ</a>
                            <a onclick="printSection()" class="btn btn-primary pull-right" style="margin-right: 20px;">Print</a>
                        </div>
                    </div>
                    </div>

                    <div class="panel-body " id="printSection">
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
                        <table class="table table-striped text-center ">
                            <thead>
                                <tr>
                                    <td><b>ລຳດັບ</b></td>
                                    <td><b>ຊື່ສິນຄ້າ</b></td>
                                    <td><b>ຈຳນວນທີ່ຂາຍທັງຫມົດ</b></td>
                                    <td class="hide-img"><b>ລາຄາທີ່ຂາຍໄດ້</b></td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($topfives as $order)
                                <tr>
                                    <td>{{$order->id}}</td>
                                    <td>{{$order->name}}</td>
                                    <td>{{$order->total_sold}}</td>
                                    <td class="hide-img">{{$order->total_price}} KIP</td>
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

