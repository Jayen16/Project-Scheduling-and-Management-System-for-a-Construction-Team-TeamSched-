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
use App\Livewire\Component\Manpower\ProjectDetails as ManpowerProjectDetails;
use App\Livewire\Component\ProjectManager\Manpower\ManpowerList;
use App\Livewire\Component\ProjectManager\ProjectManagement\AddProject;
use App\Livewire\Component\ProjectManager\ProjectManagement\EditProject;
use App\Livewire\Component\ProjectManager\ProjectManagement\ManpowerProfile;
use App\Livewire\Component\ProjectManager\ProjectManagement\Project;
use App\Livewire\Component\ProjectManager\ProjectManagement\ProjectSummary;
use App\Livewire\Component\ProjectManager\ProjectManagement\TaskView;
use App\Livewire\Component\SiteSupervisor\ProgressReport;
use App\Livewire\Component\Share\ProjectDetails;
use App\Livewire\Component\Share\Projects;
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

    Route::get('/dashboard', Dashboard::class)->name('dashboard.index')->middleware(['role:manager']);

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
        Route::get('/project/{project}', ProjectSummary::class)->name('project-summary.index');
        Route::get('/project/edit/{project}', EditProject::class)->name('project.edit');
    });


    Route::get('/task/view/{project}/{task}', TaskView::class)->middleware(['role:supervisor|manager'])->name('task.index');
    

    Route::group(['prefix' => 'projects'], function() {
        Route::get('/', Projects::class)->name('projects.index')->middleware(['role:supervisor|manpower']);
        Route::get('/details/{project}', ProjectDetails::class)->name('project-details.index')->middleware(['role:supervisor|manpower']);
        Route::get('/details/progress/{task}', ProgressReport::class)->name('progress-report.index')->middleware(['role:supervisor']);
    });
    

});



// Authentication routes
// Route::group(['prefix' => 'auth'], function () {
//     Route::get('login', Login::class)->name('login');
//     Route::get('register', Register::class)->name('register');
// });
