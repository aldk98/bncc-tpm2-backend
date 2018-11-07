<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Grade;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Auth;

class GradeController extends Controller
{
    public $successStatus = 200;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Grade::all();
        return response()->json(['success' => $data], $this->successStatus);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'grade' => 'required|integer',
            'course_component_id' => 'required|integer',
            'student_id' => 'required|integer',
        ]);
        if($validator->fails()){
            $response = array('response'=> $validator->messages(), 'success' =>false);
            return $response;
        }else{
            $grade = new Grade;
            $grade->grade = $request->grade;
            $grade->course_component_id = $request->course_component_id;
            $grade->student_id = $request->student_id;
            $grade->save();
            return response()->json(['success' => 'Grade Added Successfully'], $this->successStatus);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function show(Grade $grade)
    {
        $data = Grade::where('id',$grade->id)->first();
        return response()->json(['success' => $data], $this->successStatus);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Grade $grade)
    {
        $validator = Validator::make($request->all(),[
            'grade' => 'required|integer',
            'course_component_id' => 'required|integer',
            'student_id' => 'required|integer',
        ]);
        if($validator->fails()){
            $response = array('response'=> $validator->messages(), 'success' =>false);
            return $response;
        }else{
            $grade = Grade::where('id',$grade->id)->first();
            $grade->grade = $request->grade;
            $grade->course_component_id = $request->course_component_id;
            $grade->student_id = $request->student_id;
            $grade->save();
            return response()->json(['success' => 'Grade Updated Successfully'], $this->successStatus);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grade $grade)
    {
        $data = Grade::where('id',$grade->id)->first();
        $data->delete();
        return response()->json(['success' => 'Deleted'], $this->successStatus);
    }
}
