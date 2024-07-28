<?php

use App\Http\Livewire\Admin\AdminAddManagementComponent;
use App\Http\Livewire\Admin\AdminEditManagementComponent;
use App\Http\Livewire\Admin\AdminManagementComponent;
use App\Http\Livewire\Admin\AdminReportCenterComponent;
use App\Http\Livewire\Admin\AdminReportOrderComponent;
use App\Http\Livewire\Admin\AdminReportPurchaseOrderComponent;
use App\Http\Livewire\Admin\AdminReportTopProductComponent;
use App\Http\Livewire\Admin\AdminUsersManageComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\ContactComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\User\UserOrdersDetailsComponent;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\SearchComponent;
use App\Http\Livewire\DetailsComponent;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\ThankyouComponent;
use App\Http\Livewire\WishlistComponent;
use App\Http\Livewire\Admin\AdminSaleComponent;
use App\Http\Livewire\User\UserOrdersComponent;
use App\Http\Livewire\Admin\AdminOrderComponent;
use App\Http\Livewire\Admin\AdminCouponsComponent;
use App\Http\Livewire\Admin\AdminProductComponent;
use App\Http\Livewire\User\UserDashboardComponent;
use App\Http\Livewire\Admin\AdminCategoryComponent;
use App\Http\Livewire\Admin\AdminAddCouponComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\AdminAddProductComponent;
use App\Http\Livewire\Admin\AdminEditCouponComponent;
use App\Http\Livewire\Admin\AdminHomeSliderComponent;
use App\Http\Livewire\Admin\AdminAddCategoryComponent;
use App\Http\Livewire\Admin\AdminEditProductComponent;
use App\Http\Livewire\Admin\AdminEditCategoryComponent;
use App\Http\Livewire\Admin\AdminHomeCategoryComponent;
use App\Http\Livewire\Admin\AdminOrderDetailsComponent;
use App\Http\Livewire\Admin\AdminAddHomeSliderComponent;
use App\Http\Livewire\Admin\AdminEditHomeSliderComponent;
use App\Http\Livewire\Admin\AdminSupplierComponent;
use App\Http\Livewire\Admin\AdminAddSupplierComponent;
use App\Http\Livewire\Admin\AdminEditSupplierComponent;
use App\Http\Livewire\User\UserReviewComponent;
use App\Http\Livewire\User\UserChangePasswordComponent;
use App\Http\Livewire\Admin\AdminContactComponent;
use App\Http\Livewire\Admin\AdminSettingComponent;
use App\Http\Livewire\User\UserProfileComponent;
use App\Http\Livewire\User\UserEditProfileComponent;
use App\Http\Livewire\Admin\AdminAttributesComponent;
use App\Http\Livewire\Admin\AdminAddAttributeComponent;
use App\Http\Livewire\Admin\AdminEditAttributeComponent;
use App\Http\Livewire\Admin\AdminPurchaseOrderComponent;
use App\Http\Livewire\Admin\AdminAddPurchaseOrderComponent;
use App\Http\Livewire\Admin\AdminPurchaseOrderDetailComponent;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
 //   return view('welcome');
//});

Route::get('/',HomeComponent::class);

Route::get('/shop',ShopComponent::class)->name('shop');;

Route::get('/cart',CartComponent::class)->name('products.cart');

Route::get('/checkout',CheckoutComponent::class)->name('checkout');

Route::get('/product/{slug}',DetailsComponent::class)->name('product.details');

Route::get('/product-category/{category_slug}/{scategory_slug?}',CategoryComponent::class)->name('product.category');

Route::get('/search',SearchComponent::class)->name('products.search');

Route::get('/wishlist', WishlistComponent::class)->name('products.wishlist');

Route::get('/thank-you', ThankyouComponent::class)->name('thankyou');

Route::get('/contact-us', ContactComponent::class)->name('contact');

//Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
//    Route::get('/dashboard', function () {
//        return view('dashboard');
//    })->name('dashboard');
//});

//User
Route::middleware(['auth:sanctum','verified'])->group(function () {
    Route::get('/user/dashboard',UserDashboardComponent::class)->name('user.dashboard');
    Route::get('/user/orders', UserOrdersComponent::class)->name('user.orders');
    Route::get('/user/orders/{order_id}', UserOrdersDetailsComponent::class)->name('user.orderdetails');
    Route::get('/user/review/{order_item_id}', UserReviewComponent::class)->name('user.review');
    Route::get('/user/change-password', UserChangePasswordComponent::class)->name('user.changepassword');
    Route::get('/user/profile', UserProfileComponent::class)->name('user.profile');
    Route::get('/user/profile/edit', UserEditProfileComponent::class)->name('user.editprofile');



});

