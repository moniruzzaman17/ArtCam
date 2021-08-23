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
            Route::group([
                'prefix' => 'config'], function () {
                    Route::get('details/key/{session_id}', 'admin\config\ConfigController@index')->name('admin.config');
                    Route::post('details/key/{session_id}', 'admin\config\ConfigController@save');
                });
            Route::group([
                'prefix' => 'catalog'], function () {
                    Route::get('product_grid/key/{session_id}', 'admin\catalog\ProductController@index')->name('admin.product.grid');

                    Route::get('add_product/key/{session_id}', 'admin\catalog\ProductController@addProduct')->name('admin.product.add');

                    //         // update product route
                    Route::get('add/product/new/key/{session_id}', 'admin\catalog\ProductController@showAddProductForm')->name('admin.product.add');

                    Route::post('add/product/new/key/{session_id}', 'admin\catalog\ProductController@addNewProduct');

                    Route::get('product/delete/{id}/key/{session_id}', 'admin\catalog\ProductController@deleteProduct')->name('admin.product.delete');


                    Route::get('update_product/id/{id}/key/{session_id}', 'admin\catalog\ProductController@showUpdateProductForm')->name('admin.product.update');
                    Route::post('update_product/id/{id}/key/{session_id}', 'admin\catalog\ProductController@updateProduct');

                    Route::get('category/key/{session_id}', 'admin\catalog\category\CategoryController@index')->name('admin.category.details');

                    Route::post('category/root/add/key/{session_id}', 'admin\catalog\category\CategoryController@addRootCategory')->name('admin.rootcategory.add');

                    Route::post('category/root/update/key/{session_id}', 'admin\catalog\category\CategoryController@updateCategory')->name('admin.category.update');

                    Route::post('subcategory/update/key/{session_id}', 'admin\catalog\category\CategoryController@updateSubCategory')->name('admin.subcategory.update');

                    Route::post('subcategory/add/key/{session_id}', 'admin\catalog\category\CategoryController@addSubCategory')->name('admin.subcategory.add');
                });
        });
});

Route::post('/sort/mother/category', 'admin\catalog\category\CategoryController@sortMotherCat');

Route::post('/category/status/change/disable', 'admin\catalog\category\CategoryController@changeVisibilityDisable');

Route::post('/category/status/change/enable', 'admin\catalog\category\CategoryController@changeVisibilityEnable');

Route::post('/category/delete', 'admin\catalog\category\CategoryController@deleteCategory');

Route::get('/category/details/{catID}', 'admin\catalog\category\CategoryController@showCategoryDetail');



Route::post('/sort/sub/category', 'admin\catalog\category\CategoryController@sortSubCat');

Route::get('/subcategory/details/{subCatID}', 'admin\catalog\category\CategoryController@showSubCategoryDetail');

Route::post('/subcategory/status/change/disable', 'admin\catalog\category\CategoryController@changeSubVisibilityDisable');

Route::post('/subcategory/status/change/enable', 'admin\catalog\category\CategoryController@changeSubVisibilityEnable');

Route::post('/subcategory/delete', 'admin\catalog\category\CategoryController@deleteSubCategory');

Route::get('/download/raw/file', 'download\DownloadController@index');