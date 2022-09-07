<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receivepo extends Model
{
    use HasFactory;
    protected $fillable = ['lrnumber','purchase_id','poreference','suppplierid','supppliername','carriername','expected_date','remaindermail','invoicenumber','invoicedate','scansku','invoicevalue','discountvalue','remark','skucode','barcode_id','productname','qty','receivedqty','offer','uom','unitprice','buyprice','mrp','weight','discount','batchno','mfgdata','expdate','tax','cess','apmc','returnquantity','discrepancyresson','total','sub_total','total_tax','tax_price','grand_total','purchage_grand_total','credit','debit','purchase_amount'];

  
 public  function supplier(){

	    return $this->belongsTo('App\Models\Supplier','supplier_id','suppplierid');	    
	}

 }
