<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name',
        'dob',
        'address',
    ];

    public function student()
    {
        return $this->belongsTo('App\Kelas');
    }

}
