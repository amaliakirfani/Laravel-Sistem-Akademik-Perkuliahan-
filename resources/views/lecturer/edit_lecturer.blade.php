@include('snippets.header')
<div class="container">
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
@include('snippets.footer')