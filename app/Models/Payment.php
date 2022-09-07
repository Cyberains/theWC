<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [

        'order_id','transaction_id','mode','cardCategory','pg_type','bank_ref_num','bank_code','payment_source','easepayid','productinfo','udf1','udf2','udf3','udf4','udf5','udf6','udf7','udf8','udf9','udf10','hash','amount','net_amount_debit','deduction_percentage','cash_back_percentage','status','addedon','error_message'

    ];
}
