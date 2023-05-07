<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index() {
        $data = Contact::orderBy('id', 'desc')->paginate(20);
        $viewData = [
            'title' => 'Liên hệ',
            'breadcrumbData' => [
                0 => [
                    'active' => 'active',
                    'title' => 'Liên hệ'
                ]
            ],
            'data' => $data,
        ];
        return view('admin.contact.index',$viewData);
    }
}
