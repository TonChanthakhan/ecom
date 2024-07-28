<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">

                    </div>
                    <div class="panel-body">
                        @if(Session::has('message'))
                        <div class="alert alert-success">{{(Session::get('message'))}}</div>
                        @endif
                        <form wire:submit.prevent="updateProfile">
                        <div class="col-md-4">
                            @if($newimage)
                                <img src="{{ $newimage->temporaryUrl() }}" width="100%" />
                            @elseif($image)
                                <img src="{{ asset('assets/images/profile') }}/{{ $user->profile->image }}" width="100%" />
                            @else
                                <img src="{{ asset('assets/images/profile/1.png') }}" width="100%" />
                            @endif
                            <hr>
                            <input type="file" name="" id="" class="form-control" wire:model="newimage">
                        </div>
                        <div class="col-md-8">
                            <p><b>ຊື່:   </b><input type="text" class="form-control" wire:model="name"></p>
                            <p><b>ເບີໂທ: </b><input type="text" class="form-control" wire:model="mobile"></p>
                            <p><b>ບ້ານ:  </b><input type="text" class="form-control" wire:model="line1"></p>
                            <p><b>ເມືອງ:</b><input type="text" class="form-control" wire:model="city"></p>
                            <p><b>ແຂວງ: </b><input type="text" class="form-control" wire:model="province"></p>
                            <button type="submit" class="btn btn-info top pull-right"> ແກ້ໄຂ</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
