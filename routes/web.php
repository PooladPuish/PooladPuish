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
Route::post('/users/RestPassword', 'UserController@RestPassword')->name('admin.user.RestPassword');

Auth::routes();
//HomeController
Route::get('/home', 'HomeController@index')->name('home')->middleware('checkUser');

Route::group(['middleware' => ['auth', 'web']], function () {
    //UserController
    Route::post('/user/update', 'UserController@update')->name('admin.user.update');
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
    Route::post('/role/update', 'RoleController@update')->name('admin.role.update');
    Route::get('/role/delete/{id?}', 'RoleController@delete')->name('admin.role.delete');
    Route::get('/permission', 'RoleController@permission')->name('admin.user.permission');
    Route::post('/permission/Pstore', 'RoleController@Pstore')->name('admin.permission.store');

    //AlternativesController
    Route::get('/alternatives/wizard', 'AlternativesController@wizard')->name('admin.user.alternatives');
    Route::post('/alternatives/store', 'AlternativesController@store')->name('admin.user.alternatives.store');
    Route::get('/alternatives/view', 'AlternativesController@view')->name('admin.user.alternatives.view');

    //DetailController
    Route::get('/detail/wizard/{id?}', 'DetailController@wizard')->name('admin.detail.wizard');
    Route::post('/detail/store', 'DetailController@store')->name('admin.detail.store');
    Route::post('/detail/update', 'DetailController@update')->name('admin.detail.update');


    //TestController
    Route::get('test', 'TestController@showDatatable');
    Route::post('demos/sortabledatatable', 'TestController@updateOrder');


});


