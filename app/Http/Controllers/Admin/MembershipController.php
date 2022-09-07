<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
Use Alert;
use App\Models\Membership;
use App\Models\Membershipcart;
use App\Models\User;
use DNS1D;
use PDF;
class MembershipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $membershipdata = Membership::get();
        $membershipcarddata=Membershipcart::with('user')->paginate(25);
        $currentpage = $membershipcarddata->currentPage();
       
       $users=User::where(['is_active'=>1,'role'=>'user'])->get();
        return view('admin.billing.membership',compact(['membershipdata','membershipcarddata','users','currentpage']));

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
        // $request->validate([

        //     'duration' => 'required|unique:memberships,duration',
        // ]);

        $form_data=[
            
            'duration'=>$request->duration,
            'price'=>$request->price
        ];

        Membership::create($form_data);

        //Alert::success('', 'Category added successfully.');
        Session::flash('message', 'Membership added successfully.');
        return redirect()->route('admin.membership');

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
    public function edit(Request $request)
    {

        $membershiprow = Membership::find($request->id);
        echo $membershiprow;

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $update = Membership::find($request->membership_id);
        $update->duration = $request->duration;
        $update->price = $request->price;
        $update->save();

        Session::flash('message', 'Membership updated successfully.');
        return redirect()->route('admin.membership');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Membership::find($id)->delete();
        Session::flash('message', 'Membership deleted successfully.');
        return redirect()->route('admin.membership');
    }


    //====Membership Cart Function ====//
   public function add_membershipcard(Request $request){
    //===Check cart field empty or not ===//
    if($request->isMethod('post')){

       for($i=1;$i<=$request->cart_number;$i++){
         $cardgenerator = Membershipcart::orderBy('id','desc')->first();

        if ($cardgenerator != null) {
            
            $cardid =  $cardgenerator->cart_number;
            $cardididg = explode("9809871786",$cardid)[1];

            $counter = str_pad((int)$cardididg+1, 6 ,"0",STR_PAD_LEFT);

            $cardididg = "9809871786".$counter;
        }
        else{

            $cardididg = '9809871786000001';
        } 
          Membershipcart::insert(['cart_number'=>$cardididg]);    
          } 

      Session::flash('message', 'Membership Card added successfully.');

        return redirect()->route('admin.membership');
        
     }
    return redirect()->route('admin.membership');
  }


  public function delete_membershipcard($id){

        Membershipcart::find($id)->delete();
        Session::flash('message', 'Membership card deleted successfully.');
        return redirect()->route('admin.membership');
  }


  public function membershipcardedit(Request $request){
     
    $membershipcard = Membershipcart::where('id',$request->id)->first();

    return response()->json([

            'memberdata' => $membershipcard
    ]);

  }
  public function membershipcardupdate(Request $request){
   
        $start_date=date('Y-m-d');
        $ex_date="+".$request->start_date."days";
        $end_date = date("Y-m-d", strtotime($ex_date)); 
        //add duration 
        $startd = strtotime($start_date);
        $endd = strtotime($end_date);
  
        // Get the difference and divide into 
        // total no. seconds 60/60/24 to get 
        // number of days
        $duration=($endd - $startd)/60/60/24;


        //check assign or Not 
        $check=Membershipcart::where(['status'=>1,'id'=>$request->cart_id])->count();
        if($check==0){

        $update = Membershipcart::find($request->cart_id);
        $update->user_id = $request->user_name;
        $update->start_date = $start_date;
        $update->end_date = $end_date;
        $update->duration=$duration;
        $update->status = 1;
        $update->save();

        User::where('id',$request->user_name)->update(['m_start_date'=>$start_date,'m_end_date'=>$end_date,'membership_status'=>1]);
        Session::flash('message', 'Membership Id updated successfully.');
        return redirect()->route('admin.membership');

    }else{
         Session::flash('message', 'Membership Id already assign.');
        return redirect()->route('admin.membership');
    }
  }
  public function membershipcarddownload(Request $request){
    
        $all=Membershipcart::where('status',0)->get();
        $take=$all->take($request->qty)->toArray();
      
        $pdf = PDF::loadView('admin.billing.membershipcardgenerator',compact('take'));

      return $pdf->stream('membershipcard');
    //return view('admin.billing.membershipcardgenerator',compact('take'));
     
  }

  public function itemSearch(Request $request){

        $datas=$request->all();

        if ($datas['query']!=null) {
            
            $userdata = User::where('name','LIKE','%'.$datas['query']."%")->get();
        
            $username=array();
            $membershipcardcount=0;

            if($userdata){
                foreach ($userdata as $select) {
                   $username[]=$select->id;
                }
            }
                    
            if($username){
             
              $membershipcarddata=MembershipCart::whereIn('user_id',$username)
              ->paginate(25);

              $membershipcardcount=MembershipCart::whereIn('user_id',$username)
              ->count();

            }else{
              $membershipcarddata=MembershipCart::where('cart_number','LIKE','%'.$datas['query']."%")->paginate(25);
              
              $membershipcardcount=MembershipCart::where('cart_number','LIKE','%'.$datas['query']."%")->count();
            }
        }
        else{

            $membershipcarddata=MembershipCart::paginate(25);

            $membershipcardcount=MembershipCart::count();

        }

        if($membershipcardcount>0){

            $currentpage = $membershipcarddata->currentPage();
            return view('admin.billing.pagination_membership', compact(['membershipcarddata','currentpage']))->render(); 
        }else{?>

            <tr>
            <td colspan="7">No matching records found</td>
            </tr>
            <?php 
        }
    }
}
 