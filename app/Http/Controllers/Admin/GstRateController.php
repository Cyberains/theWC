<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
Use Alert;
use App\Models\GSTRate;
use Auth;
class GstRateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gstratedata = GSTRate::paginate(25);
        $currentpage = $gstratedata->currentPage();
        return view('admin.product.gst',compact(['gstratedata','currentpage']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([

            'gst_type' => 'required|unique:g_s_t_rates,gst_type',
        ]);

        $form_data=[
            
            'gst_type'=>$request->gst_type,
            'gst_rate'=>$request->gst_rate
        ];

        GSTRate::create($form_data);
        //Alert::success('', 'Category added successfully.');
        Session::flash('message', 'GST Rate added successfully.');
        return redirect()->route('admin.gst');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $gstrow = GSTRate::find($request->id);
        echo $gstrow;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $update = GSTRate::find($request->gst_id);
        $update->gst_type = $request->gst_type;
        $update->gst_rate = $request->gst_rate;
        $update->save();

       Session::flash('message', 'GST Rate updated successfully.');
       return redirect()->route('admin.gst');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        GSTRate::find($id)->delete();
        Session::flash('message', 'GST Rate deleted successfully.');
        return redirect()->route('admin.gst');
    }
    //filter function
    public function itemSearch(Request $request){
        if($request->ajax()){
             $datas=$request->all();
          $gstratedata=GSTRate::where('gst_type','LIKE','%'.$datas['query']."%")->orWhere('gst_rate','LIKE','%'.$datas['query']."%")->paginate(25);
          $gstratecount=GSTRate::where('gst_type','LIKE','%'.$datas['query']."%")->orWhere('gst_rate','LIKE','%'.$datas['query']."%")->count();
          if($gstratecount){
            $currentpage = $gstratedata->currentPage();
             return view('admin.product.paggination_gst', compact(['gstratedata','currentpage']))->render();
         }else
         {?>
            <tr><td colspan="4">No matching records found</td></tr>
        <?php }
         
        }
    }
}
