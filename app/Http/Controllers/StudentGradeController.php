<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentGradeController extends Controller
{
    function index(){
        $student_table = DB::table('student_table')->get();
        $lecturer_table = DB::table('lecturer_table')->get();
        $courses_table = DB::table('courses_table')->get();
        $student_grade = DB::table('student_grade_table')
            ->join('student_table', 'student_table.student_nim', '=', 'student_grade_table.student_nim')
            ->join('lecturer_table', 'lecturer_table.lecturer_nidn', '=', 'student_grade_table.lecturer_nidn')
            ->join('courses_table', 'courses_table.courses_code', '=', 'student_grade_table.course_code')
            ->select('*')
            ->get();

        return view('student_grade.show_student_grade', ['student_grade' => $student_grade, 'student_table' => $student_table, 'lecturer_table' => $lecturer_table, 'courses_table'=> $courses_table]);
    }


    function create(Request $request)
    {
        $nim = $request -> input('nim');
        $nidn = $request -> input('nidn');
        $grade = $request -> input('grade');
        $course = $request -> input('course');

        $student_grade = DB::table('student_grade_table')->insert(
            ['student_nim' => $nim,
            'lecturer_nidn' => $nidn,
            'course_code' => $course,
            'student_grade' => $grade]
        );

        if($student_grade){
            return redirect('/student_grade')->with('status', 'Data Dosen Berhasil Ditambah');
        }
        else{
            print('input gagal');
        } 
    }

    function delete($student_grade_id){
        $student_grade=DB::table('student_grade_table')->where('student_grade_id', '=', $student_grade_id)-> delete();

        if ($student_grade){
            return redirect('/student_grade')->with('status', 'Berhasil Delete Dosen');
        }
        else{
            return redirect('/student_grade')->with('status', 'Gagal Delete Dosen');
        }
    }

    function edit($student_grade_id)
    {
        $student_grade=DB::table('student_grade_table')->where('student_grade_id', '=', $student_grade_id)-> first();
        $student_table = DB::table('student_table')->get();
        $lecturer_table = DB::table('lecturer_table')->get();
        $courses_table = DB::table('courses_table')->get();

        return view('/student_grade.edit_student_grade', ['student_grade' => $student_grade, 'student_table' => $student_table, 'lecturer_table' => $lecturer_table, 'courses_table'=> $courses_table]);
    }

    function update(Request $request){
        
        $id= $request->input('id');
        $nim = $request -> input('nim');
        $nidn = $request -> input('nidn');
        $grade = $request->input('student_grade');
        $course = $request -> input('course');

        $student_grade = DB::table('student_grade_table')
            ->where('student_grade_id', $id)
            ->update(['student_nim' => $nim,
            'lecturer_nidn' => $nidn,
            'course_code' => $course,
            'student_grade' => $grade]);

        if($student_grade){
            return redirect('/student_grade')->with('status', 'Berhasil Update Nilai Mahasiswa');
        }
        else{
            return redirect('/student_grade')->with('status', 'Gagal Update Nilai Mahasiswa');
        }
    }
    
}
