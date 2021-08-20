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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/about', 'staticpages\StaticPageController@about')->name('about');
Route::get('/{type}/{id}', 'catalog\CategoryController@index')->name('category');
Route::post('/search/result', 'catalog\SearchController@search')->name('search');
Auth::routes();

Route::group([
    'prefix' => 'admincp'], function () {
        Route::get('/', 'admin\Auth\LoginController@showLoginForm')->name('admin.login');
        
        Route::post('login', 'admin\Auth\LoginController@login')->name('admin.login.action');
        Route::post('logout', 'admin\Auth\LoginController@logout')->name('admin.logout');

        Route::group(['middleware' => ['admin.route.session']], function () {
            Route::get('admin/key/{session_id}', 'admin\IndexController@index')->name('admin.home');
        });
    });
