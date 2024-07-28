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
                            <a href="{{route('admin.suppliers')}}" class="btn btn-success pull-right">All Products</a>
                        </div>
                    </div>
                </div>

                <div class="panel-body">
                    @if(Session::has('message'))
                        <div class="alert alert-success">{{(Session::get('message'))}}</div>
                    @endif
                    <form class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="addSupplier">


                        <div class="form-group">
                            <label class="col-md-4 control-label">Supplier Name</label>
                            <div class="col-md-4">
                                <input type="text" placeholder="Supplier Name" class="form-control input-md" wire:model="name" />
                                @error('name') <p class="text-danger">{{$message}}</p> @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Email</label>
                            <div class="col-md-4">
                                <input type="email" placeholder="Email" class="form-control input-md" wire:model="email" />
                                @error('email') <p class="text-danger">{{$message}}</p> @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Address</label>
                            <div class="col-md-4">
                                <input type="text" placeholder="Address" class="form-control input-md" wire:model="address" />
                                @error('address') <p class="text-danger">{{$message}}</p> @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Tel</label>
                            <div class="col-md-4">
                                <input type="text" placeholder="Tel" class="form-control input-md" wire:model="tel" />
                                @error('tel') <p class="text-danger">{{$message}}</p> @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label"></label>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
</div>
