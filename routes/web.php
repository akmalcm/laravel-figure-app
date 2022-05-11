<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FigureController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\ReviewController;

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
Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/purchase/form/{id}', [PurchaseController::class, 'retrieve'])->name('purchase-figure');
Route::get('/purchase/view/{id}', [PurchaseController::class, 'retrieve'])->name('purchase-view');
Route::get('/purchase/edit/{id}', [PurchaseController::class, 'retrieve'])->name('purchase-edit');
Route::post('/purchase/delete', [PurchaseController::class, 'delete'])->name('purchase-edit');
Route::post('/purchase', [PurchaseController::class, 'create']);
Route::post('/purchase-update', [PurchaseController::class, 'update']);
Route::get('/purchases', [PurchaseController::class, 'list'])->name('purchases');
Route::get('/review/{id}', [ReviewController::class, 'review'])->name('review');
Route::post('/review/{id}', [ReviewController::class, 'store']);
Route::get('/view-review/{id}', [ReviewController::class, 'view'])->name('view-review');
