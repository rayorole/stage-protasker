<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MemberController;
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




Route::middleware('auth')->group(function () {

    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
    Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
    Route::post('/projects/create', [ProjectController::class, 'store'])->name('projects.store');

    Route::get('/projects/{project}', [ProjectController::class, 'showDashboard'])->name('projects.dashboard.index');
    
    Route::get('/projects/{project}/settings', [ProjectController::class, 'showSettings'])->name('projects.dashboard.settings');
    
    Route::get('/projects/{project}/project-members', [ProjectController::class, 'showProjectMembers'])->name('projects.dashboard.project-members');
    
    Route::get('/projects/{project}/add-member', [ProjectController::class, 'addMember'])->name('projects.dashboard.add-member');
    Route::post('/projects/{project}/add-member', [MemberController::class, 'store'])->name('projects.dashboard.add-member');
    // Route::post('/projects/{project}/add-member', [MemberController::class, 'store'])->name('projects.dashboard.add-member');
    //

    
    Route::get('/projects/{project}/all-tasks', [ProjectController::class, 'allTasks'])->name('projects.dashboard.all-tasks');
    Route::get('/projects/{project}/add-task', [ProjectController::class, 'addTask'])->name('projects.dashboard.add-task');

    
});





require __DIR__ . '/auth.php';
