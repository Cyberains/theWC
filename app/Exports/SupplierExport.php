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


class SupplierExport implements FromCollection,WithHeadings,ShouldAutoSize,WithStyles
{

	use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */

		    public function collection()
		    {
		            return collect([
		            [

		                'supplier_name*'=>'Supplier',
				        'supplier_email*'=>'supplier@gmail.com',
				        'supplier_mobile*'=>1234567890,
				        'supplier_address*'=>'Test',
				        'gst_in*'=>'22AAAAA0000A1Z5',
				        'pan_no*'=>'AAAAA0000A',
				        'pincode*'=> 123456,
				        'city*'=>'Agra',
				        'state*'=>'Utter Pradesh',
				        'country*(in:india)'=>'in',
				        'tax_type(options:none=>,inter_state=>,intra_state)'=>'none',
				        'po_expiry_duration*(in days)'=>17,
				        'owner_name'=>'',
				        'owner_email'=>'',
				        'owner_mobile'=>'',
				        'spoc_name'=>'',
				        'spoc_email'=>'',
				        'spoc_mobile'=>'',
				        'lead_time*(in days)'=>6,
				        'credit_period*(in days)'=>30,
				        'bank_name*'=>'PNB',
				        'ifsc_code*'=>'PNB00006',
				        'branch_name*'=>'Sikandra',
				        'account_number*'=>'9870594819',
				        'account_holder_name*'=>'Test Test',
				        'secondary_email*'=>'test@gmail.com',
			           	            
		            ]
		        ]);
		    }

		    public function headings(): array
		    {
		        return [


		            'Supplier_Name*',
			        'Supplier_Email*',
			        'Supplier_Mobile*',
			        'Supplier_Address*',
			        'GST_IN*',
			        'PAN_NO*',
			        'Pincode*',
			        'City*',
			        'State*',
			        'Country*(in:India)',
			        'Tax_type(options:none,inter_state,intra_state)',
			        'PO_Expiry_Duration*(In days)',
			        'Owner_Name',
			        'Owner_Email',
			        'Owner_Mobile',
			        'SPOC_Name',
			        'SPOC_Email',
			        'SPOC_Mobile',
			        'Lead_Time*(In Days)',
			        'Credit_Period*(In Days)',
			        'Bank_Name*',
			        'IFSC_Code*',
			        'Branch_Name*',
			        'Account_Number*',
			        'Account_Holder_name*',
			        'Secondary_Email*',

		        ];
		    }
		   

		    public function styles(Worksheet $sheet)
		    {
		        $sheet->getStyle('1')->getFont()->setBold(true);

		        $sheet->getStyle('A:Z')->getAlignment()->applyFromArray(
		            array('horizontal' => 'center')
		        );

		        $sheet->getStyle('J:J')->getAlignment()->setWrapText(true);
		    }

}