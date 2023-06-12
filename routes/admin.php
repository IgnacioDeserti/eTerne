<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('admin', [AdminController::class, 'index'])->middleware('role:admin')->name('admin.index');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified'])->group(function () {
    Route::post('admin', [AdminController::class, 'action'])->middleware('role:admin')->name('admin.action');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('admin/{id}', [AdminController::class, 'showAssignRole'])->middleware('role:admin')->name('admin.showAssignRole');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('admin/userAssign/{user}', [AdminController::class, 'assignRoleUser'])->middleware('role:admin')->name('admin.assignRoleUser');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('admin/userDeallocate/{user}', [AdminController::class, 'deallocateRoleUser'])->middleware('role:admin')->name('admin.deallocateRoleUser');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('admin/spreadsheet', [AdminController::class, 'spreadsheet'])->middleware('role:admin')->name('admin.spreadsheet');
});

?>