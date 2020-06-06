@include('snippets.header')
<div class="container">
    <form action="/student/update" method="POST">
    {{csrf_field ()}}
    <div class="form-group">
        <label for="exampleInputEmail1">NIM Mahasiswa</label>
        <input type="hidden" name="id" value="{{$student->student_id}}"/>
        <input type="text" value="{{$student->student_nim}}" name="nim" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Nama Mahasiswa</label>
        <input type="text" value="{{$student->student_name}}" name="nama" class="form-control" id="exampleInputPassword1">
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@include('snippets.footer')