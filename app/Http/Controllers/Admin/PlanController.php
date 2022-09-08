<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class PlanController extends Controller
{
    public function index(Request $request)
    {
        $subscriptions = Subscription::select(\DB::raw('subscriptions.*'))->paginate(25);
        $currentpage = $subscriptions->currentPage();
        return view('admin.sub_plans.index',compact(['subscriptions','currentpage']));
    }

    public function create()
    {
        $subscription = Subscription::orderBy('id','DESC')->get();
        return json_encode($subscription);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif|max:2048|dimensions:min_width=400,min_height=400',
            'months' => 'required',
            'price' => 'required',
            'discount' => 'required',
        ]);

        if ($request->image != null) {
            $save_path = public_path('images/plans');
            if (!file_exists($save_path)) {
                mkdir($save_path, 0777, true);
            }
            $imageName = time().'.'.$request->image->extension();
            $image = $request->file('image');
            $img = Image::make($image->path());
            $img->fit(400,400)->save(public_path('images/plans').'/'.$imageName);
        }
        else{
            $imageName = null;
        }

        $subscription =new Subscription();
        $subscription->name = $request->name;
        $subscription->base_path = url('public/images/plans/');
        $subscription->image = $imageName ?? $subscription->image;
        $subscription->description = $request->description;
        $subscription->price = $request->price;
        $subscription->discount = $request->discount;
        $subscription->months = $request->months;
        $subscription->final_price =  $request->price - $request->discount;
        $subscription->save();

        Session::flash('message', 'Plan added successfully.');
        return redirect()->route('admin.plan');

    }

    public function edit(Request $request)
    {
        $subscriptionrow = Subscription::find($request->id);
        echo $subscriptionrow;
    }

    public function update(Request $request): RedirectResponse
    {

        if ($request->image != null) {
            $save_path = public_path('images/plans');
            if (!file_exists($save_path)) {
                mkdir($save_path, 0777, true);
            }
            $imageName = time().'.'.$request->image->extension();
            $image = $request->file('image');
            $img = Image::make($image->path());
            $img->fit(400,400)->save(public_path('images/plans').'/'.$imageName);
        }
        else{
            $imageName = null;
        }

        $subscription = Subscription::find($request->id);
        $subscription->name = $request->name;
        $subscription->base_path = url('public/images/plans/');
        $subscription->image = $imageName ?? $subscription->image;
        $subscription->description = $request->description;
        $subscription->price = $request->price;
        $subscription->discount = $request->discount;
        $subscription->months = $request->months;
        $subscription->final_price =  $request->price - $request->discount;
        $subscription->save();

        Session::flash('message', 'Plan updated successfully.');
        return redirect()->route('admin.plan');
    }

    public function destroy(Request $request)
    {
        Subscription::where('id', $request->id)->delete();
        Session::flash('message', 'Subscription deleted successfully.');
        return redirect()->route('admin.plan');
    }

    function itemSearch(Request $request)
    {
        if($request->ajax())
        {
            $datas = $request->all();
            $subscriptions=Subscription::where('name','LIKE','%'.$datas['query']."%")->paginate(25);
            $categorycount=Subscription::where('name','LIKE','%'.$datas['query']."%")->count();
            if($categorycount){
                $currentpage = $subscriptions->currentPage();
                return view('admin.sub_plans.paggination_plans', compact(['subscriptions','currentpage']))->render();
            }else{?>
                <tr>
                    <td colspan="4">No matching records found</td>
                </tr>
            <?php }
        }
    }
}
