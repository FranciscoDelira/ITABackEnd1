<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WorkOrder;

class WorkOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workorder = WorkOrder::all();
        return $workorder;
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
        $workorder = new WorkOrder;
        $workorder->maintenanceType=$request->maintenanceType;
        $workorder->serviceType=$request->serviceType;
        $workorder->employeeName=$request->employeeName;
        $workorder->maintenanceDate=$request->maintenanceDate;
        $workorder->jobDescription=$request->jobDescription;
        if(!empty($request->evidence1)){
            $workorder->evidence1=$request->evidence1->store('WorkEvidence');
        }else{
            $workorder->evidence1=null;
        }

        if(!empty($request->evidence2)){
            $workorder->evidence2=$request->evidence2->store('WorkEvidence');
        }else{
            $workorder->evidence2=null;
        }
       
        if(!empty($request->evidence3)){
            $workorder->evidence3=$request->evidence3->store('WorkEvidence');
        }else{
            $workorder->evidence3=null;
        }
        $workorder->maintenancerequest_id=$request->maintenancerequest_id;
        $workorder->released=$request->released;
        $workorder->releasedDate=$request->releasedDate;
        $workorder->approved=$request->approved;
        $workorder->approversName=$request->approversName;
        $workorder->dateApproved=$request->dateApproved;
        $workorder->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $workorder=WorkOrder::find($id);
        return $workorder;
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
        $workorder=WorkOrder::findOrFail($id);
        $workorder->maintenanceType=$workorder->maintenanceType;
        $workorder->serviceType=$request->serviceType;
        $workorder->employeeName=$workorder->employeeName;
        $workorder->maintenanceDate=$request->maintenanceDate;
        $workorder->jobDescription=$request->jobDescription;
        if(!empty($request->evidence1)){
            $workorder->evidence1=$request->evidence1->store('WorkEvidence');
        }else{
            $workorder->evidence1=null;
        }

        if(!empty($request->evidence2)){
            $workorder->evidence2=$request->evidence2->store('WorkEvidence');
        }else{
            $workorder->evidence2=null;
        }
       
        if(!empty($request->evidence3)){
            $workorder->evidence3=$request->evidence3->store('WorkEvidence');
        }else{
            $workorder->evidence3=null;
        }
        
        $workorder->maintenancerequest_id=$workorder->maintenancerequest_id;
        $workorder->released=$request->released;
        $workorder->releasedDate=$request->releasedDate;
        $workorder->approved=$request->approved;
        $workorder->approversName=$request->approversName;
        $workorder->dateApproved=$request->dateApproved;
        $workorder->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $workorder = WorkOrder::find($id);
        $workorder->delete();
    }
}
