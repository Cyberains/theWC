<?php

use Illuminate\Support\Facades\Route;

// website route
Route::namespace('Website')->group(function () {
	Route::get('/', [
		'uses' => 'HomeController@index',
		'as' => 'spa.home',
	]);
    Route::get('privacy/policy', [
        'uses' => 'HomeController@privacyPolicy',
        'as' => 'spa.privacy.policy',
    ]);
	Route::post('contact/us', [
		'uses' => 'HomeController@postContact',
		'as' => 'spa.contact.create',
	]);
});



Route::get('/privacy', function () {

	return view('spa.privacy');
})->name('spa.privacy');

Route::get('/terms', function () {

	return view('spa.terms');
})->name('spa.terms');

Route::get('/disclaimer', function () {

	return view('spa.disclaimer');
})->name('spa.disclaimer');

Route::get('/refund', function () {

	return view('spa.refund');
})->name('spa.refund');

Route::get('/offer/today', 'User\HomeController@Offer')->name('user.offer');

Route::post('/user/contact/email', 'User\HomeController@ContactMail')->name('user.contact');
