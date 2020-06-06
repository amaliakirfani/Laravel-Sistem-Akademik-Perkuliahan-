@include('snippets.header')
<div class="container">
    <form action="/student_grade/update" method="POST">
    {{csrf_field ()}}
    <div class="form-group">
        <label for="exampleInputEmail1">NIM Mahasiswa</label>
        <input type="hidden" name="id" value="{{$student_grade->student_grade_id}}"/>
            <select name="nim" class="form-control">
                <option>--pilih--</option>
                    @foreach ($student_table as $item)
                    <option value="{{$item->student_nim}}">{{$item->student_nim}}</option>
                    @endforeach
            </select>
    </div>

    <div class="form-group">
        <label for="exampleInputPassword1">NIDN Dosen</label>
            <select name="nidn" class="form-control">
                <option>--pilih--</option>
                    @foreach ($lecturer_table as $item)
                    <option value="{{$item->lecturer_nidn}}">{{$item->lecturer_nidn}}</option>
                    @endforeach
            </select>
    </div>

    <div class="form-group">
        <label for="exampleInputPassword1">Mata Kuliah</label>
            <select name="course" class="form-control">
                <option>--pilih--</option>
                    @foreach ($courses_table as $item)
                    <option value="{{$item->courses_code}}">{{$item->courses_code}}</option>
                    @endforeach
            </select>
    </div>

    <div class="form-group">
        <label for="exampleInputPassword1">Nilai Mahasiswa</label>
        <input type="text" value="{{$student_grade->student_grade}}" name="student_grade" class="form-control" id="exampleInputPassword1">
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@include('snippets.footer')