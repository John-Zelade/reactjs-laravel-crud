<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\employee_info;
use DB;

class employee_info_controller extends Controller
{   //loads all data
    function __construct(){
        $this->employeeInfo = new employee_info;;
    }
    //Insert data
    function create_employee(Request $request){

        //validate data
        $request->validate([
                'input_name' => 'required | max:100',
                'input_email'=> 'required'
        ]);

        //INSERT DATA IN DATABASE
       $data=[
                'name' => $request->input_name,
                'email'=> $request->input_email
       ];

       $this->employeeInfo->saveData($data);
       return redirect('/');
    }

    //display data
    function showdata(){
        $data = employee_info::all();
        return view('list_employee',['list_data'=>$data]);
    }
    //delete data
    function Delete($id){
        $data = employee_info::find($id);
        $data->delete();
        return redirect('/');
    }
    //Edit data
    function Edit($id){
       $data=employee_info::find($id);
       return view('edit_employee',['emp_data'=>$data]);
    }
    //update data
    function Update(Request $request){
        $data=employee_info::find($request->id);
        $data->name=$request->input_name;
        $data->email=$request->input_email;
        $data->save();
        return redirect('/');
    }

}


