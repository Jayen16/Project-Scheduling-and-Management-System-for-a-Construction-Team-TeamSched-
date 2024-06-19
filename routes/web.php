<?php

// use App\Livewire\Auth\Login;

use App\Livewire\Auth\Login as AuthLogin;
use App\Livewire\Auth\Register;
use App\Livewire\Component\Admin\AccountManagement;
use App\Livewire\Component\Admin\AccountProfile;
use App\Livewire\Component\Admin\AddAccount;
use App\Livewire\Component\Admin\EditProfile;
use App\Livewire\Component\Logbook;
use App\Livewire\Component\Login;
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


// Route::get('/', function () {
//     return view('welcome');
// });

//LOGIN
Route::group(['middleware' => ['guest']], function() {
    // Route::get('/login', Login::class)->name('login.index');
    Route::get('/', function () {
        return redirect('/login');
    });
    Route::get('/login', AuthLogin::class)->name('login');
    Route::get('/register', Register::class)->name('register');
});

//AUTHENTICATED USER
Route::group(['middleware' => ['auth']], function () {

    Route::get('/dashboard', Dashboard::class)->name('dashboard.index');

    Route::group(['prefix' => 'account-management','middleware' => ['role:admin']], function() {
   
        Route::get('/', AccountManagement::class)->name('account-management.index');
        Route::get('/add', AddAccount::class)->name('account.create');
        Route::get('/profile/{member}', AccountProfile::class)->name('profile.index');
        Route::get('/profile/edit/{member}', EditProfile::class)->name('profile.edit');
        
    });
    
    Route::group(['prefix' => 'manpower','middleware' => ['role:manager']], function() {
        Route::get('/', ManpowerList::class)->name('manpower.index');
        Route::get('/profile/{employee}', ManpowerProfile::class)->name('manpower-profile.index');
    });

    Route::group(['prefix' => 'project-management','middleware' => ['role:manager']], function() {
        Route::get('/', Project::class)->name('project-management.index');
        Route::get('/add', AddProject::class)->name('project.create');
    });

    Route::group(['prefix' => 'project','middleware' => ['role:manager']], function() {
        Route::get('/{project}', ProjectSummary::class)->name('project-summary.index');
        Route::get('/edit/{project}', EditProject::class)->name('project.edit');
    });


    Route::get('/task/view/{project}/{task}', TaskView::class)->middleware(['role:supervisor|manager'])->name('task.index');
    

    Route::group(['prefix' => 'projects','middleware' => ['role:supervisor']], function() {
        Route::get('/', Projects::class)->name('projects.index');
        Route::get('/details/{project}', ProjectDetails::class)->name('project-details.index');
        Route::get('/details/progress/{task}', ProgressReport::class)->name('progress-report.index');
    });
    // Site Supervisor


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



// Authentication routes
// Route::group(['prefix' => 'auth'], function () {
//     Route::get('login', Login::class)->name('login');
//     Route::get('register', Register::class)->name('register');
// });
