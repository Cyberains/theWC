<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Jobs\SendEmailJob;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('spa.index', compact('categories'));
    }

    public function privacyPolicy()
    {
        return view('spa.privacy');
    }

    public function postContact(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|digits_between:6,20',
            'message' => 'required',
        ]);
        $dataArr = arrayFromPost(['name', 'email', 'phone', 'message']);
        try {
            \DB::beginTransaction();
            $contact = new Contact();
            $contact->name = $dataArr->name;
            $contact->email = $dataArr->email;
            $contact->phone = $dataArr->phone;
            $contact->message = $dataArr->message;
            $contact->save();

            $details['email'] = $dataArr->email;
            $details['data'] = $contact;
            if ($contact) {
                SendEmailJob::dispatch(['details' => $details]);
            }
            \DB::commit();
            Alert::success('', 'Thank you');
            return redirect('/');
        } catch (\Throwable $th) {
            \DB::rollBack();
            return exceptionErrorMessage($th);
        }
    }
}
