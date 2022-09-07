<?php

namespace App\Exports;

use App\Models\Purchase;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Support\Facades\Session;

use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class POReportExport implements FromView,ShouldAutoSize,WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        	
    	$q = Purchase::with('supplierName');	

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
            
            $q->where('created_at','<=',$end_date);

        }

        $qu = $q->get();

        session()->forget(['start_date','end_date','supplier_id']);

	    return view('admin.report.po_excel', [

            'invoices' => $qu,

        ]);
    }

    // public function headings(): array
    // {
    //     return [


    //         'PO Date',
    //         'PO Number',
    //         'Supplier ID',
    //         'Supplier Name',
    //         'SKU Code',
    //         'Product Name',
    //         'Brand',
    //         'Category',
    //         'SubCategory',
    //         'PO Qty.',
    //         'Unit Price with Tax',
    //         'Unit Price without Tax',
    //         'MRP',
    //         'Pre Tax PO Amount',
    //         'Tax',
    //         'After Tax PO Amount',
    //         'Qty Received',

    //     ];
    // }
   

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('1')->getFont()->setBold(true);

        $sheet->getStyle('A:R')->getAlignment()->applyFromArray(
            array('horizontal' => 'center')
        );

        $sheet->getStyle('J:J')->getAlignment()->setWrapText(true);
    }
}
