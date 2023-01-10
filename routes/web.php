<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\admin\LoginController;
use App\Http\Controllers\admin\RegisterController;
use App\Http\Controllers\admin\MemberAdminController;
use App\Http\Controllers\admin\GirlGroupAdmincontroller;

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
Route::get('/', function(){
    return view('home');
});

//login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

//register
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function(){
    return view('index');
})->middleware('auth');
Route::resource('/dashboard/all', MemberAdminController::class)->middleware('auth');
Route::resource('/dashboard/girl', GirlGroupAdmincontroller::class)->middleware('auth');

Route::post('/add', [MemberAdminController::class, 'store']);
Route::get('/detail/{member}', [MemberAdminController::class, 'show']);
Route::post('/update/{member}', [MemberAdminController::class, 'update']);
Route::delete('/delete/{member}', [MemberAdminController::class, 'destroy']);

Route::post('/add/group', [GirlGroupAdmincontroller::class, 'store']);
Route::get('/detail/group/{group}', [GirlGroupAdmincontroller::class, 'show']);
Route::post('/update/group/{group}', [GirlGroupAdmincontroller::class, 'update']);
Route::delete('/delete/group/{group}', [GirlGroupAdmincontroller::class, 'destroy']);

Route::get(‘/foo’, function () {
    Artisan::call(‘storage:link’);
 });