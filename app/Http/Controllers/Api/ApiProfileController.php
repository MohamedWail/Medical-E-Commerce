<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController as BaseController;
use Validator;
use App\Models\User;
use App\Models\Profile;


class ApiProfileController extends BaseController
{
    public function addProfile(Request $request) {
        $user = User::where('id', $request->user_id)->first();
        $validator = Validator::make($request->all(), [
            'address' => 'required',
            'phone' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $data = $request->all();
        $data['user_id'] = $user->id;
        $profile = Profile::create($data);
        // $data['name'] = $profile->user->name;
        // $data['email'] = $profile->user->email;

        return $this->sendResponse('', 'Profie created successfully.','200');

    }

    public function getProfile(Request $request) {
        $user = User::where('id', $request->user_id)->first();
        if ($user) {
            $profile = Profile::where('user_id', $user->id)->first();
            $data['name'] = $profile->user->name;
            $data['email'] = $profile->user->email;
            $data['phone'] = $profile->phone;
            $data['address'] = $profile->address;
            return $this->sendResponse($data, 'Profie obtained successfully.','200');
        }
        return $this->sendError('Validation Error.', $validator->errors());       

    }

    
}
