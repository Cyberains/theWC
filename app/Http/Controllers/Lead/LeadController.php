<?php

namespace App\Http\Controllers\Lead;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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
            'work_location' => $request->work_location,
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
            return redirect()->route('get-lead');
        }
    }

    public function getMailsPage(){
        return view('lead.mail_index');
    }

    public function getMails(): JsonResponse
    {
        $mail = Lead::where('created_at', '>=', date('Y-m-d').' 00:00:00');
        return response()->json([
            'status' => 200,
            'data' => $mail
        ]);
    }
}
