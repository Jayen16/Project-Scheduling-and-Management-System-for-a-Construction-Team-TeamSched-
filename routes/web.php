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
    // , 'middleware' => ['role:admin']]
    Route::group(['prefix' => 'account-management'], function() {
   
        Route::get('/', AccountManagement::class)->name('account-management.index');
        Route::get('/add', AddAccount::class)->name('account.create');
        Route::get('/profile/{member}', AccountProfile::class)->name('profile.index');
        Route::get('/profile/edit/{member}', EditProfile::class)->name('profile.edit');
        
    });
    
    
    // account management
    // Route::get('/account-management', AccountManagement::class)->name('account-management.index');
    // Route::get('/account-management/add', AddAccount::class)->name('account.create');
    // Route::get('/account-management/profile', AccountProfile::class)->name('profile.index');
    // Route::get('/account-management/profile/edit', EditProfile::class)->name('profile.edit');


// Project Manager
Route::get('/manpower', ManpowerList::class)->name('manpower.index');
Route::get('/project-management', Project::class)->name('project-management.index');
Route::get('/project-management/add', AddProject::class)->name('project.create');
Route::get('/project-management/id', ProjectSummary::class)->name('project-summary.index');
Route::get('/project-management/edit', EditProject::class)->name('project.edit');
Route::get('/task/view', TaskView::class)->name('task.index');
Route::get('/manpower/profile', ManpowerProfile::class)->name('manpower-profile.index');


// Site Supervisor
Route::get('/projects', Projects::class)->name('projects.index');
Route::get('/projects/details', ProjectDetails::class)->name('project-details.index');
Route::get('/projects/details/progress', ProgressReport::class)->name('progress-report.index');

    // Project Manager
    Route::get('/manpower', ManpowerList::class)->name('manpower.index');
    Route::get('/manpower/profile/{employee}', ManpowerProfile::class)->name('manpower-profile.index');



    Route::get('/project-management', Project::class)->name('project-management.index');
    Route::get('/project-management/add', AddProject::class)->name('project.create');
    Route::get('/project/{project}', ProjectSummary::class)->name('project-summary.index');
    Route::get('/project/edit/{project}', EditProject::class)->name('project.edit');

    Route::get('/task/view/{project}/{task}', TaskView::class)->name('task.index');
    
    // sample only
    Route::get('/logbook', Logbook::class)->name('logbook.index');

});




// Authentication routes
// Route::group(['prefix' => 'auth'], function () {
//     Route::get('login', Login::class)->name('login');
//     Route::get('register', Register::class)->name('register');
// });
