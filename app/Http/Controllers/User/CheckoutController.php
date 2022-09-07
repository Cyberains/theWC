<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Cart;
use App\Models\Address;
use Khsing\World\World;


class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {   
         if (Auth::check()) {
            
            if (session()->has('session_id')) {
                
                $session_id = Session::get('session_id');
                $cart = Cart::with(['productName','productAttr','productExpiryName'])->where('user_id',Auth::user()->id)->orWhere('session_id',$session_id)->get();
            }
            else{

                $cart = Cart::with(['productName','productAttr','productExpiryName'])->where('user_id',Auth::user()->id)->get();
            }
            
            $addresses = Address::where('user_id',Auth::user()->id)->get();
            $countrydata = World::Countries();

            return view('user.orders.checkout',compact(['cart','addresses','countrydata']));



        }
        else{

            $session_id = Session::getId();
            $cart = Cart::with(['productName','productAttr','productExpiryName'])->where('session_id',$session_id)->get();

            return view('user.orders.checkout',compact('cart'));

        }

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
