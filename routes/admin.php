<?php

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\IncomeController;
use App\Http\Controllers\Admin\ExpenseController;
use App\Http\Controllers\Admin\ProviderController;
use App\Models\TypeClinic;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');


Route::resource('roles', RoleController::class);

Route::resource('users', UserController::class);

Route::resource('providers', ProviderController::class)->only(['index', 'edit', 'update', 'destroy']);

Route::resource('incomes', IncomeController::class)->parameters([
    'incomes' => 'income'
]);

Route::resource('expenses', ExpenseController::class)->parameters([
    'expenses' => 'expense'
]);
