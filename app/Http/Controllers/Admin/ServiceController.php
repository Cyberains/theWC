<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Booking\Booking;
use App\Models\Booking\BookingService;
use App\Models\Category;
use App\Models\Service;
use App\Models\SubCategory;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $services = Service::select(\DB::raw('services.*'))->with(['getCategory','getSubCategory'])->paginate(25);
        $currentpage = $services->currentPage();
        $categories = Category::all();
        $sub_category = SubCategory::all();
        return view('admin.services.index',compact(['services','currentpage','categories','sub_category']));
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
            'service_image' => 'nullable|mimes:jpeg,png,jpg,gif,webp|max:2048|dimensions:min_width=300,min_height=300',
            'service_product_image' => 'nullable|mimes:jpeg,png,jpg,gif,webp|max:2048|dimensions:min_width=300,min_height=300',
            'service_banner_image' => 'nullable|mimes:jpeg,png,jpg,gif,webp|max:2048|dimensions:min_width=1024,min_height=400',
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
            $img->fit(300,300)->save(public_path('images/services').'/'.$imageName1);
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
            $img->fit(300,300)->save(public_path('images/services/products').'/'.$imageName2);
        }
        else{
            $imageName2 = null;
        }

        if ($request->service_banner_image != null) {
            $save_path = public_path('images/services/banners');
            if (!file_exists($save_path)) {
                mkdir($save_path, 0777, true);
            }
            $imageName3 = time().'.'.$request->service_banner_image->extension();
            $image = $request->file('service_banner_image');
            $img = Image::make($image->path());
            $img->fit(1024,400)->save(public_path('images/services/banners').'/'.$imageName3);
        }
        else{
            $imageName3 = null;
        }

        $service =new Service();
        $service->category_id = $request->category_id;
        $service->sub_category_id = $request->sub_category_id;
        $service->price = $request->price;
        $service->discount = $request->discount;
        $service->title = $request->title;
        $service->tag = $request->tag;
        $service->service_time = $request->service_time;
        $service->base_path = url('public/images/services/');
        $service->service_image = $imageName1;
        $service->service_product_image = 'products/'.$imageName2;
        $service->service_banner_image = 'banners/'.$imageName3;
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
        echo $cityrow;
    }

    public function update(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required|unique:world_cities,name',
            'service_image' => 'nullable|mimes:jpeg,png,jpg,gif,webp|max:2048|dimensions:min_width=300,min_height=300',
            'service_product_image' => 'nullable|mimes:jpeg,png,jpg,gif,webp|max:2048|dimensions:min_width=300,min_height=300',
            'service_banner_image' => 'nullable|mimes:jpeg,png,jpg,gif,webp|max:2048|dimensions:min_width=1024,min_height=400',
            'service_time' => 'required',
            'price' => 'required',
            'discount' => 'required'
        ]);


        if ($request->service_image != null) {
            $save_path = public_path('images/services');
            if (!file_exists($save_path)) {
                mkdir($save_path, 0777, true);
            }
            $imageName1 = time().'.'.$request->service_image->extension();
            $image = $request->file('service_image');
            $img = Image::make($image->path());
            $img->fit(300,300)->save(public_path('images/services').'/'.$imageName1);
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
            $img->fit(300,300)->save(public_path('images/services/products').'/'.$imageName2);
        }
        else{
            $imageName2 = null;
        }

        if ($request->service_banner_image != null) {
            $save_path = public_path('images/services/banners');
            if (!file_exists($save_path)) {
                mkdir($save_path, 0777, true);
            }
            $imageName3 = time().'.'.$request->service_banner_image->extension();
            $image = $request->file('service_banner_image');
            $img = Image::make($image->path());
            $img->fit(1024,400)->save(public_path('images/services/banners').'/'.$imageName3);
        }
        else{
            $imageName3 = null;
        }

        $service = Service::find($request->id);
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
        if($imageName3 != null){
            $service->service_banner_image = 'banners/'.$imageName3;
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


    function userManagement(){
     return view('admin.user_management.user_management');
    }

    public function addBooking(){
        $users = User::where(['role' => 'user'])->get();
        $categories = Category::all();
        $time_slot_list = [
            '09:00 - 09:15 am','09:30 - 09:45 am','10:00 - 10:15 am','10:30 - 10:45 am','11:00 - 11:15 am','11:30 - 11:45 am',
            '12:00 - 12:15 pm','12:30 - 12:45 pm','01:00 - 01:15 pm','01:30 - 01:45 pm','02:00 - 02:15 pm','02:30 - 02:45 pm',
            '03:00 - 03:15 pm','03:30 - 03:45 pm','04:00 - 04:15 pm','04:30 - 04:45 pm','05:00 - 05:15 pm','05:30 - 05:45 pm',
            '06:00 - 06:15 pm','06:30 - 06:45 pm','07:00 - 07:15 pm','07:30 - 07:45 pm','08:00 - 08:15 pm','08:30 - 08:45 pm',
            '09:00 - 09:15 pm','09:30 - 09:45 pm'
        ];
        return view('admin.add_booking.add_booking',compact('users','categories','time_slot_list'));
    }

    public function getAddress(Request $request){
        $address = Address::where(['user_id' => $request->user_id])->get();
        return json_encode($address);
    }

    public function getSubCategory(Request $request){
        $sub_category = SubCategory::whereIn('category_id' , $request->category_id)->get();
        return json_encode($sub_category);
    }

    public function getServices(Request $request){
        $services = Service::whereIn('sub_category_id' , $request->sub_category_id)->get();
        return json_encode($services);
    }

    public function bookingFromAdmin(Request $request){
        DB::beginTransaction();
        try{
            $form_booking = [
                'user_id' => $request->user_id,
                'status' => 'pending',
                'user_service_address_id' => $request->address_id,
                'time_slot' => $request->time_slot,
                'date_slot' => $request->date_slot
            ];
            $booking = Booking::create($form_booking);

            $services =  Service::whereIn('id',$request->service_id)->get();
            foreach ($services as $service){
                BookingService::create([
                    'booking_id' => $booking->bookingId,
                    'service_id' => $service->id,
                    'mrp' => $service->price,
                    'discount'=> $service->discount,
                    'price' => $service->discounted_price
                ]);
            }
            DB::commit();
            if($booking){
                Alert::success('', 'Booking Successfully Added');
                return redirect()->route('admin.addbooking');
            }
        }catch(\Exception $e){
            DB::rollback();
        }
    }

    function addAddress(){
        return view('admin.add_address.add_address');
    }
}
