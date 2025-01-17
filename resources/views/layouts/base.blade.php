<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ຮ້ານອ້າຍດ້າ</title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico">

    <link
        href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,700,700italic,900,900italic&amp;subset=latin,latin-ext"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Open%20Sans:300,400,400italic,600,600italic,700,700italic&amp;subset=latin,latin-ext"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/chosen.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/color-01.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/flexslider.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Lao:wght@100..900&display=swap" rel="stylesheet">

    <style>
        * {
            font-family: "Noto Sans Lao", sans-serif;
            font-optical-sizing: auto;
            font-weight: <weight>;
            font-style: normal;
            font-variation-settings:
                "wdth" 100;
        }
    </style>

<style>
    .print-only {
            display: none; /* Hide this on screen */
        }
    @media print {
        .no-print {
            display: none;
        }

        .hide-img {
        display: none;
    }


        .print-container {
            width: 100%;
            margin: 0;
            padding: 0;
            font-size: 12pt;
            color: #000;
        }

        .print-only {
        display: block;
    }


        img {
            max-width: 100%;
            height: auto;
        }
    }
</style>


    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css"
        integrity="sha512-aEe/ZxePawj0+G2R+AaIxgrQuKT68I28qh+wgLrcAJOz3rxCP+TwrK5SPN+E5I+1IQjNtcfvb96HDagwrKRdBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.6.3/nouislider.min.css"
        integrity="sha512-KRrxEp/6rgIme11XXeYvYRYY/x6XPGwk0RsIC6PyMRc072vj2tcjBzFmn939xzjeDhj0aDO7TDMd7Rbz3OEuBQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />




    @livewireStyles
</head>

