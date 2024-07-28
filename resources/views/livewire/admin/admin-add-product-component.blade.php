<div>
    </style>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">

                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Add New Products
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.products')}}" class="btn btn-success pull-right">ກັບ</a>
                            </div>
                        </div>
                    </div>

                    <div class="panel-body">
                        @if(Session::has('message'))
                            <div class="alert alert-success">{{(Session::get('message'))}}</div>
                        @endif
                        <form class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="addProduct">
                            <div class="form-group">
                                <label class="col-md-4 control-label">ຊື່ສິນຄ້າ</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="ຊື່ສິນຄ້າ" class="form-control input-md" wire:model="name" wire:keyup="generateSlug" />
                                    @error('name') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">ກຳກັບຊື່ສິນຄ້າ</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="ກຳກັບຊື່ສິນຄ້າ" class="form-control input-md" wire:model="slug" />
                                    @error('slug') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">ຄຳອະທິບາຍແບບສັ້ນ</label>
                                <div class="col-md-4">
                                    <textarea placeholder="ຄຳອະທິບາຍແບບສັ້ນ" class="form-control" wire:model="short_description"></textarea>
                                    @error('short_description') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">ຄຳອະທິບາຍ</label>
                                <div class="col-md-4">
                                    <textarea placeholder="ຄຳອະທິບາຍ" class="form-control" wire:model="description"></textarea>
                                    @error('description') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">ລາຄາ</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="ລາຄາ" class="form-control input-md" wire:model="regular_price" />
                                    @error('regular_price') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">ສ່ວນລົດ</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="ສ່ວນລົດ" class="form-control input-md" wire:model="" />
                                    @error('sale_price') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>

                            {{-- <div class="form-group">
                                <label class="col-md-4 control-label">ລະຫັດສິນຄ້າ</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="ລະຫັດສິນຄ້າ" class="form-control input-md" wire:model="SKU" />
                                    @error('SKU') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div> --}}

                            <div class="form-group">
                                <label class="col-md-4 control-label">ສະຖານະສິນຄ້າ</label>
                                <div class="col-md-4">
                                    <select class="form-control" wire:model="stock_status">
                                        <option value="instock">inStock</option>
                                        <option value="outofstock">Out od Stock</option>
                                    </select>
                                    @error('stock_status') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">ສິນຄ້າເດັ່ນ</label>
                                <div class="col-md-4">
                                    <select class="form-control" wire:model="featured">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-md-4 control-label">ຈຳນວນ</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Quantity" class="form-control input-md" wire:model="quantity" />
                                    @error('quantity') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-md-4 control-label">ຮູບຫຼັກ</label>
                                <div class="col-md-4">
                                    <input type="file" class="input-file" wire:model="image" />
                                    @if($image)
                                        <img src="{{$image->temporaryUrl()}}" width="120" />
                                    @endif
                                    @error('image') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">ຮູບເພີ່ມເຕີ່ມ</label>
                                <div class="col-md-4">
                                    <input type="file" class="input-file" wire:model="images" multiple />
                                    @if($images)
                                        @foreach ($images as $image)
                                            <img src="{{$image->temporaryUrl()}}" width="120" />
                                        @endforeach
                                    @endif
                                    @error('images') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">ປະເພດສິນຄ້າ</label>
                                <div class="col-md-4">
                                    <select class="form-control" wire:model="category_id" wire:change="changeSubcategory">
                                        <option value="">ເລືອກປະເພດ</option>
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach

                                    </select>
                                    @error('category_id') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">ປະເພດຮອງ</label>
                                <div class="col-md-4">
                                    <select class="form-control" wire:model="scategory_id">
                                        <option value="0">ເລືອກປະເພດ</option>
                                        @foreach ($scategories as $scategory)
                                            <option value="{{$scategory->id}}">{{$scategory->name}}</option>
                                        @endforeach

                                    </select>

                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">ຄຸນລັກສະນະສິນຄ້າ</label>
                                <div class="col-md-3">
                                    <select class="form-control" wire:model="attributes">
                                        <option value="0">ເລືອກຄຸນນະສົມບັດ</option>
                                        @foreach ($pattributes as $pattribute)
                                            <option value="{{$pattribute->id}}">{{$pattribute->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-1">
                                    <button type="submit" class="btn btn-primary" wire:click.prevent="add">ເພີ່ມ</button>
                                </div>
                            </div>

                            @foreach ($inputs as $key => $value)
                                <div class="form-group">
                                    <label class="col-md-4 control-label">{{ $pattributes->where('id',$attribute_arr[$key])->first()->name }}</label>
                                    <div class="col-md-3">
                                        <input type="text" placeholder="{{ $pattributes->where('id',$attribute_arr[$key])->first()->name }}" class="form-control input-md" wire:model="attribute_values.{{ $value }}" />
                                    </div>
                                    <div class="col-md-1">
                                        <button type="button" class="btn btn-danger btn-sm"  wire:click.prevent="remove({{ $key }})">ລົບ</button>
                                    </div>
                                </div>
                            @endforeach

                            <div class="form-group">
                                <label class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">ເພີ່ມສິນຄ້າ</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
