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

class brandExport implements FromCollection,WithHeadings,ShouldAutoSize,WithStyles
{
	use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
            return collect([
            [

                'brand'=>'nestle',
                'description'=>'Nestle is the largest food company in the world, in terms of revenue.',
	           	            
            ]
        ]);
    }

    public function headings(): array
    {
        return [

            'Brand',
            'Description',

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
