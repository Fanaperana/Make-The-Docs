<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReadController;

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
    return view('home.index');
});

Route::get('/read', [ReadController::class, 'index']);

Route::get('/edit', function(){
    return view('edit.index');
});
