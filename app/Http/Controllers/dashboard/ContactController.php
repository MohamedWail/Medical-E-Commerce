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
            'phone' => 'required',
            'reach_us_image'=>'sometimes|nullable',
            'reach_us_image.*'=>'image|mimes:jpeg,png,jpg,gif,svg|max:5120',
        ]);

        if ($validator->fails()) {

            // redirect back to post create page
            // with submitted form data
            return redirect()->route('contact.index')
                ->withErrors($validator)
                ->withInput();

        }

        $data = $request->except('_token');

        if($request->hasFile('reach_us_image')){
            $filename = time() . '.' . $request->reach_us_image->getClientOriginalExtension();
            $imageName= '/assets/images/reach_us_image/'. $filename;
            request()->file('reach_us_image')->move(public_path('assets/images/reach_us_image'), $filename);
            $data['reach_us_image']=$imageName;

        }


        if(!$contact) {
            Contact::create($data);
        } else {
            Contact::where('id', 1)->update($data);
        }
        return redirect()->route('contact.index');
    }
}
