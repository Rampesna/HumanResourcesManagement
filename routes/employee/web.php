<?php

use Illuminate\Support\Facades\Route;

Route::prefix('authentication')->group(function () {
    Route::get('login', [\App\Http\Controllers\Web\Employee\AuthenticationController::class, 'login'])->name('employee.web.authentication.login.index');
});

Route::middleware([
    'auth:employee_web'
])->group(function () {
    Route::get('logout', [\App\Http\Controllers\Web\Employee\AuthenticationController::class, 'logout'])->name('employee.web.authentication.logout');

    Route::prefix('dashboard')->group(function () {
        Route::get('index', [\App\Http\Controllers\Web\Employee\DashboardController::class, 'index'])->name('employee.web.dashboard.index');
    });
});
