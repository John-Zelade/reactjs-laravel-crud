<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
  
  function  getStudentList(){
    $data = Student::all();
    return response()->json($data);
  }

    //loads all data
    function __construct(){
      $this-> student = new Student;
  }
      //Insert data
      function addStudent(Request $request){
        //INSERT DATA IN DATABASE
       $data=[
                'student_name' => $request->stud_name,
                'student_year_level'=> $request->stud_yr_lvl,
                'student_section'=> $request->stud_sec
       ];
  
       $this->student->saveData($data);
    }
  
    //Update data
   public function Update(Request $request, $id)
   {
    $data = Student::find($id);
    $data->student_name = $request-> stud_name;
    $data->student_year_level = $request-> stud_yr_lvl;
    $data->student_section = $request ->stud_sec; 
    $data->update();

    return response()->json([
      'status'=>200,
      'message'=>'Student Record Updated Successfully',
    ]);
   }

   //Delete Data
   public function Delete($id)
   {
    $data = Student::find($id);
    if($data){
      $data->delete();
      return response()->json([
        'status'=>200,
        'message'=>'Student Record Deleted Successfully',
      ]);
    }
    else{
      return response()->json([
        'status'=>404,
        'message'=>'No Record Found',
      ]);
    }
   }
}