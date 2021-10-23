<?php

use App\Http\Controllers\ProviderController;
use App\Http\Controllers\ProvidersController;
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
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


/* --- rotas fornecedor */
Route::get('/provider/create', [ProvidersController::class, 'create'])->middleware('auth');
Route::post('/providers', [ProvidersController::class, 'store']);
Route::delete('/provider/{id}', [ProvidersController::class, 'destroy'])->middleware('auth');
Route::get('/provider/edit/{id}', [ProvidersController::class, 'edit'])->middleware('auth');
Route::put('/provider/update/{id}', [ProvidersController::class, 'update'])->middleware('auth');
