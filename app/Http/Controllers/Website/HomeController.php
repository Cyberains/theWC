<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Cms;
use App\Models\Contact;
use App\Models\WhyChooseUs;
use App\Models\WorldCity;
use Illuminate\Http\Request;
use Khsing\World\World;
use App\Jobs\SendEmailJob;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $banners = Banner::select('image')
            ->where('status', 1)
            ->orderBy('id', 'desc')
            ->get();

        $service = Brand::select('brands.id', 'brands.title', 'brands.image')
            ->leftJoin('categories', 'brands.id', 'categories.brand_id')
            ->whereNotNull('categories.brand_id')
            ->orderBy('id', 'desc')
            ->get();

        $category = Category::select('categories.id', 'categories.title', 'categories.image')
            ->leftJoin('products', 'categories.id', '=', 'products.category_id')
            ->whereNotNull('products.category_id')
            ->groupBy('products.category_id')
            ->orderBy('categories.id', 'desc')
            ->get();


        $whychoous = WhyChooseUs::select('id', 'heading', 'description', 'image', 'created_at')
            ->orderBy('id', 'desc')
            ->get();

        return view('spa.index', compact('banners', 'service', 'whychoous', 'category'));
    }



    public function aboutUs()
    {
        $about_us = Cms::where('type', 'about_us')->first();
        return view('spa.about', compact('about_us'));
    }

    public function privacyPolicy()
    {
        $privacy_policy = Cms::where('type', 'privacy_policy')->first();
        return view('spa.privacy', compact('privacy_policy'));
    }
    public function termCondition()
    {
        $terms = Cms::where('type', 'term_condition')->first();
        return view('spa.terms', compact('terms'));
    }
    public function getContact()
    {

        return view('spa.contact');
    }
    public function postContact(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|digits_between:6,20',
            'subject' => 'required',
            'message' => 'required',
        ]);
        $dataArr = arrayFromPost(['name', 'email', 'phone', 'subject', 'message']);

        try {
            \DB::beginTransaction();
            $contact = new Contact();
            $contact->name = $dataArr->name;
            $contact->email = $dataArr->email;
            $contact->phone = $dataArr->phone;
            $contact->subject = $dataArr->subject;
            $contact->message = $dataArr->message;
            $contact->save();
            $details['email'] = $dataArr->email;
            if ($contact) {
                SendEmailJob::dispatch(['details' => $details]);
            }
            \DB::commit();
            return successMessage('request_sent');
        } catch (\Throwable $th) {
            // Rollback Transaction
            \DB::rollBack();
            return exceptionErrorMessage($th);
        }
    }

    public function getServices(Request $request)
    {
        $services = Brand::select('id', 'title', 'image')
            ->where('city_id', $request->id)->orderBy('id', 'desc')->get();
        return $services;
    }


    public function getServiceCategory(Request $request)
    {
        $brandId = $request->id;
        $serviceCategory = Category::where('brand_id', $request->id)->orderBy('id', 'desc')->get();
        return view('spa.service_category', compact('serviceCategory', 'brandId'));
    }


    public function getProducts(Request $request)
    {
        $categories = Category::select('categories.id', 'categories.title', 'categories.brand_id')
            ->leftJoin('products', 'categories.id', '=', 'products.category_id')
            ->whereNotNull('products.category_id')
            ->groupBy('products.category_id')
            ->with('subCategoryName')
            ->get();

        $products = Product::select('*')
            ->where(['category_id' => $request->category_id])->with('productFetaure')
            ->when(!blank($request->sub_cat_id), function ($query) use ($request) {
                $query->where('subcategory_id', $request->sub_cat_id);
            })
            ->when(!blank($request->brand_id), function ($query) use ($request) {
                $query->where('brand_id', $request->brand_id);
            })
            ->get();

        return view('spa.products', compact('categories', 'products'));
    }
}
