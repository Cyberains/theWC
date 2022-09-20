<?php

use App\Models\ProductAttribute;
use App\Models\Product;
use App\Models\ProductExpiry;
use App\Models\GSTRate;
use App\Models\Address;
use App\Models\User;
use Illuminate\Http\JsonResponse;


function getAllPaidProfessionals(){
     return User::where(['role'=>'Professional','paid_role' => 1])->get();
}

function getProfessionalsRating($professional_id){
    $rating = \App\Models\Rating\Professional::where('professional_id',$professional_id)->avg('rating');
    return $rating ?? 0;
}

function getProfessionalFreeStatus($professional_id){
    $user = \App\Models\User::where('id',$professional_id)->first();
    return $user->is_free == 0 ? true : false;
}

function getAllBookingStatusDone($professional_id){
    $book = \App\Models\Booking::whereIn('status',['processing','pending'])->where('professional_id',$professional_id)->count();
    return $book;
}

function getUserNumber($user_id){
    $mobile = \App\Models\User::where('referred_user_id',$user_id)->first(['mobile']);
    return $mobile ?? 0;
}

function get_mrp($mrp_price)
{

	return ProductAttribute::where('id', $mrp_price)->select('mrp_price')->first();
}

//get mfg date by product title
function get_mfg($product_name)
{
	return Product::where('title', $product_name)->first();
}

function get_product_expire($product_name)
{

	$product_id = Product::where('title', $product_name)->first();
	$count = ProductExpiry::where('product_id', $product_id->id)->count();
	if ($count > 0) {
		return ProductExpiry::where('product_id', $product_id->id)->select('expiry_date')->first();
	}
}
if (!function_exists('transLang')) {
	function transLang($template = null, $dataArr = [])
	{
		return $template ? trans("messages.{$template}", $dataArr) : '';
	}
}

if (!function_exists('successMessage')) {
	function successMessage($template = 'request_processed_successfully', $dataArr = null, $httpCode = 200)
	{
		$output = new \stdClass;
		$output->message = transLang($template);
		if ($dataArr != null) {
			$output->data = $dataArr;
		}
		return response()->json($output, $httpCode);
	}
}

if (!function_exists('exceptionErrorMessage')) {
	function exceptionErrorMessage($e, $throw_exception = false)
	{
		\Log::error($e);
		if (env('APP_DEBUG')) {
			return errorMessage($e->getMessage(), true, $throw_exception);
		}
		return errorMessage('session_expire', false, $throw_exception);
	}
}

if (!function_exists('errorMessage')) {
	function errorMessage($template = '', $string = false, $throw_exception = false)
	{
		$message = !$string ? transLang($template) : $template;

		if ($throw_exception) {
			$validator = \Validator::make([], []);
			$validator->errors()->add('error', $message);
			throw new \Illuminate\Validation\ValidationException($validator);
		}

		return response()->json([
			'message' => transLang('given_data_invalid'),
			'errors' => ['error' => [$message]],
		], 422);
	}
}

if (!function_exists('imagePath')) {
	function imagePath($filename = '', $path = 'originalImagePath')
	{
		return config("cms.{$path}") . $filename;
	}
}

if (!function_exists('imageBasePath')) {
	function imageBasePath($filename = '', $path = 'originalImagePath')
	{
		return asset(config("cms.{$path}") . $filename);
	}
}
if (!function_exists('saveBase64File')) {
	function saveBase64File($dataArr, $path = 'originalImagePath', $cdn = false)
	{
		['data_url' => $data_url, 'width' => $width, 'height' => $height] = $dataArr;

		$randomString = random_int(0, PHP_INT_MAX) . strtotime(now());
		$extension = explode('/', mime_content_type($data_url))[1];
		$filename = "{$randomString}.{$extension}";
		$imagePath = imagePath('', $path);

		if ($cdn) {
			$image = \Image::make(file_get_contents($data_url))->resize($width, $height)->encode($extension);
			\Storage::disk('s3')->put("{$imagePath}/{$filename}", $image, 'public');
		} else {
			$image = \Image::make(file_get_contents($data_url))
				->resize($width, $height)
				->encode($extension)
				->save("{$imagePath}{$filename}");

			// Optimize Image
			$imagePath = app()->basePath() . "/{$imagePath}{$filename}";
			\ImageOptimizer::optimize($imagePath);
		}
		return $filename;
	}
}

