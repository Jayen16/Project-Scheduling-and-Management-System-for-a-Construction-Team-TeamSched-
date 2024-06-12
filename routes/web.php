<?php

// use App\Livewire\Auth\Login;
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
use App\Livewire\Component\ProjectManager\ProjectManagement\Project;
use App\Livewire\Component\ProjectManager\ProjectManagement\ProjectSummary;
use App\Livewire\Dashboard\Dashboard;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('welcome');
// });

//LOGIN
Route::group(['middleware' => ['guest']], function() {
    Route::get('/', Login::class)->name('login.index');
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
    
    
    // Project Manager
    Route::get('/manpower', ManpowerList::class)->name('manpower.index');
    Route::get('/project-management', Project::class)->name('project-management.index');
    Route::get('/project-management/add', AddProject::class)->name('project.create');
    Route::get('/project/{project}', ProjectSummary::class)->name('project-summary.index');
    Route::get('/project/edit/{project}', EditProject::class)->name('project.edit');
    
    
    // sample only
    Route::get('/logbook', Logbook::class)->name('logbook.index');

});





// Authentication routes
// Route::group(['prefix' => 'auth'], function () {
//     Route::get('login', Login::class)->name('login');
//     Route::get('register', Register::class)->name('register');
// });
