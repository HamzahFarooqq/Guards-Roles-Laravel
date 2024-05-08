<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

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




route::get('/user/register', [UserController::class, 'register']);
route::post('/user/register', [UserController::class, 'create']);

route::get('/login', [UserController::class, 'login']);
route::post('/login', [UserController::class, 'login_create']);


route::get('/admin/register', [AdminController::class, 'register']);
route::post('/admin/register', [AdminController::class, 'create']);







// User routes

route::middleware('auth')->group(function() {

    Route::get('/user/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
    Route::get('/users', [UserController::class, 'index']);
    Route::post('/users', [UserController::class, 'store']);
    
    route::post('user/logout', [UserController::class, 'logout']);
    

    route::middleware('regularUser')->group(function(){

        Route::get('/users/{user}', [UserController::class, 'show']);
        Route::put('/users/{user}', [UserController::class, 'update']);
        Route::delete('/users/{user}', [UserController::class, 'destroy']);

    });
});




// Admin routes
Route::middleware('auth:admin')->group(function () {

    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::get('/admins', [AdminController::class, 'index']);
    Route::get('/admins/{admin}', [AdminController::class, 'show']);
    Route::post('/admins', [AdminController::class, 'store']);
    Route::put('/admins/{admin}', [AdminController::class, 'update']);
    Route::delete('/admins/{admin}', [AdminController::class, 'destroy']);

    route::post('/admin/logout', [AdminController::class, 'logout']);

});