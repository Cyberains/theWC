<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Address;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function addNewAddress(Request $request): JsonResponse
    {
        $request->validate([
            'house_no' => 'required',
            'area' => 'required',
            'zipcode' => 'required',
            'city' => 'required',
            'state' => 'required',
            'address_type' => 'required',
            'mobile' => 'required'
        ]);

        $form_data = [
            'user_id' => $request->user()->id,
            'house_no' => $request->house_no,
            'area' => $request->area,
            'zipcode' => $request->zipcode,
            'city' => $request->city,
            'state' => $request->state,
            'address_type' => $request->address_type,
            'mobile' => $request->mobile,
            'landmark' => $request->landmark,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude
        ];

        $address = Address::create($form_data);

        if($address){
            return response()->json([
                'status' => 201,
                'data' => $address,
                'message' => 'Address Added Successfully.'
            ]);
        }else{
            return response()->json([
                'status' => 500,
                'data' => [],
                'message' => 'Something Went Wrong Try Again...'
            ]);
        }

    }

    public function showAllAddress(Request $request): JsonResponse
    {
        $address = Address::where(['user_id' => $request->user()->id])->get();
        return response()->json([
            'status' =>200 ,
            'data' => $address,
            'message' => 'All Address Successfully received.'
        ]);
    }

    public function storeAddress(Request $request): JsonResponse
    {
        $form_data = [
            'house_no' => $request->house_no,
            'area' => $request->area,
            'zipcode' => $request->zipcode,
            'city' => $request->city,
            'state' => $request->state,
            'address_type' => $request->address_type,
            'mobile' => $request->mobile,
            'landmark' => $request->landmark,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude
        ];
        $address = Address::where('id', $request->id)->update($form_data);

        if($address){
            return response()->json([
                'status' => 201,
                'data' => $form_data,
                'message' => 'Address Successfully Updated.'
            ]);
        }else{
            return response()->json([
                'status' => 500,
                'data' => [],
                'message' => 'Something Went Wrong Try Again...'
            ]);
        }
    }

    public function addressView(Request $request): JsonResponse
    {

        $address = Address::where('id', $request->id)->first();
        if($address){
            return response()->json([
                'status' =>200 ,
                'data' => $address,
                'message' => 'Address Successfully.'
            ]);
        }else{
            return response()->json([
                'status' => 404,
                'data' => [],
                'message' => 'No Address Found.'
            ]);
        }
    }

    public function AddressDelete(Request $request): JsonResponse
    {
        $address = Address::find($request->id);
        if($address){
            $address->delete();
            return response()->json([
                'status' => 200,
                'data' => $address,
                'message' => 'Address Deleted Successfully.'
            ]);
        }else{
            return response()->json([
                'status' => 404,
                'data' => [],
                'message' => 'No Address Found.'
            ]);
        }
    }

    public function setDefault(Request $request): JsonResponse
    {
        $address = Address::where(['user_id'=>$request->user()->id,'id' => $request->id])->first();
        if($address != null){
            $address->is_default = 1;
            if($address->save()){
                $addresses  = Address::where(['user_id'=>$request->user()->id])->where('id','!=',$request->id)->get();
                foreach ($addresses as $addr){
                    $addre = Address::where(['id' => $addr->id])->first();
                    $addre->is_default = 0;
                    $addre->save();
                }

                return response()->json([
                    'status' => 200,
                    'data' => $address,
                    'message' => 'Successfully Done.'
                ]);
            }else{
                return response()->json([
                    'status' => 404,
                    'data' => [],
                    'message' => 'Something went wrong try Again.'
                ]);
            }
        }else{
            return response()->json([
                'status' => 404,
                'data' => [],
                'message' => 'Plz enter right address.'
            ]);
        }
    }
}
