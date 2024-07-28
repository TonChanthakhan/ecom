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
                                <h4>ລາຍການສິນຄ້າທັງໝົດ</h4>
                            </div>
                            <div class="col-md-4">
                                <a href="{{route('admin.addproduct')}}" class="btn btn-success pull-right">ເພີ່ມສິນຄ້າໃໝ່</a>
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" placeholder="ຄົ້ນຫາສິນຄ້າ..." wire:model="searchTerm"/>
                            </div>
                        </div>
                    </div>

                    <div class="panel-body">
                        @if(Session::has('message'))
                            <div class="alert alert-success">{{(Session::get('message'))}}</div>
                        @endif
                        <table class="table table-striped">
                            <thead>
                                <th>ລຳກັບ</th>
                                <th>ຮູບສິນຄ້າ</th>
                                <th>ຂື່</th>
                                <th>ສະຖານະ</th>
                                <th>ຈຳນວນ</th>
                                <th>ລາຄາ</th>
                                {{-- <th>Sale Price</th> --}}
                                <th>ປະເພດ</th>
                                <th>ເວລາລົງສິນຄ້າ</th>
                                <th>ແກ້ໄຂ</th>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{$product->id}}</td>
                                        <td><img src="{{asset('assets/images/products')}}/{{$product->image}}" width="40" ></td>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->stock_status}}</td>
                                        <td>{{$product->quantity}}</td>
                                        <td>{{$product->regular_price}}</td>
                                        {{-- <td>{{$product->sale_price}}</td> --}}
                                        <td>{{$product->category->name}}</td>
                                        <td>{{$product->created_at}}</td>
                                        <td>
                                            <a href="{{route('admin.editproduct',['product_slug'=>$product->slug])}}"><i class="fa fa-edit fa-2x text-into"></i></a>
                                            <a href="#" onclick="confirm('Are you sure, You want to delete this category') || event.stopImmediatePropagation()" style="margin-left: 10px;" wire:click.prevent="deleteProduct({{$product->id}})" ><i class="fa fa-times fa-2x text-danger"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$products->links()}}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
