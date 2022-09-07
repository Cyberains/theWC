<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Brand;
use App\Models\Manufacturer;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{

    public function index(Request $request): \Illuminate\Http\JsonResponse
    {
        $products = Product::where(['category_id'=> $request->category_id, 'sub_category_id' => $request->sub_category_id])->with(['getCategory','getSubCategory'])->get();
        if ($products->count() > 0) {
            return response()->json([
                'code' => 200,
                'status' => 1,
                'data' => $products,
                'message' => 'Product Data Successfully Received.'
            ]);
        } else {
            return response()->json([
                'code' => 422,
                'status' => 0,
                'message' => 'No Product data Exists.'
            ]);
        }
    }

    public function create(Request $request): \Illuminate\Http\JsonResponse
    {
        $request->validate([
            'title' => 'required',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif|max:2048|dimensions:min_width=400,min_height=400',
        ]);
        if ($request->image != null) {
            $save_path = public_path('images/products');
            if (!file_exists($save_path)) {
                mkdir($save_path, 0777, true);
            }
            $imageName = time().'.'.$request->image->extension();
            $image = $request->file('image');
            $img = Image::make($image->path());
            $img->fit(400,400)->save(public_path('images/products').'/'.$imageName);
        }
        else{
            $imageName = null;
        }
        $product =new Product();
        $product->category_id = $request->category_id;
        $product->sub_category_id = $request->sub_category_id;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->title = $request->title;
        $product->base_path = url('public/images/products/');
        $product->image = $imageName;
        $product->description = $request->description;
        $product->quantity = $request->quantity;
        $product->save();

        return response()->json([
            'code' => 200,
            'status' => 1,
            'data' => $product,
            'message' => 'Product Created Successfully.',
        ]);
    }
}
