<?php

use App\Http\Controllers\admin\CommentController;
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
use App\Http\Controllers\MemberAuthController;
use App\Http\Controllers\MemberFrontController;
use App\Http\Controllers\admin\DocumentController;
use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Route;


Route::get('lang/{lang}', function ($lang) {
    session(['lang' => $lang]);
    return back();
});

Route::get('/', [FrontController::class, 'index'])->name('front.index');
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');

Route::get('/login', function () {
    return view('member.login');
});

// Examinee login routes
Route::get('member/login', [MemberAuthController::class, 'showLoginForm'])->name('member.login');
Route::post('member/login', [MemberAuthController::class, 'login']);
Route::post('member/logout', [MemberAuthController::class, 'logout'])->name('member.logout');

Route::middleware(['member'])->group(function () {
    Route::get('member', [MemberFrontController::class, 'index'])->name('member.index');
});

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
        Route::resource ('comments', CommentController::class);
    });
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin login va autentifikatsiya yo'nalishlari
Route::middleware('guest')->group(function () {
    Route::get('admin-login', [AuthenticatedSessionController::class, 'create'])->name('admin.login');
    Route::post('admin-login', [AuthenticatedSessionController::class, 'store']);
});

Route::get('/{slug}', [FrontController::class, 'page'])->name('front.slug');


require __DIR__.'/auth.php';
