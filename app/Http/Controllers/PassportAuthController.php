<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Validator;

class PassportAuthController extends Controller
{
    public function register(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required|min:4',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8'
        ]);

        if($validator-> fails()){
            return $this->sendError('Validation Error', $validator->errors());
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        $token = $user->createToken('LaravelAuthApp')->accessToken;

        return response()->json(['token' => $token], 200);
    }

    public function login(Request $request){
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (auth()->attempt($data)){
            $token = auth()->user()->createToken('LaravelAuthApp')->accessToken;
            return response()->json(['token'=>$token],200);
        } else{
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    }
}
