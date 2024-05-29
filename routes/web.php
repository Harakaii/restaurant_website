<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\checkAuthMiddleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Route::get('/', function () {
//     return view('home');
// });
Route::get('/', [App\Http\Controllers\FrontEndController::class, 'index']);
Route::get('/contact', [App\Http\Controllers\FrontEndController::class, 'contact']);
Route::get('/about', [App\Http\Controllers\FrontEndController::class, 'about']);
Route::get('/offers', [App\Http\Controllers\FrontEndController::class, 'offers']);
Route::get('/help', [App\Http\Controllers\FrontEndController::class, 'help']);
Route::get('/category/dish/show/{category_id}', [App\Http\Controllers\FrontEndController::class, 'dish_show'])->name('category_dish');
Route::post('add/card', [App\Http\Controllers\cartController::class, 'insert'])->name('add_to_card');
Route::get('card/show', [App\Http\Controllers\cartController::class, 'show'])->name('cart_show');
Route::get('/remove_item/{id}', [App\Http\Controllers\cartController::class, 'destroy'])->name('remove_item');
Route::post('/update', [App\Http\Controllers\cartController::class, 'update'])->name('update_cart');
/*=================== coupon apply =============*/

// Route::post('/coupon-apply','CouponController@apply')->name('coupon_apply');

Route::post('/coupon-apply', [App\Http\Controllers\CouponCotroller::class, 'apply'])->name('coupon_apply');


////////////////////////Admin here///////////////////////
// ==================================================checkout ==================================================//
Route::get('/checkout/payment', [App\Http\Controllers\CheckOutController::class, 'payment'])->name('check_out_payment');
Route::post('/checkout/new/order', [App\Http\Controllers\CheckOutController::class, 'order'])->name('new_order');
Route::get('/checkout/order/complete', [App\Http\Controllers\CheckOutController::class, 'complete'])->name('order_complete');

// stripe 
Route::get('/stipe-payment', [App\Http\Controllers\StripeController::class, 'handleGet']);
Route::post('/stipe-payment', [App\Http\Controllers\StripeController::class, 'handlePost'])->name('stripe.payment');

// ==================================================checkout end==================================================//


// ==================================================customer start  ==================================================//
Route::get('/register/customer', [App\Http\Controllers\CustomerController::class, 'show'])->name('sign_up');
Route::post('/register/customer/store', [App\Http\Controllers\CustomerController::class, 'store'])->name('store_customer');
Route::get('/login/customer/', [App\Http\Controllers\CustomerController::class, 'login'])->name('login_in');
Route::post('/logout/customer/', [App\Http\Controllers\CustomerController::class, 'logout'])->name('log_out');
Route::post('/login/customer/login', [App\Http\Controllers\CustomerController::class, 'check'])->name('Check_login');

Route::get('/shipping', [App\Http\Controllers\CustomerController::class, 'shipping']);;
Route::post('/shipping/store', [App\Http\Controllers\CustomerController::class, 'save'])->name('store_shipping');


// ==================================================customer end==================================================//



// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Auth::routes();

  //Report routes

  Route::get('/report', [App\Http\Controllers\ReportController::class, 'bookingReport'])->name('booking_report');

Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('category')->middleware([checkAuthMiddleware::class])->group(function(){
// ==================================================category start==================================================//

Route::get('/add',[App\Http\Controllers\categoryController::class, 'index'])->name('show_cate_table');
Route::post('/save',[App\Http\Controllers\categoryController::class, 'save'])->name('cate_save');
Route::get('/manage',[App\Http\Controllers\categoryController::class, 'manage'])->name('manage_cate');
Route::get('/active/{category_id}',[App\Http\Controllers\categoryController::class, 'active'])->name('category_active');
Route::get('/Inactive/{category_id}',[App\Http\Controllers\categoryController::class, 'Inactive'])->name('Inactive_cate');
Route::get('/delete/{category_id}',[App\Http\Controllers\categoryController::class, 'delete'])->name('cate_delete');
Route::post('/update/{category_id}',[App\Http\Controllers\categoryController::class, 'update'])->name('cate_update');

// ==================================================category End==================================================//

});
Route::prefix('delivery')->middleware([checkAuthMiddleware::class])->group(function(){
// ==================================================Dilivery Start==================================================//


Route::get('/boy/add',[App\Http\Controllers\deliverBoyControlller::class, 'index'])->name('show_delivery_add_table');
Route::post('/save',[App\Http\Controllers\deliverBoyControlller::class, 'save'])->name('delivery_save');
Route::get('/manage',[App\Http\Controllers\deliverBoyControlller::class, 'delivery_manage'])->name('manage_delivery');
Route::get('/active/{delevery_boy_id}',[App\Http\Controllers\deliverBoyControlller::class, 'active'])->name('delivery_active');
Route::get('/Inactive/{delevery_boy_id}',[App\Http\Controllers\deliverBoyControlller::class, 'Inactive'])->name('Inactive_delivery');
Route::get('/delete/{delevery_boy_id}',[App\Http\Controllers\deliverBoyControlller::class, 'delete'])->name('delivery_delete');
Route::post('/update/{delevery_boy_id}',[App\Http\Controllers\deliverBoyControlller::class, 'update'])->name('delivery_update');


// ==================================================Dilivery End==================================================//

});
// ------------------------------------------------------------------------------------------------------------------------------------

Route::prefix('coupon')->middleware([checkAuthMiddleware::class])->group(function(){
// ==================================================Coupon Start==================================================//

Route::get('/coupon/add',[App\Http\Controllers\CouponCotroller::class, 'index'])->name('show_add_coupon_table');
Route::post('/coupon/save',[App\Http\Controllers\CouponCotroller::class, 'save'])->name('coupon_save');
Route::get('/coupon/manage',[App\Http\Controllers\CouponCotroller::class, 'coupon_manage'])->name('manage_coupon');
Route::get('/coupon/active/{coupon_id}',[App\Http\Controllers\CouponCotroller::class, 'active'])->name('coupon_active');
Route::get('/coupon/Inactive/{coupon_id}',[App\Http\Controllers\CouponCotroller::class, 'Inactive'])->name('Inactive_coupon');
Route::get('/coupon/delete/{coupon_id}',[App\Http\Controllers\CouponCotroller::class, 'delete'])->name('coupon_delete');
Route::post('/coupon/update/{coupon_id}',[App\Http\Controllers\CouponCotroller::class, 'update'])->name('coupon_update');
// ==================================================Coupon End==================================================//


});
// ------------------------------------------------------------------------------------------------------------------------------------

Route::prefix('dish')->middleware([checkAuthMiddleware::class])->group(function(){
// ==================================================Dish Start==================================================//
Route::get('/add',[App\Http\Controllers\DishController::class, 'index'])->name('show_add_dish_table');
Route::post('/save',[App\Http\Controllers\DishController::class, 'save'])->name('dish_save');
Route::get('/manage',[App\Http\Controllers\DishController::class, 'dish_manage'])->name('manage_dish');
Route::get('/active/{dish_id}',[App\Http\Controllers\DishController::class, 'active'])->name('dish_active');
Route::get('/Inactive/{dish_id}',[App\Http\Controllers\DishController::class, 'Inactive'])->name('Inactive_dish');
Route::get('/delete/{dish_id}',[App\Http\Controllers\DishController::class, 'delete'])->name('dish_delete');
Route::post('/update/{dish_id}',[App\Http\Controllers\DishController::class, 'update'])->name('dish_update');
// ==================================================Dish End==================================================//

});
// Route::prefix('category')->group(function(){

// });

// ------------------------------------------------------------------------------------------------------------------------------------

// ==================================================Order ==================================================//
Route::get('/order/manage',[App\Http\Controllers\OrderController::class, 'manage'])->name('show_order');
Route::get('/view/order/detail/{order_id}',[App\Http\Controllers\OrderController::class, 'viewOrder'])->name('view_order');
Route::get('/view/order/invoice/{order_id}',[App\Http\Controllers\OrderController::class, 'viewInvoice'])->name('view_invoice');
Route::get('/downloard/order/invoice/{order_id}',[App\Http\Controllers\OrderController::class, 'downloadInvoice'])->name('download_order_invoice');

// Route::get('/view/order/invoice/{order_id}',[App\Http\Controllers\OrderController::class, 'viewInvoice'])->name('view_invoice')->middleware('web');

Route::get('/order/delete/{order_id}',[App\Http\Controllers\OrderController::class, 'deleteOrder'])->name('delete_order');
