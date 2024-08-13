@extends('adminpanel.layouts.master')
@section('content')


@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
  
  @csrf
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    @if(isset($id) && $id != '')
        <input type="hidden" class="form-control" name="createId" value="{{ $id }}">
    @endif

  <div class="form-group">
    <label for="exampleInputEmail1">Post Başlığı:</label>
    <input type="text" class="form-control"  name="title" value="{{old('title')}}">
    
  </div>
 
  
  @if(!isset($id))
  <div class="mb-3">
  <label for="formFile" class="form-label">Şəkil Seçin:</label>
  <input class="form-control" type="file" name="image">
</div>
@endif

<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Məqalə Sahəsi:</label>
  <textarea class="form-control"id="summernote" name="article" rows="3"></textarea>
</div>

<label for="exampleInputEmail1">Post statusu:</label>
    <select class="custom-select" name="status">
  
 
  <option value="1">aktiv</option>
  <option value="0">passiv</option>
 
  
</select>

<label for="exampleInputEmail1">Dil Seçin:</label>
    <select class="custom-select" name="language">
  @foreach($lang as $value)
 
     <option value="{{$value->locale}}">{{$value->locale}}</option>
@endforeach
</select>
 
  
  <button type="submit" class="btn btn-primary">Əlavə Et</button>
</form>

@endsection
@section('js')
<script>
    $(document).ready(function() {
  $('#summernote').summernote();
});
</script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
@endsection
@section('css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

@endsection