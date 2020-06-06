<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function index()
    {
        $students = DB::table('student_table')->get();

        return view('student.show_student', ['student' => $students]);
    }

    public function create(Request $request)
    {
        $nim = $request -> input('nim');
        $nama = $request -> input('nama');

        $students = DB::table('student_table')->insert(
            ['student_nim' => $nim,
            'student_name' => $nama]
        );

        if($students){
            return redirect('/student')->with('status', 'Data Mahasiswa Berhasil Ditambah');
        }
        else{
            print('input gagal');
        }
    }

    function delete($student_id){
        $student=DB::table('student_table')->where('student_id', '=', $student_id)-> delete();

        if ($student){
            return redirect('/student')->with('status', 'Berhasil Delete Mahasiswa');
        }
        else{
            return redirect('/student')->with('status', 'Gagal Delete Mahasiswa');
        }
    }

    function edit($student_id){
        $student=DB::table('student_table')->where('student_id', '=', $student_id)-> first();

        return view('/student.edit_student',['student'=>$student]);
    }

    function update(Request $request){
        $nim = $request->input('nim');
        $nama = $request->input('nama');
        $id = $request->input('id');

        $student = DB::table('student_table')
            ->where('student_id', $id)
            ->update(['student_nim' => $nim, 'student_name'=>$nama]);

        if($student){
            return redirect('/student')->with('status', 'Berhasil Update Mahasiswa');
        }
        else{
            return redirect('/student')->with('status', 'Gagal Update Mahasiswa');
        }
    }
}