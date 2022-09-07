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
use App\Models\Category;
use App\Models\SubCategory;

class categoryImport implements ToCollection,WithHeadingRow,WithValidation

{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {

        foreach ($rows as $row) 
        {
            $categoryfind = Category::where('title',$row['category_name'])->first();

            if ($categoryfind==null) {
                
                $category = Category::create([

                    
                    'title'=>$row['category_name'],
                    'description'=>$row['description']

                ]);

                SubCategory::create([

                    'category_id'=> $category->id,
                    'title'=> $row['sub_category_name'],
                    'description'=> $row['description']

                ]);
                
            }
    	    else{

                if(!SubCategory::where('category_id',$categoryfind->id)->where('title',$row['sub_category_name'])->exists()){

                    SubCategory::create([

                        'category_id'=> $categoryfind->id,
                        'title'=> $row['sub_category_name'],
                        'description'=> $row['description']

                    ]);

                }

            }
             
        }  
    }

    public function rules(): array
    {

    	// $categoryarr = array();
     //    $category = Category::get(['id','title']);
     //    foreach ($category as $c) {
           
     //        array_push($categoryarr, $c->title);
     //    }

     //    $subcategoryarr = array();
     //   	$subcategory = SubCategory::get(['id','title']);

     //    foreach ($subcategory as $s){
           
     //        array_push($subcategoryarr, $s->title);
     //    }
    	
        return [

            'category_name'=>'required',
            'sub_category_name'=>'required'
                              
        ];
    }
}
