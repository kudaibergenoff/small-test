<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    TicketController
};

Route::get('/', function () {
    return redirect()->route('login');
});

require("auth.php");

Route::group(['middleware' => 'auth'], function () {
    Route::get('/tickets', [TicketController::class, 'index'])->name('tickets');
    Route::get('/tickets/create', [TicketController::class, 'create'])->name('tickets.create')->middleware(['role:client']);
    route::post('tickets/add', [TicketController::class, 'add'])->name('tickets.add')->middleware(['role:client']);
});
