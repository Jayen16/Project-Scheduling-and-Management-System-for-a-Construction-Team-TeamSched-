<?php

use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Component\Admin\AccountManagement;
use App\Livewire\Component\Admin\AccountProfile;
use App\Livewire\Component\Admin\AddAccount;
use App\Livewire\Component\Admin\EditProfile;
use App\Livewire\Component\Logbook;
use App\Livewire\Component\Project;
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

Route::group(['prefix' => 'account-management', 'middleware' => ['role:admin']], function() {
   
    Route::get('/', AccountManagement::class)->name('account-management.index');
    Route::get('/add', AddAccount::class)->name('account.create');
    Route::get('/profile/{member}', AccountProfile::class)->name('profile.index');
    Route::get('/profile/edit/{member}', EditProfile::class)->name('profile.edit');
    
});


// sample only
Route::get('/logbook', Logbook::class)->name('logbook.index');
Route::get('/project', Project::class)->name('project.index');

// Authentication routes
Route::group(['prefix' => 'auth'], function () {
    Route::get('login', Login::class)->name('login');
    Route::get('register', Register::class)->name('register');
});
