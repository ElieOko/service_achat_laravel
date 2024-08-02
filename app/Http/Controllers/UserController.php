<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //
    public function register(Request $request){
        
        $validator = Validator::make($request->all(),[
            'username' =>'required|string',
            'password' => 'required|string',
            'user_id'=>'required|int'
        ]);
        
        if($validator->stopOnFirstFailure()->fails()){
            return response()->json([
                'message' => $validator,
             ],403);
        }  
        
        $field = $validator->validated();
        
        $user = User::create([
            'username'    =>   $field['username'],
            'password'    =>   Hash::make($field['password']),
            'user_id'     =>   $field['user_id']
        ]);
        
       // $user->save();
        $token = $user->createToken('token')->plainTextToken;

        return response()->json([
            "token" => $token,
            "message" => "User extend with success"
        ],201);
    }
    public function login(Request $request){

    }
}
