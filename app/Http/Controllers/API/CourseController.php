<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Course;
use Validator;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public $successStatus = 200;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Course::all();
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
            'description' => 'required',
        ]);
        if($validator->fails()){
            $response = array('response'=> $validator->messages(), 'success' =>false);
            return $response;
        }else{
            $course = new Course;
            $course->description = $request->description;
            $course->save();
            return response()->json(['success' => 'Course Added Successfully'], $this->successStatus);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        $data = Course::where('id',$course->id)->first();
        return response()->json(['success' => $data], $this->successStatus);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $validator = Validator::make($request->all(),[
            'description' => 'required',
        ]);
        if($validator->fails()){
            $response = array('response'=> $validator->messages(), 'success' =>false);
            return $response;
        }else{
            $course = Course::where('id',$course->id)->first();
            $course->description = $request->description;
            $course->save();
            return response()->json(['success' => 'Course Updated Successfully'], $this->successStatus);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $data = Course::where('id',$course->id)->first();
        $data->delete();
        return response()->json(['success' => 'Deleted'], $this->successStatus);
    }
}
