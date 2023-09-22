<?php

use App\Http\Controllers\TodoListController;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('auth:api')->get('user',function (Request $request) {
    return $request->user();
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/todolist', [TodoListController::class, 'getIndex']);
