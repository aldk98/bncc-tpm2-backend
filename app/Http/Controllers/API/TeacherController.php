<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Teacher;
use Validator;
use App\Kelas;

class TeacherController extends Controller
{
    public $successStatus = 200;

    public function getAllTeacher()
    {
        $teachers = Teacher::all();
        return response()->json([
            'teachers' => $teachers
        ]);
    }

    public function getTeacherKelas($id)
    {
        $teachers = Kelas::findOrFail($id);
        return response()->json([
            'teachers' => $teachers->teacher->name
        ]);
    }

    public function insertTeacher(Request $request)
    {
        $teachers = new Teacher;

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'dob' => 'required',
            'address' =>'required'
        ]);

        if($validator->fails()){
            return response()->json([
                'message' => 'Insert Fail'
            ]);
        }
        $teachers->name = $request->name;
        $teachers->dob = $request->dob;
        $teachers->address = $request->address;

        $teachers->save();

        return response()->json([
            'message' => 'success insert'
        ]);
    }

    public function updateTeacher(Request $request, $id)
    {
        $teachers = Teacher::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'dob' => 'required',
            'address' =>'required'
        ]);

        if($validator->fails()){
            return response()->json([
                'message' => 'Insert Fail'
            ]);
        }
        $teachers->name = $request->name;
        $teachers->dob = $request->dob;
        $teachers->address = $request->address;

        $teachers->save();

        return response()->json([
            'message' => 'success insert'
        ]);
    }

    public function deleteTeacher($id)
    {
        $teachers = Teacher::findOrFail($id);

        $teachers->delete();

        return response()->json([
            'message' => 'success delete'
        ]);
    }
}
