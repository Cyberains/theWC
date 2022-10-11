<?php

use App\Http\Controllers\Admin\BookingStatusController;
use App\Http\Controllers\Admin\NewLaunchedController;
use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Lead\LeadController;
use App\Http\Controllers\Professional\Auth\RegisterController;
use App\Http\Controllers\Professional\DashboardController;
use App\Http\Controllers\Professional\ProfileController;
use App\Http\Controllers\Professional\ServiceHistoryController;
use App\Http\Controllers\Professional\ServiceRatingController;
use Illuminate\Support\Facades\Route;
use const App\Http\Controllers\Admin\CityController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();


Route::get('/lead',[LeadController::class,'index'])->name('get-lead');
Route::post('/lead',[LeadController::class,'store'])->name('post-lead');

Route::get('pushes', function () {

	return view('viewpush');
});


Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function () {

	Route::get('login', function () {return view('auth.login');});
	Route::get('/', function () {return redirect('admin/login');})->name('login');
	Route::middleware(['auth', 'admin'])->group(function () {

        // Lead
        Route::get('/lead-mail-page',[LeadController::class,'getMailsPage'])->name('lead-mail-page');
		// Dashboard
		Route::get('dashboard', 'DashboardController@index')->name('dashboard');

		// Category
		Route::get('category', 'CategoryController@index')->name('category');
		Route::get('category/create', 'CategoryController@create')->name('add_category');
		Route::post('category/create', 'CategoryController@store')->name('add_category');
		Route::get('category/import', 'CategoryController@import')->name('import_category');
		Route::get('category/csv/sample', 'CategoryController@downloadCSVSample')->name('download_csv_sample_category');
		Route::post('category/import/csv', 'CategoryController@importCSV')->name('import_csv_category');
		Route::post('category/edit', 'CategoryController@edit')->name('edit_category');
		Route::post('category/update', 'CategoryController@update')->name('update_category');
		Route::get('category/delete/{id}', 'CategoryController@destroy')->name('delete_category');

		// Sub-Category
		Route::get('subcategory', 'SubCategoryController@index')->name('subcategory');
		Route::post('subcategory/create', 'SubCategoryController@store')->name('add_subcategory');
		Route::post('subcategory/get', 'SubCategoryController@GetSubCategory')->name('get_subcategory');
		Route::post('subcategory/edit', 'SubCategoryController@edit')->name('edit_subcategory');
		Route::post('subcategory/update', 'SubCategoryController@update')->name('update_subcategory');
		Route::get('subcategory/delete/{id}', 'SubCategoryController@destroy')->name('delete_subcategory');

        // Service
        Route::get('service', [ServiceController::class,'index'])->name('service');
        Route::get('service/search', [ServiceController::class,'itemSearch'])->name('search-service');
        Route::get('service/create', [ServiceController::class,'create'])->name('add-service');
        Route::post('service/create', [ServiceController::class,'store'])->name('add-service');
        Route::post('service/edit', [ServiceController::class,'edit'])->name('edit-service');
        Route::post('service/update', [ServiceController::class,'update'])->name('update-service');
        Route::get('service/delete/{id}', [ServiceController::class,'destroy'])->name('delete-service');
        Route::get('service/import', [ServiceController::class,'import'])->name('import-service');
        Route::get('service/csv/sample', [ServiceController::class,'downloadCSVSample'])->name('download_csv_sample-service');
        Route::post('service/import/csv', [ServiceController::class,'importCSV'])->name('import_csv-service');

        // New Launched
        Route::get('new/launched', [NewLaunchedController::class,'index'])->name('new-launched');
        Route::get('new/launched/search', [NewLaunchedController::class,'itemSearch'])->name('search-new-launched');
        Route::get('new/launched/create', [NewLaunchedController::class,'create'])->name('get-new-launched');
        Route::post('new/launched/create', [NewLaunchedController::class,'store'])->name('add-new-launched');
        Route::post('new/launched/edit', [NewLaunchedController::class,'edit'])->name('edit-new-launched');
        Route::post('new/launched/update', [NewLaunchedController::class,'update'])->name('update-new-launched');
        Route::get('new/launched/delete/{id}', [NewLaunchedController::class,'destroy'])->name('delete-new-launched');

        // Plans
        Route::get('plan', [PlanController::class,'index'])->name('plan');
        Route::get('plan/search', [PlanController::class,'itemSearch'])->name('search-plan');
        Route::get('plan/create', [PlanController::class,'create'])->name('add-plan');
        Route::post('plan/create', [PlanController::class,'store'])->name('add-plan');
        Route::post('plan/edit', [PlanController::class,'edit'])->name('edit-plan');
        Route::post('plan/update', [PlanController::class,'update'])->name('update-plan');
        Route::get('plan/delete/{id}', [PlanController::class,'destroy'])->name('delete-plan');
        Route::get('plan/import', [PlanController::class,'import'])->name('import-plan');
        Route::get('plan/csv/sample', [PlanController::class,'downloadCSVSample'])->name('download_csv_sample-plan');
        Route::post('plan/import/csv', [PlanController::class,'importCSV'])->name('import_csv-plan');

        // Plans
        Route::get('bookings', [BookingStatusController::class,'index'])->name('bookings');
        Route::get('bookings/search', [BookingStatusController::class,'itemSearch'])->name('search-bookings');
        Route::post('/assign-prof',[BookingStatusController::class,'assignProfessional'])->name('assign-prof');

        // Brand
		Route::get('brand', 'BrandController@index')->name('brand');
		Route::get('brand/add', 'BrandController@create')->name('add_brand');
		Route::post('brand/add', 'BrandController@store')->name('add_brand');
		Route::get('brand/import', 'BrandController@import')->name('import_brand');
		Route::get('brand/csv/sample', 'BrandController@downloadCSVSample')->name('download_csv_sample_brand');
		Route::post('brand/import/csv', 'BrandController@importCSV')->name('import_csv_brand');
		Route::post('brand/edit', 'BrandController@edit')->name('edit_brand');
		Route::post('brand/update', 'BrandController@update')->name('update_brand');
		Route::get('brand/delete/{id}', 'BrandController@destroy')->name('delete_brand');

		//Sub-Brand
		Route::get('subbrand', 'SubBrandController@index')->name('subbrand');
		Route::post('subbrand/add', 'SubBrandController@store')->name('add_subbrand');
		Route::post('subbrand/get', 'SubBrandController@GetSubBrand')->name('get_subbrand');
		Route::post('subbrand/edit', 'SubBrandController@edit')->name('edit_subbrand');
		Route::post('subbrand/update', 'SubBrandController@update')->name('update_subbrand');
		Route::get('subbrand/delete/{id}', 'SubBrandController@destroy')->name('delete_subbrand');

		// Manufacturer
		Route::get('manufacturer', 'ManufacturerController@index')->name('manufacturer');
		Route::post('manufacturer/create', 'ManufacturerController@store')->name('add_manufacturer');
		Route::get('manufacturer/import', 'ManufacturerController@import')->name('import_manufacturer');
		Route::get('manufacturer/csv/sample', 'ManufacturerController@downloadCSVSample')->name('download_csv_sample_manufacturer');
		Route::post('manufacturer/import/csv', 'ManufacturerController@importCSV')->name('import_csv_manufacturer');
		Route::post('manufacturer/edit', 'ManufacturerController@edit')->name('edit_manufacturer');
		Route::post('manufacturer/update', 'ManufacturerController@update')->name('update_manufacturer');
		Route::get('manufacturer/delete/{id}', 'ManufacturerController@destroy')->name('delete_manufacturer');

		// Product
		Route::get('product', 'ProductController@index')->name('product');
		Route::get('product/product_via_grn', 'ProductController@index')->name('product_via_grn');
		Route::post('product/add', 'ProductController@store')->name('add_product');
		Route::get('product/import', 'ProductController@import')->name('import_product');
		Route::get('product/export', 'ProductController@export')->name('export_product');
		Route::post('product/import/csv', 'ProductController@importCSV')->name('import_csv_product');
		Route::get('product/csv/sample', 'ProductController@downloadCSVSample')->name('download_csv_sample_product');
		Route::post('product/image', 'ProductController@image')->name('image_product');
		Route::post('product/toggle', 'ProductController@toggle')->name('toggle_product');
		Route::get('product/view/{id}', 'ProductController@show')->name('view_product');
		Route::post('product/edit', 'ProductController@edit')->name('edit_product');
		Route::post('product/update', 'ProductController@update')->name('update_product');
		Route::get('product/delete/{id}', 'ProductController@destroy')->name('delete_product');
		Route::get('product_image/delete/{id}', 'ProductController@destroyImage')->name('remove_image');

		// Product Attributes
		Route::get('product_attributes', 'ProductAttributeController@index')->name('productatt');
		Route::post('product_attributes/add', 'ProductAttributeController@store')->name('add_productatt');
		Route::post('product_attributes/toggle', 'ProductAttributeController@toggle')->name('toggle_productatt');
		Route::post('product_attributes/edit', 'ProductAttributeController@edit')->name('edit_productatt');
		Route::post('product_attributes/update', 'ProductAttributeController@update')->name('update_productatt');
		Route::get('product_attributes/delete/{id}', 'ProductAttributeController@destroy')->name('delete_productatt');
		Route::post('product_attributes/search', 'ProductAttributeController@search')->name('attributes-title-search');

		// Product Expiry
		Route::get('product_expiry', 'ProductExpiryController@index')->name('productexpiry');
		Route::post('product_expiry/add', 'ProductExpiryController@store')->name('add_productexpiry');
		Route::post('product_expiry/toggle', 'ProductExpiryController@toggle')->name('toggle_productexpiry');
		Route::post('product_expiry/online/toggle', 'ProductExpiryController@toggleOnline')->name('onlinetoggle_productexpiry');
		Route::post('product_expiry/edit', 'ProductExpiryController@edit')->name('edit_productexpiry');
		Route::post('product_attribute/get', 'ProductExpiryController@GetProductAttribute')->name('get_productattribute');
		Route::post('product_attributeid/get', 'ProductExpiryController@GetProductAttributeId')->name('get_productattributeid');
		Route::post('product_expiry/update', 'ProductExpiryController@update')->name('update_productexpiry');
		Route::get('product_expiry/delete/{id}', 'ProductExpiryController@destroy')->name('delete_productexpiry');

		Route::get('quantity/import', 'ProductExpiryController@import')->name('import_quantity');
		Route::post('quantity/import/csv', 'ProductExpiryController@importCSV')->name('import_csv_quantity');
		Route::get('quantity/csv/sample', 'ProductExpiryController@downloadCSVSample')->name('download_csv_sample_quantity');

		// Customer
		Route::get('customer', 'CustomerController@index')->name('customer');
		Route::post('customer/add', 'CustomerController@store')->name('add_customer');
		Route::post('role/user/add/', 'CustomerController@roleUser')->name('add_customer_genuine');

		Route::post('customer/mobile/otp', 'CustomerController@verifyMobile')->name('verify_mobile');
		Route::post('customer/mobile/resendotp', 'CustomerController@resendOTP')->name('sendOTP');
		Route::get('customer/view/{id}', 'CustomerController@show')->name('view_customer');
		Route::get('customer/check/membership', 'CustomerController@checkMembership')->name('check_membership');
		Route::post('customer/toggle', 'CustomerController@toggle')->name('toggle_customer');
		Route::post('customer/edit', 'CustomerController@edit')->name('edit_customer');
		Route::post('customer/update', 'CustomerController@update')->name('update_customer');
		Route::get('customer/delete/{id}', 'CustomerController@destroy')->name('delete_customer');
		Route::get('customer/membership/receipt/{id}', 'CustomerController@MembershipReceipt')->name('membership_receipt');
		Route::post('customer/membership/add', 'CustomerController@addCustomerMembership')->name('add_customer_membership');
		Route::post('ajax/user/get', 'CustomerController@GetUser')->name('user-search');

		// Billing
		Route::get('billing', 'BillingController@index')->name('billing');
		Route::get('sale', 'BillingController@Sale')->name('billing.sale');
		Route::get('sale/{id}', 'BillingController@SaleType')->name('billing.sale_type');
		Route::get('sale/delete/{id}', 'BillingController@DeleteSale')->name('billing.delete_offbill');
		Route::post('billing/add', 'BillingController@store')->name('add_billing');
		Route::get('billing/edit', 'BillingController@edit')->name('billing.modified_bill');
		Route::get('billing/view/{id}', 'BillingController@show')->name('billing.view_bill');
		Route::get('billing/modified/{receipt_id}', 'BillingController@ModiefiedReceiptId')->name('billing.modified_bill_id');
		Route::post('billing/update', 'BillingController@update')->name('billing.update_bill');
		Route::post('billing/get_item', 'BillingController@getBillingItem')->name('get_billing_product');
		Route::get('billing/get_productattr', 'BillingController@getBillingProductAttr')->name('get_billing_productattr');
		Route::get('billing/generate/{id}', 'BillingController@generateOffilineBill')->name('generate_offbill');
		Route::post('billing/receipt_id', 'BillingController@GetReceiptId')->name('receipt_id_search');
		Route::post('billing/receipt_id_data', 'BillingController@GetReceiptIdData')->name('get_offline_billing');

		Route::get('billing/netstock', 'BillingController@GetNetStock')->name('get_netstock');


		//Return Items
		Route::get('returnitem', 'ReturnItemController@create')->name('billing.return_items');
		Route::post('returnitem/user/get', 'ReturnItemController@GetUser')->name('returngsearch');
		Route::get('returnitem/user/check_billdetails', 'ReturnItemController@checkbilldetails')->name('check_billdetails');
		Route::get('returnitem/user/billsearch', 'ReturnItemController@billingsearch')->name('billing_search');
		Route::post('returnitem/user/add', 'ReturnItemController@addReturnitem')->name('add_returnitems');
		Route::get('returnitem/generate/{id}', 'ReturnItemController@returnbillgenerate')->name('generatereturnbill');

		// Membership
		Route::get('membership', 'MembershipController@index')->name('membership');
		Route::post('membership/add', 'MembershipController@store')->name('add_membership');
		Route::post('membership/edit', 'MembershipController@edit')->name('edit_membership');
		Route::post('membership/update', 'MembershipController@update')->name('update_membership');
		Route::get('membership/delete/{id}', 'MembershipController@destroy')->name('delete_membership');

		//===============Membership Cart ====================//
		Route::match(['get', 'post'], 'membershipcard/add', 'MembershipController@add_membershipcard')->name('add_membership_card');
		Route::get('membershipcard/delete/{id}', 'MembershipController@delete_membershipcard')->name('delete_membershipcard');
		Route::post('membershipcard/edit', 'MembershipController@membershipcardedit')->name('edit_membershipcard');
		Route::post('membershipcard/update', 'MembershipController@membershipcardupdate')->name('update_membershipcard');
		Route::post('membershipcard/download', 'MembershipController@membershipcarddownload')->name('download_membership_card');

		// Return Items
		Route::post('credit/note/check', 'ReturnItemController@checkCreditNote')->name('check_credit_notes');
		Route::post('credit/note/apply', 'ReturnItemController@applyCreditNote')->name('apply_credit_notes');

		//Barcode
		Route::get('barcode', 'BarcodeController@index')->name('barcode_label');
		Route::post('barcode/add', 'BarcodeController@store')->name('add_barcode');
		Route::post('barcode/get/product', 'BarcodeController@getProduct')->name('get_barcode_product');
		Route::get('barcode/generate/{id}', 'BarcodeController@barcodeGenerate')->name('generate_offbarcode');

		//Supplier
		Route::get('supplier', 'SupplierController@index')->name('supplier');
		Route::post('supplier/add', 'SupplierController@store')->name('add_supplier');
		Route::post('supplier/edit', 'SupplierController@edit')->name('edit_supplier');
		Route::post('supplier/update', 'SupplierController@update')->name('update_supplier');
		Route::get('supplier/delete/{id}', 'SupplierController@destroy')->name('delete_supplier');

		Route::get('supplier/import', 'SupplierController@import')->name('import_supplier');
		Route::post('supplier/import/csv', 'SupplierController@importCSV')->name('import_csv_supplier');
		Route::get('supplier/csv/sample', 'SupplierController@downloadCSVSample')->name('download_csv_supplier');


		//purchases

		Route::get('purchase', 'PurchaseController@index')->name('purchase');
		Route::post('purchase/add', 'PurchaseController@store')->name('add_purchase');
		Route::get('purchase/create', 'PurchaseController@create')->name('create_purchase');
		Route::post('purchase/get/product', 'PurchaseController@getProduct')->name('get_purchase_product');
		Route::get('purchase/get_basic_price', 'PurchaseController@getPurchasePrice')->name('get_basic_price');
		Route::get('purchase/edit/{id}', 'PurchaseController@edit')->name('edit_purchase');
		Route::post('purchase/search/item', 'PurchaseController@itemSearch')->name('item-search');
		Route::post('purchase/update', 'PurchaseController@update')->name('update_purchase');
		Route::get('purchase/product/mrpprice', 'PurchaseController@getMRPrice')->name('get_product_mrp_price');
		Route::get('purchase/delete/{id}', 'PurchaseController@destroy')->name('delete_purchase');
		Route::get('purchase/view/{id}', 'PurchaseController@show')->name('view_purchase');
		Route::get('purchase/pdf/{id?}', 'PurchaseController@getPurchasePdf')->name('get_purchase_pdf');

		Route::get('check/expire/status', 'PurchaseController@checkExpirePurchase')->name('check_expire_purchase');

		//Receive Po
		Route::match(['get', 'post'], 'receivepo/{id?}', 'ReceivepoController@index')->name('receivepo');
		Route::match(['get', 'post'], '/addreceivepo/{id?}', 'ReceivepoController@addReceive')->name('addreceivepo');
		Route::post('searchreceivepo', 'ReceivepoController@skuSearch')->name('sku-search');
		Route::post('productreceivepo', 'ReceivepoController@skuProduct')->name('sku-product');

		//Report Management
		Route::get('po_report', 'ReportController@poReport')->name('po_report');
		Route::post('po_report_generate', 'ReportController@poReportGenerate')->name('po_report_generate');

		Route::get('grnwopo_report', 'ReportController@grnwopoReport')->name('grnwopo_report');
		Route::post('grnwopo_report_generate', 'ReportController@grnwopoReportGenerate')->name('grnwopo_report_generate');

		Route::get('billing_report', 'ReportController@BillingReport')->name('billing_report');
		Route::post('billing_report_generate', 'ReportController@BillingReportGenerate')->name('billing_report_generate');

		Route::get('return_item_report', 'ReportController@ReturnItemReport')->name('return_item_report');
		Route::post('return_item_report_generate', 'ReportController@ReturnItemReportGenerate')->name('return_item_report_generate');

		//GRN
		Route::match(['get', 'post'], 'receivepo/edit/{id}', 'ReceivepoController@edit')->name('edit_grn');
		Route::get('receivepo/delete/{id}', 'ReceivepoController@delete')->name('delete_grn');
		Route::post('gstget', 'ReceivepoController@cess')->name('cess');
		Route::post('gstapmc', 'ReceivepoController@apmc')->name('apmc');
		Route::post('tex', 'ReceivepoController@tex')->name('tex');
		Route::post('mrp', 'ReceivepoController@mrp')->name('mrp');

		//filter Search Gst
		Route::get('gst/search', 'GstRateController@itemSearch')->name('gst-search');
		Route::get('category/search', 'CategoryController@itemSearch')->name('search-category');
		Route::get('subcategory/search', 'SubCategoryController@itemSearch')->name('subsearch-category');
		Route::get('brand/search', 'BrandController@itemSearch')->name('search-brand');
		Route::get('subbrand/search', 'SubBrandController@itemSearch')->name('search-subbrand');
		Route::get('manufacturer/search', 'ManufacturerController@itemSearch')->name('search-manufacturer');
		Route::get('product/search', 'ProductController@itemSearch')->name('search-product');
		Route::get('productattributes/search', 'ProductAttributeController@itemSearch')->name('search-productattributes');
		Route::get('productexpiry/search', 'ProductExpiryController@itemSearch')->name('search-productexpiry');
		Route::get('purchage/search', 'PurchaseController@filterSearch')->name('search-purchage');
		Route::get('receivepofilter/search', 'ReceivepoController@filterSearch')->name('search-receivepofilter');
		Route::get('membership/search', 'MembershipController@itemSearch')->name('search-membershipcart');
		Route::get('supplier/search', 'SupplierController@itemSearch')->name('search-suppliercart');
		Route::get('sale/item/search', 'BillingController@itemSearch')->name('search-sale');


		//GRN without PO
		Route::get('grn_without_po', 'GRNwithoutPOController@index')->name('grn_without_po');
		Route::get('grn_without_po/show', 'GRNwithoutPOController@show')->name('grn_without_po_show');
		Route::get('grn_without_po/edit/{id}', 'GRNwithoutPOController@edit')->name('edit_grn_without_po');
		Route::post('grn_without_po/update', 'GRNwithoutPOController@update')->name('update_grn_without_po');
		Route::post('get_grn_product', 'GRNwithoutPOController@getGRNProduct')->name('get_grn_product');
		Route::post('add_get_grn_product', 'GRNwithoutPOController@AddGRNProduct')->name('add_grn_without_po');
		Route::post('get_grn_without_po', 'GRNwithoutPOController@GetGRNWithoutPO')->name('get_grn_without_po');
		Route::get('grn_without_po/delete/{id}', 'GRNwithoutPOController@destroy')->name('delete_grnwopo');

		//Marketing
		Route::get('sms', 'SMSController@index')->name('sms');
		Route::get('sms_export', 'SMSController@smsExport')->name('sms_export');
		Route::post('send_sms', 'SMSController@sendSMS')->name('send_sms');

        //cities
        Route::get('cities', 'CityController@index')->name('cities');
        Route::get('cities/search', 'CityController@itemSearch')->name('search-city');
        Route::get('cities/create', 'CityController@create')->name('add-city');
        Route::post('cities/create', 'CityController@store')->name('add-city');
        Route::post('cities/edit', 'CityController@edit')->name('edit-city');
        Route::post('cities/update', 'CityController@update')->name('update-city');
        Route::get('cities/delete/{id}', 'CityController@destroy')->name('delete-city');
        Route::get('cities/import', 'CityController@import')->name('import-city');
        Route::get('cities/csv/sample', 'CityController@downloadCSVSample')->name('download_csv_sample-city');
        Route::post('cities/import/csv', 'CityController@importCSV')->name('import_csv-city');

		//test
		//Route::get('/testsms','SMSController@testsms')->name('testsms');

		//offer
		Route::get('offer/today', 'OfferController@TodayOffer')->name('today_offer');
		Route::post('offer/add', 'OfferController@AddTodayOffer')->name('add_today_offer');
		Route::post('offer/edit', 'OfferController@Edit')->name('edit_offer');
		Route::post('offer/update', 'OfferController@Update')->name('update_offer');
		Route::get('offer/delete/{id}', 'OfferController@Destroy')->name('delete_today_offer');

		Route::get('cropper/init/{width}/{height}/{name}/{enable_ratio}', [
			'uses' => 'CropperController@getIndex',
			'as' => 'image.cropper',
		]);

		/* End Cropper Routes */
		/* Start App Banners Routes */
		Route::get('banners', [
			'uses' => 'BannerController@getIndex',
			'as' => 'banners.index',
		]);
		Route::get('banners/list', [
			'uses' => 'BannerController@getList',
			'as' => 'banners.list',
		]);
		Route::get('banners/create', [
			'uses' => 'BannerController@getCreate',
			'as' => 'banners.create',
		]);
		Route::post('banners/create', [
			'uses' => 'BannerController@postCreate',
			'as' => 'banners.create',
		]);

		Route::get('banners/delete/{id?}', [
			'uses' => 'BannerController@getDelete',
			'as' => 'banners.delete',
		]);
		Route::post('banner/image/order/update', [
			'uses' => 'BannerController@postChangeImageOrder',
			'as' => 'banners.images.order.update',
		]);
		/* End App Banners Routes */

		/* Start App cms Routes */
		Route::get('cms/{type}', [
			'uses' => 'CmsController@getIndex',
			'as' => 'cms.index',
		]);
		Route::post('cms/update/{type}', [
			'uses' => 'CmsController@postUpdate',
			'as' => 'cms.update',
		]);
		/* End App cms Routes */
		// Route::get('customer', 'CustomerController@index')->name('inquiry.index');

		Route::get('inquiry', [
			'uses' => 'ContactController@index',
			'as' => 'inquiry.index',
		]);
		Route::get('location', [
			'uses' => 'ContactController@index',
			'as' => 'inquiry.index',
		]);
	});
});

