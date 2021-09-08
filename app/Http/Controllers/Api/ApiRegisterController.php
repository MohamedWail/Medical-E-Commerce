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
            'email' => 'required|email|confirmed',
            'password' => 'required|confirmed',
            'date_of_birth' => 'date|required',
            'agreed_to_terms' => 'required|boolean'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        if($data['agreed_to_terms']) {
            $data['agreed_to_terms'] = 1;
            $user = User::create($data);
            return $this->sendResponse('', 'User register successfully.','200');
        } else {
            return $this->sendError('Please Agree on our terms.', ['error'=>'Unauthorised'], '400');
        }
        

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
            
        } 
    }
}
