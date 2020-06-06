@include('snippets.header')

<div class="container">
@include('snippets.menu')
<p>
  <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
    Tambah Dosen
  </a>
</p>
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<div class="collapse" id="collapseExample">
  <div class="card card-body">
  <form action="/lecturer/create" method="POST">
  {{csrf_field ()}}
  <div class="form-group">
    <label for="exampleInputEmail1">NIDN Dosen</label>
    <input type="text" name="nidn" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Nama Dosen</label>
    <input type="text" name="nama" class="form-control" id="exampleInputPassword1">
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
  </div>
</div>

<table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">NIDN Dosen</th>
      <th scope="col">Nama Dosen</th>
    </tr>
  </thead>
  <tbody>
      @foreach($lecturer as $item)
    <tr>
      <td></td>
      <td>{{$item->lecturer_nidn}}</td>
      <td>{{$item->lecturer_name}}</td>
      <td>
        <a href="/lecturer/delete/{{$item->lecturer_id}}">
        <button class="btn btn-danger">Hapus</button></a>

        <a href="/lecturer/edit/{{$item->lecturer_id}}">
        <button class="btn btn-warning">Edit</button></a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
@include('snippets.footer')