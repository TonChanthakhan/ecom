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
                    <div class="panel-heading" style="text-align: center;">
                        <h3>ໜ້າລາຍງານ</h3>
                    </div>

                    <div class="panel-body "  style="margin-bottom: 200px">
                        <div class="row" style="text-align: center">
                            <div class="col-md-4">
                                <a href="/admin/reportorder" class="btn btn-success"><h4>ລາຍງານການຂາຍສິນຄ້າ</h4></a>
                            </div>

                            <div class="col-md-4">
                                <a href="/admin/reporttopproduct" class="btn btn-success"><h4>ລາຍງາສິນຄ້າຂາຍດີ</h4></a>
                            </div>

                            <div class="col-md-4">
                                <a href="/admin/reportpurchaseorder" class="btn btn-success"><h4>ລາຍງານການສັ່ງຊື້ສິນຄ້າ</h4></a>
                            </div>




                        </div>



                        <div class="wrap-pagination-info">
                        {{-- {{$orders->links()}} --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
