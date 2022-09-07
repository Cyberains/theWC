<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
Use Alert;
use App\Models\Supplier;
use Khsing\World\World;
use Khsing\World\Models\Country;
use App\Exports\SupplierExport;
use App\Imports\SupplierImport;
use Excel;
use App\Models\Receivepo;
class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $supplierlastelement = Supplier::latest()->first();

        if ($supplierlastelement != null) {
            
            $supplierid =  $supplierlastelement->supplier_id;
            $supplieridg = explode("EB",$supplierid)[1]; 

            $counter = str_pad((int)$supplieridg+1, 3 ,"0",STR_PAD_LEFT);

            $new_supplieridg = $counter;
        }
        else{

            $new_supplieridg = '001';
        }  

        
        $supplierdata = Supplier::paginate(25);
        $currentpage = $supplierdata->currentPage();
        $countrydata = World::Countries();
         
        return view('admin.vendor.supplier',compact(['supplierdata','countrydata','new_supplieridg','currentpage']));
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

        $supplier_id = 'EB'.$request->supplier_id;

        $request->validate([

                'supplier_id'=>'required|unique:suppliers,supplier_id'
        ]);

        // $supplierdata = Supplier::where('supplier_id',$supplier_id)->first();

        // if ($supplierdata != null) {
            
        //     return redirect()->back()->withErrors(['supplier_id'=>'Supplier ID already Exists']);  
        // }


        $form_data = [

            'supplier_id'=>$supplier_id,
            'supplier_name'=>$request->supplier_name,
            'supplier_address'=>$request->supplier_address,
            'supplier_email'=>$request->supplier_email,
            'supplier_mobile'=>$request->supplier_mobile,
            'gst_in'=>$request->gst_in,
            'pan_no'=>$request->pan_no,
            'pincode'=>$request->pincode,
            'city'=>$request->city,
            'state'=>$request->state,
            'country'=>$request->country,
            'tax_type'=>$request->tax_type,
            'po_expiry_duration'=>$request->po_expiry_duration,
            'owner_name'=>$request->owner_name,
            'owner_number'=>$request->owner_mobile,
            'owner_email'=>$request->owner_email,
            'spoc_name'=>$request->spoc_name,
            'spoc_number'=>$request->spoc_mobile,
            'spoc_email'=>$request->spoc_email,
            'lead_time'=>$request->lead_time,
            'credit_period'=>$request->credit_period,
            'bank_name'=>$request->bank_name,
            'ifsc_code'=>$request->ifsc_code,
            'branch_name'=>$request->branch_name,
            'account_number'=>$request->account_number,
            'account_holder_name'=>$request->account_holder_name,
            'secondary_email'=>$request->secondary_email,

        ];

        Supplier::create($form_data);
        Session::flash('message','Supplier Added Successfully');
        return redirect()->route('admin.supplier');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
          
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $supplierrow = Supplier::find($request->id);
        echo $supplierrow;
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
       

        $update = Supplier::find($request->id);

        $update->supplier_id = 'EB'.$request->supplier_id;
        $update->supplier_name = $request->supplier_name;
        $update->supplier_address = $request->supplier_address;
        $update->supplier_email = $request->supplier_email;
        $update->supplier_mobile = $request->supplier_mobile;
        $update->gst_in = $request->gst_in;
        $update->pan_no = $request->pan_no;
        $update->pincode = $request->pincode;
        $update->city = $request->city;
        $update->state = $request->state;
        $update->country = $request->country;
        $update->tax_type = $request->tax_type;
        $update->po_expiry_duration = $request->po_expiry_duration;
        $update->owner_name = $request->owner_name;
        $update->owner_number = $request->owner_mobile;
        $update->owner_email = $request->owner_email;
        $update->spoc_name = $request->spoc_name;
        $update->spoc_number = $request->spoc_mobile;
        $update->spoc_email = $request->spoc_email;
        $update->lead_time = $request->lead_time;
        $update->credit_period = $request->credit_period;
        $update->bank_name = $request->bank_name;
        $update->ifsc_code = $request->ifsc_code;
        $update->branch_name = $request->branch_name;
        $update->account_number = $request->account_number;
        $update->account_holder_name = $request->account_holder_name;
        $update->secondary_email = $request->secondary_email;

        $update->save();

        Session::flash('message', 'Supplier updated successfully.');
        return redirect()->route('admin.supplier');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Supplier::find($id)->delete();
        Session::flash('message', 'Supplier deleted successfully.');
        return redirect()->route('admin.supplier');
    }

    public function import(){

        return view('admin.vendor.supplier_import');

    }

    public function importCSV(Request $request){

        $request->validate([

           'import_file' => 'required|mimes:xlsx,txt'

       ]);

       try{

            Excel::import(new SupplierImport,request()->file('import_file'));
        }catch ( ValidationException $e ){

            return response()->json(['success'=>'errorList','message'=> $e->errors()]);
        }
                  
        

       Session::flash('message', 'Supplier Imported Successfully.');
       return redirect()->route('admin.supplier');
    }

    public function downloadCSVSample(){

        return Excel::download(new SupplierExport, 'supplier_sheet'.time().'.xlsx');
    }

    public function itemSearch(Request $request)
    {
        if($request->ajax())
        {
            $datas=$request->all();
            $supplierdata=Supplier::where('supplier_id','LIKE','%'.$datas['query']."%")
            ->orWhere('supplier_name','LIKE','%'.$datas['query']."%")
            ->orWhere('supplier_mobile','LIKE','%'.$datas['query']."%")
            ->orWhere('supplier_email','LIKE','%'.$datas['query']."%")
            ->orWhere('supplier_address','LIKE','%'.$datas['query']."%")
            ->orWhere('po_expiry_duration','LIKE','%'.$datas['query']."%")->paginate(25);

            $suppliercount=Supplier::where('supplier_id','LIKE','%'.$datas['query']."%")->orWhere('supplier_name','LIKE','%'.$datas['query']."%")
            ->orWhere('supplier_mobile','LIKE','%'.$datas['query']."%")
            ->orWhere('supplier_email','LIKE','%'.$datas['query']."%")
            ->orWhere('supplier_address','LIKE','%'.$datas['query']."%")
            ->orWhere('po_expiry_duration','LIKE','%'.$datas['query']."%")->count();

            if($suppliercount>0){

                $currentpage = $supplierdata->currentPage();
                return view('admin.vendor.pagination_supplier', 
                    compact(['supplierdata','currentpage']))->render();

                }
                else{?>
                <tr>
                    <td colspan="8">No matching records found</td>
                </tr>
             <?php }       
        }
    }

}
