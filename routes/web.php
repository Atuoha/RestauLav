<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('index');
// })->name('home_website');

Route::get('/', 'IndexPageController@index')->name('home_website');
Route::get('/dish/{slug}', 'IndexPageController@single_page')->name('single');

Route::view('/unactive-account','home')->name('unactive-home');


Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');









// ADMIN ROUTES --------------------------------------------------------------------------------------------
Route::group(['middleware'=>'admin_only'], function(){

    // ADMIN DASHBOARD ROUTE
Route::get('/admin/dashboard', 'AdminDashboardController@index')->name('admin_dashboard');
    // 

    // ADMIN USER ROUTES
Route::resource('/admin/users', 'AdminUserController');
    // 

    // PHOTO ROUTES
Route::resource('/admin/photos', 'PhotoController');    
    // 

    // CATEGORY ROUTES
Route::resource('/admin/categories', 'CategoryController');    
    //

    // MEDIA ROUTES
Route::resource('/admin/medias', 'PhotoController');    
    // 

    // DISH ROUTES
Route::resource('/admin/dishes', 'DishController');    
    // 

    // DELETED DISHES ROUTE
Route::resource('dishes/deleted', 'DeletedDishController');    
    // 

    // RESTORE DELETED DISHES ROUTE
Route::get('/deleted/restore/{id}', 'DeletedDishController@restore_dishes')->name('deleted.restore');
    // 

    // TERMINATE DELETED DISHES ROUTE
Route::get('/deleted/terminate/{id}', 'DeletedDishController@terminate_dishes')->name('deleted.terminate');
    // 

    // PROFILE ROUTES 
Route::resource('/admin/admin_profile', 'AdminProfileController');
 // 


    // CONTACT ROUTES
Route::resource('admin/admin_contact', 'AdminContactController');    
    // 

    // TESTIMONY ROUTES
Route::resource('admin/admin_testimonies', 'AdminTestimonyController');  
    //

    // ORDERS ROUTES
Route::resource('admin/admin_orders', 'AdminOrdersController');    
    //


    // DELETED/CANCELLED  ORDERS ROUTES
Route::resource('admin/admin_deleted_orders', 'AdminDeletedOrdersController');    
// 

// RESTORE  ORDERS -CANCELLED ROUTES
Route::get('admin/admin_deleted_orders/retrieve/{id}', 'AdminDeletedOrdersController@retrieve_deleted')->name('admin_deleted_orders.retrieve');    
// 

// TERMINATE  ORDERS -CANCELLED ROUTES
Route::get('admin/admin_deleted_orders/terminate/{id}', 'AdminDeletedOrdersController@terminate_deleted')->name('admin_deleted_orders.terminate');    
// 



// RESERVATION ROUTES
Route::resource('admin/admin_reserve', 'AdminReservationController');
// 


// DELETED/CANCELLED  RESERVATION ROUTES
Route::resource('admin/admin_deleted_reserve', 'AdminCancelledReservations');    
// 

    // RESTORE  RESERVATION -CANCELLED ROUTES
Route::get('admin/admin_deleted_reserve/retrieve/{id}', 'AdminCancelledReservations@retrieve_cancelled')->name('admin_deleted_reserve.retrieve');    
    // 

    // TERMINATE  RESERVATION -CANCELLED ROUTES
Route::get('admin/admin_deleted_reserve/terminate/{id}', 'AdminCancelledReservations@terminate_cancelled')->name('admin_deleted_reserve.terminate');    
   // 



});

// END OF ADMIN ROUTES --------------------------------------------------------------------------------------------------------------------



















// USER ROUTES -------------------------------------------------------------------------------------------------------------------
Route::group(['middleware'=>'admin_user'], function(){



    // USER DASHBOARD
Route::get('/user/dashboard', 'UserDashboardController@index')->name('user_dashboard');    
    // 

    // RESERVATION ROUTES
Route::resource('user/user_reserve', 'UserReservationController');
    //

    // DELETED/CANCELLED  RESERVATION ROUTES
Route::resource('user/deleted_reserve', 'UserCancelledReservations');    
    // 

    // RESTORE  RESERVATION -CANCELLED ROUTES
Route::get('user/deleted_reserve/retrieve/{id}', 'UserCancelledReservations@retrieve_cancelled')->name('deleted_reserve.retrieve');    
    // 

    // TERMINATE  RESERVATION -CANCELLED ROUTES
Route::get('user/deleted_reserve/terminate/{id}', 'UserCancelledReservations@terminate_cancelled')->name('deleted_reserve.terminate');    
   // 

   // CONTACT ROUTES
Route::resource('/user/user_contact', 'UserContactController'); 
  //    

  //PROFILE ROUTES
Route::resource('user/user_profile', 'UserProfileController');
 // 

  //TESTIMONY ROUTES
Route::resource('user/user_testimonies', 'UserTestimonyController');
 // 

 //ORDERS ROUTES
Route::resource('user/user_orders', 'UserOrdersController'); 
 //  

    // DELETED/CANCELLED  ORDERS ROUTES
Route::resource('user/deleted_orders', 'UserDeletedOrdersController');    
// 

// RESTORE  ORDERS -CANCELLED ROUTES
Route::get('user/deleted_orders/retrieve/{id}', 'UserDeletedOrdersController@retrieve_deleted')->name('deleted_orders.retrieve');    
// 

// TERMINATE  ORDERS -CANCELLED ROUTES
Route::get('user/deleted_orders/terminate/{id}', 'UserDeletedOrdersController@terminate_deleted')->name('deleted_orders.terminate');    
// 


 //PAYPAL ROUTES ------------------------------------------------------------------------------
 Route::post('payment', 'PayPalController@payment')->name('payment');
 Route::get('cancel', 'PayPalController@cancel')->name('payment.cancel');
 Route::get('payment/success', 'PayPalController@success')->name('payment.success'); 
 Route::view('payment/status/success', 'accounts.user.orders.success');
 Route::view('payment/status/failure', 'accounts.user.orders.failure');
 Route::view('/payment/status/cancel', 'accounts.user.orders.cancel_payment');
 //
 

// MULTI DELETES

// CONTACTS
Route::delete('/delete/contact', 'UserContactController@multi_delete');
// 


// ORDERS
Route::delete('/delete/orders', 'UserOrdersController@multi_delete');

Route::put('/action/orders', 'UserDeletedOrdersController@multi_action');
// 



// RESERVATIONS
Route::delete('/delete/reserve', 'UserReservationController@multi_delete');

Route::put('/action/reserve', 'UserCancelledReservationsController@multi_action');

// 



// TESTIMONIES
Route::delete('/delete/testimony', 'UserTestimonyController@multi_delete');
// 


// 

});
// END OF USER ROUTES ------------------------------------------------------------------------------------------------------------------------
 











// Route for Unisharp filemanager
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});