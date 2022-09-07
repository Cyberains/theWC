<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithBatchInserts; 
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Validator;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\ProductExpiry;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class QuantityImport implements ToCollection,WithHeadingRow,WithValidation
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {

        	if($row['expiry_date']!= ''||$row['expiry_date']!= null)
            {

                

            $expirydateformat = Date::excelToDateTimeObject($row['expiry_date']);

            //dd($expirydateformat);
                
                $expirydate = $expirydateformat->format('Y-m-d');
            }
            else{
                
                $expirydate = null;

            }

        	
        	$productdata = Product::where('title',$row['title'])->first();

        	if ($productdata !=null) {
        		
        		$productattrdata = ProductAttribute::where('product_id',$productdata->id)->where('barcode_id',$row['barcode'])->first();

        		if ($productattrdata !=null) {
        			
        			ProductExpiry::where('product_id',$productdata->id)->where('productattr_id',$productattrdata->id)->where('expiry_date',$expirydate)->update(['quantity'=>$row['net_stock']]);
        		}
        	}
        }
    }


    public function rules(): array
    {

        return [

            'title' =>'required',
            'bar_code'=>'nullable',
            'mrp_price'=>'required',
            'net_stock'=>'required',
            'expiry_date'=>'nullable',
                              
        ];
    }

    public function withValidator($validator)
    {
        
        $validator->after(function ($validator) {
            
            $datas = $validator->getData();

            $dataarr = array();
            
            foreach ($datas as $data =>$value) {

            	if (is_numeric($value['expiry_date'])|| $value['expiry_date']==''||$value['expiry_date']==null ) {
                    
                    $tell =true;
                }
                else{

                    $validator->errors()->add($data, 'Enter Valid Expiry date.');
                }

                $productdata = Product::where('title',$value['title'])->first();

	        	if ($productdata !=null) {
	        		
	        		$productattrdata = ProductAttribute::where('product_id',$productdata->id)->where('barcode_id',$value['barcode'])->first();

	        		if ($productattrdata == null ) {
	        			
	        			$validator->errors()->add($data, 'Barcode or Mrp does not exists in product attribute section of this product.');
	        		}
	        	}
	        	else
	        	{

                    $validator->errors()->add($data, 'Product does not exists.');

                }


            }

            
            
        });
    }
}
