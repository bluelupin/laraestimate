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

Auth::routes();

Route::prefix('/')->middleware('auth')->group(function () {
    
    // Estimates
    Route::resource('estimates', 'EstimateController');
    Route::get('estimates/{estimate}/data', 'EstimateController@getData');

    // Estimate Sections
    Route::apiResource('estimates/{estimate}/sections', 'SectionController');

});
