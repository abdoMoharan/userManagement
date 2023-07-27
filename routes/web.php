<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

});
require __DIR__.'/auth.php';
