<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\Usercontroller;

use App\Http\Controllers\PlayBookController;
use App\Http\Controllers\ScanEngController;
use App\Http\Controllers\ServerController;
use App\Http\Controllers\AuditController;
use App\Http\Controllers\CredentialController;
use App\Http\Controllers\AuditServerController;

use App\Http\Controllers\RegexController;


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
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::name('admin.')->prefix('admin')->group(function () {
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


    //// this route is to get all the playBook Exist in our dataBase
    Route::resource('playbooks', PlayBookController::class);
    Route::resource('scanEngs', ScanEngController ::class);
    Route::resource('servers', ServerController ::class);
    Route::resource('credentials', CredentialController ::class);
    Route::get('credentials/create/{id}', [CredentialController::class,'create']);
    Route::resource('audit', AuditController ::class);
    Route::get('/audit/{id}/auditseccess', [AuditController ::class,'successAudit']);
    Route::get('/auditserver/{id}', [AuditServerController ::class,'show']);
    Route::resource('regex', RegexController::class);
    Route::get('/auditserver/{id}/manual', [AuditServerController ::class,'manual']);
    Route::post('/auditserver/{id}/manual', [AuditServerController ::class,'manualstore']);



//    Route::get('/playbook',[PlayBookController::class,'index']);
//    Route::get('/playbook/{playBook}',[PlayBookController::class,'show']);
//    Route::get('/playbook/c',[PlayBookController::class,'create']);
//
//    Route::post('/playbook',[PlayBookController::class,'store']);






});
/*Route::get('/admin',function(){
    return view('admin.index');
})->middleware(['auth','role:admin'])->name('admin.index');*/

require __DIR__.'/auth.php';