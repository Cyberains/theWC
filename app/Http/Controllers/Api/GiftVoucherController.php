<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\GiftVoucher;
use App\Models\GiftVoucherUsedUser;
use Illuminate\Http\Request;

class GiftVoucherController extends Controller
{
    public function getVoucher(Request $request){
        $voucherUsed = GiftVoucherUsedUser::where(['user_id' => $request->user()->id])->pluck('gift_voucher_id');
        $vouchers = GiftVoucher::whereNotIn('id',$voucherUsed)->get();
        if($vouchers->count() > 0){
            return response()->json([
                'status' => 200,
                'data' => $vouchers,
                'message' => 'Available Gift Voucher, For the user.'
            ]);
        }else{
            return response()->json([
                'status' => 200,
                'data' => $vouchers,
                'message' => 'Not Available Gift Voucher, For the user.'
            ]);
        }
    }
}
