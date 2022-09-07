<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Purchase;
use App\Models\Supplier;
use App\Models\User;
use App\Models\OfflineBilling;
use App\Models\ReturnItems;
use App\Models\GRNWOPO;
use App\Exports\ReturnItemReportExport;
use App\Exports\BillingReportExport;
use App\Exports\GRNWOPOReportExport;
use Excel;

class ReportController extends Controller
{
    
    public function poReport(){

    	$supplierdata = Supplier::get();
    	return view('admin.report.po_report',compact(['supplierdata']));
    }

    public function poReportGenerate(Request $request){

        $q = Purchase::with('supplierName');

    	if ($request->start_date != null) {
                    
            $q->whereDate('created_at','>=',$request->start_date);
            $request->session()->put('start_date', $request->start_date);
            
        }

        if($request->end_date != null){

            $q->whereDate('created_at','<=',$request->end_date);
            $request->session()->put('end_date', $request->end_date);
            
        }

        if($request->supplier_id != null){

            $q->where('supplier_id',$request->supplier_id);
            $request->session()->put('supplier_id', $request->supplier_id);
            
        }

        $q = $q->get();
        
    	if($q->count()>0){
            
            return Excel::download(new POReportExport(),'purchase_'.time().'.xlsx');
            
         }
         else{

            $e =['ordererror'=>'No Purchase order Exists between these dates'];
            return view('admin.report.po_report')->withErrors($e);
         }
    }


    public function grnwopoReport(){

        $supplierdata = Supplier::get(['id','supplier_name','supplier_id']);
        return view('admin.report.grnwopo_report',compact(['supplierdata']));
    }

    public function grnwopoReportGenerate(Request $request){

        $q = GRNWOPO::with('supplierName');

        if ($request->grnwopo_report_type !=null) {
            
            $request->session()->put('report_type', $request->grnwopo_report_type);
        }

        if ($request->start_date != null) {
                    
            $q->whereDate('created_at','>=',$request->start_date);
            $request->session()->put('start_date', $request->start_date);
            
        }

        if($request->end_date != null){

            $q->whereDate('created_at','<=',$request->end_date);
            $request->session()->put('end_date', $request->end_date);
            
        }

        if($request->supplier_id != null){

            $q->where('supplier_id',$request->supplier_id);
            $request->session()->put('supplier_id', $request->supplier_id);
            
        }

        if($request->grn_wopo_id != null){

            $q->where('lr_number',$request->grn_wopo_id);
            $request->session()->put('grn_wopo_id', $request->grn_wopo_id);
            
        }

        $q = $q->get();
        
        if($q->count()>0){
            
            return Excel::download(new GRNWOPOReportExport(),'grnwopo_'.time().'.xlsx');
            
         }
         else{

            $supplierdata = Supplier::get(['id','supplier_name','supplier_id']);

            $e =['ordererror'=>'No GRN Exists between these dates'];
            return view('admin.report.grnwopo_report',compact(['supplierdata']))->withErrors($e);
         }
    }


    public function BillingReportGenerate(Request $request){


        $q = OfflineBilling::with('billerName');

        if ($request->billing_report_type !=null) {
            
            $request->session()->put('report_type',$request->billing_report_type);
        }

        if ($request->start_date != null) {
                    
            $q->whereDate('created_at','>=',$request->start_date);
            $request->session()->put('start_date', $request->start_date);
            
        }

        if($request->end_date != null){

            $q->whereDate('created_at','<=',$request->end_date);
            $request->session()->put('end_date', $request->end_date);
            
        }

        if($request->biller_id != null){

            $q->where('biller_id','<=',$request->biller_id);
            $request->session()->put('biller_id', $request->biller_id);
            
        }

        if($request->receipt_id != null){

            $q->where('receipt_id','<=',$request->receipt_id);
            $request->session()->put('receipt_id', $request->receipt_id);
            
        }

        $q = $q->get();


        if($q->count()>0){
            
            return Excel::download(new BillingReportExport(),'billing_'.time().'.xlsx');
            
         }
         else{

            $e =['ordererror'=>'No Billing order Exists between these dates'];
            $billerdata = User::where('role','biller')->get();
            return view('admin.report.billing_report',compact(['billerdata']))->withErrors($e);

         }
    }


    public function BillingReport(){

        $billerdata = User::where('role','biller')->get();
        return view('admin.report.billing_report',compact(['billerdata']));
    }


    public function ReturnItemReport(){

        $billerdata = User::where('role','biller')->get();
        return view('admin.report.return_item_report',compact(['billerdata']));
    }


    public function ReturnItemReportGenerate(Request $request){

        $q = ReturnItems::with('billerName');

        if ($request->billing_report_type !=null) {
            
            $request->session()->put('report_type', $request->billing_report_type);
        }

        if ($request->start_date != null) {
                    
            $q->whereDate('created_at','>=',$request->start_date);
            $request->session()->put('start_date', $request->start_date);
            
        }

        if($request->end_date != null){

            $q->whereDate('created_at','<=',$request->end_date);
            $request->session()->put('end_date', $request->end_date);
            
        }

        if($request->biller_id != null){

            $q->where('biller_id','<=',$request->biller_id);
            $request->session()->put('biller_id', $request->biller_id);
            
        }

        if($request->receipt_id != null){

            $q->where('receipt_id','<=',$request->receipt_id);
            $request->session()->put('receipt_id', $request->receipt_id);
            
        }

        $q = $q->get();

        
        if($q->count()>0){
            
            return Excel::download(new ReturnItemReportExport(),'billing_'.time().'.xlsx');
            
         }
         else{

            $e =['ordererror'=>'No Billing order Exists between these dates'];
            $billerdata = User::where('role','biller')->get();
            return view('admin.report.return_item_report',compact(['billerdata']))->withErrors($e);

         }
    }
}
