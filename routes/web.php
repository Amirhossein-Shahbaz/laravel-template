<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\back\AdminController;
use App\Http\Controllers\back\MemberController;
use App\Http\Controllers\front\IndexController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\back\CategoryController;
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

// Admin Routes //
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index')->middleware('checkrole');

Route::get('/admin/users', [MemberController::class, 'index'])->name('users')->middleware('checkrole');

Route::get('/admin/users/profile/{user}', [MemberController::class, 'edit'])->name('admin.profile')->middleware('checkrole');

Route::put('/admin/users/profileupdate/{user}', [MemberController::class, 'update'])->name('admin.profileupdate')->middleware('checkrole');

Route::delete('/admin/users/profiledelete/{user}', [MemberController::class, 'destroy'])->name('admin.user.delete')->middleware('checkrole');

Route::get('/admin/users/status/{user}', [MemberController::class, 'updatestatus'])->name('admin.user.status')->middleware('checkrole');

// Category Routes //
Route::prefix('admin/category')->middleware('checkrole')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('admin.category');
    Route::get('/create', [CategoryController::class, 'create'])->name('admin.category.create');
    Route::post('/store', [CategoryController::class, 'store'])->name('admin.category.store');
    // Route::get('/show/{category}', [CategoryController::class, 'show'])->name('admin.category.show');
    Route::get('/edit/{category}', [CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::put('/update/{category}', [CategoryController::class, 'update'])->name('admin.category.update');
    Route::delete('/delete/{category}', [CategoryController::class, 'destroy'])->name('admin.category.delete');
});

// User Profile //
Route::get('/profile/{user}', [UserController::class, 'edit'])->name('profile');


Route::put('/update/{user}', [UserController::class, 'update'])->name('profileupdate');

require __DIR__ . '/auth.php';
