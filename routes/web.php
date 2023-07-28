<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PermissionsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'verified']],function(){

    //route dashboard
    Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('dashboard');

    //route users
    Route::resource('users',UserController::class);
    Route::get('users/update-status/{id}',[UserController::class,'status_update'])->name('users.update-status');
    Route::post('/users/{user}/roles', [UserController::class, 'assignRole'])->name('users.roles');
    Route::delete('/users/{user}/roles/{role}', [UserController::class, 'removeRole'])->name('users.roles.remove');
    Route::post('/users/{user}/permissions', [UserController::class, 'givePermission'])->name('users.permissions');
    Route::delete('/users/{user}/permissions/{permission}', [UserController::class, 'revokePermission'])->name('users.permissions.revoke');
    //Route Profile
    Route::resource('profile',ProfileController::class);


    // Role And Prmations

    Route::resource('roles',RolesController::class);
    Route::post('/roles/{role}/permissions', [RolesController::class, 'givePermission'])->name('roles.permissions');
    Route::delete('/roles/{role}/permisstion/{permission}',[RolesController::class,'revokePermission'])->name('roles.permission.revoke');
    Route::resource('permissions',PermissionsController::class);
    Route::post('/role/{permission}/role',[PermissionsController::class,'assignRole'])->name('permissions.roles');
    Route::delete('/role/{permission}/role/{role}',[PermissionsController::class,'removeRole'])->name('permissions.role.revoke');

});
require __DIR__.'/auth.php';
