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

Route::get('/', function () {
    return view('index');
})->name('home_website');

Route::view('/unactive-account','home')->name('unactive-home');


Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=>'admin_only'], function(){

// ADMIN ROUTES 

    // ADMIN DASHBOARD ROUTE
Route::view('/admin/dashboard', 'accounts.admin.index')->name('admin_dashboard');
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
Route::get('/admin/profile', 'AdminUserController@profile')->name('admin.profile');

Route::get('/admin/profile/edit/{id}', 'AdminUserController@edit')->name('admin.profile.edit');
    // 

// END OF ADMIN ROUTES
});







Route::group(['middleware'=>'admin_user'], function(){

// USER ROUTES

    // USER DASHBOARD
Route::view('/user/dashboard', 'accounts.user.index')->name('user_dashboard');    
    // 

    // RESERVATION ROUTES
Route::resource('user/user_reserve', 'UserReservationController');
    //

    // DELETED/CANCELLED ROUTES
Route::resource('user/deleted_reserve', 'CancelledReservations');    
    // 

    // RESTORE -CANCELLED ROUTES
Route::get('user/deleted_reserve/retrieve/{id}', 'CancelledReservations@retrieve_cancelled')->name('deleted_reserve.retrieve');    
    // 

    // TERMINATE -CANCELLED ROUTES
Route::get('user/deleted_reserve/terminate/{id}', 'CancelledReservations@terminate_cancelled')->name('deleted_reserve.terminate');    
   // 

   // CONTACT ROUTES
Route::resource('/user/user_contact', 'UserContactController'); 
  //    

  //PROFILE ROUTES
Route::resource('user/user_profile', 'UserProfileController');
 // 


});

 











// Route for Unisharp filemanager
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});