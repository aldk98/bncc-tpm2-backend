<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\CourseComponent;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Auth;

class CourseComponentController extends Controller
{
    public $successStatus = 200;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = CourseComponent::all();
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
            'course_id' => 'required|integer',
        ]);
        if($validator->fails()){
            $response = array('response'=> $validator->messages(), 'success' =>false);
            return $response;
        }else{
            $courseComponent = new CourseComponent;
            $courseComponent->description = $request->description;
            $courseComponent->course_id = $request->course_id;
            $courseComponent->save();
            return response()->json(['success' => 'Course Component Added Successfully'], $this->successStatus);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CourseComponent  $courseComponent
     * @return \Illuminate\Http\Response
     */
    public function show(CourseComponent $courseComponent)
    {
        $data = CourseComponent::where('id',$courseComponent->id)->first();
        return response()->json(['success' => $data], $this->successStatus);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CourseComponent  $courseComponent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CourseComponent $courseComponent)
    {
        $validator = Validator::make($request->all(),[
            'description' => 'required',
            'course_id' => 'required|integer',
        ]);
        if($validator->fails()){
            $response = array('response'=> $validator->messages(), 'success' =>false);
            return $response;
        }else{
            $courseComponent = CourseComponent::where('id',$courseComponent->id)->first();
            $courseComponent->description = $request->description;
            $courseComponent->save();
            return response()->json(['success' => 'Course Component Updated Successfully'], $this->successStatus);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CourseComponent  $courseComponent
     * @return \Illuminate\Http\Response
     */
    public function destroy(CourseComponent $courseComponent)
    {
        $data = CourseComponent::where('id',$courseComponent->id)->first();
        $data->delete();
        return response()->json(['success' => 'Deleted'], $this->successStatus);
    }
}
