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
use App\Models\Manufacturer;

class manufacturerImport implements ToCollection,WithHeadingRow,WithValidation
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
    	
    		if (Manufacturer::where('title',$row['manufacturer'])->exists()==false) {
                
                Manufacturer::create([
    
                    'title'=>$row['manufacturer'],
                    'description'=>$row['description']

                ]);
            }
 
        }   
    }

     public function rules(): array
   	 {
    	
        return [

            'manufacturer'=>'required',
                              
        ];
    }
}
