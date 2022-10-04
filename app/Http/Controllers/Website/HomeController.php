<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Cms;
use App\Models\Contact;
use App\Models\Service;
use App\Models\WhyChooseUs;
use App\Models\WorldCity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Khsing\World\World;
use App\Jobs\SendEmailJob;
use App\Models\Product;

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
            return redirect('/');
        } catch (\Throwable $th) {
            \DB::rollBack();
            return exceptionErrorMessage($th);
        }
    }
}
