<?php


namespace App\Http\Controllers;


use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ContactController extends Controller
{
    public function index() {
        $setting = Setting::first()->toArray();
        $lang = Session::get('website_language');

        $viewData = [
            'title' => trans('title_contact'),
            'breadcrumbData' => [
                0 => [
                    'active' => 'active',
                    'title' => trans('title_contact')
                ]
            ],
            'lang' => $lang,
            'setting' => $setting,
        ];
        return view('frontend.pages.contact', $viewData);
    }

    public function sendContact(ContactRequest $request) {
        Contact::create($request->all());
        return back()->with('success', trans('contact_send_success'));
    }
}
