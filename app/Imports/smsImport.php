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

class smsImport implements ToCollection,WithHeadingRow,WithValidation
{
    /**
    * @param Collection $collection
    */
    public $data;

    public function __construct($data)
    {
        $this->message = $data;
    }


    public function collection(Collection $rows)
    {
        
        foreach ($rows as $row) 
        {
            
            sendSms($row['mobile'],$this->message);

        }

    }

    public function rules(): array
    {
        
        return [

            'mobile'=>'required|min:10|max:10',
                              
        ];
    }
}
