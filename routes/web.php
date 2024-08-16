<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;


Route::get('/', function () {
    return view('website.welcome');
});

Route::resource('products', ProductController::class);
Route::resource('companies', CompanyController::class);

Route::get('signup', [EmployeeController::class, 'showSignUpForm'])->name('admin.signup');
Route::post('signup', [EmployeeController::class, 'signUp'])->name('admin.signup.submit');
Route::get('signin', [EmployeeController::class, 'showSignIn'])->name('admin.signin');
Route::post('signin', [EmployeeController::class, 'signIn'])->name('admin.signin.submit');
Route::post('logout', [EmployeeController::class, 'logout'])->name('admin.logout');
Route::get('profile', [EmployeeController::class, 'profile'])->middleware('auth')->name('admin.profile');
