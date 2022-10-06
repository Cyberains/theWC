<?php

namespace App\Http\Controllers\Lead;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LeadController extends Controller
{
    public function index()
    {
        return view('lead.index');
    }

    public function store(Request $request){
        $form_data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'area' => $request->area,
            'city' => $request->city,
            'pin_code' => $request->pin_code,
            'professional_qualification' => $request->professional_qualification,
            'total_work_experience' => $request->total_work_experience,
            'terms_condition' => $request->terms_condition == 'on' ? 1 : 0
        ];
        if($request->has('male')){
            $form_data['m_f'] = 1;
        }else{
            $form_data['m_f'] = 0;
        }
        $lead = Lead::create($form_data);
        if(!empty($lead)){
            return view('lead.thank');
        }
    }

    public function getMailsPage(){
        $mails['today'] = Lead::whereDate('created_at', DB::raw('CURDATE()'))->orderBy('created_at', 'desc')->get();
        $mails['past'] = Lead::whereDate('created_at','!=' ,DB::raw('CURDATE()'))->orderBy('created_at', 'desc')->get();
        return view('lead.mail_index',['mails' => $mails]);
    }
}
