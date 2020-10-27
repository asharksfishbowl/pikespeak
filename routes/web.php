<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CsvController;
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

// Route::get('/{any}', function () {
//     return view('welcome');
// })->where('any', '.*');

// Route::get('getUploads', 'CSVController@index');
//

Route::get('/', [CsvController::class, 'importExportView']);
Route::get('export', [CsvController::class, 'export'])->name('export');
Route::post('import', [CsvController::class, 'import'])->name('import');

Route::resource('csv', 'CsvController');


// Route::get('/', 'ImportController@getImport')->name('import');
// Route::post('/import_parse', 'ImportController@parseImport')->name('import_parse');
// Route::post('/import_process', 'ImportController@processImport')->name('import_process');

Route::post('register', 'RegisterController@register');
Route::post('login', 'LoginController@login');
Route::post('logout', 'LoginController@logout');
