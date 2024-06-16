<?php

use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Component\Admin\AccountManagement;
use App\Livewire\Component\Admin\AccountProfile;
use App\Livewire\Component\Admin\AddAccount;
use App\Livewire\Component\Admin\EditProfile;
use App\Livewire\Component\Logbook;
use App\Livewire\Component\ProjectManager\Manpower\ManpowerList;
use App\Livewire\Component\ProjectManager\ProjectManagement\AddProject;
use App\Livewire\Component\ProjectManager\ProjectManagement\EditProject;
use App\Livewire\Component\ProjectManager\ProjectManagement\ManpowerProfile;
use App\Livewire\Component\ProjectManager\ProjectManagement\Project;
use App\Livewire\Component\ProjectManager\ProjectManagement\ProjectSummary;
use App\Livewire\Component\ProjectManager\ProjectManagement\TaskView;
use App\Livewire\Component\SiteSupervisor\ProgressReport;
use App\Livewire\Component\SiteSupervisor\ProjectDetails;
use App\Livewire\Component\SiteSupervisor\Projects;
use App\Livewire\Dashboard\Dashboard;
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
    return view('welcome');
});

// Dashboard routes
Route::group(['middleware' => ['auth', 'verified'], 'prefix' => 'dashboard'], function () {
    Route::get('/', Dashboard::class)->name('dashboard.index');
});

// login
Route::get('/login', \App\Livewire\Component\Login::class)->name('login.index');

// admin
// account management
Route::get('/account-management', AccountManagement::class)->name('account-management.index');
Route::get('/account-management/add', AddAccount::class)->name('account.create');
Route::get('/account-management/profile', AccountProfile::class)->name('profile.index');
Route::get('/account-management/profile/edit', EditProfile::class)->name('profile.edit');

// Project Manager
Route::get('/manpower', ManpowerList::class)->name('manpower.index');
Route::get('/project-management', Project::class)->name('project-management.index');
Route::get('/project-management/add', AddProject::class)->name('project.create');
Route::get('/project-management/id', ProjectSummary::class)->name('project-summary.index');
Route::get('/project-management/edit', EditProject::class)->name('project.edit');
Route::get('/task/view', TaskView::class)->name('task.index');
Route::get('/manpower/profile', ManpowerProfile::class)->name('manpower-profile.index');

// Site Supervisor
Route::get('/projects-site-supervisor', Projects::class)->name('projects-site-supervisor.index');
Route::get('/projects-site-supervisor/details', ProjectDetails::class)->name('project-details.index');
Route::get('/projects/details/progress', ProgressReport::class)->name('progress-report.index');

// Manpower
Route::get('/projects-manpower', \App\Livewire\Component\Manpower\Projects::class)->name('projects-manpower.index');
Route::get('/projects-manpower/details', \App\Livewire\Component\Manpower\ProjectDetails::class)->name('projects-details-manpower.index');

// sample only
Route::get('/logbook', Logbook::class)->name('logbook.index');

// Authentication routes
Route::group(['prefix' => 'auth'], function () {
    Route::get('login', Login::class)->name('login');
    Route::get('register', Register::class)->name('register');
});
