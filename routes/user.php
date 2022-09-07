<?php

use Illuminate\Support\Facades\Route;

// Route::namespace('User')->name('user.')->middleware(['customer'])->group(function(){

// 	//Route::get('/','HomeController@index')->name('home');

// 	//commingsoon

// 	Route::get('/',function(){

// 		return view('user.commingsoon');

// 	});

// 	Route::get('category/{category_slug}/{id}','HomeController@Category')->name('category');
// 	Route::get('brand/{brand_slug}/{id}','HomeController@Brand')->name('brand');

// 	//productView
// 	Route::get('products/{product_slug}/{id}','HomeController@ProductView')->name('product_view');

// 	//Quickview
// 	Route::get('quick_view/{id}','HomeController@Quickview')->name('quick_view');

// 	//about us
// 	Route::get('aboutus','HomeController@AboutUs')->name('about_us');

// 	//refund policy
// 	Route::get('refund_policy','HomeController@RefundPolicy')->name('refund_policy');

// 	//terms of use
// 	Route::get('terms_of_use','HomeController@TermsofUse')->name('terms_of_use');

// 	Route::prefix('user')->group(function(){

// 		Route::get('register','CustomerController@showRegisterForm')->name('register');
// 		Route::post('register/post','CustomerController@Register')->name('register.post');
// 		Route::post('register/verify_mobile','CustomerController@VerifyMobile')->name('verify_mobile');
// 		Route::post('register/resend_otp','CustomerController@resendOTP')->name('sendOTP');

// 		Route::get('login','CustomerController@showLoginForm')->name('login');
// 		Route::post('login/post','CustomerController@Login')->name('login.post');
// 		Route::get('password/reset','CustomerController@showPasswordResetForm')->name('password.reset');

// 		Route::post('forget/password/request','CustomerController@PasswordRequest')->name('password.request');

// 		Route::post('forget/password/update','CustomerController@PasswordResetUpdate')->name('password.update');

// 		//cart
// 		Route::post('ajax/add_to_cart','CartController@AddtoCart')->name('add_to_cart');
// 		Route::get('/ajax/cart','CartController@GetCart')->name('get_cart');
// 		Route::get('/ajax/remove_cart_item/{id}','CartController@AjaxRemoveCart')->name('remove_cart_item');
// 		Route::post('/ajax/qty/','CartController@AjaxQtyCart')->name('cart_qty');
// 		Route::get('/ajax/cart/page','CartController@GetCart')->name('get_cart_page');


// 		Route::get('/cart/','CartController@Cart')->name('cart');
// 		Route::post('/cart/update','CartController@UpdateCart')->name('cart.update');
// 		Route::get('/cart/remove/{id}','CartController@RemoveCart')->name('remove_cart_button');

// 		//customer

// 		Route::middleware(['userauth'])->group(function(){

// 			Route::get('/overview','CustomerController@index')->name('overview');
// 			Route::get('edit-account','CustomerController@editAccount')->name('edit-account');
// 			Route::post('update-account','CustomerController@UpdateAccount')->name('update-account');
// 			Route::get('update-email','CustomerController@UpdateEmail')->name('update-email');
// 			Route::post('confirm-email','CustomerController@ConfirmEmail')->name('confirm-email');
// 			Route::post('resend/email_otp','CustomerController@resendEmailOTP')->name('emailsendOTP');
// 			Route::post('verify_email','CustomerController@verifyEmail')->name('verify_email');

// 			Route::get('update-mobile','CustomerController@UpdateMobile')->name('update-mobile');
// 			Route::post('confirm-mobile','CustomerController@ConfirmMobile')->name('confirm-mobile');
// 			Route::post('verify_mobile','CustomerController@verifyUpdateMobile')->name('verify_update_mobile');
// 			Route::post('resend/mobile_otp','CustomerController@resendMobileOTP')->name('mobilesendOTP');
// 			Route::get('orders','CustomerController@Order')->name('orders');
// 			Route::get('address','CustomerController@Address')->name('address');
// 			Route::get('address/add','CustomerController@AddressAdd')->name('address.create');
// 			Route::post('address/store','CustomerController@AddressStore')->name('address.store');
// 			Route::get('address-edit/{id}','CustomerController@AddressEdit')->name('address.edit');
// 			Route::post('address-update','CustomerController@AddressUpdate')->name('address.update');
// 			Route::get('address-delete/{id}','CustomerController@AddressDelete')->name('address.destroy');
// 			Route::get('change-password','CustomerController@ChangePassword')->name('change-password');
// 			Route::post('update-password','CustomerController@UpdatePassword')->name('update_password');
// 			Route::post('update-avatar','CustomerController@UpdateAvatar')->name('update_avatar');
// 			Route::post('user/logout','CustomerController@Logout')->name('logout');

// 			//wishlist
// 			Route::get('add_to_wishlist/','WishlistController@AddWishlist')->name('add_wishlist');

// 			//checkout
// 			Route::match(['get','post'],'/checkout/','CheckoutController@index')->name('checkout');
// 			Route::post('/checkout/process','CheckoutController@store')->name('checkout.process');

// 		});

// 	});

// });


// Route::get('/',function(){

// 	return view('user.commingsoon');

// });

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