if (!function_exists('uploadFile')) {
	function uploadFile($filename = false, $type = 'image', $path = 'originalImagePath', $cdn = false)
	{
		$randomString = random_int(0, PHP_INT_MAX) . strtotime(now());

		if ($cdn == true) {
			$s3 = \Storage::disk('s3');
		}

		if (request()->$filename) {
			$mediaFile = request()->$filename;
			$filename = $randomString . '.' . $mediaFile->getClientOriginalExtension();
			if ($type == 'image') {
				if ($cdn == true) {
					$imagePath = imagePath($filename);
					$response = $s3->put($imagePath, file_get_contents($mediaFile), 'public');
				} else {
					$imagePath = imagePath('', $path);
					$response = $mediaFile->move($imagePath, $filename);
				}
				if ($response) {
					return $filename;
				}
			} elseif ($type == 'video') {
				if ($cdn == true) {
					$videoPath = videoPath($filename);
					$response = $s3->put($videoPath, file_get_contents($mediaFile), 'public');
				} else {
					$videoPath = videoPath();
					$response = $mediaFile->move($videoPath, $filename);
				}
				if ($response) {
					return $filename;
				}
			}
		}

		if ($type == 'thumbnail') {
			$videoFilePath = cdn_link(videoPath($filename));
			$thumbnail_image = $randomString . '.jpg';
			$imagePath = imagePath($thumbnail_image);
			$extC = pathinfo($videoFilePath, PATHINFO_EXTENSION);
			if ($extC == 'mov') {
				exec("ffmpeg -i {$videoFilePath} -c:v libx264 -c:a aac -strict experimental {$imagePath}");
			} else {
				exec("ffmpeg -i {$videoFilePath} -vcodec h264 -acodec aac -strict -2 {$imagePath}");
			}
			exec("ffmpeg  -i {$videoFilePath} -deinterlace -an -ss 2 -f mjpeg -t 1 -r 1 -y -s 400x300 {$imagePath} 2>&1");
			if ($cdn == true) {
				$mediaFile = public_path($imagePath);
				$response = $s3->put($imagePath, file_get_contents($mediaFile), 'public');
			} else {
				$response = true;
			}
			if ($response) {
				if ($cdn == true) {
					unlink($mediaFile);
				}
				return $thumbnail_image;
			}
		}
		return null;
	}
}

if (!function_exists('array_from_post')) {
	function arrayFromPost($fieldArr = [])
	{
		$request = request();
		$output = new \stdClass;
		if (count($fieldArr)) {
			foreach ($fieldArr as $value) {
				$output->$value = $request->input($value);
			}
		}
		return $output;
	}
}
function getproductid($productname, $expdate = null, $qty = null, $mrp = null, $basic_price = null, $barcode_id = null, $tax = null)
{

	foreach ($productname as $key => $value) {

		$data = Product::where('title', $value)->first();

		if ($mrp) {
			//Either change MRP price or Basic Price It will insert New Row in product Attributes.

			$mrpcount = ProductAttribute::where(['product_id' => $data->id, 'mrp_price' => $mrp[$key], 'basic_price' => $basic_price[$key]])->count();

			if ($mrpcount == 0) {

				$counts = 0;
				if (!empty($barcode_id)) {

					$costprice = ($basic_price[$key] * ($tax[$key] + 100)) / 100;
					$attaributes = ProductAttribute::insertGetId(['product_id' => $data->id, 'mrp_price' => $mrp[$key], 'basic_price' => $basic_price[$key], 'barcode_id' => $barcode_id[$key], 'cost_price' => $costprice]);
				}
			}

			if ($expdate || $expdate == null) {

				$attributes = ProductAttribute::where(['product_id' => $data->id, 'mrp_price' => $mrp[$key], 'basic_price' => $basic_price[$key]])->first();

				$counts1 = ProductExpiry::where(['product_id' => $data->id, 'productattr_id' => $attributes->id, 'expiry_date' => $expdate[$key]])->first();

				if ($counts1) {

					$qtys1 = $counts1->quantity;
					$qtys1 = $qtys1 + $qty[$key];
					$counts = ProductExpiry::where(['product_id' => $data->id, 'productattr_id' => $attributes->id, 'expiry_date' => $expdate[$key]])->update(['quantity' => $qtys1]);
				} else {

					ProductExpiry::insert(['product_id' => $data->id, 'expiry_date' => $expdate[$key], 'quantity' => $qty[$key], 'productattr_id' => $attributes->id]);
				}
			}
		}
	}
}

