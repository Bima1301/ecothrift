<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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


Route::get('/', [UserController::class, 'index']);
Route::get('/katalog', [UserController::class, 'katalog'])->name('katalog');
Route::get('/product/checkout/{idProduct}', [UserController::class, 'checkout']);
Route::post('/product/checkout/{idProduct}/booking', [UserController::class, 'bookingProduct'])->name('bookingProduct');
Route::get('/product/payout/{code}', [UserController::class, 'payout'])->name('payout');
Route::post('/product/payout/{code}/verify', [UserController::class, 'payoutVerify'])->name('payout.verify');
Route::get('/product/payout/{code}/success', [UserController::class, 'payoutSuccess'])->name('payout.success');

Route::resource('product', ProductController::class);
Route::resource('tips-trick', ArticleController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [UserController::class, 'updateUserProfil'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
