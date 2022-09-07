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


class ProductExport implements FromCollection,WithHeadings,ShouldAutoSize,WithStyles
{

	use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */

    public function collection()
    {
            return collect([
            [

                'category'=>'Cleaning Essentials',
                'sub_category'=>'Cleaning Accessories',
	            'brand'=>'Scotch Brite',
	            'sub_brand'=>null,
	            'manufacturer'=>'3M',
                'barcode'=>'897867569034',
	            'title'=>'Scotch Brite Jumper Spin Mob',
	            'hsn_code'=>'123456',
	            'sub_category_type'=>'Poly bags',
	            'description'=>'Scotch-Brite is a line of abrasive products produced by 3M.',
                'sgst_tax'=>'SGST@9',
                'cgst_tax'=>'CGST@9',
                'igst_tax'=>'IGST@9',
                'ugst_tax'=>'UGST@9',
                'cess_tax'=>'CESS@5',
                'apmc_tax'=>'APMC@2.5',
	            'mrp_price'=>3500,
	            'selling_price'=>3400,
	            'membership_price'=>3300,
	            'cost_price'=>3200,
                'sv_sell_price'=>3200.80,
                'aisle'=>'aisle',
                'rack'=>'rack',
                'shelf'=>'shelf',
	            'weight'=>'pieces',
                'unit'=>'nos,kg,gm,ml,ltr',
	            'net_stock'=>20,
                'mfg_date'=>'2019-01-05',
                'expiry_date'=>'2020-01-05'

            ]
        ]);
    }

    public function headings(): array
    {
        return [


            'Category*',
            'Sub Category*',
            'Brand*',
            'Sub Brand',
            'Manufacturer*',
            'Barcode',
            'Title*',
            'HSN Code',
            'Sub Category Type',
            'Description',
            'SGST Tax*',
            'CGST Tax*',
            'IGST Tax*',
            'UGST Tax*',
            'CESS Tax*',
            'APMC Tax*',
            'MRP Price*',
            'Selling Price*',
            'Membership Price',
            'Cost Price*',
            'SV Sell Price',
            'Aisle',
            'Rack',
            'Shelf',
            'Weight',
            'Unit*',
            'Net Stock*',
            'Mfg Date',
            'Expiry Date',

        ];
    }


    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('1')->getFont()->setBold(true);

        $sheet->getStyle('A:AC')->getAlignment()->applyFromArray(
            array('horizontal' => 'center')
        );

        $sheet->getStyle('J:J')->getAlignment()->setWrapText(true);
    }

}
