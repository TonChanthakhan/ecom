<div>
    <div class="content">
        <style>
            .content {
              padding-top: 40px;
              padding-bottom: 40px;
            }
            .icon-stat {
                display: block;
                overflow: hidden;
                position: relative;
                padding: 15px;
                margin-bottom: 1em;
                background-color: #fff;
                border-radius: 4px;
                border: 1px solid #ddd;
            }
            .icon-stat-label {
                display: block;
                color: #999;
                font-size: 13px;
            }
            .icon-stat-value {
                display: block;
                font-size: 28px;
                font-weight: 600;
            }
            .icon-stat-visual {
                position: relative;
                top: 22px;
                display: inline-block;
                width: 32px;
                height: 32px;
                border-radius: 4px;
                text-align: center;
                font-size: 16px;
                line-height: 30px;
            }
            .bg-primary {
                color: #fff;
                background: #d74b4b;
            }
            .bg-secondary {
                color: #fff;
                background: #6685a4;
            }

            .icon-stat-footer {
                padding: 10px 0 0;
                margin-top: 10px;
                color: #aaa;
                font-size: 12px;
                border-top: 1px solid #eee;
            }
        </style>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                  <div class="icon-stat">
                    <div class="row">
                      <div class="col-xs-8 text-left">
                        <span class="icon-stat-label">ລາຍຮັບທັງຫມົດ</span>
                        <span class="icon-stat-value">{{ $totalRevenue }} KIP</span>
                      </div>
                      <div class="col-xs-4 text-center">
                        <i class="fa fa-money icon-stat-visual bg-primary"></i>
                      </div>
                    </div>
                    <div class="icon-stat-footer">
                      <i class="fa fa-clock-o"></i> Updated Now
                    </div>
                  </div>
                </div>
                <div class="col-md-3 col-sm-6">
                  <div class="icon-stat">
                    <div class="row">
                      <div class="col-xs-8 text-left">
                        <span class="icon-stat-label">ຈຳນວນຂາຍສິນຄ້າທັງໝົດ</span>
                        <span class="icon-stat-value">{{ $totalSales }}</span>
                      </div>
                      <div class="col-xs-4 text-center">
                        <i class="fa fa-gift icon-stat-visual bg-secondary"></i>
                      </div>
                    </div>
                    <div class="icon-stat-footer">
                      <i class="fa fa-clock-o"></i> Updated Now
                    </div>
                  </div>
                </div>
                <div class="col-md-3 col-sm-6">
                  <div class="icon-stat">
                    <div class="row">
                      <div class="col-xs-8 text-left">
                        <span class="icon-stat-label">ລາຍຮັບມື້ນີ້</span>
                        <span class="icon-stat-value">{{ $todayRevenue }} KIP</span>
                      </div>
                      <div class="col-xs-4 text-center">
                        <i class="fa fa-money icon-stat-visual bg-primary"></i>
                      </div>
                    </div>
                    <div class="icon-stat-footer">
                      <i class="fa fa-clock-o"></i> Updated Now
                    </div>
                  </div>
                </div>
                <div class="col-md-3 col-sm-6">
                  <div class="icon-stat">
                    <div class="row">
                      <div class="col-xs-8 text-left">
                        <span class="icon-stat-label">ຈຳນວນຂາຍສິນຄ້າມື້ນີ້</span>
                        <span class="icon-stat-value">{{ $todaySales }}</span>
                      </div>
                      <div class="col-xs-4 text-center">
                        <i class="fa fa-gift icon-stat-visual bg-secondary"></i>
                      </div>
                    </div>
                    <div class="icon-stat-footer">
                      <i class="fa fa-clock-o"></i> Updated Now
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            ລາຍການລາສຸດ
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
                                    <th colspan="2" class="text-center">ລາຍລະອຽດ</th>
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

</div>
