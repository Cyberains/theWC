<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\SubBrand;
use Illuminate\Support\Facades\Session;
Use Alert;
use Auth;
class SubBrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branddata = Brand::get();
        $subbranddata = SubBrand::with('brandName')->paginate(25);
        $currentpage = $subbranddata->currentPage();
        return view('admin.product.subbrand',compact(['branddata','subbranddata','currentpage']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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

            'title' => 'required|unique:sub_brands,title',
        ]);

        $imageName = time().'.'.$request->subbrand_image->extension();  
        
        $value = $request->subbrand_image->move(public_path('images/subbrand'), $imageName);

            if ($value) {
                
                $form_data=[

                'brand_id'=>$request->brand,
                'title'=>$request->title,
                'image'=>$imageName,
                'description'=>$request->description

            ];

            SubBrand::create($form_data);
            Session::flash('message', 'SubBrand added successfully.');

            

        }
        else{

            Session::flash('error', 'Please Upload Image.');

           
        }
       
        return redirect()->route('admin.subbrand');

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
        $subbrandrow = SubBrand::find($request->id);
        echo $subbrandrow;
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

        $update = SubBrand::find($request->subbrand_id);

        $update->brand_id = $request->brand;
        $update->title = $request->title;
        $update->description = $request->description;
        $update->save();

        if($request->subbrand_image!='') {

            $getimagename = $update->image; 

            $imageName = time().'.'.$request->subbrand_image->extension();  
            
            $value = $request->subbrand_image->move(public_path('images/subbrand/'), $imageName);
            $imageupdate = SubBrand::where('id',$request->subbrand_id)->update(['image'=>$imageName]);

            $image_path = public_path().'/images/subbrand/'.$getimagename;
           
            if(file_exists($image_path)){

    
                unlink($image_path);

            } 

        } 

       Session::flash('message', 'SubBrand updated successfully.');
       return redirect()->route('admin.subbrand');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SubBrand::find($id)->delete();
        Session::flash('message', 'SubBrand deleted successfully.');
        return redirect()->route('admin.subbrand');
    }

    public function GetSubBrand(Request $request){

        $subbranddata = SubBrand::where('brand_id',$request->id)->get();
        echo $subbranddata;
    }
     //filter function
  
    function itemSearch(Request $request)
    {
        if($request->ajax()){
            $datas=$request->all();
            $branddata = Brand::where('title','LIKE','%'.$datas['query']."%")->get();
            $brand=array();
            $subbrandcount=0;
            if($branddata){
                foreach ($branddata as $select) {
                $brand[]=$select->id;
                }
             }
           if($brand){
            $subbranddata=SubBrand::whereIn('brand_id',$brand)
            ->paginate(25);
            $subbrandcount=SubBrand::whereIn('brand_id',$brand)
                                      ->count();
           
           }else{
            $subbranddata=SubBrand::with(['brandName',])->where('title','LIKE','%'.$datas['query']."%")->orWhere('description','LIKE','%'.$datas['query']."%")->paginate(25);
            $subbrandcount=SubBrand::where('title','LIKE','%'.$datas['query']."%")->orWhere('description','LIKE','%'.$datas['query']."%")->count();
           }
            if($subbrandcount>0){
            $currentpage = $subbranddata->currentPage();
            return view('admin.product.paggination_subbrand', compact(['subbranddata','currentpage']))->render(); 
            }else{?>
            <tr>
                <td colspan="6">No matching records found</td>
            </tr>
            <?php }
      
        }
    }
}