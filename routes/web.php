<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CrudAjaxController;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'auth'])->name('auth');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'register'])->name('register');


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/dashboard/crud', [CrudController::class, 'index'])->name('crud');
Route::post('/dashboard/crud/store', [CrudController::class, 'store'])->name('crud_tambah');
Route::post('/dashboard/crud/{id}/update', [CrudController::class, 'update']);
Route::delete('/dashboard/crud/{id}/destroy', [CrudController::class, 'destroy']);

Route::get('/dashboard/crudAjax', [CrudAjaxController::class, 'index'])->name('crudAjax');
Route::post('/dashboard/crudAjax/store', [CrudAjaxController::class, 'store'])->name('crudAjax_tambah');
Route::post('/dashboard/crudAjax/show', [CrudAjaxController::class, 'show'])->name('crudAjax_show');
Route::post('/dashboard/crudAjax/update', [CrudAjaxController::class, 'update'])->name('crudAjax_update');
Route::post('/dashboard/crudAjax/destroy', [CrudAjaxController::class, 'destroy'])->name('crudAjax_destroy');
