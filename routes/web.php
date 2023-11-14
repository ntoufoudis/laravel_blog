<?php

use App\Http\Controllers\Auth\VerifyEmailController;
use App\Livewire\Pages\Admin\Users;
use App\Livewire\Pages\Auth\ConfirmPassword;
use App\Livewire\Pages\Auth\ForgotPassword;
use App\Livewire\Pages\Auth\Login;
use App\Livewire\Pages\Auth\Register;
use App\Livewire\Pages\Auth\ResetPassword;
use App\Livewire\Pages\Auth\VerifyEmail;
use App\Livewire\Pages\Profile;
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

Route::get('/', function () {return view('welcome');});
Route::get('dashboard', function () {return view('dashboard');})->name('dashboard');
//    ->middleware(['auth', 'verified'])->name('dashboard');

// Routes below this point are OK.

Route::middleware('guest')->group(function () {
    Route::get('login', Login::class)->name('login');
    Route::get('register', Register::class)->name('register');
    Route::get('forgot-password', ForgotPassword::class)->name('password.request');
    Route::get('reset-password/{token}', ResetPassword::class)->name('password.reset');
});

Route::middleware('auth')->group(function () {
    Route::get('confirm-password', ConfirmPassword::class)->name('password.confirm');
    Route::get('profile', Profile::class)->name('profile.edit');
    Route::get('verify-email', VerifyEmail::class)->name('verification.notice');
    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::get('admin', function () {
       return view('livewire.pages.admin.index');
    })->name('admin.index');
    Route::get('admin/users', Users::class)->name('admin.users');
});
