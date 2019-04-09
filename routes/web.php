<?php
use App\Http\Controllers\KfzController;
use App\KFZ;

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

// Route::get('/index', function () {
//     $kfz = KFZ::all();
//     return view('/index', compact('kfz'));
// });

//This is a test for GITHUB

Route::get('/', 'KfzController@index');
Route::post('/search', 'KfzController@search');
Route::get('/serializer', 'KfzController@ShowSerializer');

Route::post('/serializercsv', 'CSVController@StoreCSV');
Route::post('/serializergetcsv', 'CSVController@getCSV');

Route::post('/serializerxml', 'XMLController@StoreXML');

Route::post('/serializerjson', 'JSONController@StoreJSON');
Route::post('/serializergetjson', 'JSONController@getJSON');

Route::resource('kfz', 'KfzController');
