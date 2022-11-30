<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('authentication')->group(function () {
    Route::post('login', [\App\Http\Controllers\Api\User\UserController::class, 'login'])->name('user.api.login');
    Route::post('sendPasswordResetEmail', [\App\Http\Controllers\Api\User\UserController::class, 'sendPasswordResetEmail'])->name('api.user.sendPasswordResetEmail');
    Route::post('resetPassword', [\App\Http\Controllers\Api\User\UserController::class, 'resetPassword'])->name('api.user.resetPassword');
});

Route::middleware([
    'auth:user_api',
    'UserCheckSuspend'
])->group(function () {
    Route::get('getProfile', [\App\Http\Controllers\Api\User\UserController::class, 'getProfile'])->name('user.api.getProfile');
    Route::get('getCompanies', [\App\Http\Controllers\Api\User\UserController::class, 'getCompanies'])->name('user.api.getCompanies');
    Route::post('setCompanies', [\App\Http\Controllers\Api\User\UserController::class, 'setCompanies'])->name('user.api.setCompanies');
    Route::get('getSelectedCompanies', [\App\Http\Controllers\Api\User\UserController::class, 'getSelectedCompanies'])->name('user.api.getSelectedCompanies');
    Route::post('setSelectedCompanies', [\App\Http\Controllers\Api\User\UserController::class, 'setSelectedCompanies'])->name('user.api.setSelectedCompanies');
    Route::post('swapTheme', [\App\Http\Controllers\Api\User\UserController::class, 'swapTheme'])->name('user.api.swapTheme');
    Route::post('updatePassword', [\App\Http\Controllers\Api\User\UserController::class, 'updatePassword'])->name('user.api.updatePassword');

    Route::prefix('employee')->group(function () {
        Route::get('getAllWorkers', [\App\Http\Controllers\Api\User\EmployeeController::class, 'getAllWorkers'])->name('user.api.employee.getAllWorkers');
        Route::get('getByCompanyIds', [\App\Http\Controllers\Api\User\EmployeeController::class, 'getByCompanyIds'])->name('user.api.employee.getByCompanyIds');
        Route::get('getByCompanyIdsWithPersonalInformation', [\App\Http\Controllers\Api\User\EmployeeController::class, 'getByCompanyIdsWithPersonalInformation'])->name('user.api.employee.getByCompanyIdsWithPersonalInformation');
        Route::get('getByCompanyIdsWithBalance', [\App\Http\Controllers\Api\User\EmployeeController::class, 'getByCompanyIdsWithBalance'])->name('user.api.employee.getByCompanyIdsWithBalance');
        Route::get('getByCompanyIdsWithDevices', [\App\Http\Controllers\Api\User\EmployeeController::class, 'getByCompanyIdsWithDevices'])->name('user.api.employee.getByCompanyIdsWithDevices');
        Route::get('getByJobDepartmentTypeIds', [\App\Http\Controllers\Api\User\EmployeeController::class, 'getByJobDepartmentTypeIds'])->name('user.api.employee.getByJobDepartmentTypeIds');
        Route::get('getById', [\App\Http\Controllers\Api\User\EmployeeController::class, 'getById'])->name('user.api.employee.getById');
        Route::get('getByEmail', [\App\Http\Controllers\Api\User\EmployeeController::class, 'getByEmail'])->name('user.api.employee.getByEmail');
        Route::post('create', [\App\Http\Controllers\Api\User\EmployeeController::class, 'create'])->name('user.api.employee.create');
        Route::put('update', [\App\Http\Controllers\Api\User\EmployeeController::class, 'update'])->name('user.api.employee.update');
        Route::put('leave', [\App\Http\Controllers\Api\User\EmployeeController::class, 'leave'])->name('user.api.employee.leave');
        Route::post('updateJobDepartment', [\App\Http\Controllers\Api\User\EmployeeController::class, 'updateJobDepartment'])->name('user.api.employee.updateJobDepartment');
    });

    Route::prefix('permitType')->group(function () {
        Route::get('getAll', [\App\Http\Controllers\Api\User\PermitTypeController::class, 'getAll'])->name('user.api.permitType.getAll');
    });

    Route::prefix('overtimeType')->group(function () {
        Route::get('getAll', [\App\Http\Controllers\Api\User\OvertimeTypeController::class, 'getAll'])->name('user.api.overtimeType.getAll');
    });

    Route::prefix('paymentType')->group(function () {
        Route::get('getAll', [\App\Http\Controllers\Api\User\PaymentTypeController::class, 'getAll'])->name('user.api.paymentType.getAll');
    });

    Route::prefix('punishmentCategory')->group(function () {
        Route::get('getAll', [\App\Http\Controllers\Api\User\PunishmentCategoryController::class, 'getAll'])->name('user.api.punishmentCategory.getAll');
    });

    Route::prefix('permit')->group(function () {
        Route::get('getAll', [\App\Http\Controllers\Api\User\PermitController::class, 'getAll'])->name('user.api.permit.getAll');
        Route::get('getById', [\App\Http\Controllers\Api\User\PermitController::class, 'getById'])->name('user.api.permit.getById');
        Route::get('getByCompanyIds', [\App\Http\Controllers\Api\User\PermitController::class, 'getByCompanyIds'])->name('user.api.permit.getByCompanyIds');
        Route::get('getByEmployeeId', [\App\Http\Controllers\Api\User\PermitController::class, 'getByEmployeeId'])->name('user.api.permit.getByEmployeeId');
        Route::get('getDateBetweenByEmployeeIdsAndTypeIds', [\App\Http\Controllers\Api\User\PermitController::class, 'getDateBetweenByEmployeeIdsAndTypeIds'])->name('user.api.permit.getDateBetweenByEmployeeIdsAndTypeIds');
        Route::get('getByStatusIdAndCompanyIds', [\App\Http\Controllers\Api\User\PermitController::class, 'getByStatusIdAndCompanyIds'])->name('user.api.permit.getByStatusIdAndCompanyIds');
        Route::get('getByDateAndCompanyIds', [\App\Http\Controllers\Api\User\PermitController::class, 'getByDateAndCompanyIds'])->name('user.api.permit.getByDateAndCompanyIds');
        Route::get('getDateBetweenAndCompanyIds', [\App\Http\Controllers\Api\User\PermitController::class, 'getDateBetweenAndCompanyIds'])->name('user.api.permit.getDateBetweenAndCompanyIds');
        Route::get('calculateAnnualPermit', [\App\Http\Controllers\Api\User\PermitController::class, 'calculateAnnualPermit'])->name('user.api.permit.calculateAnnualPermit');
        Route::post('create', [\App\Http\Controllers\Api\User\PermitController::class, 'create'])->name('user.api.permit.create');
        Route::put('update', [\App\Http\Controllers\Api\User\PermitController::class, 'update'])->name('user.api.permit.update');
        Route::put('setStatus', [\App\Http\Controllers\Api\User\PermitController::class, 'setStatus'])->name('user.api.permit.setStatus');
        Route::delete('delete', [\App\Http\Controllers\Api\User\PermitController::class, 'delete'])->name('user.api.permit.delete');
    });

    Route::prefix('overtime')->group(function () {
        Route::get('getAll', [\App\Http\Controllers\Api\User\OvertimeController::class, 'getAll'])->name('user.api.overtime.getAll');
        Route::get('getById', [\App\Http\Controllers\Api\User\OvertimeController::class, 'getById'])->name('user.api.overtime.getById');
        Route::get('getByCompanyIds', [\App\Http\Controllers\Api\User\OvertimeController::class, 'getByCompanyIds'])->name('user.api.overtime.getByCompanyIds');
        Route::get('getByEmployeeId', [\App\Http\Controllers\Api\User\OvertimeController::class, 'getByEmployeeId'])->name('user.api.overtime.getByEmployeeId');
        Route::get('getDateBetweenByEmployeeIdsAndTypeIds', [\App\Http\Controllers\Api\User\OvertimeController::class, 'getDateBetweenByEmployeeIdsAndTypeIds'])->name('user.api.overtime.getDateBetweenByEmployeeIdsAndTypeIds');
        Route::get('getByStatusIdAndCompanyIds', [\App\Http\Controllers\Api\User\OvertimeController::class, 'getByStatusIdAndCompanyIds'])->name('user.api.overtime.getByStatusIdAndCompanyIds');
        Route::get('getByDateAndCompanyIds', [\App\Http\Controllers\Api\User\OvertimeController::class, 'getByDateAndCompanyIds'])->name('user.api.overtime.getByDateAndCompanyIds');
        Route::get('getDateBetweenAndCompanyIds', [\App\Http\Controllers\Api\User\OvertimeController::class, 'getDateBetweenAndCompanyIds'])->name('user.api.overtime.getDateBetweenAndCompanyIds');
        Route::post('create', [\App\Http\Controllers\Api\User\OvertimeController::class, 'create'])->name('user.api.overtime.create');
        Route::put('update', [\App\Http\Controllers\Api\User\OvertimeController::class, 'update'])->name('user.api.overtime.update');
        Route::put('setStatus', [\App\Http\Controllers\Api\User\OvertimeController::class, 'setStatus'])->name('user.api.overtime.setStatus');
        Route::delete('delete', [\App\Http\Controllers\Api\User\OvertimeController::class, 'delete'])->name('user.api.overtime.delete');
    });

    Route::prefix('payment')->group(function () {
        Route::get('getAll', [\App\Http\Controllers\Api\User\PaymentController::class, 'getAll'])->name('user.api.payment.getAll');
        Route::get('getById', [\App\Http\Controllers\Api\User\PaymentController::class, 'getById'])->name('user.api.payment.getById');
        Route::get('getByCompanyIds', [\App\Http\Controllers\Api\User\PaymentController::class, 'getByCompanyIds'])->name('user.api.payment.getByCompanyIds');
        Route::get('getByEmployeeId', [\App\Http\Controllers\Api\User\PaymentController::class, 'getByEmployeeId'])->name('user.api.payment.getByEmployeeId');
        Route::get('getByStatusIdAndCompanyIds', [\App\Http\Controllers\Api\User\PaymentController::class, 'getByStatusIdAndCompanyIds'])->name('user.api.payment.getByStatusIdAndCompanyIds');
        Route::get('getByDateAndCompanyIds', [\App\Http\Controllers\Api\User\PaymentController::class, 'getByDateAndCompanyIds'])->name('user.api.payment.getByDateAndCompanyIds');
        Route::get('getDateBetweenAndCompanyIds', [\App\Http\Controllers\Api\User\PaymentController::class, 'getDateBetweenAndCompanyIds'])->name('user.api.payment.getDateBetweenAndCompanyIds');
        Route::post('create', [\App\Http\Controllers\Api\User\PaymentController::class, 'create'])->name('user.api.payment.create');
        Route::put('update', [\App\Http\Controllers\Api\User\PaymentController::class, 'update'])->name('user.api.payment.update');
        Route::put('setStatus', [\App\Http\Controllers\Api\User\PaymentController::class, 'setStatus'])->name('user.api.payment.setStatus');
        Route::delete('delete', [\App\Http\Controllers\Api\User\PaymentController::class, 'delete'])->name('user.api.payment.delete');
    });

    Route::prefix('punishment')->group(function () {
        Route::get('getByEmployeeId', [\App\Http\Controllers\Api\User\PunishmentController::class, 'getByEmployeeId'])->name('user.api.punishment.getByEmployeeId');
        Route::get('getById', [\App\Http\Controllers\Api\User\PunishmentController::class, 'getById'])->name('user.api.punishment.getById');
        Route::post('create', [\App\Http\Controllers\Api\User\PunishmentController::class, 'create'])->name('user.api.punishment.create');
        Route::put('update', [\App\Http\Controllers\Api\User\PunishmentController::class, 'update'])->name('user.api.punishment.update');
        Route::delete('delete', [\App\Http\Controllers\Api\User\PunishmentController::class, 'delete'])->name('user.api.punishment.delete');
    });

    Route::prefix('employeePersonalInformation')->group(function () {
        Route::get('getByEmployeeId', [\App\Http\Controllers\Api\User\EmployeePersonalInformationController::class, 'getByEmployeeId'])->name('user.api.employeePersonalInformation.getByEmployeeId');
        Route::put('update', [\App\Http\Controllers\Api\User\EmployeePersonalInformationController::class, 'update'])->name('user.api.employeePersonalInformation.update');
    });

    Route::prefix('position')->group(function () {
        Route::get('getByEmployeeId', [\App\Http\Controllers\Api\User\PositionController::class, 'getByEmployeeId'])->name('user.api.position.getByEmployeeId');
        Route::get('getById', [\App\Http\Controllers\Api\User\PositionController::class, 'getById'])->name('user.api.position.getById');
        Route::post('create', [\App\Http\Controllers\Api\User\PositionController::class, 'create'])->name('user.api.position.create');
        Route::put('update', [\App\Http\Controllers\Api\User\PositionController::class, 'update'])->name('user.api.position.update');
        Route::delete('delete', [\App\Http\Controllers\Api\User\PositionController::class, 'delete'])->name('user.api.position.delete');
    });

    Route::prefix('company')->group(function () {
        Route::get('getAll', [\App\Http\Controllers\Api\User\CompanyController::class, 'getAll'])->name('user.api.company.getAll');
        Route::get('getUsersByCompanyIds', [\App\Http\Controllers\Api\User\CompanyController::class, 'getUsersByCompanyIds'])->name('user.api.company.getUsersByCompanyIds');
        Route::get('tree', [\App\Http\Controllers\Api\User\CompanyController::class, 'tree'])->name('user.api.company.tree');
        Route::get('getById', [\App\Http\Controllers\Api\User\CompanyController::class, 'getById'])->name('user.api.company.getById');
        Route::post('create', [\App\Http\Controllers\Api\User\CompanyController::class, 'create'])->name('user.api.company.create');
        Route::put('update', [\App\Http\Controllers\Api\User\CompanyController::class, 'update'])->name('user.api.company.update');
    });

    Route::prefix('commercialCompany')->group(function () {
        Route::get('getAll', [\App\Http\Controllers\Api\User\CommercialCompanyController::class, 'getAll'])->name('user.api.commercialCompany.getAll');
    });

    Route::prefix('branch')->group(function () {
        Route::get('getAll', [\App\Http\Controllers\Api\User\BranchController::class, 'getAll'])->name('user.api.branch.getAll');
        Route::get('getById', [\App\Http\Controllers\Api\User\BranchController::class, 'getById'])->name('user.api.branch.getById');
        Route::get('getByCompanyId', [\App\Http\Controllers\Api\User\BranchController::class, 'getByCompanyId'])->name('user.api.branch.getByCompanyId');
        Route::post('create', [\App\Http\Controllers\Api\User\BranchController::class, 'create'])->name('user.api.branch.create');
        Route::put('update', [\App\Http\Controllers\Api\User\BranchController::class, 'update'])->name('user.api.branch.update');
        Route::delete('delete', [\App\Http\Controllers\Api\User\BranchController::class, 'delete'])->name('user.api.branch.delete');
    });

    Route::prefix('department')->group(function () {
        Route::get('getAll', [\App\Http\Controllers\Api\User\DepartmentController::class, 'getAll'])->name('user.api.department.getAll');
        Route::get('getById', [\App\Http\Controllers\Api\User\DepartmentController::class, 'getById'])->name('user.api.department.getById');
        Route::get('getByBranchId', [\App\Http\Controllers\Api\User\DepartmentController::class, 'getByBranchId'])->name('user.api.department.getByBranchId');
        Route::post('create', [\App\Http\Controllers\Api\User\DepartmentController::class, 'create'])->name('user.api.department.create');
        Route::put('update', [\App\Http\Controllers\Api\User\DepartmentController::class, 'update'])->name('user.api.department.update');
        Route::delete('delete', [\App\Http\Controllers\Api\User\DepartmentController::class, 'delete'])->name('user.api.department.delete');
    });

    Route::prefix('title')->group(function () {
        Route::get('getAll', [\App\Http\Controllers\Api\User\TitleController::class, 'getAll'])->name('user.api.title.getAll');
        Route::get('getById', [\App\Http\Controllers\Api\User\TitleController::class, 'getById'])->name('user.api.title.getById');
        Route::get('getByDepartmentId', [\App\Http\Controllers\Api\User\TitleController::class, 'getByDepartmentId'])->name('user.api.title.getByDepartmentId');
        Route::post('create', [\App\Http\Controllers\Api\User\TitleController::class, 'create'])->name('user.api.title.create');
        Route::put('update', [\App\Http\Controllers\Api\User\TitleController::class, 'update'])->name('user.api.title.update');
        Route::delete('delete', [\App\Http\Controllers\Api\User\TitleController::class, 'delete'])->name('user.api.title.delete');
    });

    Route::prefix('leavingReason')->group(function () {
        Route::get('getAll', [\App\Http\Controllers\Api\User\LeavingReasonController::class, 'getAll'])->name('user.api.leavingReason.getAll');
    });

    Route::prefix('device')->group(function () {
        Route::get('getByCompanyIds', [\App\Http\Controllers\Api\User\DeviceController::class, 'getByCompanyIds'])->name('user.api.device.getByCompanyIds');
        Route::get('paginateByEmployeeId', [\App\Http\Controllers\Api\User\DeviceController::class, 'paginateByEmployeeId'])->name('user.api.device.paginateByEmployeeId');
        Route::get('getById', [\App\Http\Controllers\Api\User\DeviceController::class, 'getById'])->name('user.api.device.getById');
        Route::post('create', [\App\Http\Controllers\Api\User\DeviceController::class, 'create'])->name('user.api.device.create');
        Route::put('update', [\App\Http\Controllers\Api\User\DeviceController::class, 'update'])->name('user.api.device.update');
        Route::delete('delete', [\App\Http\Controllers\Api\User\DeviceController::class, 'delete'])->name('user.api.device.delete');
    });

    Route::prefix('deviceCategory')->group(function () {
        Route::get('getAll', [\App\Http\Controllers\Api\User\DeviceCategoryController::class, 'getAll'])->name('user.api.deviceCategory.getAll');
        Route::get('getById', [\App\Http\Controllers\Api\User\DeviceCategoryController::class, 'getById'])->name('user.api.deviceCategory.getById');
        Route::post('create', [\App\Http\Controllers\Api\User\DeviceCategoryController::class, 'create'])->name('user.api.deviceCategory.create');
        Route::put('update', [\App\Http\Controllers\Api\User\DeviceCategoryController::class, 'update'])->name('user.api.deviceCategory.update');
        Route::delete('delete', [\App\Http\Controllers\Api\User\DeviceCategoryController::class, 'delete'])->name('user.api.deviceCategory.delete');
    });

    Route::prefix('deviceStatus')->group(function () {
        Route::get('getAll', [\App\Http\Controllers\Api\User\DeviceStatusController::class, 'getAll'])->name('user.api.deviceStatus.getAll');
        Route::get('getById', [\App\Http\Controllers\Api\User\DeviceStatusController::class, 'getById'])->name('user.api.deviceStatus.getById');
        Route::post('create', [\App\Http\Controllers\Api\User\DeviceStatusController::class, 'create'])->name('user.api.deviceStatus.create');
        Route::put('update', [\App\Http\Controllers\Api\User\DeviceStatusController::class, 'update'])->name('user.api.deviceStatus.update');
        Route::delete('delete', [\App\Http\Controllers\Api\User\DeviceStatusController::class, 'delete'])->name('user.api.deviceStatus.delete');
    });

    Route::prefix('file')->group(function () {
        Route::get('getAll', [\App\Http\Controllers\Api\User\FileController::class, 'getAll'])->name('user.api.file.getAll');
        Route::get('getById', [\App\Http\Controllers\Api\User\FileController::class, 'getById'])->name('user.api.file.getById');
        Route::get('getByRelation', [\App\Http\Controllers\Api\User\FileController::class, 'getByRelation'])->name('user.api.file.getByRelation');
        Route::post('upload', [\App\Http\Controllers\Api\User\FileController::class, 'upload'])->name('user.api.file.upload');
        Route::post('uploadBatch', [\App\Http\Controllers\Api\User\FileController::class, 'uploadBatch'])->name('user.api.file.uploadBatch');
        Route::get('download', [\App\Http\Controllers\Api\User\FileController::class, 'download'])->name('user.api.file.download');
        Route::delete('delete', [\App\Http\Controllers\Api\User\FileController::class, 'delete'])->name('user.api.file.delete');
    });

    Route::prefix('shift')->group(function () {
        Route::get('getAll', [\App\Http\Controllers\Api\User\ShiftController::class, 'getAll'])->name('user.api.shift.getAll');
        Route::get('getById', [\App\Http\Controllers\Api\User\ShiftController::class, 'getById'])->name('user.api.shift.getById');
        Route::get('getByCompanyId', [\App\Http\Controllers\Api\User\ShiftController::class, 'getByCompanyId'])->name('user.api.shift.getByCompanyId');
        Route::get('getByEmployeeId', [\App\Http\Controllers\Api\User\ShiftController::class, 'getByEmployeeId'])->name('user.api.shift.getByEmployeeId');
        Route::get('getByCompanyIds', [\App\Http\Controllers\Api\User\ShiftController::class, 'getByCompanyIds'])->name('user.api.shift.getByCompanyIds');
        Route::get('getByDateAndCompanyIds', [\App\Http\Controllers\Api\User\ShiftController::class, 'getByDateAndCompanyIds'])->name('user.api.shift.getByDateAndCompanyIds');
        Route::post('createBatch', [\App\Http\Controllers\Api\User\ShiftController::class, 'createBatch'])->name('user.api.shift.createBatch');
        Route::post('createEmployeeFirstShifts', [\App\Http\Controllers\Api\User\ShiftController::class, 'createEmployeeFirstShifts'])->name('user.api.shift.createEmployeeFirstShifts');
        Route::put('update', [\App\Http\Controllers\Api\User\ShiftController::class, 'update'])->name('user.api.shift.update');
        Route::put('updateBatch', [\App\Http\Controllers\Api\User\ShiftController::class, 'updateBatch'])->name('user.api.shift.updateBatch');
        Route::put('swapShift', [\App\Http\Controllers\Api\User\ShiftController::class, 'swapShift'])->name('user.api.shift.swapShift');
        Route::post('robot', [\App\Http\Controllers\Api\User\ShiftController::class, 'robot'])->name('user.api.shift.robot');
        Route::delete('delete', [\App\Http\Controllers\Api\User\ShiftController::class, 'delete'])->name('user.api.shift.delete');
        Route::delete('deleteByIds', [\App\Http\Controllers\Api\User\ShiftController::class, 'deleteByIds'])->name('user.api.shift.deleteByIds');
    });
});
