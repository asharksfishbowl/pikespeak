<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->get('/athenticated', function () {
  return true;
});

Route::get('getUploads', 'CSVController@index');

Route::group(['prefix' => 'csv'], function () {
    Route::post('import', 'CSVController@add');
    Route::get('edit/{id}', 'CSVController@edit');
    Route::post('update/{id}', 'CSVController@update');
    Route::delete('delete/{id}', 'CSVController@delete');
});

Route::post('/users/import','UsersController@import');

Route::post('register', 'RegisterController@register');
Route::post('login', 'LoginController@login');
Route::post('logout', 'LoginController@logout');