//Admin
Route::middleware(['auth:sanctum','verified','authadmin'])->group(function () {
    Route::get('/admin/dashboard',AdminDashboardComponent::class)->name('admin.dashboard');
    Route::get('/admin/categories',AdminCategoryComponent::class)->name('admin.categories');
    Route::get('/admin/category/add',AdminAddCategoryComponent::class)->name('admin.addcategory');
    Route::get('/admin/category/edit/{category_slug}/{scategory_slug?}',AdminEditCategoryComponent::class)->name('admin.editcategory');
    Route::get('/admin/products',AdminProductComponent::class)->name('admin.products');
    Route::get('/admin/products/add',AdminAddProductComponent::class)->name('admin.addproduct');
    Route::get('/admin/products/edit/{product_slug}',AdminEditProductComponent::class)->name('admin.editproduct');
    Route::get('/admin/slider', AdminHomeSliderComponent::class)->name('admin.homeslider');
    Route::get('/admin/slider/add', AdminAddHomeSliderComponent::class)->name('admin.addhomeslider');
    Route::get('/admin/slider/edit/{slide_id}', AdminEditHomeSliderComponent::class)->name('admin.edithomeslider');

    Route::get('/admin/home-categories', AdminHomeCategoryComponent::class)->name('admin.homecategories');

    Route::get('/admin/sale', AdminSaleComponent::class)->name('admin.sale');

    Route::get('/admin/coupon', AdminCouponsComponent::class)->name('admin.coupons');
    Route::get('/admin/coupon/add', AdminAddCouponComponent::class)->name('admin.addcoupon');
    Route::get('/admin/coupon/edit/{coupon_id}', AdminEditCouponComponent::class)->name('admin.editcoupon');

    Route::get('/admin/orders', AdminOrderComponent::class)->name('admin.orders');
    Route::get('/admin/order/{order_id}', AdminOrderDetailsComponent::class)->name('admin.orderdetails');

    Route::get('/admin/suppliers', AdminSupplierComponent::class)->name('admin.suppliers');
    Route::get('/admin/suppliers/add', AdminAddSupplierComponent::class)->name('admin.addsupplier');
    Route::get('/admin/suppliers/edit', AdminEditSupplierComponent::class)->name('admin.editsupplier');

    Route::get('/admin/contact-us', AdminContactComponent::class)->name('admin.contact');

    Route::get('/admin/settings', AdminSettingComponent::class)->name('admin.settings');

    Route::get('/admin/attributes', AdminAttributesComponent::class)->name('admin.attributes');
    Route::get('/admin/attribute/add', AdminAddAttributeComponent::class)->name('admin.addattribute');
    Route::get('/admin/attribute/edit/{attribute_id}', AdminEditAttributeComponent::class)->name('admin.editattribute');

    Route::get('/admin/purchaseorder', AdminPurchaseOrderComponent::class)->name('admin.purchaseorder');
    Route::get('/admin/purchaseorder/add', AdminAddPurchaseOrderComponent::class)->name('admin.addpurchaseorder');
    Route::get('/admin/purchaseorderdetail/{purchaseorder_id}', AdminPurchaseOrderDetailComponent::class)->name('admin.purchaseorderdetail');

    Route::get('/admin/usersmanage', AdminUsersManageComponent::class)->name('admin.usersmanage');

    Route::get('/admin/reportcenter', AdminReportCenterComponent::class)->name('admin.reportcenter');
    Route::get('/admin/reporttopproduct', AdminReportTopProductComponent::class)->name('admin.reporttopproduct');
    Route::get('/admin/reportorder', AdminReportOrderComponent::class)->name('admin.reportorder');
    Route::get('/admin/reportpurchaseorder', AdminReportPurchaseOrderComponent::class)->name('admin.reportpurchaseorder');

    Route::get('/admin/management', AdminManagementComponent::class)->name('admin.management');
    Route::get('/admin/management/add', AdminAddManagementComponent::class)->name('admin.addmanagement');
    Route::get('/admin/management/edit/{management_id}', AdminEditManagementComponent::class)->name('admin.editmanagement');
});
