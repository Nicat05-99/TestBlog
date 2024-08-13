@extends('adminpanel.layouts.master')
@section('content')

<form action="{{route('language.update',$langData->id)}}" method="post">
  @method('PUT')
  @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Dilin Adı:</label>
    <input type="text" class="form-control" value="{{$langData->name}}" name="name">
    
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Locale:</label>
    <input type="text" class="form-control" value="{{$langData->locale}}"  name="locale">
    
  </div>
  <label for="exampleInputEmail1">Dilin statusu:</label>
    <select class="custom-select" name="status">
  
 
    <option value="1" @selected($langData->status == 1)>Aktiv</option>
    <option value="0" @selected($langData->status == 0)>Passiv</option>
 
  
</select>
 
  
  <button type="submit" class="btn btn-primary">Yenilə</button>
</form>
@endsection