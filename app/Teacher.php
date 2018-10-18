<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [
        'name',
        'dob',
        'address'
    ];

    public function kelas()
    {
        return $this->hasOne('App\Kelas');
    }
}
