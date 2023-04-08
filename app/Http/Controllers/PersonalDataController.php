<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personaldata;

class PersonalDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = PersonalData::all();
        return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Personaldata;
        $data->name=$request->name;
        $data->lastname=$request->lastname;
        $data->area=$request->area;
        $data->signature=$request->signature->store('signatures');
        $data->plantel=$request->plantel;
        $data->save();

 //       return response()->json(['status'=>200], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=PersonalData::find($id);
        return $data;
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
       
        $data=Personaldata::findOrFail($id);

        
        $data->name=$request->name;
        $data->lastname=$request->lastname;
        $data->area=$request->area;
        $data->signature=$request->signature;
        $data->plantel=$request->plantel;
        
        $data->save(); 

      
        return $data;
    }

    public function showToken(){
        return csrf_token();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = PersonalData::find($id);
        $data->delete();
    }
}
