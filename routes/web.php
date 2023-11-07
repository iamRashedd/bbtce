<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
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

Route::get("/test", [Controller::class,"test"])->name("test");
Route::post("/test", [Controller::class,"testSubmit"])->name('test.submit');

Route::get('/', function () {
    return view('dashboard');
})->middleware('auth')->name('home');
Route::get('/home', function () {
    return view('Home');
});
Route::prefix('user')->name('user.')->group(function () {

    Route::get('/show', [UserController::class,'show'])->middleware('auth')->name('show');
    Route::get('/edit', [UserController::class,'edit'])->name('edit');
    Route::post('/edit', [UserController::class,'update'])->middleware('auth')->name('update');
    Route::get('/login', [UserController::class,'login'])->name('login');
    Route::post('/login', [UserController::class,'loginSubmit'])->name('login.submit');
    Route::get('/logout', [UserController::class,'logout'])->middleware('auth')->name('logout');
    Route::get('/register', [UserController::class,'register'])->name('register');
    Route::post('/register', [UserController::class,'store'])->name('store');

});

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {

    Route::get('/profile/list', [AdminController::class,'showProfiles'])->name('profile.list');
    Route::get('/transaction/list', [AdminController::class,'showTransactions'])->name('transaction.list');
    Route::get('/user/list', [AdminController::class,'showUsers'])->name('user.list');
    Route::get('/addmoney', [AdminController::class,'addmoney'])->name('addmoney');
    Route::post('/addmoney', [AdminController::class,'addmoneySubmit'])->name('addmoney.submit');
    Route::get('/activate/user/{id}', [AdminController::class,'activateUser'])->name('user.activate');
    Route::get('/deactivate/user/{id}', [AdminController::class,'deactivateUser'])->name('user.deactivate');
    Route::get('/delete/user/{id}', [AdminController::class,'deleteUser'])->name('user.delete');
    

});
Route::prefix('profile')->name('profile.')->middleware('auth')->group(function () {

    Route::get('/addmoney', [ProfileController::class,'addmoney'])->name('addmoney');
    Route::post('/addmoney', [ProfileController::class,'addmoneySubmit'])->name('addmoney.submit');


    Route::get('/transfer', [ProfileController::class,'transferForm'])->name('transfer');
    Route::post('/transfer', [ProfileController::class,'transferSubmit'])->name('transfer.submit');

    Route::get('/withdraw', [ProfileController::class,'withdrawForm'])->name('withdraw');
    Route::post('/withdraw', [ProfileController::class,'withdrawSubmit'])->name('withdraw.submit');

    Route::get('/conversion', [ProfileController::class,'changeCurrencyForm'])->name('conversion');
    Route::post('/conversion', [ProfileController::class,'changeCurrencySubmit'])->name('conversion.submit');

});

Route::prefix('transaction')->name('transaction.')->middleware('auth')->group(function () {
    Route::get('/show', [TransactionController::class,'show'])->name('show');
    Route::get('/showbysender/{account}', [TransactionController::class,'showBySender'])->name('show.sender');
    Route::get('/showbyreciever/{account}', [TransactionController::class,'showByReciever'])->name('show.reciever');
});
    