<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\back\AdminController;
use App\Http\Controllers\front\IndexController;

use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Auth\Events\Registered;
use Monolog\Registry;

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
})->name('dashboard');

Route::get('/', [IndexController::class, 'index'])->name('home');

require __DIR__ . '/auth.php';