<body class="home-page home-01 ">

    <!-- mobile menu -->
    <div class="mercado-clone-wrap">
        <div class="mercado-panels-actions-wrap">
            <a class="mercado-close-btn mercado-close-panels" href="#"></a>
        </div>
        <div class="mercado-panels"></div>
    </div>

    <!--header-->
    <header id="header" class="header header-style-1 ">
        <div class="container-fluid no-print">
            <div class="row">
                <div class="topbar-menu-area">
                    <div class="container">
                        <div class="topbar-menu right-menu">
                            <ul>
                                @if (Route::has('login'))
                                    @auth
                                        @if (Auth::user()->utype === 'ADM' && Auth::user()->id == '3')
                                            <li class="menu-item menu-item-has-children parent">
                                                <a title="" href="#">My Account ({{ Auth::user()->name }})<i
                                                        class="fa fa-angle-down" aria-hidden="true"></i></a>
                                                <ul class="submenu curency">
                                                    <li class="menu-item">
                                                        <a title="Dashboard"
                                                            href="{{ route('admin.dashboard') }}">Dashboard</a>
                                                    </li>
                                                    <li class="menu-item">
                                                        <a title="Products" href="{{ route('admin.products') }}">ຈັດການ
                                                            ສິນຄ້າ</a>
                                                    </li>
                                                    <li class="menu-item">
                                                        <a title="Categories" href="{{ route('admin.categories') }}">ຈັດການ
                                                            ປະເພດ</a>
                                                    </li>
                                                    <li class="menu-item">
                                                        <a title="Attributes"
                                                            href="{{ route('admin.attributes') }}">ຈັດການຄຸນລັກສະນະ
                                                            ສິນຄ້າ</a>
                                                    </li>

                                                    <li class="menu-item">
                                                        <a title="Orders"
                                                            href="{{ route('admin.orders') }}">ການຂາຍສິນຄ້າ</a>
                                                    </li>

                                                    <li class="menu-item">
                                                        <a title="Suppliers"
                                                            href="{{ route('admin.suppliers') }}">ຜູ້ສະໜອງ</a>
                                                    </li>

                                                    <li class="menu-item">
                                                        <a title="ສັ່ງຊື້ & ນຳເຂົ້າ                                                            ສິນຄ້າ"
                                                            href="{{ route('admin.purchaseorder') }}">ສັ່ງຊື້ & ນຳເຂົ້າ
                                                            ສິນຄ້າ</a>
                                                    </li>

                                                    <li class="menu-item">
                                                        <a title="ຈັດການຂໍ້ມູນພະນັກງານ"
                                                            href="{{ route('admin.management') }}">ຈັດການຂໍ້ມູນພະນັກງານ</a>
                                                    </li>

                                                    <li class="menu-item">
                                                        <a title="ຈັດການຂໍ້ມູນລູກຄ້າ"
                                                            href="{{ route('admin.usersmanage') }}">ຈັດການຂໍ້ມູນລູກຄ້າ</a>
                                                    </li>

                                                    <li class="menu-item">
                                                        <a title="ໜ້າລາຍງານລາຍງານ"
                                                            href="{{ route('admin.reportcenter') }}">ໜ້າລາຍງານລາຍງານ</a>
                                                    </li>



                                                    {{-- <li class="menu-item">
                                                        <a title="Manage Home Slider"
                                                            href="{{ route('admin.homeslider') }}">Manage Home Slider</a>
                                                    </li>
                                                    <li class="menu-item">
                                                        <a title="Manage Home Categories"
                                                            href="{{ route('admin.homecategories') }}">Manage Home
                                                            Categories</a>
                                                    </li>
                                                    <li class="menu-item">
                                                        <a title="Sale Setting" href="{{ route('admin.sale') }}">Sale
                                                            Setting</a>
                                                    </li>
                                                    <li class="menu-item">
                                                        <a title="All Coupon" href="{{ route('admin.coupons') }}">All
                                                            Coupon</a>
                                                    </li>

                                                    <li class="menu-item">
                                                        <a title="Contact Messages"
                                                            href="{{ route('admin.contact') }}">Contact Messages</a>
                                                    </li>
                                                    <li class="menu-item">
                                                        <a title="Setting"
                                                            href="{{ route('admin.settings') }}">Setting</a>
                                                    </li> --}}


                                                    <li class="menu-item">
                                                        <a href="{{ route('logout') }}"
                                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">ອອກຈາກລະບົບ</a>
                                                    </li>
                                                    <form id="logout-form" method="POST"
                                                        action="{{ route('logout') }}">
                                                        @csrf
                                                    </form>
                                                </ul>
                                            </li>
                                        @elseif(Auth::user()->utype === 'ADM' && Auth::user()->id != '3')
                                        <li class="menu-item menu-item-has-children parent">
                                            <a title="" href="#">My Account ({{ Auth::user()->name }})<i
                                                    class="fa fa-angle-down" aria-hidden="true"></i></a>
                                            <ul class="submenu curency">
                                                <li class="menu-item">
                                                    <a title="Dashboard"
                                                        href="{{ route('admin.dashboard') }}">Dashboard</a>
                                                </li>
                                                <li class="menu-item">
                                                    <a title="Products" href="{{ route('admin.products') }}">ຈັດການ
                                                        ສິນຄ້າ</a>
                                                </li>
                                                <li class="menu-item">
                                                    <a title="Categories" href="{{ route('admin.categories') }}">ຈັດການ
                                                        ປະເພດ</a>
                                                </li>
                                                <li class="menu-item">
                                                    <a title="Attributes"
                                                        href="{{ route('admin.attributes') }}">ຈັດການຄຸນລັກສະນະ
                                                        ສິນຄ້າ</a>
                                                </li>

                                                <li class="menu-item">
                                                    <a title="Orders"
                                                        href="{{ route('admin.orders') }}">ການຂາຍສິນຄ້າ</a>
                                                </li>

                                                <li class="menu-item">
                                                    <a href="{{ route('logout') }}"
                                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">ອອກຈາກລະບົບ</a>
                                                </li>
                                                <form id="logout-form" method="POST"
                                                    action="{{ route('logout') }}">
                                                    @csrf
                                                </form>
                                            </ul>
                                        </li>
                                        @else
                                            <li class="menu-item menu-item-has-children parent">
                                                <a title="" href="#">My Account
                                                    ({{ Auth::user()->name }})<i class="fa fa-angle-down"
                                                        aria-hidden="true"></i></a>
                                                <ul class="submenu curency">
                                                    <li class="menu-item">
                                                        <a title="My Profile"
                                                            href="{{ route('user.profile') }}">ໂປຣໄຟລ</a>
                                                    </li>
                                                    <li class="menu-item">
                                                        <a title="Dashboard"
                                                            href="{{ route('user.dashboard') }}">Dashboard</a>
                                                    </li>
                                                    <li class="menu-item">
                                                        <a title="My Orders"
                                                            href="{{ route('user.orders') }}">ປະຫວັດດການຊື່ສິນຄ້າ</a>
                                                    </li>
                                                    {{-- <li class="menu-item">
                                                        <a title="ChangePassword"
                                                            href="{{ route('user.changepassword') }}">ChangePassword</a>
                                                    </li> --}}
                                                    <li class="menu-item">
                                                        <a href="{{ route('logout') }}"
                                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">ອອກຈາກລະບົບ</a>
                                                    </li>
                                                    <form id="logout-form" method="POST"
                                                        action="{{ route('logout') }}">
                                                        @csrf
                                                    </form>
                                                </ul>
                                            </li>
                                        @endif
                                    @else
                                        <li class="menu-item"><a title="Register or Login"
                                                href="{{ route('login') }}">ເຂົ້າສູ່ລະບົບ</a></li>
                                        <li class="menu-item"><a title="Register or Login"
                                                href="{{ route('register') }}">ສະໝັກບັນຊີ</a></li>
                                    @endif

                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="container">
                        <div class="mid-section main-info-area">

                            <div class="wrap-logo-top left-section">
							<a href="/" class="link-to-home"><img src="{{asset('assets/images/logo1.jpg')}}" alt="mercado"></a>
						</div>

                            @livewire('header-search-component')

                            <div class="wrap-icon right-section">
                                @livewire('wishlist-count-component')

                                @livewire('cart-count-component')
                                <div class="wrap-icon-section show-up-after-1024">
                                    <a href="#" class="mobile-navigation">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="nav-section header-sticky">
                        <div class="header-nav-section">
                            {{-- <div class="container">
							<ul class="nav menu-nav clone-main-menu" id="mercado_haead_menu" data-menuname="Sale Info" >
								<li class="menu-item"><a href="#" class="link-term">Weekly Featured</a><span class="nav-label hot-label">hot</span></li>
								<li class="menu-item"><a href="#" class="link-term">Hot Sale items</a><span class="nav-label hot-label">hot</span></li>
								<li class="menu-item"><a href="#" class="link-term">Top new items</a><span class="nav-label hot-label">hot</span></li>
								<li class="menu-item"><a href="#" class="link-term">Top Selling</a><span class="nav-label hot-label">hot</span></li>
								<li class="menu-item"><a href="#" class="link-term">Top rated items</a><span class="nav-label hot-label">hot</span></li>
							</ul>
						</div> --}}
                        </div>

                        <div class="primary-nav-section">
                            <div class="container">
                                <ul class="nav primary clone-main-menu" id="mercado_main" data-menuname="Main menu">
                                    <li class="menu-item home-icon">
                                        <a href="/" class="link-term mercado-item-title"><i class="fa fa-home"
                                                aria-hidden="true"></i></a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="/" class="link-term mercado-item-title">ໜ້າຫຼັກ</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="/shop" class="link-term mercado-item-title">ຮ້ານຄ້າ</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="/cart" class="link-term mercado-item-title">ກະຕ່າ</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="/checkout" class="link-term mercado-item-title">ຊຳລະເງີນ</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="/contact-us" class="link-term mercado-item-title">ຕິດຕໍ່ພວກເຮົາ</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        {{ $slot }}

        @livewire('footer-component')

        <script src="{{ asset('assets/js/jquery-1.12.4.minb8ff.js?ver=1.12.4') }}"></script>
        <script src="{{ asset('assets/js/jquery-ui-1.12.4.minb8ff.js?ver=1.12.4') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.flexslider.js') }}"></script>
        <script src="{{ asset('assets/js/chosen.jquery.min.js') }}"></script>
        <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.countdown.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.sticky.js') }}"></script>
        <script src="{{ asset('assets/js/functions.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"
            integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"
            integrity="sha512-GDey37RZAxFkpFeJorEUwNoIbkTwsyC736KNSYucu1WJWFK9qTdzYub8ATxktr6Dwke7nbFaioypzbDOQykoRg=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.6.3/nouislider.min.js"
            integrity="sha512-EnXkkBUGl2gBm/EIZEgwWpQNavsnBbeMtjklwAa7jLj60mJk932aqzXFmdPKCG6ge/i8iOCK0Uwl1Qp+S0zowg=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
            integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

            <script>
                function printSection() {
        var printContent = document.getElementById('printSection').innerHTML;
        var originalContent = document.body.innerHTML;
        var images = document.querySelectorAll('.hide-img');
            images.forEach(function(image) {
                image.style.display = 'none';
            });

        document.body.innerHTML = printContent;
        window.print();
        document.body.innerHTML = originalContent;
        images.forEach(function(image) {
                image.style.display = '';
            });
    }
            </script>


        @livewireScripts

        @stack('scripts')
    </body>

    </html>
