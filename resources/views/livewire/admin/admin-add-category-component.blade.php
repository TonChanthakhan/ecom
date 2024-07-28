<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Add New Category
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.categories')}}" class="btn btn-success pull-right">ກັບ</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if(Session::has('message'))
                            <div class="alert alert-success">{{Session::get('message')}}</div>
                        @endif
                        <form class="form-horizontal" wire:submit.prevent="soreCategory">
                            <div class="form-group">
                                <label class="col-md-4 control-label">ຊື່ປະເພດ</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="ຊື່ປະເພດ" class="form-control input-md" wire:model="name" wire:keyup="generateslug">
                                    @error('name') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">ກຳກັບຊື່ປະເພດ</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="ກຳກັບຊື່ປະເພດ" class="form-control input-md" wire:model="slug">
                                    @error('slug') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-md-4 control-label">ໃຫ້ເປັນປະເພດຮອງ</label>
                                    <div class="col-md-4">
                                        <select class="form-control input-md" wire:model="category_id">
                                            <option value="">ບໍ່ມີ</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">ເພີ່ມປະເພດ</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
