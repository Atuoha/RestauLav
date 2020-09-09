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

Route::group(['middleware'=>'admin'], function(){

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

Route::view('/admin/dashboard', 'accounts.admin.index')->name('admin_dashboard');
Route::view('/admin/profile', 'accounts.admin.profile.index')->name('admin.profile');


});






// Route for Unisharp filemanager
// Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
//     \UniSharp\LaravelFilemanager\Lfm::routes();
// });