<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\BaseController as BaseController;
use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use Auth;

class ApiRegisterController extends BaseController
{   
    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */

    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'number' => 'required|numeric'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        $user = User::create($data);
        $success['name'] =  $user->name;
        return $this->sendResponse($success, 'User register successfully.','200');

    }

    /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 
            $user = Auth::user(); 
            $success['name'] =  $user->name;
            return $this->sendResponse($success, 'User login successfully.', '200');
        } 
        else{ 
            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised'], '400');
        } 
    }
}
