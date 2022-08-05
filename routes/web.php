<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\back\AdminController;
use App\Http\Controllers\front\IndexController;
use App\Http\Controllers\Auth\UserController;

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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/', [IndexController::class, 'index'])->name('home');

Route::get('/admin', [AdminController::class, 'index'])->name('admin.index')->middleware('checkrole');

Route::get('/profile/{user}', [UserController::class, 'edit'])->name('profile');


Route::post('/update/{user}', [UserController::class, 'update'])->name('profileupdate');

require __DIR__ . '/auth.php';
