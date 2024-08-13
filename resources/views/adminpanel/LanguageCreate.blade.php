@extends('adminpanel.layouts.master')
@section('content')

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<form action="{{route('language.store')}}" method="POST">
  
  @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Dilin Adı:</label>
    <input type="text" class="form-control"  name="name">
    
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Locale:</label>
    <input type="text" class="form-control"  name="locale">
    
  </div>
  <label for="exampleInputEmail1">Dilin statusu:</label>
    <select class="custom-select" name="status">
  
 
  <option value="1">aktiv</option>
  <option value="0">passiv</option>
 
  
</select>
  <div class="form-group">
    
  </div>
 
  
  <button type="submit" class="btn btn-primary">Əlavə Et</button>
</form>
@endsection