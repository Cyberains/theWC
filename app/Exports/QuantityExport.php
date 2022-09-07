<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class QuantityExport implements FromCollection,WithHeadings,ShouldAutoSize,WithStyles
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */

    public function collection()
    {
            return collect([
            [

            	'title'=>'Scotch Brite Jumper Spin Mob',
                'barcode'=>'897867569034',
	            'mrp_price'=>3500,
	            'net_stock'=>20,
                'expiry_date'=>'2020-01-05'
	           	            
            ]
        ]);
    }

    public function headings(): array
    {
        return [

        	'Title',
            'Barcode',
            'MRP Price',
            'Net Stock',
            'Expiry Date',

        ];
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
