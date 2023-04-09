<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personaldata;
use Illuminate\Support\Facades\Validator; //Import the Validator class

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
        // Define validation rules for form fields
        $rules = [
            'name' => 'required|string|min:3|max:40',
            'lastname' => 'required|string|min:3|max:40',
            'area' => 'required|string|min:3|max:255',
            'signature' => 'required',
            'plantel' => 'required|string|min:3|max:255',
        ];

        //Define custom error messages for each validation rule

        $messages = [
            'name.required' => 'El nombre es OBLIGATORIO',
            'name.min' => 'El nombre debe de tener al menos 3 caracteres',
            'name.max' => 'El nombre no debe ser mayor a 40 caracteres',
            'lastname.required' => 'El apellido apellido es OBLIGATORIO',
            'lastname.min' => 'El apellido debe tener al menos 3 caracteres',
            'lastname.max' => 'El apellido no debe ser mayor a 40 caracteres',
            'area.required' => 'El área es OBLIGATORIO',
            'area.min' => 'El área debe tener al menos 3 caracteres',
            'area.max' => 'El área no debe ser mayor a 255 caracteres',
            'signature.required' => 'El campo firma es OBLIGATORIO',
            'plantel.required' => 'El campo plantel es OBLIGATORIO',
            'plantel.min' => 'El plantel debe tener al menos 3 caracteres',
            'plantel.max' => 'El plantel no debe ser mayor a 255 caracteres',
        ];
        

        //Executes validations with custom rules and messages

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        // If the validation is successful, it saves the data in the database.
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
       
        $rules = [
            'name' => 'required|string|min:3|max:40',
            'lastname' => 'required|string|min:3|max:40',
            'area' => 'required|string|min:3|max:255',
            'signature' => 'required',
            'plantel' => 'required|string|min:3|max:255',
        ];

        $messages = [
            'required' => 'El :attribute es OBLIGATORIO',
            'string' => 'El :atribute debe ser una cadena de caracters',
            'max' => 'El :attribute no debe tener más de :max caracteres',
            'min' => 'El :attribute no debe tener menos de :min caracteres',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 422);
        }


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
