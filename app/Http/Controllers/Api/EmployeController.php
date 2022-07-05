<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
//use App\Http\Requests\EmployeeRequest;
use App\Models\employe;
use Illuminate\Http\Request;
use Validator;

class EmployeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $employees = employe::all();

        return  response()->json(['employes' => $employees]);
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
        $input = $request->all();
          $validator = Validator::make($input, ['name' => 'required','DoB' => 'required','gender' => 'required','salary' => 'required']);
        if($validator->fails()){
            return response()->json([
                'message' => "validation error", $validator->errors()]);
        }
        $employe = employe::create($input);

        return response()->json([
            'message' => "Employee info saved successfully!",
            'employes' => $employe
        ], 200);

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employe = employe::find($id);
        if(is_null($employe)){
            return response()->json([
                "message" => 'not found']);
        }
        return response()->json([
            "message" => 'successful',
            "employes" => $employe]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function edit(employe $employe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, employe $employe)
    {
        $input = $request->all();
        $validator = Validator::make($input, ['name' => 'required','DoB' => 'required','gender' => 'required','salary' => 'required']);
        if($validator->fails()){
            return response()->json([
                'message' => "validation error", $validator->errors()]);
        }
        $employe->name = $input['name'];
        $employe->DoB = $input['DoB'];
        $employe->gender= $input['gender'];
        $employe->salary =$input['salary'];
        $employe->save();
        $employe->update($request->all());

        return response()->json([
            'message' => "Employee Info updated successfuly",
            'employes' => $employe
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function destroy(employe $employe)
    {
        $employe->delete();

        return response()->json([
            'message' => "Employee Info deleted succesfully",
        ], 200);
    }
}
