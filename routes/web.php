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

Route::get('/', function () {
    return view('auth.login');
});




//RestPasswordUser
Route::post('/users/RestPassword', 'RestPasswordController@RestPassword')->name('admin.user.RestPassword');

Auth::routes();
//HomeController
Route::get('/home', 'HomeController@index')->name('home')->middleware('checkUser');

Route::group(['middleware' => ['auth', 'web']], function () {
    Route::group(["namespace" => "Users"], function () {
        //UserController
        Route::post('/user/update', 'UserController@update')->name('admin.user.update');
        Route::get('/user/u/{id?}', 'UserController@u')->name('admin.user.u');
        Route::post('/user/reset', 'UserController@reset')->name('admin.user.reset.pass');
        Route::post('/user/avatar', 'UserController@avatar')->name('admin.user.avatar');
        Route::post('/user/store', 'UserController@store')->name('admin.user.store');
        Route::get('/user/wizard/{id?}', 'UserController@wizard')->name('admin.user.wizard');
        Route::get('/user/profile', 'UserController@profile')->name('admin.user.profile');
        Route::get('/user/show', 'UserController@show')->name('admin.user.show');
        Route::get('/user/disable/{id?}', 'UserController@disable')->name('admin.user.disable');
        Route::get('/user/edit/{id?}', 'UserController@edit')->name('admin.user.edit');
        Route::post('/users/update', 'UserController@updates')->name('admin.user.updates');
        Route::get('/users/lock', 'UserController@lock')->name('admin.user.lock');
        Route::get('/users/system/stop', 'UserController@stop')->name('admin.users.system.stop');
        Route::get('/users/system/start', 'UserController@start')->name('admin.users.system.start');

        //RoleController
        Route::get('/role/wizard', 'RoleController@wizard')->name('admin.role.wizard');
        Route::post('/role/store', 'RoleController@store')->name('admin.role.store');
        Route::get('/role/show', 'RoleController@show')->name('admin.role.show');
        Route::get('/role/edit/{id?}', 'RoleController@edit')->name('admin.role.edit');
        Route::get('/role/copy/{id?}', 'RoleController@copy')->name('admin.role.copy');
        Route::post('/role/update', 'RoleController@update')->name('admin.role.update');
        Route::post('/role/uCopy', 'RoleController@uCopy')->name('admin.role.uCopy');
        Route::delete('/role/delete/{id?}', 'RoleController@delete')->name('admin.role.delete');
        Route::get('/permission/{id?}', 'RoleController@permission')->name('admin.user.permission');
        Route::post('/permission/Pstore', 'RoleController@Pstore')->name('admin.permission.store');
        Route::delete('/permission/Pdelete/{id?}', 'RoleController@Pdelete')->name('admin.permission.delete');
        Route::get('/permission/update/{id?}', 'RoleController@Pupdate')->name('admin.permission.update');


        //AlternativesController
        Route::get('/alternatives/wizard', 'AlternativesController@wizard')->name('admin.user.alternatives');
        Route::post('/alternatives/store', 'AlternativesController@store')->name('admin.user.alternatives.store');
        Route::get('/alternatives/view', 'AlternativesController@view')->name('admin.user.alternatives.view');
        Route::get('/alternatives/update/{id?}', 'AlternativesController@update')->name('admin.alternatives.update');
        Route::get('/alternatives/user', 'AlternativesController@user')->name('admin.alternatives.user');
        Route::delete('/alternatives/delete/{id?}', 'AlternativesController@delete')->name('admin.alternatives.delete');

    });
    Route::group(["namespace" => "Foundation"], function () {

        //ModelProductController
        Route::get('/modelProduct/list', 'ModelProductController@list')->name('admin.model.product.list');
        Route::get('/modelProduct/update/{id?}', 'ModelProductController@update')->name('admin.model.product.update');
        Route::delete('/modelProduct/delete/{id?}', 'ModelProductController@delete')->name('admin.model.product.delete');
        Route::post('/modelProduct/store', 'ModelProductController@store')->name('admin.model.product.store');


        //InsertController
        Route::get('/insert/list', 'InserController@list')->name('admin.insert.list');
        Route::get('/insert/update/{id?}', 'InserController@update')->name('admin.insert.update');
        Route::delete('/insert/delete/{id?}', 'InserController@delete')->name('admin.insert.delete');
        Route::post('/insert/store', 'InserController@store')->name('admin.insert.store');


        //BomController
        Route::get('/bom/list', 'BomController@list')->name('admin.bom.list');
        Route::get('/bom/update/{id?}', 'BomController@update')->name('admin.bom.update');
        Route::get('/bom/detail/{id?}', 'BomController@detail')->name('admin.bom.detail');
        Route::delete('/bom/delete/{id?}', 'BomController@delete')->name('admin.bom.delete');
        Route::post('/bom/store', 'BomController@store')->name('admin.bom.store');
        Route::post('/store/bom', 'BomController@bom')->name('admin.bom.store.bom');
        Route::delete('/bom/deletep/{id?}', 'BomController@deletep')->name('admin.bom.deletep');
        Route::get('/bom/list/select', 'BomController@filter')->name('admin.bom.filter');


        //CommodityController
        Route::get('/commodity/list', 'CommodityController@list')->name('admin.commodity.list');
        Route::get('/commodity/update/{id?}', 'CommodityController@update')->name('admin.commodity.update');
        Route::delete('/commodity/delete/{id?}', 'CommodityController@delete')->name('admin.commodity.delete');
        Route::post('/commodity/store', 'CommodityController@store')->name('admin.commodity.store');
        Route::post('/commodity/edit', 'CommodityController@edit')->name('admin.commodity.edit');

        //ProductCharacteristicController
        Route::get('/ProductCharacteristic/list', 'ProductCharacteristicController@list')->name('admin.ProductCharacteristic.list');
        Route::get('/ProductCharacteristic/update/{id?}', 'ProductCharacteristicController@update')->name('admin.ProductCharacteristic.update');
        Route::delete('/ProductCharacteristic/delete/{id?}', 'ProductCharacteristicController@delete')->name('admin.ProductCharacteristic.delete');
        Route::post('/ProductCharacteristic/store', 'ProductCharacteristicController@store')->name('admin.ProductCharacteristic.store');
        Route::post('/ProductCharacteristic/edit', 'ProductCharacteristicController@edit')->name('admin.ProductCharacteristic.edit');
        Route::get('/ProductCharacteristic/delete/{id?}', 'ProductCharacteristicController@delete')->name('admin.ProductCharacteristic.delete');

        //ProductController
        Route::get('/Product/list', 'ProductController@list')->name('admin.product.list');
        Route::get('/Product/update/{id?}', 'ProductController@update')->name('admin.product.update');

        Route::get('/Product/list/select', 'ProductController@getcharacteristic')->name('admin.list.product');
        Route::post('/Product/store', 'ProductController@store')->name('admin.Product.store');
        Route::post('/Product/edit', 'ProductController@edit')->name('admin.Product.edit');
        Route::delete('/Product/delete/{id?}', 'ProductController@delete')->name('admin.Product.delete');

        //ModelController
        Route::get('/model/list', 'ModelController@list')->name('admin.models.list');
        Route::get('/model/update/{id?}', 'ModelController@update')->name('admin.models.update');
        Route::delete('/model/delete/{id?}', 'ModelController@delete')->name('admin.models.delete');
        Route::post('/model/store', 'ModelController@store')->name('admin.models.store');
        Route::post('/model/edit', 'ModelController@edit')->name('admin.models.edit');

        //DeviceController
        Route::get('/device/list', 'DeviceController@list')->name('admin.device.list');
        Route::post('/device/store', 'DeviceController@store')->name('admin.device.store');
        Route::get('/device/update/{id?}', 'DeviceController@update')->name('admin.device.update');
        Route::post('/device/edit', 'DeviceController@edit')->name('admin.device.edit');
        Route::get('/device/delete/{id?}', 'DeviceController@delete')->name('admin.device.delete');
        Route::delete('/device/delete/{id?}', 'DeviceController@delete')->name('admin.device.delete');

        //ColorController
        Route::get('/color/list', 'ColorController@list')->name('admin.color.list');
        Route::post('/color/store', 'ColorController@store')->name('admin.color.store');
        Route::post('/color/edit', 'ColorController@edit')->name('admin.color.edit');
        Route::delete('/color/delete/{id?}', 'ColorController@delete')->name('admin.color.delete');
        Route::get('/color/update/{id?}', 'ColorController@update')->name('admin.color.update');

        //FormatController
        Route::get('/format/list', 'FormatController@list')->name('admin.format.list');
        Route::get('/format/update/{id?}', 'FormatController@update')->name('admin.format.update');
        Route::post('/format/store', 'FormatController@store')->name('admin.format.store');
        Route::post('/format/edit', 'FormatController@edit')->name('admin.format.edit');
        Route::delete('/format/delete/{id?}', 'FormatController@delete')->name('admin.format.delete');

        //PolymericController
        Route::get('/polymeric/list', 'PolymericController@list')->name('admin.polymeric.list');
        Route::post('/polymeric/store', 'PolymericController@store')->name('admin.polymeric.store');
        Route::post('/polymeric/edit', 'PolymericController@edit')->name('admin.polymeric.edit');
        Route::get('/polymeric/delete/{id?}', 'PolymericController@delete')->name('admin.polymeric.delete');
        Route::get('/polymeric/update/{id?}', 'PolymericController@update')->name('admin.polymeric.update');
        Route::delete('/polymeric/delete/{id?}', 'PolymericController@delete')->name('admin.polymeric.delete');

        //SellerController
        Route::get('/seller/list', 'SellerController@list')->name('admin.seller.list');
        Route::post('/seller/store', 'SellerController@store')->name('admin.seller.store');
        Route::post('/seller/edit', 'SellerController@edit')->name('admin.seller.edit');
        Route::get('/seller/delete/{id?}', 'SellerController@delete')->name('admin.seller.delete');
        Route::get('/seller/update/{id?}', 'SellerController@update')->name('admin.seller.update');
        Route::delete('/seller/delete/{id?}', 'SellerController@delete')->name('admin.seller.delete');

    });
    Route::group(["namespace" => "Customer"], function () {

        //TypeCustomer
        Route::get('/customer/index', 'TypeCustomer@index')->name('admin.customer.type');
        Route::post('/customer/store', 'TypeCustomer@store')->name('admin.customer.store');
        Route::get('/customer/update/{id?}', 'TypeCustomer@update')->name('admin.customer.update');
        Route::delete('/customer/delete/{id?}', 'TypeCustomer@delete')->name('admin.customer.delete');

        //Customer
        Route::get('/customers/index', 'CustomerController@index')->name('admin.customers.index');
        Route::get('/customers/wizard', 'CustomerController@wizard')->name('admin.customers.wizard');
        Route::post('/customers/store', 'CustomerController@store')->name('admin.customers.store');
        Route::post('/customers/edit', 'CustomerController@edit')->name('admin.customers.edit');
        Route::get('/customers/update/{id?}', 'CustomerController@update')->name('admin.customers.update');
        Route::get('/customers/filter', 'CustomerController@filter')->name('admin.customers.filter');
        Route::delete('/customers/delete/{id?}', 'CustomerController@delete')->name('admin.customers.delete');



    });
});


