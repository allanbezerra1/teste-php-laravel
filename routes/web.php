<?php

use App\Http\Controllers\ImportController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/import', [ImportController::class, 'index'])->name('import.index');
Route::post('/import', [ImportController::class, 'store'])->name('import.store');
Route::post('/process-queue', [ImportController::class, 'processQueue'])->name('import.processQueue');

