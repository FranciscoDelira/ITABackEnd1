<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Maintenancerequest;
use Illuminate\Support\Facdes\Validator; //Import the validator class


class MaintenanceRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $maintenance = Maintenancerequest::all();
        return $maintenance;
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
        
        $maintenance = new Maintenancerequest;
        $maintenance->department=$request->department;
        $maintenance->requestDate=$request->requestDate;
        $maintenance->personaldata_id=$request->personaldata_id;
        $maintenance->requestDescription=$request->requestDescription;
        $maintenance->status=$request->status;
        $maintenance->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $maintenance=Maintenancerequest::find($id);
        return $maintenance;
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
        $maintenance=Maintenancerequest::findOrFail($id);

        $maintenance->department=$request->department;
        $maintenance->requestDate=$request->requestDate;
        $maintenance->personaldata_id=$request->personaldata_id;
        $maintenance->requestDescription=$request->requestDescription;
        $maintenance->status=$request->status;
        
        $maintenance->save(); 

      
        return $maintenance;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $maintenance = Maintenancerequest::find($id);
        $maintenance->delete();
    }
}
