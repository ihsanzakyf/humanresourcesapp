<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LeaveRequestController;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\PresenceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;


Route::get('/', [AuthenticatedSessionController::class, 'create']);

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware(['role:HR,Developer']);
    Route::resource('/tasks', TaskController::class)->middleware(['role:Developer,HR']);
    Route::resource('/employees', EmployeeController::class)->middleware(['role:HR']);
    Route::resource('/departments', DepartmentController::class)->middleware(['role:HR']);
    Route::resource('/roles', RoleController::class)->middleware(['role:HR']);
    Route::resource('/presences', PresenceController::class)->middleware(['role:HR,Developer']);
    Route::resource('/payrolls', PayrollController::class)->middleware(['role:HR,Developer']);

    Route::resource('leave-requests', LeaveRequestController::class)->middleware(['role:HR,Developer']);

    Route::get('leave-requests/confirm/{id}', [LeaveRequestController::class, 'confirm'])->name('leave-requests.confirm');
    Route::get('leave-requests/reject/{id}', [LeaveRequestController::class, 'reject'])->name('leave-requests.reject');

    Route::get('/tasks/{id}/done', [TaskController::class, 'done'])->name('tasks.done');
    Route::get('/tasks/{id}/pending', [TaskController::class, 'pending'])->name('tasks.pending');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
