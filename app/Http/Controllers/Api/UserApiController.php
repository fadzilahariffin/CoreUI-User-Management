<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth; 
use Validator;
use Spatie\Permission\Models\Role;

class UserApiController extends Controller
{
    public $successStatus = 200;


    public function login()
    { 
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){ 
            $user = Auth::user(); 
            $success['token'] =  $user->createToken('MyApp')-> accessToken; 

            return response()->json(['success' => $success], $this-> successStatus); 
        } 
        else{ 
            return response()->json(['error'=>'Unauthorised'], 401); 
        } 
    }

    public function register(Request $request) 
    { 
        $validator = Validator::make($request->all(), [ 
            'first_name' => 'required', 
            'last_name' => 'required', 
            'email' => 'required|email',
            // 'phone_no' => 'required',
            'password' => 'required', 
            'repeat_password' => 'required|same:password', 
        ]);

        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 401);            
        }

        // $input = $request->all(); 
        // $password = bcrypt($input['password']); 
        
        // $phone_no = str_replace('-', '', request('phone_no')); 

        $user = User::create([
            
            'first_name'           => request('first_name'),
            'last_name'            => request('last_name'),
            'email'                => request('email'),
            // 'phone_no'             => $phone_no,
            // 'company_name'         => request('company_name'),
            'password'             => bcrypt( request('password') ),
            'active'               => false
        ]);

        $user->assignRole('user');

        $success['token'] =  $user->createToken('MyApp')->accessToken; 
        $success['name'] =  $user->first_name.' '.$user->last_name;
        $success['status'] =  'Successfull';

        return response()->json(['success'=>$success], $this-> successStatus); 
    }


}