function getproductgrnid($productname, $expdate = null, $qty = null, $mrp = null, $basic_price = null, $barcode_id = null, $tax = null)
{

	foreach ($productname as $key => $value) {

		$data = Product::where('title', $value)->first();

		if ($mrp) {
			//Either change MRP price or Basic Price It will insert New Row in product Attributes.

			$mrpcount = ProductAttribute::where(['product_id' => $data->id, 'mrp_price' => $mrp[$key], 'basic_price' => $basic_price[$key]])->count();

			if ($mrpcount == 0) {

				$counts = 0;
				if (!empty($barcode_id)) {

					$costprice = ($basic_price[$key] * ($tax[$key] + 100)) / 100;
					$attaributes = ProductAttribute::insertGetId(['product_id' => $data->id, 'mrp_price' => $mrp[$key], 'basic_price' => $basic_price[$key], 'barcode_id' => $barcode_id[$key], 'cost_price' => $costprice]);
				}
			}

			if ($expdate || $expdate == null) {

				$attributes = ProductAttribute::where(['product_id' => $data->id, 'mrp_price' => $mrp[$key], 'basic_price' => $basic_price[$key]])->first();

				$counts1 = ProductExpiry::where(['product_id' => $data->id, 'productattr_id' => $attributes->id, 'expiry_date' => $expdate[$key]])->first();

				if ($counts1) {

					$qtys1 = $counts1->quantity;
					$qtys1 = $qtys1 + $qty[$key];
					$counts = ProductExpiry::where(['product_id' => $data->id, 'productattr_id' => $attributes->id, 'expiry_date' => $expdate[$key]])->update(['quantity' => $qtys1]);
				} else {

					ProductExpiry::insert(['product_id' => $data->id, 'expiry_date' => $expdate[$key], 'quantity' => $qty[$key], 'productattr_id' => $attributes->id]);
				}
			}
		}
	}
}

function getproductgrnwopoid($productname, $expdate = null, $qty = null, $mrp = null, $basic_price = null, $hsn = null, $sv_price = null, $ebsell_price = null, $barcode_id = null, $tax = null, $weight = null, $unit = null, $mfg = null)
{


	foreach ($productname as $key => $value) {

		$data = Product::where('title', $value)->first();

		if ($hsn != null) {

			$data->hsn_code = $hsn[$key];
			$data->save();
		}

		if ($mrp) {

			//Either change MRP price or Basic Price It will insert New Row in product Attributes.

			$mrpcount = ProductAttribute::where(['product_id' => $data->id, 'mrp_price' => $mrp[$key], 'basic_price' => $basic_price[$key]])->count();

			if ($mrpcount == 0) {

				$counts = 0;

				if (!empty($barcode_id)) {

					$cost_price = number_format(($basic_price[$key] * ($tax[$key] + 100) / 100), 2);

					$form_data = [

						'product_id' => $data->id,
						'barcode_id' => $barcode_id[$key],
						'mrp_price' => $mrp[$key],
						'basic_price' => $basic_price[$key],
						'cost_price' => $cost_price,
						'eb_cost_price' => $sv_price[$key],
						'selling_price' => $ebsell_price[$key],
						'unit' => $weight[$key],
						'unit_check' => $unit[$key]
					];

					$attaributes = ProductAttribute::insertGetId($form_data);
				}
			}

			if ($expdate || $expdate == null) {

				$attributes = ProductAttribute::where(['product_id' => $data->id, 'mrp_price' => $mrp[$key], 'basic_price' => $basic_price[$key]])->first();

				$attributes->eb_cost_price = $sv_price[$key];
				$attributes->selling_price = $ebsell_price[$key];
				$attributes->save();


				$counts1 = ProductExpiry::where(['product_id' => $data->id, 'productattr_id' => $attributes->id, 'expiry_date' => date('Y-m-d', strtotime($expdate[$key]))])->first();

				if ($counts1) {

					$qtys1 = $counts1->quantity;
					$qtys1 = $qtys1 + $qty[$key];
					$counts = ProductExpiry::where(['product_id' => $data->id, 'productattr_id' => $attributes->id, 'expiry_date' => date('Y-m-d', strtotime($expdate[$key]))])->update(['quantity' => $qtys1]);
				} else {

					ProductExpiry::insert([

						'product_id' => $data->id,
						'productattr_id' => $attributes->id,
						'expiry_date' => date('Y-m-d', strtotime($expdate[$key])),
						'mfg_date' => date('Y-m-d', strtotime($mfg[$key])),
						'quantity' => $qty[$key],

					]);
				}
			}
		}
	}
}


