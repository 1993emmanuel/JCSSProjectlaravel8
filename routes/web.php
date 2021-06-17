<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\PrinterController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;

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

// Route::get('/', function () {
//     return view('home');
// })->name('home');

Route::get('/',[HomeController::class, 'index'])->name('home.index');

Route::get('/register',[RegisterController::class, 'index'])->name('register');
Route::post('/register',[RegisterController::class, 'store'])->name('register.store');

Route::get('/login',[LoginController::class, 'index'])->name('login');
Route::post('/login',[LoginController::class, 'store'])->name('login.store');

Route::post('/logout',[LogoutController::class, 'store'])->name('logout');


Route::resource('categories',CategoryController::class)->names('categories');
Route::resource('providers',ProviderController::class)->names('providers');
Route::resource('clients',ClientController::class)->names('clients');
Route::resource('products',ProductController::class)->names('products');
Route::resource('purchases',PurchaseController::class)->names('purchases')->except(['edit','update','destroy']);
Route::resource('sales',SaleController::class)->names('sales')->except(['edit','update','destroy']);
Route::resource('users',UserController::class)->names('users');

Route::resource('printers',PrinterController::class)->names('printers')->only(['index','update']);
Route::resource('business',BusinessController::class)->names('business')->only(['index','update']);


Route::get('/purchases/pdf/{purchase}',[PurchaseController::class, 'pdf'])->name('purchases.pdf');
Route::get('/sales/pdf/{sale}',[SaleController::class, 'pdf'])->name('sales.pdf');
Route::get('/sales/print/{sale}',[SaleController::class, 'print'])->name('sales.print');

Route::get('/purchases/upload/{purchase}',[PurchaseController::class, 'upload'])->name('purchases.upload');

Route::get('/change_status/products/{product}',[ProductController::class,'change_status'])->name('products.change_status');
Route::get('/change_status/sales/{sale}',[SaleController::class,'change_status'])->name('sales.change_status');
Route::get('/change_status/purchases/{purchase}',[PurchaseController::class,'change_status'])->name('purchases.change_status');


Route::get('reports_day',[ReportController::class, 'reports_day'])->name('reports.day');
Route::get('reports_date',[ReportController::class, 'reports_date'])->name('reports.date');
Route::post('reports_result',[ReportController::class, 'reports_result'])->name('reports.result');
