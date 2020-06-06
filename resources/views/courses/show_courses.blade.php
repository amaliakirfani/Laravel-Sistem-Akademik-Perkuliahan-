@include('snippets.header')

<div class="container">
@include('snippets.menu')
<p>
  <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
    Tambah Courses
  </a>
</p>
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<div class="collapse" id="collapseExample">
  <div class="card card-body">
    
  <form action="/courses/create" method="POST">
  {{csrf_field ()}}
  <div class="form-group">
    <label for="exampleInputEmail1">Courses Code</label>
    <input type="text" name="code" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Nama Courses</label>
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
      <th scope="col">Courses Code</th>
      <th scope="col">Courses Name</th>
    </tr>
  </thead>
  <tbody>
  @foreach($courses as $item)
    <tr>
        <td></td>
        <td>{{$item->courses_code}}</td>
        <td>{{$item->courses_name}}</td>
        <td>
        <a href="/courses/delete/{{$item->courses_id}}">
        <button class="btn btn-danger">Hapus</button></a>

        <a href="/courses/edit/{{$item->courses_id}}">
        <button class="btn btn-warning">Edit</button></a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
@include('snippets.footer')