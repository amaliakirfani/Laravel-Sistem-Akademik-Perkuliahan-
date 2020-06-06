<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/student','StudentController@index');
Route::get('/student/create','StudentController@create');
Route::post('/student/create','StudentController@create');
Route::get('/student/delete/{student_id}','StudentController@delete');
Route::get('/student/edit/{student_id}','StudentController@edit');
Route::post('/student/update','StudentController@update');

Route::get('/lecturer','LecturerController@index');
Route::get('/lecturer/create','LecturerController@create');
Route::post('/lecturer/create','LecturerController@create');
Route::get('/lecturer/delete/{lecturer_id}','LecturerController@delete');
Route::get('/lecturer/edit/{lecturer_id}','LecturerController@edit');
Route::post('/lecturer/update','LecturerController@update');

Route::get('/courses','CoursesController@index');
Route::get('/courses/create','CoursesController@create');
Route::post('/courses/create','CoursesController@create');
Route::get('/courses/delete/{courses_id}','CoursesController@delete');
Route::get('/courses/edit/{courses_id}','CoursesController@edit');
Route::post('/courses/update','CoursesController@update');

Route::get('/student_grade','StudentGradeController@index');
Route::get('/student_grade/create','StudentGradeController@create');
Route::post('/student_grade/create','StudentGradeController@create');
Route::get('/student_grade/delete/{student_grade_id}','StudentGradeController@delete');
Route::get('/student_grade/edit/{student_grade_id}','StudentGradeController@edit');
Route::post('/student_grade/update','StudentGradeController@update');