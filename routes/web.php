<?php

use App\Events\carTraker;
use Illuminate\Support\Facades\Route;
use App\Models\Point;
use App\Http\Controllers\PointController;
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
    return view('map');
});

Route::get('/move', function () {
    return view('move');
});

Route::resource('points', PointController::class);


