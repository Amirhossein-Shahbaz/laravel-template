<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\back\AdminController;
use App\Models\User;
use App\Http\Controllers\back\MemberController;
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

// Admin Routes //
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index')->middleware('checkrole');

Route::get('/admin/users', [MemberController::class, 'index'])->name('users')->middleware('checkrole');

Route::get('/admin/profile/{user}', [MemberController::class, 'edit'])->name('admin.profile');

Route::put('/admin/profileupdate/{user}', [MemberController::class, 'update'])->name('admin.profileupdate');

Route::delete('/admin/profiledelete/{user}', [MemberController::class, 'destroy'])->name('admin.user.delete');
// Route::delete('/admin/users/{user}', function ($id) {
//     $user = User::findOrFail($id);
//     $user->delete();
// })->name('admin.user.delete');
// User Profile //
Route::get('/profile/{user}', [UserController::class, 'edit'])->name('profile');


Route::put('/update/{user}', [UserController::class, 'update'])->name('profileupdate');

require __DIR__ . '/auth.php';
