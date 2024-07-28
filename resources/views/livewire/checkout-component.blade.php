<main  class="main-site">

    <style>
        .wrap-address-billing .row-in-form input[type=password], .wrap-address-billing .row-in-form input[type=text], .wrap-address-billing .row-in-form input[type=number], .wrap-address-billing .row-in-form select {
        font-size: 13px;
        line-height: 19px;
        display: inline-block;
        height: 43px;
        padding: 2px 20px;
        width: 100%;
        border: 1px solid #e6e6e6;
        }

    </style>

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="/" class="link">ໜ້າຫຼັກ</a></li>
                <li class="item-link"><span>ຊຳລະເງີນ</span></li>
            </ul>
        </div>
        <div class=" main-content-area">
            <form wire:submit.prevent="placeOrder">
                <div class="row">
                    <div class="col-md-12">
                        <div class="wrap-address-billing">
                            <h3 class="box-title">Billing Address</h3>
                            <div class="billing-address">

                                <p class="row-in-form">
                                    <label for="fname">ຊື່<span></span></label>
                                    <input type="text" name="fname" value="" placeholder="Your name" wire:model="firstname">
                                    @error('firstname') <span class="text-danger">{{$message}}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="lname">ນາມສະກຸນ<span></span></label>
                                    <input type="text" name="lname" value="" placeholder="Your last name" wire:model="lastname">
                                    @error('lastname') <span class="text-danger">{{$message}}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="email">ອີເມວ:</label>
                                    <input type="email" name="email" value="" placeholder="Type your email" wire:model="email">
                                    @error('email') <span class="text-danger">{{$message}}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="phone">ເບີໂທລະສັບ<span></span></label>
                                    <input type="number" name="phone" value="" placeholder="10 digits format" wire:model="mobile">
                                    @error('mobile') <span class="text-danger">{{$message}}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="add">ທີ່ຢູ່:</label>
                                    <input type="text" name="add" value="" placeholder="Street at apartment number" wire:model="line1">
                                    @error('line1') <span class="text-danger">{{$message}}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="add">ຂົນສົ່ງ:</label>
                                    <select class="form-control" wire:model="line2">
                                        <option value="">Select</option>
                                        <option value="hal">HAL</option>
                                        <option value="anousith">Anousith</option>
                                        <option value="captain">Captain</option>
                                     </select>
                                     @error('line2') <span class="text-danger">{{$message}}</span> @enderror
                                </p>
                                {{-- <p class="row-in-form">
                                    <label for="country">Country<span>*</span></label>
                                    <input type="text" name="country" value="" placeholder="United States" wire:model="country">
                                    @error('country') <span class="text-danger">{{$message}}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="city">Provine<span>*</span></label>
                                    <input type="text" name="provine" value="" placeholder="Provine" wire:model="province">
                                    @error('province') <span class="text-danger">{{$message}}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="city">Town / City<span>*</span></label>
                                    <input type="text" name="city" value="" placeholder="City name" wire:model="city">
                                    @error('city') <span class="text-danger">{{$message}}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="zip-code">Postcode / ZIP:</label>
                                    <input  type="number" name="zip-code" value="" placeholder="Your postal code" wire:model="zipcode">
                                    @error('zipcode') <span class="text-danger">{{$message}}</span> @enderror
                                </p> --}}
                                <p class="row-in-form fill-wife">

                                    <label class="checkbox-field">
                                        <input name="different-add" id="different-add" value="forever" type="checkbox" wire:model="ship_to_differrent">
                                        <span>Ship to a different address?</span>
                                    </label>
                                </p>
                            </div>
                        </div>
                    </div>

                    @if($ship_to_differrent)
                    <div class="col-md-12">
                        <div class="wrap-address-billing">
                            <h3 class="box-title">shipping Address</h3>
                            <div class="billing-address">
                                <p class="row-in-form">
                                    <label for="fname">first name<span>*</span></label>
                                    <input type="text" name="fname" value="" placeholder="Your name" wire:model="s_firstname">
                                    @error('s_firstname') <span class="text-danger">{{$message}}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="lname">last name<span>*</span></label>
                                    <input type="text" name="lname" value="" placeholder="Your last name" wire:model="s_lastname">
                                    @error('s_lastname') <span class="text-danger">{{$message}}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="email">Email Addreess:</label>
                                    <input type="email" name="email" value="" placeholder="Type your email" wire:model="s_email">
                                    @error('s_email') <span class="text-danger">{{$message}}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="phone">Phone number<span>*</span></label>
                                    <input type="number" name="phone" value="" placeholder="10 digits format" wire:model="s_mobile">
                                    @error('s_mobile') <span class="text-danger">{{$message}}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="add">Address:</label>
                                    <input type="text" name="add" value="" placeholder="Street at apartment number" wire:model="s_line1">
                                    @error('s_line1') <span class="text-danger">{{$message}}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="add">Shipping:</label>
                                    <input type="text" name="add" value="" placeholder="Street at apartment number" wire:model="s_line2">

                                </p>
                                <p class="row-in-form">
                                    <label for="country">Country<span>*</span></label>
                                    <input type="text" name="country" value="" placeholder="United States" wire:model="s_country">
                                    @error('s_country') <span class="text-danger">{{$message}}</span> @enderror
                                </p>

                                <p class="row-in-form">
                                    <label for="city">Provine<span>*</span></label>
                                    <input type="text" name="provine" value="" placeholder="Provine" wire:model="s_province">
                                    @error('s_province') <span class="text-danger">{{$message}}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="city">City<span>*</span></label>
                                    <input type="text" name="city" value="" placeholder="City name" wire:model="s_city">
                                    @error('s_city') <span class="text-danger">{{$message}}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="zip-code">Postcode / ZIP:</label>
                                    <input  type="number" name="zip-code" value="" placeholder="Your postal code" wire:model="s_zipcode">
                                    @error('s_zipcode') <span class="text-danger">{{$message}}</span> @enderror
                                </p>

                            </div>
                        </div>
                    </div>
                    @endif

                </div>

                @if (Session::has('errors'))
                    <div class="alert alert-danger">
                        <ul>

                                @foreach (Session::get('errors') as $error)
                                    <li>{{ $error }}</li>
                                @endforeach

                        </ul>
                    </div>
                @endif

                <div class="summary summary-checkout">
                    <div class="summary-item payment-method">
                        <h4 class="title-box">ຊ່ອງທາງການຊຳລະເງີນ</h4>
                        @if ($paymentmode == 'BCEL')
                                    <div class="wrap-address-billing">

                                        <label class="col-md-9 control-label">ກະລຸນາໃສ່ຮູບການຊຳລະເງີນຂອງທ່ານ</label>
                                        <input type="file" class="input-file " wire:model="image" />

                                        @error('image') <p class="text-danger">{{$message}}</p> @enderror
                                    </div>
                                @endif
                        {{-- @if($paymentmode == 'card')
                        <div class="wrap-address-billing">
                            @if(Session::has('stripe_error'))
                                <div class="alert alert-danger" role="alert">{{Session::get('stripe_error')}}</div>
                            @endif
                            <p class="row-in-form">
                                <label for="zip-code">Card Number:</label>
                                <input  type="number" name="zip-code" value="" placeholder="Card Number" wire:model="card_no">
                                @error('card_no') <span class="text-danger">{{$message}}</span> @enderror
                            </p>



                            <p class="row-in-form">
                                <label for="exp-month">Expiry Month:</label>
                                <input  type="number" name="zip-code" value="" placeholder="MM" wire:model="exp_month">
                                @error('exp_month') <span class="text-danger">{{$message}}</span> @enderror
                            </p>



                            <p class="row-in-form">
                                <label for="exp-year">Expiry Year:</label>
                                <input  type="number" name="zip-code" value="" placeholder="YYYY" wire:model="exp_year">
                                @error('exp_year') <span class="text-danger">{{$message}}</span> @enderror
                            </p>



                            <p class="row-in-form">
                                <label for="cvc">CVC:</label>
                                <input  type="password" name="zip-code" value="" placeholder="CVC" wire:model="cvc">
                                @error('cvc') <span class="text-danger">{{$message}}</span> @enderror
                            </p>
                        </div>
                        @endif --}}



                        <div class="choose-payment-methods">
                            <label class="payment-method">
                                <input name="payment-method" id="payment-method-bank" value="cod" type="radio" wire:model="paymentmode">
                                <span>Cash on Delivery</span>
                                <span class="payment-desc">Order Now Pay on Delivery</span>
                            </label>
                            {{-- <label class="payment-method">
                                <input name="payment-method" id="payment-method-visa" value="card" type="radio" wire:model="paymentmode">
                                <span>Debit / Credit Card</span>
                                <span class="payment-desc">There are many variations of passages of Lorem Ipsum available</span>
                            </label> --}}
                            <label class="payment-method">
                                <input name="payment-method" id="payment-method-BCEL" value="BCEL" type="radio" wire:model="paymentmode">
                                <span>BCEL</span>

                            </label>
                            @error('paymentmode') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        @if(Session::has('checkout'))
                            <p class="summary-info grand-total"><span>Grand Total</span> <span class="grand-total-price">{{Session::get('checkout')['total']}} KIP</span></p>
                        @endif
                        <button class="btn btn-medium">Place order now</button>
                    </div>
                    <div class="summary-item shipping-method">
                        <h4 class="title-box f-title"></h4>
                        @if ($paymentmode == 'BCEL')
                        <div class="row">
                            <div class="col-md-6">
                                <img src="{{asset('assets/images/qrcode.png')}}" alt="mercado" width="80%">
                                <hr>

                            </div>

                            <div class="col-md-5">
                                @if($image)
                                <img src="{{$image->temporaryUrl()}}" width="500" />
                            @endif
                            </div>

                        </div>
                        <div class="">

                        </div>
                        @endif
                        <p class="summary-info"><span class="title"></span></p>
                        <p class="summary-info"><span class="title"></span></p>

                    </div>
                </div>
            </form>


        </div><!--end main content area-->
    </div><!--end container-->

</main>
