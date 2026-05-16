<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\MenuController;
Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth','admin'])->group(function () {
 Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
  Route::resource('users', UserController::class);
  Route::resource('categories', CategoryController::class);
  Route::resource('posts', PostController::class);
  Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
  Route::post('/settings/update', [SettingController::class, 'update'])->name('settings.update');
  Route::resource('roles', RoleController::class);
  Route::resource('permissions', PermissionController::class);
  Route::resource('menus', MenuController::class);


});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
