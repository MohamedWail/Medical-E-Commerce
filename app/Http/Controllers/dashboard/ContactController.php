<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Validator;

class ContactController extends Controller
{
    public function index() {
        $contact = Contact::find(1);
        return view('contact.create', compact(['contact']));
    }

    public function store(Request $request) {
        $contact = Contact::find('1');
        $validator = Validator::make($request->all(), [
            'address' => 'required',
            'phone' => 'required'
        ]);

        if ($validator->fails()) {

            // redirect back to post create page
            // with submitted form data
            return redirect()->route('contact.index')
                ->withErrors($validator)
                ->withInput();

        }
        $data = $request->except('_token');
        if(!$contact) {
            Contact::create($data);
        } else {
            Contact::where('id', 1)->update($data);
        }
        return redirect()->route('contact.index');
    }
}
