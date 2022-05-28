<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\Usercontroller;




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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth', 'role:Admin'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('/',[IndexController::class, 'index'])->name('index');
    Route::resource('/roles', RoleController::class);
    Route::post('/roles/{role}/permissions',[RoleController::class, 'givePermission'])->name('roles.permissions');
    Route::delete('/roles/{role}/permissions/{permission}',[RoleController::class, 'revokePermission'])->name('roles.permissions.revoke');
    Route::resource('/permissions', PermissionController::class);
    Route::post('/permissions/{permission}/roles',[RoleController::class, 'assignRole'])->name('permissions.roles');
    Route::delete('/permissions/{permission}/roles/{role}',[RoleController::class, 'revokeROle'])->name('permissions.roles.revoke');
    
    Route::get('/users',[Usercontroller::class,'index'])->name('users.index');
    Route::get('/users/{user}',[Usercontroller::class,'show'])->name('users.show');
    Route::get('/users/{user}',[Usercontroller::class,'destroy'])->name('users.destroy');
    Route::get('/users/{user}/roles',[Usercontroller::class,'assignRole'])->name('users.roles');
    Route::get('/users/{user}/roles/{role}',[Usercontroller::class,'removeRole'])->name('users.roles.remove');
    Route::get('/users/{user}/permissions',[Usercontroller::class,'givePermission'])->name('users.permissions');
    Route::get('/users/{user}/permissions/{permission}',[Usercontroller::class,'revokePermission'])->name('users.permissions.revoke');




    
    
    
});
/*Route::get('/admin',function(){
    return view('admin.index');
})->middleware(['auth','role:admin'])->name('admin.index');*/

require __DIR__.'/auth.php';
