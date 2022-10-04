<?php

use Illuminate\Support\Facades\Route;

// website route
Route::namespace('Website')->group(function () {
	Route::get('/', [
		'uses' => 'HomeController@index',
		'as' => 'spa.home',
	]);
	Route::get('about/us', [
		'uses' => 'HomeController@aboutUs',
		'as' => 'spa.about.us',
	]);
	Route::get('privacy/policy', [
		'uses' => 'HomeController@privacyPolicy',
		'as' => 'spa.privacy.policy',
	]);
	Route::get('terms/conditions', [
		'uses' => 'HomeController@termCondition',
		'as' => 'spa.terms.conditions',
	]);
	Route::get('contact/us', [
		'uses' => 'HomeController@getContact',
		'as' => 'spa.contact',
	]);
	Route::post('contact/us', [
		'uses' => 'HomeController@postContact',
		'as' => 'spa.contact.create',
	]);
	Route::get('services/{id?}', [
		'uses' => 'HomeController@getServices',
		'as' => 'spa.services.city',
	]);
	Route::get('services/category/{id?}', [
		'uses' => 'HomeController@getServiceCategory',
		'as' => 'spa.services.category',
	]);
	Route::get('services/products/{category_id?}/{brand_id?}/{sub_cat_id?}', [
		'uses' => 'HomeController@getProducts',
		'as' => 'spa.services.products',
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
