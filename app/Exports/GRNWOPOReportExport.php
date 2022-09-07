<?php

namespace App\Exports;

use App\Models\GRNWOPO;
use Maatwebsite\Excel\Concerns\FromCollection;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Support\Facades\Session;

use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class GRNWOPOReportExport implements FromView,ShouldAutoSize,WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    
    public function view(): View
    {

    	$q = GRNWOPO::with('supplierName');	

        if (Session::has('start_date')) {
               
            $start_date = session()->get('start_date');
           
            $q->whereDate('created_at','>=',$start_date);

        }

        if (Session::has('end_date')) {
            
            $end_date = session()->get('end_date');
            
            $q->whereDate('created_at','<=',$end_date);

        }

        if (Session::has('supplier_id')) {
            
            $supplier_id = session()->get('supplier_id');

            $q->where('supplier_id',$supplier_id);

        }

        if (Session::has('grn_wopo_id')) {
            
            $lr_number_id = session()->get('grn_wopo_id');
                        
            $q->where('lr_number',$lr_number_id);

        }


        $qu = $q->get();

        if (Session::get('report_type')=='description') {

        	session()->forget(['start_date','end_date','supplier_id','grn_wopo_id']);

	    	return view('admin.report.grnwopo_excel_description', [

            	'invoices' => $qu,

        	]);
        }
        else{

        	session()->forget(['start_date','end_date','supplier_id','grn_wopo_id']);

	    	return view('admin.report.grnwopo_excel_summary', [

            	'invoices' => $qu,

        	]);
        }
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('1')->getFont()->setBold(true);

        $sheet->getStyle('A:U')->getAlignment()->applyFromArray(
            array('horizontal' => 'center')
        );

        $sheet->getStyle('J:J')->getAlignment()->setWrapText(true);
    }
}
