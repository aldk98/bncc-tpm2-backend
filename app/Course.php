<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['description'];//,'teacher_id'];

    public function course_components(){
        return $this->hasMany('App\CourseComponent');
    }
}
