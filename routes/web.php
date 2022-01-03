<?php

use App\Http\Controllers\ListingsController;
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

Route::get('/', [ListingsController::class, 'index']);

Route::get('/new', [ListingsController::class, 'new'])->name('new');

Route::get('/listings/{id}', [ListingsController::class, 'edit'])->name('edit');

Route::post('/listings',[ListingsController::class, 'store']);

Route::post('/listings/update/', [ListingsController::class, 'update'])->name('update');

Route::get('/listings/delete/{id}', [ListingsController::class, 'destroy'])->name('delete');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


require __DIR__.'/auth.php';
