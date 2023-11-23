<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TaskController;
use Spatie\Permission\Contracts\Permission;
use Spatie\Permission\Models\Permission as ModelsPermission;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\OrganizationDepartmentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskUserController;
use Illuminate\Support\Facades\Auth;

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
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// useless routes
// Just to demo sidebar dropdown links active states.
Route::get('/buttons/text', function () {
    return view('buttons-showcase.text');
})->middleware(['auth'])->name('buttons.text');

Route::get('/buttons/icon', function () {
    return view('buttons-showcase.icon');
})->middleware(['auth'])->name('buttons.icon');

Route::get('/buttons/text-icon', function () {
    return view('buttons-showcase.text-icon');
})->middleware(['auth'])->name('buttons.text-icon');

require __DIR__ . '/auth.php';

// Auth::routes(['Auth']);
Route::middleware(['auth'])->group(function () {
        Route::post('/org_dep', [OrganizationDepartmentController::class ,'store'])->name('department_organization.store');
        Route::get('/reports', [ReportController::class ,'index'])->name('reports.index');
        Route::get('/reports/generateReport', [ReportController::class ,'generateReport'])->name('reports.generateReport');
        Route::get('/reports/create', [ReportController::class ,'create'])->name('reports.create');
        Route::post('/reports/store', [ReportController::class ,'store'])->name('reports.store');

        Route::post('/mark-as-read', [HomeController::class ,'markNotification'])->name('Admin.markNotification');
            // organization
        Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
        Route::get('/organization/index', [OrganizationController::class, 'index'])->name('organizations.index');
        Route::get('/organization/create', [OrganizationController::class, 'create'])->name('organizations.create');
        Route::post('/organization/store', [OrganizationController::class, 'store'])->name('organizations.store');
        Route::get('/organization/edit/{organization}', [OrganizationController::class, 'edit'])->name('organizations.edit');
        Route::put('/organization/update/{organization}', [OrganizationController::class, 'update'])->name('organizations.update');
        Route::get('/organization/show/{organization}', [OrganizationController::class, 'show'])->name('organizations.show');
        Route::get('/organization/delete/{organization}', [OrganizationController::class, 'delete'])->name('organizations.delete');
        // Route::get('/organization/showItem/{organization}', [OrganizationController::class, 'showItem'])->name('organizations.showItem');

        //departments
        Route::get('/department/index', [DepartmentController::class, 'index'])->name('departments.index');
        Route::get('/department/create', [DepartmentController::class, 'create'])->name('departments.create');
        Route::get('/department/{id}/edit', [DepartmentController::class, 'edit'])->name('departments.edit');
        Route::get('/department/show/{department}', [DepartmentController::class, 'show'])->name('departments.show');
        Route::put('/department/update/{department}', [DepartmentController::class, 'update'])->name('departments.update');
        Route::delete('/department/delete/{department}', [DepartmentController::class, 'delete'])->name('departments.delete');
        Route::post('/department/store', [DepartmentController::class, 'store'])->name('departments.store');

        //projects
        Route::get('/project/index', [ProjectController::class, 'index'])->name('projects.index');
        Route::get('/project/create', [ProjectController::class, 'create'])->name('projects.create');
        Route::get('/project/edit/{id}', [ProjectController::class, 'edit'])->name('projects.edit');
        Route::get('/project/show/{project}', [ProjectController::class, 'show'])->name('projects.show');
        Route::get('/project/update/{project}', [ProjectController::class, 'update'])->name('projects.update');
        Route::delete('/project/delete/{project}', [ProjectController::class, 'delete'])->name('projects.delete');
        Route::post('/project/store', [ProjectController::class, 'store'])->name('projects.store');

        //tasks
        Route::get('/task/index', [TaskController::class, 'index'])->name('tasks.index');
        Route::get('/task/create', [TaskController::class, 'create'])->name('tasks.create');
        Route::get('/task/edit/{id}', [TaskController::class, 'edit'])->name('tasks.edit');
        Route::get('/task/show/{task}', [TaskController::class, 'show'])->name('tasks.show');
        Route::put('/task/update/$id', [TaskController::class, 'update'])->name('tasks.update');
        Route::get('/task/delete/{task}', [TaskController::class, 'delete'])->name('tasks.delete');
        Route::post('/task/store', [TaskController::class, 'store'])->name('tasks.store');

        //setting
        Route::get('/setting/security', [SettingController::class, 'index'])->name('settings.security');
        Route::get('/setting/preference', [SettingController::class, 'index'])->name('settings.preferences');
        Route::get('/setting/profile', [SettingController::class, 'index'])->name('settings.profile');
        //permissions

        Route::get('permissions', [PermissionController::class, 'index'])->name('permissions.index');
        Route::get('permissions/create', [PermissionController::class, 'create'])->name('permissions.create');
        Route::post('permissions', [PermissionController::class, 'store'])->name('permissions.store');
        Route::get('permissions/{permission}/edit', [PermissionController::class, 'edit'])->name('permissions.edit');
        Route::put('permissions/{permission}', [PermissionController::class, 'update'])->name('permissions.update');
        Route::delete('permissions/{permission}', [PermissionController::class, 'destroy'])->name('permissions.destroy');
        //Roles

        Route::get('roles', [RoleController::class, 'index'])->name('roles.index');
        Route::get('roles/create', [RoleController::class, 'create'])->name('roles.create');
        Route::post('roles/store', [RoleController::class, 'store'])->name('roles.store');
        Route::get('roles/{role}/edit', [RoleController::class, 'edit'])->name('roles.edit');
        Route::put('roles/{role}', [RoleController::class, 'update'])->name('roles.update');
        Route::delete('roles/{role}', [RoleController::class, 'destroy'])->name('roles.destroy');
        //users
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
        Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
        Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/users/{user}', [UserController::class, 'delete'])->name('users.delete');
        Route::post('task_assign',[TaskUserController::class,'store'])->name('taskAssign.store');

});
