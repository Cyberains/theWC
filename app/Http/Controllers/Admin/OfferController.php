<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\Offer;
use Illuminate\Support\Facades\Session;

class OfferController extends Controller
{
    

    public function TodayOffer(){

        $offerdata = Offer::paginate(25);
        $currentpage = $offerdata->currentPage();
        return view('admin.offer.today_offer',compact(['offerdata','currentpage']));
    }

    public function AddTodayOffer(Request $request){

        $month = date('M',strtotime($request->start_date));
        $date = date('d',strtotime($request->start_date));

        $offerhardcodeid = 'EB'.strtoupper($month).$date ;

        $offerlastrow = Offer::orderBy('id','DESC')->first();

        if ($offerlastrow!=null) {
            
            $last_offer_id = $offerlastrow->offer_id;

            $offer_id_array = str_split($last_offer_id,7);

            $offer_id_number = $offer_id_array[1];

            $counter = str_pad((int)$offer_id_number+1, 4 ,"0",STR_PAD_LEFT);

            $new_offer_id = $offerhardcodeid.$counter;
        }
        else{

            $new_offer_id = $offerhardcodeid.'0001';
        }

        $productdata = Product::where('title',$request->product)->first();

        if($productdata != null){

            $productattrdata = ProductAttribute::find($request->product_attr);

            $form_data = [

                'offer_id' => $new_offer_id,
                'product_id' => $productdata->id,
                'productattr_id' => $productattrdata->id,
                'selling_price' => $productattrdata->selling_price,
                'today_price'=> $request->today_price,
                'start_date' => date('Y-m-d H:i:s',strtotime($request->start_date)),
                'end_date' => date('Y-m-d H:i:s',strtotime($request->end_date)),

            ];

            $offerdata = Offer::create($form_data);

            if (!empty($offerdata->id)) {
                
                $productattrdata->selling_price = $request->today_price;
                $productattrdata->offer_status = 1;
                $productattrdata->save();
                
            }

            Session::flash('message', 'Offer added successfully.');
            return redirect()->route('admin.today_offer');

            
        }
        else{

            return redirect()->route('admin.today_offer')->withErrors(['error'=>'This product does not exists']);
        }
    }


    public function Edit(Request $request){

        $offerdata = Offer::with('productName')->with('productattrName')->find($request->id);

        $mrpdata = ProductAttribute::where('product_id',$offerdata->product_id)->get();

        return response()->json([

            'offerdata'=>$offerdata,
            'mrpdata'=>$mrpdata,

        ]);
        

    }

    public function Update(Request $request){

        $productdata = Product::where('title',$request->product)->first();

        if ($productdata != null) {
            
            $update = Offer::find($request->offer_id);

            $update->product_id = $productdata->id;
            $update->productattr_id = $request->product_attr;
            $update->today_price = $request->today_price;
            $update->start_date = date('Y-m-d H:i:s',strtotime($request->start_date));
            $update->end_date = date('Y-m-d H:i:s',strtotime($request->end_date));
            $update->save();

            //update selling price
            $productattrdata = ProductAttribute::find($request->product_attr);

            $productattrdata->selling_price = $request->today_price;
            $productattrdata->offer_status = 1;
            $productattrdata->save();

            Session::flash('message', 'Offer updated successfully.');
            return redirect()->route('admin.today_offer');

        }
        else{

            return redirect()->route('admin.today_offer')->withErrors(['error'=>'This product does not exists']);

        }

    }

    public function Destroy($id){

        $offerdata = offer::find($id);

        $productattrdata = ProductAttribute::find($offerdata->productattr_id);

        $productattrdata->selling_price = $offerdata->selling_price;
        $productattrdata->offer_status = 0;
        $productattrdata->save();

        $offerdata->delete();
        Session::flash('message', 'Offer deleted successfully.');
        return redirect()->route('admin.today_offer');

    } 
}
