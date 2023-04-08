<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return $user;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user=User::find($id);
        return $user;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user=User::findOrFail($id);
        
        $user->email=$request->email;
        $user->password=bcrypt($request->password);
        $user->personaldata_id=$request->personaldata_id;
        $user->role=$request->role;
       
        $user->save(); 

        return $user;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user= User::find($id);
        $user->delete();
    }

    
    public function login(Request $request){
        $credentials = [
            'email' => $request->email, 
            'password' => $request->password
    ];

    
        if(auth()->attempt($credentials)){
            $token=auth()->user()->createToken('LaravelAuthApp')->accessToken;
            return response()->json(['token'=>$token, 'status'=>200,'user'=>auth()->user()]);
        }else{
            return response()->json(['error' => 'Unauthorised','status'=>401], 401);
        }
    }

    public function register(Request $request){
        $user = User::create([
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'personaldata_id' => $request->personaldata_id,
            'role' => $request->role
        ]);

        $token = $user->createToken('LaravelAuthApp')->accessToken;
        return response()->json(['token'=>$token],200);
    }
    
}
