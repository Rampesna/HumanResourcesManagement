<?php

use Illuminate\Support\Facades\Route;

Route::prefix('authentication')->group(function () {
    Route::get('login', [\App\Http\Controllers\Web\User\AuthenticationController::class, 'login'])->name('user.web.authentication.login.index');
    Route::get('oAuth', [\App\Http\Controllers\Web\User\AuthenticationController::class, 'oAuth'])->name('user.web.authentication.oAuth');
    Route::get('forgotPassword', [\App\Http\Controllers\Web\User\AuthenticationController::class, 'forgotPassword'])->name('user.web.authentication.forgotPassword');
});

Route::middleware([
    'auth:user_web'
])->group(function () {
    Route::get('logout', [\App\Http\Controllers\Web\User\AuthenticationController::class, 'logout'])->name('user.web.authentication.logout');

    Route::prefix('profile')->group(function () {
        Route::get('index', [\App\Http\Controllers\Web\User\ProfileController::class, 'index'])->name('user.web.profile.index');
    });

    Route::prefix('dashboard')->group(function () {
        Route::get('index', [\App\Http\Controllers\Web\User\DashboardController::class, 'index'])->name('user.web.dashboard.index');
    });

    Route::prefix('calendar')->group(function () {
        Route::get('index', [\App\Http\Controllers\Web\User\CalendarController::class, 'index'])->name('user.web.calendar.index');
    });

    Route::prefix('permit')->group(function () {
        Route::get('index', [\App\Http\Controllers\Web\User\PermitController::class, 'index'])->name('user.web.permit.index');
    });

    Route::prefix('overtime')->group(function () {
        Route::get('index', [\App\Http\Controllers\Web\User\OvertimeController::class, 'index'])->name('user.web.overtime.index');
    });

    Route::prefix('payment')->group(function () {
        Route::get('index', [\App\Http\Controllers\Web\User\PaymentController::class, 'index'])->name('user.web.payment.index');
    });

    Route::prefix('report')->group(function () {
        Route::get('index', [\App\Http\Controllers\Web\User\ReportController::class, 'index'])->name('user.web.report.index');
    });

    Route::prefix('report')->group(function () {
        Route::get('ageAndGender', [\App\Http\Controllers\Web\User\ReportController::class, 'ageAndGender'])->name('user.web.report.ageAndGender');
        Route::get('education', [\App\Http\Controllers\Web\User\ReportController::class, 'education'])->name('user.web.report.education');
        Route::get('bloodGroup', [\App\Http\Controllers\Web\User\ReportController::class, 'bloodGroup'])->name('user.web.report.bloodGroup');
        Route::get('permit', [\App\Http\Controllers\Web\User\ReportController::class, 'permit'])->name('user.web.report.permit');
        Route::get('overtime', [\App\Http\Controllers\Web\User\ReportController::class, 'overtime'])->name('user.web.report.overtime');
        Route::get('payment', [\App\Http\Controllers\Web\User\ReportController::class, 'payment'])->name('user.web.report.payment');
        Route::get('annualPermit', [\App\Http\Controllers\Web\User\ReportController::class, 'annualPermit'])->name('user.web.report.annualPermit');
    });

    Route::prefix('employee')->group(function () {
        Route::get('index', [\App\Http\Controllers\Web\User\EmployeeController::class, 'index'])->name('user.web.employee.index');
        Route::get('personalInformation/{id?}', [\App\Http\Controllers\Web\User\EmployeeController::class, 'personalInformation'])->name('user.web.employee.personalInformation');
        Route::get('position/{id?}', [\App\Http\Controllers\Web\User\EmployeeController::class, 'position'])->name('user.web.employee.position');
        Route::get('permit/{id?}', [\App\Http\Controllers\Web\User\EmployeeController::class, 'permit'])->name('user.web.employee.permit');
        Route::get('overtime/{id?}', [\App\Http\Controllers\Web\User\EmployeeController::class, 'overtime'])->name('user.web.employee.overtime');
        Route::get('payment/{id?}', [\App\Http\Controllers\Web\User\EmployeeController::class, 'payment'])->name('user.web.employee.payment');
        Route::get('device/{id?}', [\App\Http\Controllers\Web\User\EmployeeController::class, 'device'])->name('user.web.employee.device');
        Route::get('file/{id?}', [\App\Http\Controllers\Web\User\EmployeeController::class, 'file'])->name('user.web.employee.file');
        Route::get('shift/{id?}', [\App\Http\Controllers\Web\User\EmployeeController::class, 'shift'])->name('user.web.employee.shift');
        Route::get('punishment/{id?}', [\App\Http\Controllers\Web\User\EmployeeController::class, 'punishment'])->name('user.web.employee.punishment');
    });

    Route::prefix('file')->group(function () {
        Route::get('download/{id?}', [\App\Http\Controllers\Web\User\FileController::class, 'download'])->name('user.web.file.download');
        Route::get('downloadByKey', [\App\Http\Controllers\Web\User\FileController::class, 'downloadByKey'])->name('user.web.file.downloadByKey');
        Route::get('createPdf/{id?}', [\App\Http\Controllers\Web\User\FileController::class, 'createPdf'])->name('user.web.file.createPdf');
    });
});
