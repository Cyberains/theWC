<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Manufacturer;
use Illuminate\Support\Facades\Session;
Use Alert;
use Excel;
use App\Exports\manufacturerExport;
use App\Imports\manufacturerImport;

class ManufacturerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $manufacturerdata = Manufacturer::paginate(25);
        $currentpage = $manufacturerdata->currentPage();
        return view('admin.product.manufacturer',compact(['manufacturerdata','currentpage']));
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

            'title' => 'required|unique:manufacturers,title',
        ]);

        $form_data=[
            
            'title'=>$request->title,
            'description'=>$request->description
        ];

        Manufacturer::create($form_data);

        //Alert::success('', 'Category added successfully.');
        Session::flash('message', 'Manufacturer added successfully.');
        return redirect()->route('admin.manufacturer');
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
        $manufacturerrow = Manufacturer::find($request->id);
        echo $manufacturerrow;
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
       
       $update = Manufacturer::find($request->manufacturer_id);
       $update->title = $request->title;
       $update->description = $request->description;
       $update->save();

       Session::flash('message', 'Manufacturer updated successfully.');
       return redirect()->route('admin.manufacturer');
    }


     public function import(){

        return view('admin.product.manufacturer_import');

    }

    public function importCSV(Request $request){

        $request->validate([

           'import_file' => 'required|mimes:xlsx,txt'

       ]);

       try{

            Excel::import(new manufacturerImport,request()->file('import_file'));
        }catch ( ValidationException $e ){

            return response()->json(['success'=>'errorList','message'=> $e->errors()]);
        }
                  
        

       Session::flash('message', 'Manufacturer Imported Successfully.');
       return redirect()->route('admin.manufacturer');
    }

    public function downloadCSVSample(){

        return Excel::download(new manufacturerExport, 'manufacturer_sheet'.time().'.xlsx');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Manufacturer::find($id)->delete();
        Session::flash('message', 'Manufacturer deleted successfully.');
        return redirect()->route('admin.manufacturer');
    }
    //filter function
    public function itemSearch(Request $request){
        if($request->ajax()){

             $datas=$request->all();
          $manufacturerdata=Manufacturer::where('title','LIKE','%'.$datas['query']."%")->orWhere('description','LIKE','%'.$datas['query']."%")->paginate(25);

          $manufacturercount=Manufacturer::where('title','LIKE','%'.$datas['query']."%")->orWhere('description','LIKE','%'.$datas['query']."%")->count();
          if($manufacturercount){
                $currentpage = $manufacturerdata->currentPage();
             return view('admin.product.paggination_manufacturer', compact(['manufacturerdata','currentpage']))->render();
         }else
         {?>
            <tr><td colspan="4">No matching records found</td></tr>
        <?php }
         
        }
    }
}
