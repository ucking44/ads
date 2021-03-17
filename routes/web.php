<?php

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
//     return view('welcome');
// });

use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', 'UsersController@index');
//Route::get('/state', 'StateController@fetch');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/searchlocation', 'UsersController@fetch')->name('searchlocation');

Route::post('/state', 'UsersController@cities')->name('state');

Route::post('/categories', 'UsersController@retrieve')->name('categories');

Route::get('/post-classified-ads', 'UsersController@posted')->name('post-classified-ads');

Route::get('/post-classified-ads/{maincategory}/{id}', 'UsersController@categories');//->name('maincategory');

Route::post('/postcars', 'UsersController@postcars')->name('postcars');

Route::get('/getAds', 'UsersController@getAds')->name('getAds');

Route::get('/viewAds/{maincategory}/{id}', 'UsersController@viewAds'); //->name('viewAds');

Route::post('/product/search', 'UsersController@searchProduct'); //->name('postcars');

Route::post('/search/advertisements', 'UsersController@searchAdvertisements');

Route::get('/product/view/{id}', 'UsersController@viewProduct');

