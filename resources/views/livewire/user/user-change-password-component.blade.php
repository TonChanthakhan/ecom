<div>
    <div class="contianer" style="padding: 30px 0">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Ch Pa
                    </div>
                    <div class="panel-body">
                        @if(Session::has('succes'))
                        <div class="alert alert-success">{{(Session::get('succes'))}}</div>
                        @endif
                        @if(Session::has('error'))
                        <div class="alert alert-success">{{(Session::get('error'))}}</div>
                        @endif
                        <form class="form-horizontal" wire:submit.prevent="changePassword">

                            <div class="form-group">
                                <label class="col-md-4 control-label">ລະຫັດຜ່ານປະຈຸບັນ</label>
                                <div class="col-md-4">
                                    <input type="password" placeholder="ລະຫັດຜ່ານປະຈຸບັນ" class="form-control input-md" name="current_password" />
                                    @error('current_password') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">ລະຫັດຜ່ານໃໝ່</label>
                                <div class="col-md-4">
                                    <input type="password" placeholder="ລະຫັດຜ່ານໃໝ່" class="form-control input-md" name="password" />
                                    @error('password') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">ຢຶນຢັນລະຫັດຜ່ານ</label>
                                <div class="col-md-4">
                                    <input type="password" placeholder="ຢຶນຢັນລະຫັດຜ່ານ" class="form-control input-md" name="password_confirmation" />
                                    @error('password_confirmation') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">ຢືນຢັນ</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
