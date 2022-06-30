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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function() {
    return view('master');
});

Route::get('/add_articles', function () {
    return view('articles/add');
});
Route::get('/', 'ArticlesController@show');
Route::post('/add_process', 'ArticlesController@add_process');
Route::get('/detail/{id}', 'ArticlesController@detail');
Route::get('/admin', 'ArticlesController@show_by_admin');
Route::get('/edit/{id}', 'ArticlesController@edit');
Route::post('/edit_process', 'ArticlesController@edit_process');
Route::get('/delete/{id}', 'ArticlesController@delete');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
