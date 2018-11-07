<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', 'API\AuthController@login');
    Route::post('register', 'API\AuthController@register');

    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', 'API\AuthController@logout');
        Route::get('user', 'API\AuthController@user');
    });
});


Route::group(['middleware' => 'auth:api'], function() {
    //Kelas
    Route::get('kelas', 'API\KelasController@getKelas');
    Route::get('kelas/{id}', 'API\KelasController@showKelas');
    Route::post('insert_kelas', 'API\KelasController@postKelas');
    Route::patch('update_kelas/{id}', 'API\KelasController@updateKelas');
    Route::delete('delete_kelas/{id}', 'API\KelasController@deleteKelas');

    //Student
    Route::get('student', 'API\StudentController@getAllStudent');
    Route::get('student/create', 'API\StudentController@createStudent');
    Route::patch('student/update/{id}', 'API\StudentController@updateStudent');
    Route::delete('student/delete/{id}', 'API\StudentController@deleteStudent');

    //DetailKelasStudent
    Route::get('student/kelas/{id}', 'API\StudentController@getStudentKelas');

    //Detail Teacher
    Route::get('teacher/kelas/{id}', 'API\TeacherController@getTeacherKelas');

    Route::resource('course','API\CourseController');
    Route::resource('course_component','API\CourseComponentController');
    Route::resource('grade','API\GradeController');
});

