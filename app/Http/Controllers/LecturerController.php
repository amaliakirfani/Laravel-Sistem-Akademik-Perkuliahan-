<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LecturerController extends Controller
{
    public function index()
    {
        $lecturer = DB::table('lecturer_table')->get();

        return view('lecturer.show_lecturer', ['lecturer' => $lecturer]);
    }

    public function create(Request $request)
    {
        $nidn = $request -> input('nidn');
        $nama = $request -> input('nama');

        $lecturer = DB::table('lecturer_table')->insert(
            ['lecturer_nidn' => $nidn,
            'lecturer_name' => $nama]
        );

        if($lecturer){
            return redirect('/lecturer')->with('status', 'Data Dosen Berhasil Ditambah');
        }
        else{
            print('input gagal');
        } 
    }

    function delete($lecturer_id){
        $lecturer=DB::table('lecturer_table')->where('lecturer_id', '=', $lecturer_id)-> delete();

        if ($lecturer){
            return redirect('/lecturer')->with('status', 'Berhasil Delete Dosen');
        }
        else{
            return redirect('/lecturer')->with('status', 'Gagal Delete Dosen');
        }
    }

    function edit($lecturer_id){
        $lecturer=DB::table('lecturer_table')->where('lecturer_id', '=', $lecturer_id)-> first();

        return view('/lecturer.edit_lecturer',['lecturer'=>$lecturer]);
    }

    function update(Request $request){
        $nidn = $request->input('nidn');
        $nama = $request->input('nama');
        $id = $request->input('id');

        $lecturer = DB::table('lecturer_table')
            ->where('lecturer_id', $id)
            ->update(['lecturer_nidn' => $nidn, 'lecturer_name'=>$nama]);

        if($lecturer){
            return redirect('/lecturer')->with('status', 'Berhasil Update Dosen');
        }
        else{
            return redirect('/lecturer')->with('status', 'Gagal Update Dosen');
        }
    }
}
