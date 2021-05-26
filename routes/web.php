<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    TicketController, UserController, RoleController
};

Route::get('/', function () {
    return redirect()->route('login');
});

require("auth.php");

Route::group(['middleware' => 'auth'], function () {
    /**Routes Tickets */
    Route::get('/tickets', [TicketController::class, 'index'])->name('tickets');
    Route::get('/tickets/show/{id}', [TicketController::class, 'show'])->name('tickets.show');
    Route::get('/tickets/create', [TicketController::class, 'create'])->name('tickets.create');
    Route::post('/tickets/add', [TicketController::class, 'add'])->name('tickets.add');
    Route::post('/tickets/answered', [TicketController::class, 'answered'])->name('tickets.answered');

    /**Routes Users */
    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users/add', [UserController::class, 'add'])->name('users.add');

    /**Routes roles */
    Route::get('/roles', [RoleController::class, 'index'])->name('roles');
    Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
    Route::post('/roles/add', [RoleController::class, 'add'])->name('roles.add');
});
