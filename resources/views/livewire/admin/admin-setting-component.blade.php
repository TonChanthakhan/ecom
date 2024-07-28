<div>
    <div class="contianer" style="padding: 30px 0">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Setting
                    </div>
                    <div class="panel-body">
                        @if(Session::has('message'))
                        <div class="alert alert-success">{{(Session::get('message'))}}</div>
                        @endif
                        <form class="form-horizontal" wire:submit.prevent="saveSetting">

                            <div class="form-group">
                                <label class="col-md-4 control-label">ອີເມວ</label>
                                <div class="col-md-4">
                                    <input type="email" placeholder="ອີເມວ" class="form-control input-md" wire:model="email" />
                                    @error('email') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">ເບີໂທ</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="ເບີໂທ" class="form-control input-md" wire:model="phone" />
                                    @error('phone') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">ເບີໂທ2</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="ເບີໂທ2" class="form-control input-md" wire:model="phone2" />
                                    @error('phone2') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">ທີ່ຢູ່</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="ທີ່ຢູ່" class="form-control input-md" wire:model="address" />
                                    @error('address') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">ແຜ່ນທີ່</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="ແຜ່ນທີ່" class="form-control input-md" wire:model="map" />
                                    @error('map') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">twiter</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="twiter" class="form-control input-md" wire:model="twiter" />
                                    @error('twiter') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Facebook</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Facebook" class="form-control input-md" wire:model="facebook" />
                                    @error('facebook') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Pinterest</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Pinterest" class="form-control input-md" wire:model="pinterest" />
                                    @error('pinterest') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>



                            <div class="form-group">
                                <label class="col-md-4 control-label">Youtube</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Youtube" class="form-control input-md" wire:model="youtube" />
                                    @error('youtube') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>



                            <div class="form-group">
                                <label class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">ບັນທຶກ</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
