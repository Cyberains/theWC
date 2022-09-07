<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class ServiceController extends Controller
{
    public function index(Request $request): \Illuminate\Http\JsonResponse
    {
        $services = Service::where(['category_id'=> $request->category_id, 'sub_category_id' => $request->sub_category_id])
            ->with(['getCategory','getSubCategory'])->get();
        if ($services->count() >0 ) {
            return response()->json([
                'code' => 200,
                'status' => 1,
                'data' => $services,
                'message' => 'Service Data Successfully Received.'
            ]);
        } else {
            return response()->json([
                'code' => 422,
                'status' => 0,
                'message' => 'No Service data Exists.'
            ]);
        }
    }

    public function create(Request $request): \Illuminate\Http\JsonResponse
    {
        $request->validate([
            'title' => 'required',
            'service_image' => 'nullable|mimes:jpeg,png,jpg,gif|max:2048|dimensions:min_width=400,min_height=400',
            'service_product_image' => 'nullable|mimes:jpeg,png,jpg,gif|max:2048|dimensions:min_width=400,min_height=400',
        ]);
        if ($request->service_image != null) {
            $save_path = public_path('images/services');
            if (!file_exists($save_path)) {
                mkdir($save_path, 0777, true);
            }
            $imageName1 = time().'.'.$request->service_image->extension();
            $image = $request->file('service_image');
            $img = Image::make($image->path());
            $img->fit(400,400)->save(public_path('images/services').'/'.$imageName1);
        }
        else{
            $imageName1 = null;
        }

        if ($request->service_product_image != null) {
            $save_path = public_path('images/services/products');
            if (!file_exists($save_path)) {
                mkdir($save_path, 0777, true);
            }
            $imageName2 = time().'.'.$request->service_product_image->extension();
            $image = $request->file('service_product_image');
            $img = Image::make($image->path());
            $img->fit(400,400)->save(public_path('images/services/products').'/'.$imageName2);
        }
        else{
            $imageName2 = null;
        }

        $service =new Service();
        $service->category_id = $request->category_id;
        $service->sub_category_id = $request->sub_category_id;
//        $service->product_id = $request->product_id;
        $service->price = $request->price;
        $service->discount = $request->discount;
        $service->title = $request->title;
        $service->tag = $request->tag;
        $service->service_time = $request->service_time;
        $service->base_path = url('public/images/services/');
        $service->service_image = $imageName1;
        $service->service_product_image = 'products/'.$imageName2;
        $service->service_demo_video = $request->service_demo_video;
        $service->description = $request->description;
        $service->recommended_for = $request->recommended_for;
        $service->benefits = $request->benefits;
        $service->steps = $request->steps;
        $service->things_to_know = $request->things_to_know;
        $service->indicated_for = $request->indicated_for;
        $service->kit_content = $request->kit_content;
        $service->suggestion = $request->suggestion;
        $service->save();

        return response()->json([
            'code' => 200,
            'status' => 1,
            'data' => $service,
            'message' => 'Service Created Successfully.',
        ]);
    }

    public function newLaunched(): \Illuminate\Http\JsonResponse
    {
        $newLaunched = Service::where(['tag'=>'New'])->get();
        return response()->json([
            'code' => 200,
            'status' => 1,
            'data' => $newLaunched,
            'message' => 'New Launched Services.',
        ]);
    }
}
