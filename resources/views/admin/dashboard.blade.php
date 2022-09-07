@extends('admin.includes.main')
@section('title')
    
    <title>Dashboard</title>

@endsection

@section('btitle')
    
    <li class="breadcrumb-item">Dashboard</li>

@endsection


@section('body')

  <style type="text/css">
    .anchor a:hover{

        text-decoration: none;
    }
  </style>
  
  <div class="container-fluid">
    <div class="fade-in">
      <div class="row anchor">
        @if(Auth::user()->role=='admin'||Auth::user()->role=='biller')
        <div class="col-sm-6 col-lg-3">
          <a href="{{ route('admin.billing.sale') }}">
            <div class="card text-white c-shadow pb-4" style="height:160px;">
              <div class="card-body card-body d-flex justify-content-center ">
                
                <i class="flaticon-order"></i>              
               
              </div>
              <div class="d-flex justify-content-center">
            
                  <div class="dash-font">Total Billing Order</div>

              </div>
              @if(Auth::user()->role=='admin')
                <div class="d-flex justify-content-between px-5 mx-3">
                  <div class="text-center text-dark">{{ App\Models\OfflineBilling::count() }}
                  </div>
                  <div class="text-dark"><i class="fa fa-rupee"></i>
                      {{ App\Models\OfflineBilling::sum('grand_total') }}/-
                  </div>
                </div>
              @else
                <div class="d-flex justify-content-between px-5 mx-3">
                  <div class="text-center text-dark">{{ App\Models\OfflineBilling::where('biller_id',Auth::user()->id)->count() }}
                  </div>
                  <div class="text-dark"><i class="fa fa-rupee"></i>
                      {{ App\Models\OfflineBilling::where('biller_id',Auth::user()->id)->sum('grand_total') }}/-
                  </div>
                </div>
              @endif
            </div>
          </a>
        </div>
        @endif
        @if(Auth::user()->role=='admin'||Auth::user()->role=='biller')
        <div class="col-sm-6 col-lg-3">
          <a href="{{ route('admin.billing.sale_type',['id'=>'today']) }}">
            <div class="card text-white c-shadow pb-4" style="height:160px;">
              <div class="card-body card-body d-flex justify-content-center ">
                
                <i class="flaticon-receipt"></i>              
               
              </div>
              <div class="d-flex justify-content-center">
            
                  <div class="dash-font">Today Billing Order</div>

              </div>
              @if(Auth::user()->role=='admin')
                <div class="d-flex justify-content-between px-5 mx-3">
                  <div class="text-dark">{{ App\Models\OfflineBilling::whereDay('created_at',\Carbon\Carbon::today())->count() }}
                  </div>
                  <div class="text-dark"><i class="fa fa-rupee"></i>
                      {{ App\Models\OfflineBilling::whereDay('created_at',\Carbon\Carbon::today())->sum('grand_total') }}/-
                  </div>
                </div>
              @endif

              @if(Auth::user()->role=='biller')
              <div class="d-flex justify-content-between px-5 mx-3">
                <div class="text-dark">{{ App\Models\OfflineBilling::where('biller_id',Auth::user()->id)->where('created_at',\Carbon\Carbon::now()->format('Y-m-d'))->count() }}
                </div>
                <div class="text-dark"><i class="fa fa-rupee"></i>
                    {{ App\Models\OfflineBilling::where('biller_id',Auth::user()->id)->where('created_at',\Carbon\Carbon::now()->format('Y-m-d'))->sum('grand_total') }}/-
                </div>
              </div>
              @endif
            </div>
          </a>
        </div>
        @endif

        @if(Auth::user()->role=='biller'||Auth::user()->role=='admin')
        <div class="col-sm-6 col-lg-3">
          <a href="{{ route('admin.billing.sale_type',['id'=>'cash']) }}">
            <div class="card text-white c-shadow pb-4" style="height:160px;">
              <div class="card-body card-body d-flex justify-content-center ">
                
                <i class="flaticon-cash-payment"></i>              
               
              </div>
              <div class="d-flex justify-content-center">
            
                  <div class="dash-font">Today Cash Payment</div>

              </div>
              
              @if(Auth::user()->role=='biller')
              <div class="d-flex justify-content-between px-5 mx-3">
                <div class="text-dark">{{ App\Models\OfflineBilling::where('biller_id',Auth::user()->id)->where('payment_method','COD')->whereDate('created_at',\Carbon\Carbon::today())->count() }}
                </div>
                <div class="text-dark"><i class="fa fa-rupee"></i>
                  {{ App\Models\OfflineBilling::where('biller_id',Auth::user()->id)->where('payment_method','COD')->where('eb_coupon_method',null)->where('payment_method1',null)->whereDate('created_at',\Carbon\Carbon::today())->sum('grand_total')+ 

                    App\Models\OfflineBilling::where('payment_method','COD')->where(function($query){

                          return $query->orWhere('eb_coupon_method','!=',null)->orWhere('payment_method1','!=',null);

                    })->whereDate('created_at',\Carbon\Carbon::today())->sum('received_cash') }}/-
                </div>
              </div>
              @endif

              @if(Auth::user()->role=='admin')

              <div class="d-flex justify-content-between px-5 mx-3">
                <div class="text-dark">{{ App\Models\OfflineBilling::where('payment_method','COD')->whereDay('created_at',\Carbon\Carbon::today())->count() }}
                </div>
                <div class="text-dark"><i class="fa fa-rupee"></i>

                  {{ App\Models\OfflineBilling::where('payment_method','COD')->where('eb_coupon_method',null)->where('payment_method1',null)->whereDay('created_at',\Carbon\Carbon::today())->sum('grand_total')+ 

                    App\Models\OfflineBilling::where('payment_method','COD')->where(function($query){

                        return $query->orWhere('eb_coupon_method','!=',null)->orWhere('payment_method1','!=',null);

                    })->whereDate('created_at',\Carbon\Carbon::today())->sum('received_cash') }}/-
                </div>
              </div>

              @endif
              
            </div>
          </a>
        </div>
        @endif


        @if(Auth::user()->role=='biller'||Auth::user()->role=='admin')
        <div class="col-sm-6 col-lg-3">
          <a href="{{ route('admin.billing.sale_type',['id'=>'card']) }}">
            <div class="card text-white c-shadow pb-4" style="height:160px;">
              <div class="card-body card-body d-flex justify-content-center ">
                
                <i class="flaticon-member-card"></i>               
               
              </div>
              <div class="d-flex justify-content-center">
            
                  <div class="dash-font">Today Card Payment</div>

              </div>
              
              @if(Auth::user()->role=='biller')
              <div class="d-flex justify-content-between px-5 mx-3">
                <div class="text-dark">{{ App\Models\OfflineBilling::where('biller_id',Auth::user()->id)->where(function($query){

                    return $query->where('payment_method','Card')->orWhere('payment_method1','Card');
                    
                  })->whereDate('created_at',\Carbon\Carbon::today())->count() }}
                </div>
                <div class="text-dark"><i class="fa fa-rupee"></i>
                  {{ App\Models\OfflineBilling::where('biller_id',Auth::user()->id)->where('payment_method','Card')->whereDate('created_at',\Carbon\Carbon::today())->sum('received_cash')+App\Models\OfflineBilling::where('biller_id',Auth::user()->id)->where('payment_method1','Card')->whereDate('created_at',\Carbon\Carbon::today())->sum('received_cash1') }}/-
                </div>
              </div>
              @endif

              @if(Auth::user()->role=='admin')

              <div class="d-flex justify-content-between px-5 mx-3">
                <div class="text-dark">{{ App\Models\OfflineBilling::where(function($query){

                    return $query->where('payment_method','Card')->orWhere('payment_method1','Card');

              })->whereDate('created_at',\Carbon\Carbon::today())->count() }}
                </div>
                
                <div class="text-dark"><i class="fa fa-rupee"></i>
                  {{ App\Models\OfflineBilling::where('payment_method','Card')->whereDate('created_at',\Carbon\Carbon::today())->sum('received_cash')+App\Models\OfflineBilling::where('payment_method1','Card')->whereDate('created_at',\Carbon\Carbon::today())->sum('received_cash1') }}/-
                </div>
              </div>

              @endif
              
            </div>
          </a>
        </div>
        @endif

        @if(Auth::user()->role=='biller'||Auth::user()->role=='admin')
        <div class="col-sm-6 col-lg-3">
          <a href="{{ route('admin.billing.sale_type',['id'=>'paytm']) }}">
            <div class="card text-white c-shadow pb-4" style="height:160px;">
              <div class="card-body card-body d-flex justify-content-center ">
                
                <i class="flaticon-wallet"></i>              
               
              </div>
              <div class="d-flex justify-content-center">
            
                  <div class="dash-font">Today Paytm Payment</div>

              </div>
              
              @if(Auth::user()->role=='biller')
              <div class="d-flex justify-content-between px-5 mx-3">
                <div class="text-dark">{{ App\Models\OfflineBilling::where('biller_id',Auth::user()->id)->where(function($query){

                    return $query->where('payment_method','Paytm Wallet')->orWhere('payment_method1','Paytm Wallet');
                    
                  })->whereDate('created_at',\Carbon\Carbon::today())->count() }}
                </div>
                <div class="text-dark"><i class="fa fa-rupee"></i>
                  {{ App\Models\OfflineBilling::where('biller_id',Auth::user()->id)->where('payment_method','Paytm Wallet')->whereDate('created_at',\Carbon\Carbon::today())->sum('received_cash')+App\Models\OfflineBilling::where('biller_id',Auth::user()->id)->where('payment_method1','Paytm Wallet')->whereDate('created_at',\Carbon\Carbon::today())->sum('received_cash1') }}/-
                </div>
              </div>
              @endif

              @if(Auth::user()->role=='admin')

              <div class="d-flex justify-content-between px-5 mx-3">
                <div class="text-dark">{{ App\Models\OfflineBilling::where(function($query){

                    return $query->where('payment_method','Paytm Wallet')->orWhere('payment_method1','Paytm Wallet');
                    
                  })->whereDate('created_at',\Carbon\Carbon::today())->count() }}
                </div>
                
                <div class="text-dark"><i class="fa fa-rupee"></i>
                  {{ App\Models\OfflineBilling::where('payment_method','Paytm Wallet')->whereDate('created_at',\Carbon\Carbon::today())->sum('received_cash')+App\Models\OfflineBilling::where('payment_method1','Paytm Wallet')->whereDate('created_at',\Carbon\Carbon::today())->sum('received_cash1') }}/-
                </div>
              </div>

              @endif
              
            </div>
          </a>
        </div>
        @endif

        @if(Auth::user()->role=='biller'||Auth::user()->role=='admin')
        <div class="col-sm-6 col-lg-3">
          <a href="{{ route('admin.billing.sale_type',['id'=>'googlepay']) }}">
            <div class="card text-white c-shadow pb-4" style="height:160px;">
              <div class="card-body card-body d-flex justify-content-center ">
                
                <i class="flaticon-wallet"></i>              
               
              </div>
              <div class="d-flex justify-content-center">
            
                  <div class="dash-font">Today Google Pay Payment</div>

              </div>
              
              @if(Auth::user()->role=='biller')
              <div class="d-flex justify-content-between px-5 mx-3">
                <div class="text-dark">{{ App\Models\OfflineBilling::where('biller_id',Auth::user()->id)->where(function($query){

                    return $query->where('payment_method','Google Pay')->orWhere('payment_method1','Google Pay');
                    
                  })->whereDate('created_at',\Carbon\Carbon::today())->count() }}
                </div>
                <div class="text-dark"><i class="fa fa-rupee"></i>
                  {{ App\Models\OfflineBilling::where('biller_id',Auth::user()->id)->where('payment_method','Google Pay')->whereDate('created_at',\Carbon\Carbon::today())->sum('received_cash')+App\Models\OfflineBilling::where('biller_id',Auth::user()->id)->where('payment_method1','Google Pay')->whereDate('created_at',\Carbon\Carbon::today())->sum('received_cash1') }}/-
                </div>
              </div>
              @endif

              @if(Auth::user()->role=='admin')

              <div class="d-flex justify-content-between px-5 mx-3">
                <div class="text-dark">{{ App\Models\OfflineBilling::where(function($query){

                    return $query->where('payment_method','Google Pay')->orWhere('payment_method1','Google Pay');
                    
                  })->whereDate('created_at',\Carbon\Carbon::today())->count() }}
                </div>
                
                <div class="text-dark"><i class="fa fa-rupee"></i>
                  {{ App\Models\OfflineBilling::where('payment_method','Google Pay')->whereDate('created_at',\Carbon\Carbon::today())->sum('received_cash')+App\Models\OfflineBilling::where('payment_method1','Google Pay')->whereDate('created_at',\Carbon\Carbon::today())->sum('received_cash1') }}/-
                </div>
              </div>

              @endif
              
            </div>
          </a>
        </div>
        @endif

        @if(Auth::user()->role=='biller'||Auth::user()->role=='admin')
        <div class="col-sm-6 col-lg-3">
          <a href="{{ route('admin.billing.sale_type',['id'=>'phonepay']) }}">
            <div class="card text-white c-shadow pb-4" style="height:160px;">
              <div class="card-body card-body d-flex justify-content-center ">
                
                <i class="flaticon-wallet"></i>              
               
              </div>
              <div class="d-flex justify-content-center">
            
                  <div class="dash-font">Today Phone Pay Payment</div>

              </div>
              
              @if(Auth::user()->role=='biller')
              <div class="d-flex justify-content-between px-5 mx-3">
                <div class="text-dark">{{ App\Models\OfflineBilling::where('biller_id',Auth::user()->id)->where(function($query){

                    return $query->where('payment_method','Phone Pay')->orWhere('payment_method1','Phone Pay');
                    
                  })->whereDate('created_at',\Carbon\Carbon::today())->count() }}
                </div>
                <div class="text-dark"><i class="fa fa-rupee"></i>
                  {{ App\Models\OfflineBilling::where('biller_id',Auth::user()->id)->where('payment_method','Phone Pay')->whereDate('created_at',\Carbon\Carbon::today())->sum('received_cash')+App\Models\OfflineBilling::where('biller_id',Auth::user()->id)->where('payment_method1','Phone Pay')->whereDate('created_at',\Carbon\Carbon::today())->sum('received_cash1') }}/-
                </div>
              </div>
              @endif

              @if(Auth::user()->role=='admin')

              <div class="d-flex justify-content-between px-5 mx-3">
                <div class="text-dark">{{ App\Models\OfflineBilling::where(function($query){

                    return $query->where('payment_method','Phone Pay')->orWhere('payment_method1','Phone Pay');
                    
                  })->whereDate('created_at',\Carbon\Carbon::today())->count() }}
                </div>
                                
                <div class="text-dark"><i class="fa fa-rupee"></i>
                  {{ App\Models\OfflineBilling::where('payment_method','Phone Pay')->whereDate('created_at',\Carbon\Carbon::today())->sum('received_cash')+App\Models\OfflineBilling::where('payment_method1','Phone Pay')->whereDate('created_at',\Carbon\Carbon::today())->sum('received_cash1') }}/-
                </div>
              </div>

              @endif
              
            </div>
          </a>
        </div>
        @endif

        @if(Auth::user()->role=='biller'||Auth::user()->role=='admin')
        <div class="col-sm-6 col-lg-3">
          <a href="{{ route('admin.billing.sale_type',['id'=>'amazonpay']) }}">
            <div class="card text-white c-shadow pb-4" style="height:160px;">
              <div class="card-body card-body d-flex justify-content-center ">
                
                <i class="flaticon-wallet"></i>              
               
              </div>
              <div class="d-flex justify-content-center">
            
                  <div class="dash-font">Today Amazon Pay Payment</div>

              </div>
              
              @if(Auth::user()->role=='biller')
              <div class="d-flex justify-content-between px-5 mx-3">
                <div class="text-dark">{{ App\Models\OfflineBilling::where('biller_id',Auth::user()->id)->where(function($query){

                    return $query->where('payment_method','Amazon Pay')->orWhere('payment_method1','Amazon Pay');
                    
                  })->whereDate('created_at',\Carbon\Carbon::today())->count() }}
                </div>
                <div class="text-dark"><i class="fa fa-rupee"></i>
                  {{ App\Models\OfflineBilling::where('biller_id',Auth::user()->id)->where('payment_method','Amazon Pay')->whereDate('created_at',\Carbon\Carbon::today())->sum('received_cash')+App\Models\OfflineBilling::where('biller_id',Auth::user()->id)->where('payment_method1','Amazon Pay')->whereDate('created_at',\Carbon\Carbon::today())->sum('received_cash1') }}/-
                </div>
              </div>
              @endif

              @if(Auth::user()->role=='admin')

              <div class="d-flex justify-content-between px-5 mx-3">
                <div class="text-dark">{{ App\Models\OfflineBilling::where(function($query){

                    return $query->where('payment_method','Amazon Pay')->orWhere('payment_method1','Amazon Pay');
                    
                  })->whereDate('created_at',\Carbon\Carbon::today())->count() }}
                </div>
                
                <div class="text-dark"><i class="fa fa-rupee"></i>
                  {{ App\Models\OfflineBilling::where('payment_method','Amazon Pay')->whereDate('created_at',\Carbon\Carbon::today())->sum('received_cash')+App\Models\OfflineBilling::where('payment_method1','Amazon Pay')->whereDate('created_at',\Carbon\Carbon::today())->sum('received_cash1') }}/-
                </div>
              </div>

              @endif
              
            </div>
          </a>
        </div>
        @endif

        @if(Auth::user()->role=='biller'||Auth::user()->role=='admin')
        <div class="col-sm-6 col-lg-3">
          <a href="{{ route('admin.billing.sale_type',['id'=>'ebcoupon']) }}">
            <div class="card text-white c-shadow pb-4" style="height:160px;">
              <div class="card-body card-body d-flex justify-content-center ">
                
                <i class="flaticon-wallet"></i>              
               
              </div>
              <div class="d-flex justify-content-center">
            
                  <div class="dash-font">Today EB Coupon Payment</div>

              </div>
              
              @if(Auth::user()->role=='biller')
              <div class="d-flex justify-content-between px-5 mx-3">
                <div class="text-dark">{{ App\Models\OfflineBilling::where('biller_id',Auth::user()->id)->where('eb_coupon_method','Eb Coupon')->whereDate('created_at',\Carbon\Carbon::today())->count() }}
                </div>
                <div class="text-dark"><i class="fa fa-rupee"></i>
                  {{ App\Models\OfflineBilling::where('biller_id',Auth::user()->id)->where('eb_coupon_method','Eb Coupon')->whereDate('created_at',\Carbon\Carbon::today())->sum('eb_coupon_cash') }}/-
                </div>
              </div>
              @endif

              @if(Auth::user()->role=='admin')

              <div class="d-flex justify-content-between px-5 mx-3">
                <div class="text-dark">{{ App\Models\OfflineBilling::where('eb_coupon_method','Eb Coupon')->whereDate('created_at',\Carbon\Carbon::today())->count() }}
                </div>
                
                <div class="text-dark"><i class="fa fa-rupee"></i>
                  {{ App\Models\OfflineBilling::where('eb_coupon_method','Eb Coupon')->whereDate('created_at',\Carbon\Carbon::today())->sum('eb_coupon_cash') }}/-
                </div>
              </div>

              @endif
              
            </div>
          </a>
        </div>
        @endif
        <!-- /.col-->
        {{--@if(Auth::user()->role=='admin')
        <div class="col-sm-6 col-lg-3">
          <div class="card text-white c-shadow pb-4" style="height:160px;">
            <div class="card-body card-body d-flex justify-content-center ">
              
              <i class="flaticon-sales"></i>            
             
            </div>
            <div class="d-flex justify-content-center">
          
                <div class="dash-font">Monthly Sale</div>
            </div>
            <div class="text-center text-dark">450</div>
          </div>
        </div>
        @endif
        <!-- /.col-->
        @if(Auth::user()->role=='admin')
        <div class="col-sm-6 col-lg-3">
          <div class="card text-white c-shadow pb-4" style="height:160px;">
            <div class="card-body card-body d-flex justify-content-center ">
              
              <i class="flaticon-coupon"></i>              
             
            </div>
            <div class="d-flex justify-content-center">
          
                <div class="dash-font">Yearly Sale</div>
            </div>
            <div class="text-center text-dark">450</div>
          </div>
        </div>
        @endif
        <!-- /.col-->
        @if(Auth::user()->role=='admin')
        <div class="col-sm-6 col-lg-3">
          <div class="card text-white c-shadow pb-4" style="height:160px;">
            <div class="card-body card-body d-flex justify-content-center ">
              
              <i class="flaticon-shopping-bag-1"></i>             
             
            </div>
            <div class="d-flex justify-content-center">
          
                <div class="dash-font">Today's Delivered</div>
            </div>
            <div class="text-center text-dark">450</div>
          </div>
        </div>
        @endif
        <!-- /.col-->

        <!-- /.col-->
        @if(Auth::user()->role=='admin')
        <div class="col-sm-6 col-lg-3">
          <div class="card text-white c-shadow pb-4" style="height:160px;">
            <div class="card-body card-body d-flex justify-content-center ">
              
              <i class="flaticon-refund"></i>              
             
            </div>
            <div class="d-flex justify-content-center">
          
                <div class="dash-font">Total Returned</div>
            </div>
            <div class="text-center text-dark">450</div>
          </div>
        </div>
        @endif
        <!-- /.col--> --}}

        <!-- /.col-->
        @if(Auth::user()->role=='admin')
        <div class="col-sm-6 col-lg-3">
          <a href="{{ route('admin.category') }}">
            <div class="card text-white c-shadow pb-4" style="height:160px;">
              <div class="card-body card-body d-flex justify-content-center ">
                
                <i class="flaticon-categories"></i>            
               
              </div>
              <div class="d-flex justify-content-center">
            
                  <div class="dash-font">Total Category</div>
              </div>
              <div class="text-center text-dark">{{ App\Models\Category::count() }}</div>
            </div>
          </a>
        </div>
        @endif
        <!-- /.col-->

         <!-- /.col-->
         @if(Auth::user()->role=='admin')
        <div class="col-sm-6 col-lg-3">
          <a href="{{ route('admin.subcategory') }}">
            <div class="card text-white c-shadow pb-4" style="height:160px;">
              <div class="card-body card-body d-flex justify-content-center ">
                
                <i class="flaticon-category"></i>             
               
              </div>
              <div class="d-flex justify-content-center">            
                  <div class="dash-font">Total Subcategory</div>
              </div>
              <div class="text-center text-dark">{{ App\Models\Subcategory::count() }}</div>
            </div>
          </a>
        </div>
        @endif
        <!-- /.col-->

        <!-- /.col-->
        @if(Auth::user()->role=='admin')
        <div class="col-sm-6 col-lg-3">
          <a href="{{ route('admin.brand') }}">
            <div class="card text-white c-shadow pb-4" style="height:160px;">
              <div class="card-body card-body d-flex justify-content-center ">
                
                <i class="flaticon-brand"></i>              
               
              </div>
              <div class="d-flex justify-content-center">
            
                  <div class="dash-font">Total Brand</div>
              </div>
              <div class="text-center text-dark">{{ App\Models\Brand::count() }}</div>
            </div>
          </a>
        </div>
        @endif
        <!-- /.col-->

        <!-- /.col-->

        <!-- /.col-->
        @if(Auth::user()->role=='admin')
        <div class="col-sm-6 col-lg-3">
          <a href="{{ route('admin.product') }}">
            <div class="card text-white c-shadow pb-4" style="height:160px;">
              <div class="card-body card-body d-flex justify-content-center ">
                
                <i class="flaticon-grocery"></i>             
               
              </div>
              <div class="d-flex justify-content-center">
            
                  <div class="dash-font">Total Item</div>
              </div>
              <div class="text-center text-dark">{{ App\Models\Product::count() }}</div>
            </div>
          </a>
        </div>
        @endif
        <!-- /.col-->

         <!-- /.col-->
        @if(Auth::user()->role=='admin')
        <div class="col-sm-6 col-lg-3">
          <a href="{{ route('admin.customer') }}">
            <div class="card text-white c-shadow pb-4" style="height:160px;">
              <div class="card-body card-body d-flex justify-content-center ">
                
                <i class="flaticon-group"></i>              
               
              </div>
              <div class="d-flex justify-content-center">
            
                  <div class="dash-font">Total User</div>
              </div>
              <div class="text-center text-dark">{{ App\Models\User::where('role','user')->count() }}</div>
            </div>
          </a>
        </div>
        @endif

        @if(Auth::user()->role=='admin'||Auth::user()->role=='membership')
        <div class="col-sm-6 col-lg-3">
          <a href="{{ route('admin.membership') }}">
            <div class="card text-white c-shadow pb-4" style="height:160px;">
              <div class="card-body card-body d-flex justify-content-center ">
                
                <i class="flaticon-member-card"></i>              
               
              </div>
              <div class="d-flex justify-content-center">
            
                  <div class="dash-font">Total Membership Card</div>
              </div>
              <div class="text-center text-dark">{{ App\Models\Membershipcart::count() }}</div>
            </div>
          </a>
        </div>
        @endif

        @if(Auth::user()->role=='admin'||Auth::user()->role=='membership')
        <div class="col-sm-6 col-lg-3">
          <a href="{{ route('admin.membership') }}">
            <div class="card text-white c-shadow pb-4" style="height:160px;">
              <div class="card-body card-body d-flex justify-content-center ">
                
                <i class="flaticon-membership"></i>             
               
              </div>
              <div class="d-flex justify-content-center">
            
                  <div class="dash-font">Assigned Membrship Card</div>
              </div>
              <div class="text-center text-dark">
                {{ App\Models\Membershipcart::where('status',1)->count() }}</div>
            </div>
          </a>
        </div>
        @endif
        <!-- /.col-->      
      
      <!-- /.row-->
    </div>
  </div>

@endsection
