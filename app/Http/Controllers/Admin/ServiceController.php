<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Service;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $services = Service::select(\DB::raw('services.*'))->with(['getCategory','getSubCategory'])->paginate(25);
        $currentpage = $services->currentPage();
        $categories = Category::all();
        return view('admin.services.index',compact(['services','currentpage','categories']));
    }

    public function create()
    {
        $service = Service::orderBy('id','DESC')->get();
        return json_encode($service);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'service_image' => 'nullable|mimes:jpeg,png,jpg,gif|max:2048|dimensions:min_width=400,min_height=400',
            'service_product_image' => 'nullable|mimes:jpeg,png,jpg,gif|max:2048|dimensions:min_width=400,min_height=400',
            'service_time' => 'required',
            'price' => 'required',
            'discount' => 'required',
            'category_id' => 'required',
            'sub_category_id' => 'required'
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


        Session::flash('message', 'Service added successfully.');
        return redirect()->route('admin.service');

    }

    public function edit(Request $request)
    {
        $cityrow = Service::find($request->id);
//        if(!blank($cityrow)) {
//            $cityrow->name=WorldCity::where('id',$cityrow->id)->value('name');
//        }
        echo $cityrow;
    }

    public function update(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required|unique:world_cities,name',
            'service_image' => 'nullable|mimes:jpeg,png,jpg,gif|max:2048|dimensions:min_width=400,min_height=400',
            'service_product_image' => 'nullable|mimes:jpeg,png,jpg,gif|max:2048|dimensions:min_width=400,min_height=400',
            'service_time' => 'required',
            'price' => 'required',
            'discount' => 'required',
//            'category_id' => 'required',
//            'sub_category_id' => 'required'
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

        $service = Service::find($request->id);
//        $service->category_id = $request->category_id;
//        $service->sub_category_id = $request->sub_category_id;
//        $service->product_id = $request->product_id;
        $service->price = $request->price;
        $service->discount = $request->discount;
        $service->discounted_price = $request->price- $request->discount;
        $service->title = $request->title;
        $service->tag = $request->tag;
        $service->service_time = $request->service_time;
        $service->base_path = url('public/images/services/');
        $service->service_image = $imageName1 ?? $service->service_image;
        if($imageName2 != null){
            $service->service_product_image = 'products/'.$imageName2;
        }
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

        Session::flash('message', 'Service updated successfully.');
        return redirect()->route('admin.service');
    }

    public function destroy(Request $request)
    {
        Service::where('id', $request->id)->delete();
        Session::flash('message', 'Service deleted successfully.');
        return redirect()->route('admin.service');
    }
}
