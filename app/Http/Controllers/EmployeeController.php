<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Validator;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Employee::all();
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
     * Validates the inputted data on the basis of rules array
     * 
     * Validator::make     used validator class and make method to create an instance of validator
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response under $res variable
     */
    public function store(Request $request)
    {
        $rules = array("first_name"=>"required","last_name"=>"required","email"=>"required|email","age"=>"Required|max:2");
        $checkpoints = Validator::make($request->all(),$rules);

        if($checkpoints->fails()){
            return response ()->json($checkpoints->errors(),401);
        }
        else{
            $emp = new Employee;
        
            $emp->first_name = $request->first_name;
            $emp->last_name = $request->last_name;
            $emp->email = $request->email;
            $emp->age = $request->age;

            $res = $emp->save();

            if($res){
                return ["result"=>"Data Saved Successfully."];
            }
            else{
                return ["result"=>"Operation Failed."];
            }
        }        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
