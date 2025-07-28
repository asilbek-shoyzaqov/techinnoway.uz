<?php

use \App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\admin\ProfileController;
use App\Http\Controllers\admin\PermissionController;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\MenuController;
use App\Http\Controllers\admin\SubmenuController;
use App\Http\Controllers\admin\ServiceController;
use App\Http\Controllers\admin\ManageController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\PostController;
use App\Http\Controllers\admin\FileController;
use App\Http\Controllers\admin\WordController;
use App\Http\Controllers\admin\MemberController;
use App\Http\Controllers\admin\DocumentController;
use Illuminate\Support\Facades\Route;


Route::get('lang/{lang}', function ($lang) {
    session(['lang' => $lang]);
    return back();
});

Route::get('/', function () {
    return view('welcome');
})->name('index');


Route::prefix('admin')->middleware(['auth'])->name('admin.')->group(function(){
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('posts', PostController::class);
    Route::resource('files', FileController::class);


    Route::group(['middleware' => ['role:admin']], function () {
        Route::resource('users', UserController::class);
        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);
        Route::resource('menus', MenuController::class);
        Route::resource('submenus', SubmenuController::class);
        Route::resource('services', ServiceController::class);
        Route::resource('manages', ManageController::class);
        Route::resource('categories', CategoryController::class);
        Route::resource('words', WordController::class);
        Route::resource('documents', DocumentController::class);
        Route::resource('members', MemberController::class);
    });
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});





require __DIR__.'/auth.php';
