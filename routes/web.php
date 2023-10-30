<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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
    return view('dashboard');
})->middleware('auth')->name('home');
Route::prefix('user')->name('user.')->group(function () {

    Route::get('/show', [UserController::class,'show'])->name('show');
    Route::get('/edit', [UserController::class,'edit'])->name('edit');
    Route::post('/edit', [UserController::class,'update'])->name('update');
    Route::get('/login', [UserController::class,'login'])->name('login');
    Route::post('/login', [UserController::class,'loginSubmit'])->name('login.submit');
    Route::get('/logout', [UserController::class,'logout'])->name('logout');
    Route::get('/register', [UserController::class,'register'])->name('register');
    Route::post('/register', [UserController::class,'store'])->name('store');

});

Route::prefix('profile')->name('profile.')->middleware('auth')->group(function () {

    Route::get('/list', [ProfileController::class,'index'])->name('list');

    Route::get('/adminaddmoney', [ProfileController::class,'adminaddmoney'])->name('admin.addmoney');
    Route::post('/adminaddmoney', [ProfileController::class,'adminaddmoneySubmit'])->name('admin.addmoney.submit');

    Route::get('/addmoney', [ProfileController::class,'addmoney'])->name('addmoney');
    Route::post('/addmoney', [ProfileController::class,'addmoneySubmit'])->name('addmoney.submit');


    Route::get('/transfer', [ProfileController::class,'transferForm'])->name('transfer');
    Route::post('/transfer', [ProfileController::class,'transferSubmit'])->name('transfer.submit');

    Route::get('/withdraw', [ProfileController::class,'withdrawForm'])->name('withdraw');
    Route::post('/withdraw', [ProfileController::class,'withdrawSubmit'])->name('withdraw.submit');

    Route::get('/conversion', [ProfileController::class,'changeCurrencyForm'])->name('conversion');
    Route::post('/conversion', [ProfileController::class,'changeCurrencySubmit'])->name('conversion.submit');

});