
<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                ເພີ່ມພະນັກງານໃໝ່
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.management')}}" class="btn btn-success pull-right">ກັບ</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if(Session::has('success'))
                            <div class="alert alert-success">{{Session::get('success')}}</div>
                        @endif
                        <form class="form-horizontal" wire:submit.prevent="addManagement">
                            <div class="form-group">
                                <label class="col-md-4 control-label">ຊື່</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="ຊື່" class="form-control input-md" wire:model="name">
                                    @error('name') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">ອີເມວ</label>
                                <div class="col-md-4">
                                    <input type="email" placeholder="ອີເມວ" class="form-control input-md" wire:model="email">
                                    @error('email') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">ລະຫັດຜ່ານ</label>
                                <div class="col-md-4">
                                    <input type="password" placeholder="ລະຫັດຜ່ານ" class="form-control input-md" wire:model="password">
                                    @error('password') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">ຢືນຢັນລະຫັດຜ່ານ</label>
                                <div class="col-md-4">
                                    <input type="password" placeholder="ຢືນຢັນລະຫັດຜ່ານ" class="form-control input-md" wire:model="password_confirmation">
                                    @error('password_confirmation') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">ເພີ່ມພະນັກງານ</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
