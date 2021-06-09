<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// use App\Http\Controllers\HomeController;
// use App\Http\Controllers\CategoryController;
// uncomment namespace controller di RouteServiceProvider

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something ngreat!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'Client\FrontController@index')->name('front.index');
Route::get('/products', 'Client\FrontController@products')->name('front.products');
Route::get('/products/category/{slug}', 'Client\FrontController@categoryProduct')->name('front.category');

Auth::routes();

//membuat grouping route, semua route dalam url /admin
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    //resource terdiri dari 7 route default bawaan
    //Route::get('/category', 'CategoryController@index')->name('category.index');
    //Route::post('/category', 'CategoryController@store')->name('category.store');
    //Route::get('/category/{category_id}/edit', 'CategoryController@edit')->name('category.edit');
    //Route::put('/category/{category_id}', 'CategoryController@update')->name('category.update');
    //Route::delete('/category/{category_id}', 'CategoryController@destroy')->name('category.destroy');
    //Route::get('/category/{category_id}', 'CategoryController@show')->name('category.show');
    //Route::get('/category/create', 'CategoryController@create')->name('category.create');
    //namun akan mengecualikan tidak menggunakan create dan show, maka
    Route::resource('category', 'CategoryController')->except(['create', 'show']);
    Route::resource('product', 'ProductController');
});
