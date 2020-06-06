<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CoursesController extends Controller
{
    public function index()
    {
        $courses = DB::table('courses_table')->get();

        return view('courses.show_courses', ['courses' => $courses]);
    }

    public function create(Request $request)
    {
        $code = $request -> input('code');
        $nama = $request -> input('nama');

        $courses = DB::table('courses_table')->insert(
            ['courses_code' => $code,
            'courses_name' => $nama]
        );

        if($courses){
            return redirect('/courses')->with('status', 'Data Matkul Berhasil Ditambah');
        }
        else{
            print('input gagal');
        } 
    } 

    function delete($courses_id){
        $courses=DB::table('courses_table')->where('courses_id', '=', $courses_id)-> delete();

        if ($courses){
            return redirect('/courses')->with('status', 'Berhasil Delete Mata Kuliah');
        }
        else{
            return redirect('/courses')->with('status', 'Gagal Delete Mata Kuliah');
        }
    }

    function edit($courses_id){
        $courses=DB::table('courses_table')->where('courses_id', '=', $courses_id)-> first();

        return view('/courses.edit_courses',['courses'=>$courses]);
    }

    function update(Request $request){
        $code = $request->input('code');
        $nama = $request->input('nama');
        $id = $request->input('id');

        $courses = DB::table('courses_table')
            ->where('courses_id', $id)
            ->update(['courses_code' => $code, 'courses_name'=>$nama]);

        if($courses){
            return redirect('/courses')->with('status', 'Berhasil Update Mata Kuliah');
        }
        else{
            return redirect('/courses')->with('status', 'Gagal Update Mata Kuliah');
        }
    }
}
