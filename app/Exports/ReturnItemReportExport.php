<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Support\Facades\Session;

use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

use App\Models\ReturnItems;

class ReturnItemReportExport implements FromView,ShouldAutoSize,WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        	
    	$q = ReturnItems::with('receiptName');	

        if (Session::has('start_date')) {
               
            $start_date = session()->get('start_date');
           
            $q->whereDate('created_at','>=',$start_date);

        }

        if (Session::has('end_date')) {
            
            $end_date = session()->get('end_date');
            
            $q->whereDate('created_at','<=',$end_date);

        }

        if (Session::has('biller_id')) {
            
            $end_date = session()->get('end_date');
            
            $q->where('created_at','<=',$end_date);

        }

        if (Session::has('receipt_id')) {
            
            $receipt_id = session()->get('receipt_id');
            
            $q->where('created_at','<=',$receipt_id);

        }

        $qu = $q->get();

        if (Session::get('report_type')=='description') {
            
            session()->forget(['start_date','end_date','biller_id','receipt_id','report_type']);

            return view('admin.report.return_excel_description', [

                'invoices' => $qu,

            ]);

        }
        else{

            session()->forget(['start_date','end_date','biller_id','receipt_id','report_type']);

            return view('admin.report.return_excel_summary', [

                'invoices' => $qu,

            ]);

        }

        
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('1')->getFont()->setBold(true);

        $sheet->getStyle('A:R')->getAlignment()->applyFromArray(
            array('horizontal' => 'center')
        );

        $sheet->getStyle('J:J')->getAlignment()->setWrapText(true);
    }
}
