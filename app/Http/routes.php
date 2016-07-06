<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('auth/login');
});

/* route login */
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

/* route dash */
Route::get('dashboard',  [ 'as' => 'dash',
    'middleware' => 'auth', 'uses' => 'DashController@index']);

/* Routes Donors */
Route::get('donor', ['as' => 'list.donor',
    'middleware' =>'auth', 'uses' => 'DonorController@index']);

Route::get('new/donor', ['as' => 'new.donor',
    'middleware' => 'auth','uses' => 'DonorController@create']);

Route::post('new/donor', ['as' => 'create.donor',
    'middleware' =>'auth', 'uses' => 'DonorController@store']);

Route::get('edit/donor/{id}', ['as' => 'edit.donor',
    'middleware' =>'auth', 'uses' => 'DonorController@edit']);

Route::put('update/donor/{id}', ['as' => 'update.donor',
    'middleware' =>'auth', 'uses' => 'DonorController@update']);

Route::put('delete/donor/{id}', ['as' => 'delete.donor',
    'middleware' =>'auth', 'uses' => 'DonorController@destroy']);

Route::put('activate/donor/{id}', ['as' => 'activate.donor',
    'middleware' =>'auth', 'uses' => 'DonorController@activate']);

/* Routes Units */

Route::get('unit/list', ['middleware' => 'auth', 'as' => 'unit.list', 'uses' => 'UnitController@index']);
Route::get('unit/new', ['middleware' => 'auth', 'as' => 'unit.new', 'uses' => 'UnitController@newUnit']);
Route::post('unit/new', ['middleware' => 'auth', 'as' => 'unit.create', 'uses' => 'UnitController@newCreate']);
Route::get('unit/sales', ['middleware' => 'auth', 'as' => 'unit.sales', 'uses' => 'UnitController@create']);
Route::post('unit/sales', ['middleware' => 'auth', 'as' => 'unit.createS', 'uses' => 'UnitController@store']);


/* other routes */
Route::get('search/group', ['middleware' => 'auth', 'as' => 'search.group', 'uses' => 'SearchController@create']);
Route::get('search', ['middleware' => 'auth', 'as' => 'search', 'uses' => 'SearchController@store']);
Route::get('example/{id}', ['middleware' => 'auth', 'as' => 'example', 'uses' => 'UnitController@example']);

/* Route Warehouse */
Route::get('warehouse', function(){
    $id = Input::get('option');

    $freezer = \App\Freezer::where('warehouse_id', $id)->where('status_delete','Activo');
    return $freezer->lists('name', 'id');
});
Route::get('warehouse/new', ['middleware' => 'auth', 'as' => 'warehouse.new', 'uses' => 'WareHouseController@create']);
Route::post('warehouse/new', ['middleware' => 'auth', 'as' => 'warehouse.create', 'uses' => 'WareHouseController@store']);
Route::get('warehouse/edit/{id}', ['middleware' => 'auth', 'as' => 'warehouse.edit', 'uses' => 'WareHouseController@edit']);
Route::put('warehouse/edit/{id}', ['middleware' => 'auth', 'as' => 'warehouse.update', 'uses' => 'WareHouseController@update']);
Route::get('warehouse/list', ['middleware' => 'auth', 'as' => 'warehouse.list', 'uses' => 'WareHouseController@index']);
Route::delete('warehouse/delete/{id}', ['middleware' => 'auth', 'as' => 'warehouse.delete', 'uses' => 'WareHouseController@destroy']);
Route::delete('warehouse/activate/{id}', ['middleware' => 'auth', 'as' => 'warehouse.activate', 'uses' => 'WareHouseController@activate']);

/* Freezers */
Route::get('freezer/new', ['middleware' => 'auth', 'as' => 'freezer.new', 'uses' => 'FreezerController@create']);
Route::post('freezer/new', ['middleware' => 'auth', 'as' => 'freezer.create', 'uses' => 'FreezerController@store']);
Route::get('freezer/edit/{id}', ['middleware' => 'auth', 'as' => 'freezer.edit', 'uses' => 'FreezerController@edit']);
Route::put('freezer/edit/{id}', ['middleware' => 'auth', 'as' => 'freezer.update', 'uses' => 'FreezerController@update']);
Route::get('freezer/list', ['middleware' => 'auth', 'as' => 'freezer.list', 'uses' => 'FreezerController@index']);
Route::delete('freezer/delete/{id}', ['middleware' => 'auth', 'as' => 'freezer.delete', 'uses' => 'FreezerController@destroy']);
Route::delete('freezer/activate/{id}', ['middleware' => 'auth', 'as' => 'freezer.activate', 'uses' => 'FreezerController@activate']);

/* Route config */
Route::get('config/update', ['middleware' => 'auth', 'as' => 'config.edit', 'uses' => 'ConfigController@edit']);
Route::put('config/update', ['middleware' => 'auth', 'as' => 'config.update', 'uses' => 'ConfigController@update']);


