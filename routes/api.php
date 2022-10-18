<?php

use App\Http\Controllers\Api\AddressController;
use App\Http\Controllers\Api\BannerController;
use App\Http\Controllers\Api\CouponController;
use App\Http\Controllers\Api\GiftVoucherController;
use App\Http\Controllers\Api\OfferOfTheDayController;
use App\Http\Controllers\Api\Professional\BookingController;
use App\Http\Controllers\Api\Professional\RatingController;
use App\Http\Controllers\Api\ReferenceController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::namespace('Api')->name('api.')->group(function(){

    Route::post('verify_mobile/','UserController@verifyMobile');
	//forget password
	Route::post('forget/password/request','UserController@PasswordRequest');
	Route::post('forget/password/update','UserController@PasswordResetUpdate');

	Route::middleware('auth:api')->group(function(){
		//update name and dob
		Route::post('update-account','UserController@UpdateAccount');

		//update email
		Route::post('confirm-email','UserController@ConfirmEmail');
		Route::post('verify_email_otp','UserController@verifyEmail');
		Route::post('resend/email_otp','UserController@resendEmailOTP');

		//update mobile
		Route::post('confirm-mobile','UserController@ConfirmMobile');
		Route::post('verify_mobile_otp','UserController@verifyUpdateMobile');
		Route::post('resend/mobile_otp','UserController@resendMobileOTP');

		//change password
		Route::post('update-password','UserController@UpdatePassword');

		//upload avatar
		Route::post('update-avatar','UserController@UpdateAvatar');

		//get User
		Route::get('user','UserController@getUser');

		Route::get('brand','ProductController@getBrand');
		Route::post('brand/product','ProductController@brandProduct');
		Route::get('manufacturer','ProductController@getManufacturer');
		Route::post('category/product','ProductController@categoryProduct');
		Route::post('product','ProductController@Product');

		//Checkout
		Route::post('checkout',"CheckoutController@checkout");
		Route::post('payment','CheckoutController@EaseBuzz');
		Route::post('gettransaction','CheckoutController@getTransaction');


	});

	Route::post('payment_result','CheckoutController@getPaymentData');

    // Service Route's
    Route::post('service_create/','ServiceController@create');
    Route::post('service_update/','ServiceController@update');
    Route::post('service_delete/','ServiceController@delete');

    // Category Route's
    Route::post('category_create/','CategoryController@create');
    Route::post('category_update/','CategoryController@update');
    Route::post('category_delete/','CategoryController@delete');

    // Cities Route's
    Route::get('cities/', 'CityController@cities');

    // refer page Route
    Route::get('refer/',[ReferenceController::class,'refer']);
    Route::post('refer_create/','ReferenceController@create');

    // Testimonial Route
    Route::post('testimonial_create','TestimonialController@create');

    // Product Route's
    Route::post('product_create/','ProductController@create');


// Mobile get APIs :-
    //Login
    Route::post('login/',[UserController::class,'Login']);
    Route::post('login_with_otp/','UserController@LoginWithOtp');

    //Register
    Route::post('register/','UserController@Register');
    Route::post('professional_register/','UserController@ProfessionalRegister');

    Route::post('resend_otp/', 'UserController@resendOTP');


    // Category
    Route::get('category/', 'CategoryController@index');
    // Sub-Category  filtered by the category id
    Route::get('sub_category/{id}', 'CategoryController@subCategory');
    // Product filtered by the category_id & sub_category_id
    Route::get('products','ProductController@index');
    // Service filtered by the category_id & sub_category_id
    Route::get('services','ServiceController@index');
    // New Launched
    Route::get('new-launched',[ServiceController::class,'newLaunched']);
    // Testimonial filtered by the status = 1
    Route::get('testimonial','TestimonialController@testimonial');

    //Subscription Plan
    Route::get('subscription_plan','SubscriptionController@getSubscriptionPlanList');

    //Recommendation
    Route::get('products_recommendation','RecommendationController@getRandomProducts');
    Route::get('services_recommendation','RecommendationController@getRandomService');

    // Banner
    Route::get('/banner',[BannerController::class,'getBanner']);

    // Offer of the day
    Route::get('offer-of-the-day',[OfferOfTheDayController::class,'offerOfTheDay']);
    Route::post('offer-of-the-day-create',[OfferOfTheDayController::class,'create']);

    // refer history Route
    Route::post('refer-generate',[ReferenceController::class,'referGenerate']);

    // Coupon's
    Route::get('coupons',[CouponController::class,'getCoupon']);

    // get GEO Location
    Route::post('getProfLatLong',[\App\Http\Controllers\Professional\ProfileController::class,'getProfLatLong']);

    Route::middleware('auth:api')->group(function(){

        Route::post('logout/', 'UserController@logout');
        //Cart
        Route::post('cart_add','CartController@AddCart');
        Route::post('cart_quantity','CartController@AddCartQuantity');
        Route::post('cart_delete','CartController@RemoveCart');
        Route::get('cart','CartController@getCart');

        //WishList
        Route::get('wishes','WishListController@getWishList');
        Route::post('wish_add','WishListController@AddWish');
        Route::post('wish_remove','WishListController@RemoveWish');

        // User Subscription
        Route::post('membership-payment','UserSubscriptionController@membershipPayment');

        // Profile
        Route::get('profile',[UserController::class,'profile']);
        Route::post('updateProfile',[UserController::class,'updateProfile']);
        // Booking
        Route::post('service-booking',[BookingController::class,'bookingService']);
        Route::post('service-payment',[BookingController::class,'bookingPayment']);
        Route::get('booking-history',[BookingController::class,'bookingHistory']);

        // Rating
        Route::post('service-rating',[RatingController::class,'serviceRating']);
        Route::post('professional-rating',[RatingController::class,'professionalRating']);
        Route::post('app-rating',[RatingController::class,'appRating']);

        // refer history Route
        Route::get('refer-history/',[ReferenceController::class,'referHistory']);

        // Address
        Route::post('address-add/',[AddressController::class,'addNewAddress']);
        Route::get('address-get',[AddressController::class,'showAllAddress']);
        Route::post('address-update',[AddressController::class,'storeAddress']);
        Route::get('address-view',[AddressController::class,'addressView']);
        Route::post('address-delete',[AddressController::class,'AddressDelete']);
        Route::post('set-address-default',[AddressController::class,'setDefault']);

        // Gift Voucher
        Route::get('gift-voucher',[GiftVoucherController::class,'getVoucher']);
    });
});




