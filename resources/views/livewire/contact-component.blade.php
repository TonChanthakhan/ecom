<div>
    <main id="main" class="main-site left-sidebar">

		<div class="container">

			<div class="wrap-breadcrumb">
				<ul>
					<li class="item-link"><a href="/" class="link">ໜ້າຫຼັກ</a></li>
					<li class="item-link"><span>ຕິດຕໍ່ພວກເຮົາ</span></li>
				</ul>
			</div>
			<div class="row">
				<div class=" main-content-area">
					<div class="wrap-contacts ">
						<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
							<div class="contact-box contact-form">
								<h2 class="box-title"></h2>
                                @if(Session::has('message'))
                                <div class="alert alert-success">{{(Session::get('message'))}}</div>
                            @endif
								<form name="frm-contact" wire:submit.prevent="sendMessage">

									<label for="name">ຊື່<span></span></label>
									<input type="text" value="" id="name" name="name" wire:model="name" >
                                    @error('name') <p class="text-danger">{{ $massage }}</p> @enderror

									<label for="email">ອີເມວ<span></span></label>
									<input type="text" value="" id="email" name="email" wire:model="email" >
                                    @error('email') <p class="text-danger">{{ $massage }}</p> @enderror

									<label for="phone">ເບີໂທລະສັບ</label>
									<input type="text" value="" id="phone" name="phone" wire:model="phone" >
                                    @error('phone') <p class="text-danger">{{ $massage }}</p> @enderror

									<label for="comment">Comment</label>
									<textarea name="comment" id="comment" wire:model="comment" ></textarea>
                                    @error('comment') <p class="text-danger">{{ $massage }}</p> @enderror

									<input type="submit" name="ok" value="ສົ່ງຂໍຄວາມ" >

								</form>
							</div>
						</div>
						<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
							<div class="contact-box contact-info">
								{{-- <div class="wrap-map">
									<iframe src="{{ $setting->map }}" width="100%" height="320" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
								</div> --}}
								<h2 class="box-title">ລາຍລະອຽດການຕິດຕໍ່</h2>
								<div class="wrap-icon-box">

									<div class="icon-box-item">
										<i class="fa fa-envelope" aria-hidden="true"></i>
										<div class="right-info">
											<b>ອີເມວ</b>
											<p>{{ $setting->email  }}</p>
										</div>
									</div>

									<div class="icon-box-item">
										<i class="fa fa-phone" aria-hidden="true"></i>
										<div class="right-info">
											<b>ເບີໂທ</b>
											<p>{{ $setting->phone  }}</p>
										</div>
									</div>

									<div class="icon-box-item">
										<i class="fa fa-map-marker" aria-hidden="true"></i>
										<div class="right-info">
											<b>ທີ່ຢູ່ຮ້ານ</b>
                                            @if($setting->address)
											<p>{{ $setting->address }}</p>
                                            @else
                                            <p>{{ $setting->NULL }}</p>
                                            @endif
										</div>
									</div>

								</div>
							</div>
						</div>
					</div>
				</div><!--end main products area-->

			</div><!--end row-->

		</div><!--end container-->

	</main>
</div>
