<div>
    <style>
        nav svg {
            height: 20px;
        }

        nav .hidden {
            display: block !important;
        }
    </style>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">

                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-7">
                                <h4>ສັ່ງຊື້ສິນຄ້າ</h4>
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" placeholder="ຄົ້ນຫາສິນຄ້າ..."
                                    wire:model="searchTerm" />
                            </div>
                            <div class="col-md-1">
                                <a href="{{ route('admin.purchaseorder') }}" class="btn btn-success pull-right">ກັບ</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                            <div class="alert alert-success">{{ Session::get('message') }}</div>
                        @endif
                        <form action="" class="form-horizontal" wire:submit.prevent="addPurchaseOrder">
                            <div class="col-md-7 ">
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Supplier</label>
                                    <div class="col-md-6">
                                        <select class="form-control " wire:model="supplier">
                                            <option value=""></option>
                                            @foreach ($suppliers as $supplier)
                                                <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('supplier')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                        @error('quantity')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="col-md-1">
                                        <button type="submit" class="btn btn-primary">ເພີ່ມ</button>
                                    </div>

                                </div>


                                @if ($selectedProducts)
                                    <div class="form-group">
                                        <div>
                                            <table class="table table-striped">
                                                <thead>
                                                    <th></th>
                                                    <th><label class=" control-label">ຊື່</label></th>
                                                    <th><label class=" control-label">ຈຳນວນ</label></th>
                                                    <th><label class="control-label">ຫົວໜ່ວຍ</label></th>
                                                </thead>
                                                <tbody>
                                                    @foreach ($selectedProducts as $product)
                                                        <tr>
                                                            <td><label
                                                                    class=" control-label">{{ $product['id'] }}</label>

                                                            </td>
                                                            <td class=""><label
                                                                    class="control-label">{{ $product['name'] }}</label>
                                                            </td>
                                                            <td>
                                                                <label class="control-label">ຈຳນວນທີ່ຕ້ອງການ</label>
                                                                <div class="">
                                                                    <input type="text" value="0"
                                                                        wire:model="quantity.{{ $product['id'] }}"
                                                                        class="form-control">
                                                                    @error('quantity.' . $product['id'])
                                                                        <p class="text-danger">{{ $message }}</p>
                                                                    @enderror
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <label class=" control-label">ຫົວໜ່ວຍ</label>
                                                                <div class="">
                                                                    <select class="form-control"
                                                                        wire:model="unit.{{ $product['id'] }}">
                                                                        <option value="">ເລືອກຫົວໜ່ວຍ</option>
                                                                        <option value="ແກັດ">ແກັດ</option>
                                                                        <option value="ອັນ">ອັນ</option>
                                                                        <option value="ລັງ">ລັງ</option>
                                                                    </select>
                                                                    @error('unit.' . $product['id'])
                                                                        <p class="text-danger">{{ $message }}</p>
                                                                    @enderror
                                                                </div>
                                                            </td>

                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>


                                        </div>

                                    </div>
                                @endif

                            </div>
                            <div class="col-md-5">
                                <table class="table table-striped">
                                    <thead>
                                        <th></th>
                                        <th>ຮູບສິນຄ້າ</th>
                                        <th>ຂື່</th>
                                        <th>ຈຳນວນ</th>
                                        <th>ປະເພດ</th>
                                        <th></th>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)
                                            <tr>
                                                <td>
                                                    <input type="checkbox" width=""
                                                        wire:model="selectedProducts.{{ $product->id }}"
                                                        value="{{ $product->id }}"
                                                        wire:change="add({{ $product->id }})"
                                                        wire:loading.attr="disabled">
                                                </td>
                                                <td><img src="{{ asset('assets/images/products') }}/{{ $product->image }}"
                                                        width="40"></td>
                                                <td>{{ $product->name }}</td>
                                                <td>{{ $product->quantity }}</td>
                                                <td>{{ $product->category->name }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $products->links() }}
                            </div>

                        </form>





                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