function get_Total_Tax($productdata)
{

	if ($productdata->sgst_tax == null) {

		$sgst = 0;
	} else {

		$sgst = $productdata->sgstName->gst_rate;
	}

	if ($productdata->cgst_tax == null) {

		$cgst = 0;
	} else {

		$cgst = $productdata->cgstName->gst_rate;
	}

	if ($productdata->igst_tax == null) {

		$igst = 0;
	} else {

		$igst = $productdata->igstName->gst_rate;
	}

	if ($productdata->ugst_tax == null) {

		$ugst = 0;
	} else {

		$ugst = $productdata->ugstName->gst_rate;
	}

	if ($productdata->cess_tax == null) {

		$cess = 0;
	} else {

		$cess = $productdata->cessName->gst_rate;
	}

	if ($productdata->apmc_tax == null) {

		$apmc = 0;
	} else {

		$apmc = $productdata->apmcName->gst_rate;
	}

	return ($sgst + $cgst + $igst + $ugst + $cess + $apmc);
}

//get Barcode by mrp
function barcode($mrp_price)
{
	//echo $mrp_price;die;
	return ProductAttribute::where('id', $mrp_price)->first();
}


function numberTowords(float $amount)
{
	$amount_after_decimal = round($amount - ($num = floor($amount)), 2) * 100;
	// Check if there is any number after decimal
	$amt_hundred = null;
	$count_length = strlen($num);
	$x = 0;
	$string = array();
	$change_words = array(
		0 => '', 1 => 'One', 2 => 'Two',
		3 => 'Three', 4 => 'Four', 5 => 'Five', 6 => 'Six',
		7 => 'Seven', 8 => 'Eight', 9 => 'Nine',
		10 => 'Ten', 11 => 'Eleven', 12 => 'Twelve',
		13 => 'Thirteen', 14 => 'Fourteen', 15 => 'Fifteen',
		16 => 'Sixteen', 17 => 'Seventeen', 18 => 'Eighteen',
		19 => 'Nineteen', 20 => 'Twenty', 30 => 'Thirty',
		40 => 'Forty', 50 => 'Fifty', 60 => 'Sixty',
		70 => 'Seventy', 80 => 'Eighty', 90 => 'Ninety'
	);
	$here_digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
	while ($x < $count_length) {
		$get_divider = ($x == 2) ? 10 : 100;
		$amount = floor($num % $get_divider);
		$num = floor($num / $get_divider);
		$x += $get_divider == 10 ? 1 : 2;
		if ($amount) {
			$add_plural = (($counter = count($string)) && $amount > 9) ? 's' : null;
			$amt_hundred = ($counter == 1 && $string[0]) ? ' and ' : null;
			$string[] = ($amount < 21) ? $change_words[$amount] . ' ' . $here_digits[$counter] . $add_plural . '
         ' . $amt_hundred : $change_words[floor($amount / 10) * 10] . ' ' . $change_words[$amount % 10] . '
         ' . $here_digits[$counter] . $add_plural . ' ' . $amt_hundred;
		} else $string[] = null;
	}
	$implode_to_Rupees = implode('', array_reverse($string));
	$get_paise = ($amount_after_decimal > 0) ? "And " . ($change_words[$amount_after_decimal / 10] . "
   " . $change_words[$amount_after_decimal % 10]) . ' Paise' : '';
	return ($implode_to_Rupees ? $implode_to_Rupees . 'Rupees Only ' : '') . $get_paise;
}


function sendSms($mobile, $message, $tempid)
{

	$data = array(
		'uname' => 'epiccorporations',
		'password' => 'Epic@123',
		'sender' => 'EYBSKT',
		'tempid' => $tempid,
		'receiver' => $mobile,
		'route' => 'TA',
		'msgtype' => '1',
		'sms' => $message

	);

	$dataquery = http_build_query($data);

	$urltink = "http://sendsms.designhost.in/index.php/smsapi/httpapi/?" . $dataquery;

	$curlSession = curl_init();
	curl_setopt($curlSession, CURLOPT_URL, $urltink);
	curl_setopt($curlSession, CURLOPT_BINARYTRANSFER, true);
	curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);


	$result = curl_exec($curlSession);

	return $result;
}

