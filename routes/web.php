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
            
            Route::group([
                'prefix' => 'user'], function () {
                    Route::get('user_grid/key/{session_id}', 'admin\adminuser\AdminUserGridController@index')->name('admin.user.grid');

                    Route::get('user/create/new/key/{session_id}', 'admin\adminuser\NewUserController@index')->name('admin.user.create');

                    Route::post('user/create/new/key/{session_id}', 'admin\adminuser\NewUserController@store');
                    
                    Route::get('details/id/{user_id}/new/key/{session_id}', 'admin\adminuser\AdminUserController@index')->name('admin.user.details');
                    
                    Route::post('details/id/{user_id}/new/key/{session_id}', 'admin\adminuser\AdminUserController@updateUser');
                    
                    Route::get('delete/id/{user_id}/new/key/{session_id}', 'admin\adminuser\AdminUserController@deleteUser')->name('admin.user.delete');

                    Route::get('permission/key/{session_id}', 'admin\adminuser\rolepermission\RolepermissionController@permisionGrid')->name('admin.user.permission');

                    Route::get('roles/key/{session_id}', 'admin\adminuser\rolepermission\RolepermissionController@rolesGrid')->name('admin.user.roles');

                    Route::get('roles/add/key/{session_id}', 'admin\adminuser\rolepermission\RolepermissionController@rolesCreateForm')->name('admin.role.add');

                    Route::post('roles/add/key/{session_id}', 'admin\adminuser\rolepermission\RolepermissionController@rolesCreate');

                    Route::get('roles/id/{role_id}/details/key/{session_id}', 'admin\adminuser\rolepermission\RolepermissionController@rolesDetails')->name('admin.role.details');

                    Route::post('roles/id/{role_id}/details/key/{session_id}', 'admin\adminuser\rolepermission\RolepermissionController@rolesUpdate');

                });
        });
    });
