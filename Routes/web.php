<?php

use Illuminate\Support\Facades\Route;
use Modules\Rbac\Http\Controllers\PermissionController;
use Modules\Rbac\Http\Controllers\RoleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('rbac')->name('rbac.')->group(function() {
    Route::get('/', 'RbacController@index');
    //Permission
    Route::resource('permissions', PermissionController::class)->where(['permission' => '([0-9]+)']);
    Route::prefix('permissions')->name('permissions.')->group(function () {
        Route::patch('{permission}/restore', [PermissionController::class, 'restore'])->name('restore');
        Route::get('/export', [PermissionController::class, 'export'])->name('export');
        Route::get('/import', [PermissionController::class, 'import'])->name('import');
        Route::post('/import', [PermissionController::class, 'importBulk']);
        Route::post('/print', [PermissionController::class, 'print'])->name('print');
    });

    //Role
    Route::resource('roles', RoleController::class)->where(['role' => '([0-9]+)']);
    Route::prefix('roles')->name('roles.')->group(function () {
        Route::patch('{role}/restore', [RoleController::class, 'restore'])->name('restore');
        Route::get('permission', [RoleController::class, 'permission'])->name('permission');
        Route::get('export', [RoleController::class, 'export'])->name('export');
        Route::get('import', [RoleController::class, 'import'])->name('import');
        Route::post('import', [RoleController::class, 'importBulk']);
        Route::post('print', [RoleController::class, 'print'])->name('print');
    });
});
