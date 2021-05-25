<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    Auth\Logincontroller,
    Auth\RegisterController
};

/**Auth routes */
Route::group(['middleware' => 'guest'], function (){
    /**Login routes */
    Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
    Route::get('/register', [RegisterController::class, 'showRegister'])->name('register');
    /**Register routes */
    Route::post('/login', [LoginController::class, 'login'])->name('postLogin');
    Route::post('/register', [RegisterController::class, 'register'])->name('postRegister');
});
/**Logout route */
Route::get('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');