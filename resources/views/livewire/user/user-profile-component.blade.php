<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">

                    </div>
                    <div class="panel-body">
                        <div class="col-md-4">
                            @if($user->profile->image)
                                <img src="{{ asset('assets/images/profile') }}/{{ $user->profile->image }}" width="100%" />
                            @else
                                <img src="{{ asset('assets/images/profile/1.png') }}" width="100%" />
                            @endif
                        </div>
                        <div class="col-md-8">
                            <p><b>ຊື່:     </b>{{ $user->name }}</p>
                            <p><b>ອີເມວ:  </b>{{ $user->email }}</p>
                            <p><b>ເບີໂທ:  </b>{{ $user->profile->mobile }}</p>
                            <hr>
                            <p><b>ບ້ານ:   </b>{{ $user->profile->line1 }}</p>
                            <p><b>ເມືອງ:  </b>{{ $user->profile->city }}</p>
                            <p><b>ແຂວງ: </b>{{ $user->profile->province }}</p>

                            <a href="{{ route('user.editprofile') }}" class="btn btn-info pull-right">ແກ້ໄຂ profile</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
