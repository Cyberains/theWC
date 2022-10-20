<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CouponCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CouponController extends Controller
{
    public function index(Request $request)
    {
        $coupons = CouponCode::select(\DB::raw('coupon_code.*'))->paginate(25);
        $currentpage = $coupons->currentPage();
        return view('admin.coupon.index',compact(['coupons','currentpage']));
    }

    public function create()
    {
        $coupons = CouponCode::orderBy('id','DESC')->get();
        return json_encode($coupons);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'coupon' => 'required',
            'amount' => 'required',
            'price_limit' => 'required'
        ]);

        $coupon = new CouponCode();
        $coupon->name = $request->name;
        $coupon->coupon = $request->category_id;
        $coupon->amount = $request->sub_category_id;
        $coupon->price_limit = $request->price_limit;
        $coupon->save();
        Session::flash('message', 'Coupon Added successfully.');
        return redirect()->route('admin.promo');
    }

    public function edit(Request $request)
    {
        $coupon = CouponCode::find($request->id);
        echo $coupon;
    }

    public function update(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'coupon' => 'required',
            'amount' => 'required',
            'price_limit' => 'required'
        ]);

        $coupon = CouponCode::find($request->id);
        $coupon->name = $request->name;
        $coupon->coupon = $request->category_id;
        $coupon->amount = $request->sub_category_id;
        $coupon->price_limit = $request->price_limit;
        $coupon->save();

        Session::flash('message', 'Coupon updated successfully.');
        return redirect()->route('admin.promo');
    }

    public function destroy(Request $request)
    {
        $new_launched = CouponCode::where('id', $request->id)->first();
        $new_launched->delete();

        Session::flash('message', 'Coupon deleted successfully.');
        return redirect()->route('admin.promo');
    }

    function itemSearch(Request $request)
    {
        if($request->ajax())
        {
            $datas = $request->all();
            $cities=CouponCode::where('coupon','LIKE','%'.$datas['query']."%")->paginate(25);
            $categorycount=CouponCode::where('coupon','LIKE','%'.$datas['query']."%")->count();
            if($categorycount){
                $currentpage = $cities->currentPage();
                return view('admin.coupon.paggination_coupon', compact(['cities','currentpage']))->render();
            }else{?>
                <tr>
                    <td colspan="4">No matching records found</td>
                </tr>
            <?php }
        }
    }
}