Route::namespace('Professional')->prefix('professional')->name('professional.')->group(function () {

    Route::get('notifications/bell','NotificationController@ViewNotification')->name('notifications');
    // Register Professionals
    Route::get('professional-register',[RegisterController::class,'showRegistrationForm'])->name('professional-register');
    Route::post('professional-register',[RegisterController::class,'register'])->name('professional-register');

    Route::middleware(['auth', 'professional-auth'])->group(function () {

        // User
        Route::post('avatar-update',[ProfileController::class,'updateAvatar'])->name('avatar-update');
        Route::post('profile-update',[ProfileController::class,'updateProfile'])->name('profile-update');
        Route::post('add-prof-address',[ProfileController::class,'add_prof_address'])->name('add-prof-address');
        Route::post('add_skill',[ProfileController::class,'add_skill'])->name('add_skill');
        Route::post('add_documents',[ProfileController::class,'add_documents'])->name('add_documents');
        // Dashboard
        Route::get('dashboard', [DashboardController::class,'index'])->name('dashboard');
        Route::get('bookings-info', [DashboardController::class,'getBookingEarning'])->name('bookings-info');
        Route::get('bookings-days', [DashboardController::class,'getBookingEarningDays'])->name('bookings-days');
        // Profile
        Route::get('profile', [ProfileController::class,'profile'])->name('profile');
        // Service History
        Route::get('service-history',[ServiceHistoryController::class,'serviceHistory'])->name('service-history');
        Route::get('service-history/search', [ServiceHistoryController::class,'itemSearch'])->name('search-service-history');

        Route::get('service-status-up',[ServiceHistoryController::class,'updateStatus'])->name('service-status-up');
        Route::get('service-view',[ServiceHistoryController::class,'view'])->name('service-view');
        Route::get('service-done',[ServiceHistoryController::class,'serviceDone'])->name('service-done');
        Route::get('service-pending',[ServiceHistoryController::class,'servicePending'])->name('service-pending');

        // Professional Rating
        Route::get('professional-rating',[\App\Http\Controllers\Professional\RatingController::class,'professionalRating'])->name('professional-rating');
    });
});
