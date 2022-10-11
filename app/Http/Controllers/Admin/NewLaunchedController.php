<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\NewLaunched;
use App\Models\Service;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class NewLaunchedController extends Controller
{
    public function index(Request $request)
    {
        $new_launches = NewLaunched::select(\DB::raw('new_launches.*'))->paginate(25);
        $currentpage = $new_launches->currentPage();
        $categories = Category::all();
        $sub_category = SubCategory::all();
        $services_list = Service::all();
        return view('admin.new_launches.index',compact(['new_launches','currentpage','categories','sub_category','services_list']));
    }

    public function create()
    {
        $service = Service::orderBy('id','DESC')->get();
        return json_encode($service);
    }

    public function store(Request $request)
    {
        $request->validate([
            'banner_image' => 'nullable|mimes:jpeg,png,jpg,gif,webp|max:2048|dimensions:min_width=1024,min_height=400',
            'type' => 'required',
        ]);

        if ($request->banner_image != null) {
            $save_path = public_path('images/new_launched');
            if (!file_exists($save_path)) {
                mkdir($save_path, 0777, true);
            }
            $imageName1 = time().'.'.$request->banner_image->extension();
            $image = $request->file('banner_image');
            $img = Image::make($image->path());
            $img->fit(1024,400)->save(public_path('images/new_launched').'/'.$imageName1);
        }
        else{
            $imageName1 = null;
        }

        $service = new NewLaunched();
        $service->base_path = url('public/images/new_launched/');
        $service->banner_image = $imageName1 ?? $service->banner_image;
        $service->type = $request->type;
        $service->category_id = $request->category_id;
        $service->sub_category_id = $request->sub_category_id;
        $service->service_id = $request->service_id;
        $service->save();
        Session::flash('message', 'New Launched Added successfully.');
        return redirect()->route('admin.new-launched');
    }

    public function edit(Request $request)
    {
        $newLaunch = NewLaunched::find($request->id);
        echo $newLaunch;
    }

    public function update(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'banner_image' => 'nullable|mimes:jpeg,png,jpg,gif,webp|max:2048|dimensions:min_width=1024,min_height=400',
        ]);

        if ($request->banner_image != null) {
            $save_path = public_path('images/new_launched');
            if (!file_exists($save_path)) {
                mkdir($save_path, 0777, true);
            }
            $imageName1 = time().'.'.$request->banner_image->extension();
            $image = $request->file('banner_image');
            $img = Image::make($image->path());
            $img->fit(1024,400)->save(public_path('images/new_launched').'/'.$imageName1);
        }
        else{
            $imageName1 = null;
        }


        $service = NewLaunched::find($request->id);
        $service->base_path = url('public/images/new_launched/');
        $service->banner_image = $imageName1 ?? $service->banner_image;
        $service->type = $request->type;
        $service->category_id = $request->category_id;
        $service->sub_category_id = $request->sub_category_id;
        $service->service_id = $request->service_id;
        $service->save();

        Session::flash('message', 'New Launched updated successfully.');
        return redirect()->route('admin.new-launched');
    }

    public function destroy(Request $request)
    {
        $new_launched = NewLaunched::where('id', $request->id)->first();

        if ($new_launched->banner_image != null) {
            $image_path = public_path().'/images/new_launched/'.$new_launched->banner_image;
            if(file_exists($image_path)){
                unlink($image_path);
            }
        }
        $new_launched->delete();

        Session::flash('message', 'New Launched deleted successfully.');
        return redirect()->route('admin.new-launched');
    }

    function itemSearch(Request $request)
    {
        if ($request->ajax()) {
            $datas = $request->all();
            $categories = Category::where('title', 'LIKE', '%' . $datas['query'] . '%')->get();
            $subcategories = SubCategory::where('title', 'LIKE', '%' . $datas['query'] . '%')->get();

            $cate = array();
            $subcate = array();

            if ($categories) {
                foreach ($categories as $select) {
                    $cate[] = $select->id;
                }
            }

            if ($subcategories) {
                foreach ($subcategories as $select) {
                    $subcate[] = $select->id;
                }
            }


            if ($cate) {
                $services = Service::whereIn('category_id', $cate)
                    ->paginate(25);
                $servicescount = Service::whereIn('category_id', $cate)
                    ->count();
            } elseif ($subcate) {
                $services = Service::whereIn('sub_category_id', $subcate)
                    ->paginate(25);
                $servicescount = Service::whereIn('sub_category_id', $subcate)
                    ->count();
            }
            else {
                $services = Service::with(['getCategory','getSubCategory'])->where('title', 'LIKE', '%' . $datas['query'] . "%")
                    ->orWhere('tag', 'LIKE', '%' . $datas['query'] . "%")
                    ->orWhere('discounted_price', 'LIKE', '%' . $datas['query'] . "%")
                    ->paginate(25);
                $servicescount = Service::with(['getCategory','getSubCategory'])->where('title', 'LIKE', '%' . $datas['query'] . "%")
                    ->orWhere('tag', 'LIKE', '%' . $datas['query'] . "%")
                    ->orWhere('discounted_price', 'LIKE', '%' . $datas['query'] . "%")
                    ->count();
            }

            if ($servicescount) {
                $currentpage = $services->currentPage();
                return view('admin.services.paggination_services', compact(['services', 'currentpage']))->render();
            } else { ?>
                <tr>
                    <td colspan="8">No matching records found</td>
                </tr>
                <?php
            }
        }
    }
}
