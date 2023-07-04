<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\AuthController;

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

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'login'])->name('login.post');


Route::get('dashboard', [AuthController::class, 'dashboard']);
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::prefix('/blog')->name('blog.')->controller(BlogController::class)->group(function(){
    Route::get('/', 'index')->name('index');

    Route::get('/new', 'create')->name('create');
    Route::post('/new', 'store');
    Route::get('/{post}/edit', 'edit')->name('edit');
    Route::post('/{post}/edit', 'update');

    Route::get('/{slug}-{post}', 'show')
    ->where([
        'post' => '[0-9]+',
        'slug' => '[a-z0-9\-]+'
        ])
    ->name('show')
    ;
    Route::delete('/delete/{id}', 'destroy')->name('delete');
});


Route::middleware(['auth'])->group(function () {
    Route::get('register', [AuthController::class, 'register'])->name('register');
    Route::post('post-register', [AuthController::class, 'postRegistration'])->name('register.post');
    Route::prefix('/user')->name('user.')->controller(UserController::class)->group(function() {
        Route::get('/', 'index')->name('index');
        Route::get('/new', 'create')->name('create');
        Route::post('/new', 'store');
        Route::get('/edit/{user}', 'edit')->name('edit');
        Route::post('/edit/{user}', 'update');
        Route::get('/delete/{id}', 'destroy')->name('delete');

    });
});


