<?php

namespace App\Imports;

use App\Models\WorldCity;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class cityImport implements ToCollection,WithHeadingRow,WithValidation
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row)
        {
            $cityFind = WorldCity::where('name',$row['name'])->first();
            if ($cityFind == null) {
                WorldCity::create([
                    'name'=>$row['name'],
                    'image'=>$row['image']
                ]);
            }else{
                $cityFind->name = $row['name'];
                $cityFind->image = $row['image'];
                $cityFind->save();
            }
        }
    }

    public function rules(): array
    {
        return [
            'name'=>'required',
        ];
    }
}
