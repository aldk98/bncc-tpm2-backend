<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Student;
use App\Kelas;
use Validator;
class StudentController extends Controller
{
    public $successStatus = 200;

    //Dapetin data semua student
    public function getAllStudent()
    {
        $students = Student::all();
        return response()->json([
            'student' => $students,
        ], $this->successStatus);
    }

    public function getStudentKelas($id)
    {
        $students = Student::where('kelas_id', $id)->get();
        return response()->json([
            'student' => $students
        ]);
    }

    //Create Student
    public function createStudent(Request $request)
    {

        $students = new Student;

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'kelas_id' => 'required',
            'dob' => 'required',
            'address' => 'required'
        ]);

        if($validator->fails()){
            return response()->json([
                'message' => $validator->errors()
            ]);
        }

        $students->name = $request->name;
        $students->address = $request->address;
        $students->dob = $request->dob;
        $students->save();

        return response()->json([
            'message' => 'success insert student'
        ], $this->successStatus);

    }



    //Update Student
    public function updateStudent(Request $request, $id)
    {
        $students = Student::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'kelas_id' => 'required',
            'dob' => 'required',
            'address' => 'required'
        ]);

        if($validator->fails()){
            return response()->json([
                'message' => $validator->errors()
            ]);
        }

        $students->name = $request->name;
        $students->address = $request->address;
        $students->dob = $request->dob;
        $students->save();

        return response()->json([   
            'message' => 'success update student'
        ], $this->successStatus);
    }

    //Delete Student
    public function deleteStudent($id)
    {
        $students = Student::findOrFail($id);

        $students->delete();

        return response()->json([
            'message' => 'success delete student'
        ], $this->successStatus);
    }

}
