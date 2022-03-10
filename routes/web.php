<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\rut_apiController;
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



Route::redirect('/', '/index');

Route::post('store',[rut_apiController::class, 'store'])->name('store');

Route::get('index',[rut_apiController::class, 'index'])->name('index');

Route::get('modificar/{rut}', [rut_apiController::class, 'modificar'])->name('modificar');

Route::get('borrar/{rut}',[rut_apiController::class,'destroy'])->name('destroy');

Route::post('update',[rut_apiController::class, 'update'])->name('update');

Route::get('/createPDF', [rut_apiController::class, 'createPDF'])->name('createPDF');