<?php
# @Date:   2020-03-18T12:21:46+00:00
# @Last modified time: 2020-04-01T13:38:40+01:00




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

Route::get('/{any?}', function () {
   return view('welcome');
})->where('any', '^(?!api\/)[\/\w\.-]*');
