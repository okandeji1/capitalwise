<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
});

Route::prefix('dashboard')->group(function () {
	Route::view('dashboard-02', 'admin.dashboard.dashboard-02')->name('dashboard-02');
});



Route::prefix('users')->group( function(){
	Route::view('user-profile', 'admin.apps.user-profile')->name('user-profile');
	Route::view('create-customer', 'admin.apps.create-customer')->name('create-customer');
	Route::view('create-user', 'admin.apps.create-user')->name('create-user');
	Route::view('edit-profile', 'admin.apps.edit-profile')->name('edit-profile');
	Route::view('manage-users', 'admin.apps.manage-users')->name('manage-users');
});

Route::prefix('savings')->group( function(){
	Route::view('setup-savings', 'admin.apps.setup-savings')->name('setup-savings');
	Route::view('deposit', 'admin.apps.deposit')->name('deposit');
	Route::view('savings-history', 'admin.apps.savings-history')->name('savings-history');
});

Route::prefix('profile')->group( function(){
	Route::view('edit_profile', 'admin.apps.edit_profile')->name('edit_profile');
	Route::view('change_password', 'admin.apps.change_password')->name('change_password');
});

Route::prefix('loans')->group( function(){
	Route::view('apply', 'admin.apps.apply')->name('apply');
	Route::view('repay_loan', 'admin.apps.repay_loan')->name('repay_loan');
	Route::view('loan_history', 'admin.apps.loan_history')->name('loan_history');
});

Route::view('icon', 'admin.icons.feather-icon')->name('icon');


Route::prefix('settings')->group( function(){
	Route::view('website_settings', 'admin.apps.website_settings')->name('website_settings');
	Route::view('app_settings', 'admin.apps.app_settings')->name('app_settings');
});



Route::view('all_reports', 'admin.apps.all_reports')->name('all_reports');

Route::view('error-page1', 'admin.errors.error-page1')->name('error-page1');
Route::view('error-page2', 'admin.errors.error-page2')->name('error-page2');
Route::view('error-page3', 'admin.errors.error-page3')->name('error-page3');
Route::view('error-page4', 'admin.errors.error-page4')->name('error-page4');

Route::view('login', 'admin.authentication.login')->name('login');
Route::view('login_one', 'admin.authentication.login_one')->name('login_one');
Route::view('login_two', 'admin.authentication.login_two')->name('login_two');
Route::view('login-bs-validation', 'admin.authentication.login-bs-validation')->name('login-bs-validation');
Route::view('login-bs-tt-validation', 'admin.authentication.login-bs-tt-validation')->name('login-bs-tt-validation');
Route::view('login-sa-validation', 'admin.authentication.login-sa-validation')->name('login-sa-validation');
Route::view('sign-up', 'admin.authentication.sign-up')->name('sign-up');
Route::view('sign-up-one', 'admin.authentication.sign-up-one')->name('sign-up-one');
Route::view('sign-up-two', 'admin.authentication.sign-up-two')->name('sign-up-two');
Route::view('unlock', 'admin.authentication.unlock')->name('unlock');
Route::view('forget-password', 'admin.authentication.forget-password')->name('forget-password');
Route::view('creat-password', 'admin.authentication.creat-password')->name('creat-password');
Route::view('maintenance', 'admin.authentication.maintenance')->name('maintenance');

Route::view('comingsoon', 'admin.comingsoon.comingsoon')->name('comingsoon');
Route::view('comingsoon-bg-video', 'admin.comingsoon.comingsoon-bg-video')->name('comingsoon-bg-video');
Route::view('comingsoon-bg-img', 'admin.comingsoon.comingsoon-bg-img')->name('comingsoon-bg-img');
