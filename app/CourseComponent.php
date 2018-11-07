<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseComponent extends Model
{
    protected $fillable = ['description','course_id'];

    public function courses(){
        return $this->belongsTo('App\Course');
    }
}
