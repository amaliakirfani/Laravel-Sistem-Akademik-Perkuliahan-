@include('snippets.header')

<div class="container">
  @include('snippets.menu')
    <p>
        <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
            Tambah Nilai Mahasiswa
        </a>
    </p>

    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif

<div class="collapse" id="collapseExample">
    <div class="card card-body">
        <form action="/student_grade/create" method="POST">
            {{ csrf_field() }}
                <div class="form-group">
                    <label for="exampleInputEmail1">NIM Mahasiswa</label>
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
                    <input type="text" name="grade" class="form-control" id="exampleInputPassword1">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nim Mahasiswa</th>
                <th scope="col">Nama Mahasiswa</th>
                <th scope="col">NIDN Dosen</th>
                <th scope="col">Nama Dosen</th>
                <th scope="col">Mata Kuliah</th>
                <th scope="col">Nilai</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            
            @foreach ($student_grade as $item)
            <tr>
                <td></td>
                <td>{{$item->student_nim}}</td>
                <td>{{$item->student_name}}</td>
                <td>{{$item->lecturer_nidn}}</td>
                <td>{{$item->lecturer_name}}</td>
                <td>{{$item->courses_name}}</td>
                <td>{{$item->student_grade}}</td>
                <td>
                    <a href="/student_grade/delete/{{$item->student_grade_id}}">
                    <button class="btn btn-danger">Hapus</button></a>

                    <a href="/student_grade/edit/{{$item->student_grade_id}}">
                    <button class="btn btn-warning">Edit</button></a>
                </td>
            </tr>
            @endforeach
            
        </tbody>
    </table>
</div>

@include('snippets.footer')