// $userName,$amount
function razorpay()
{
    return 200;
}

function generateOtp()
{
	// Generating random otp of 6 digits
	$otp_string = '123456789';
	$otp = substr(str_shuffle($otp_string), 0, 6);
	return $otp;
}

function generateReferCode()
{
    // Generating random refer code of 8 digits
    $string = '1234567890$#ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $referCode = substr(str_shuffle($string), 0, 8);
    return $referCode;
}


if (!function_exists('get_average_star_of_product')) {
	/**
	 * @param int $productId
	 * @return mixed
	 */

	function get_average_star_of_product($productId)
	{
		return number_format();
	}
}

function get_default_customer_address()
{

	$defaultaddress = Address::where('user_id', Auth::user()->id)->where('is_active', 1)->first();


	return $defaultaddress;
}

function get_total_Gst($productdata)
{

	if ($productdata->sgst_tax == null) {

		$sgst = 0;
	} else {

		$sgst = $productdata->sgstName->gst_rate;
	}

	if ($productdata->cgst_tax == null) {

		$cgst = 0;
	} else {

		$cgst = $productdata->cgstName->gst_rate;
	}

	if ($productdata->igst_tax == null) {

		$igst = 0;
	} else {

		$igst = $productdata->igstName->gst_rate;
	}

	if ($productdata->ugst_tax == null) {

		$ugst = 0;
	} else {

		$ugst = $productdata->ugstName->gst_rate;
	}

	return ($sgst + $cgst + $igst + $ugst);
}

function get_others_tax($productdata)
{

	if ($productdata->cess_tax == null) {

		$cess = 0;
	} else {

		$cess = $productdata->cessName->gst_rate;
	}

	if ($productdata->apmc_tax == null) {

		$apmc = 0;
	} else {

		$apmc = $productdata->apmcName->gst_rate;
	}

	return ($cess + $apmc);
}

function delprevmrpproduct($product, $barcode, $mrp, $expiry)
{

	$productdata = Product::where('title', $product)->first();

	if (!is_null($productdata)) {

		$productattrdata = ProductAttribute::where('product_id', $productdata->id)->where('barcode_id', $barcode)->where('mrp_price', $mrp)->first();

		if (!is_null($productattrdata)) {


			$productexpirydata = ProductExpiry::where('product_id', $productdata->id)->where('productattr_id', $productattrdata->id)->where('expiry_date', $expiry)->first();

			if (!is_null($productexpirydata)) {

				$productexpirydata->delete();
				$productattrdata->delete();
			} else {

				$productattrdata->delete();
			}
		}
	}
}


function delprevexpproduct($product, $barcode, $mrp, $expiry)
{

	$productdata = Product::where('title', $product)->first();

	if (!is_null($productdata)) {

		$productattrdata = ProductAttribute::where('product_id', $productdata->id)->where('barcode_id', $barcode)->where('mrp_price', $mrp)->first();

		if (!is_null($productattrdata)) {

			$productexpirydata = ProductExpiry::where('product_id', $productdata->id)->where('productattr_id', $productattrdata->id)->where('expiry_date', $expiry)->first();

			if (!is_null($productexpirydata)) {

				$productexpirydata->delete();
			}
		}
	}
}

function delqtyproduct($product, $barcode, $mrp, $expiry, $qty)
{

	$productdata = Product::where('title', $product)->first();

	if (!is_null($productdata)) {

		$productattrdata = ProductAttribute::where('product_id', $productdata->id)->where('barcode_id', $barcode)->where('mrp_price', $mrp)->first();

		if (!is_null($productattrdata)) {


			$productexpirydata = ProductExpiry::where('product_id', $productdata->id)->where('productattr_id', $productattrdata->id)->where('expiry_date', $expiry)->first();


			if (!is_null($productexpirydata)) {


				$productexpirydata->quantity = $productexpirydata->quantity - $qty;


				$productexpirydata->save();
			}
		}
	}
}
