@extends('adminpanel.layouts.master')
@section('content')


@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<form action="{{route('post.update',$postData->id)}}" method="POST" enctype="multipart/form-data">
@method('PUT')
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

    

  <div class="form-group">
    <label for="exampleInputEmail1">Post Başlığı:</label>

    @foreach($postTranslationsData as $value)
    <input type="text" class="form-control"  name="title" value="{{$value->title}}">
    @endforeach
  </div>
 
  
    
  <div class="mb-3">
  <label for="formFile" class="form-label">Şəkil Seçin:</label>
                    <img src="{{ asset('storage/images/' . $postData->image) }}" alt="Image" width="70">
                
  <input class="form-control" type="file" name="image">
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Məqalə Sahəsi:</label>
  @foreach($postTranslationsData as $value)
  <textarea class="form-control"id="summernote" name="article" rows="3">{{$value->article}}</textarea>
  @endforeach
</div>

<label for="exampleInputEmail1">Post statusu:</label>
    <select class="custom-select" name="status">
  
 

    <option value="1" @selected($postData->status == 1)>Aktiv</option>
    <option value="0" @selected($postData->status == 0)>Passiv</option>
 
  
</select>

<label for="exampleInputEmail1">Dil:</label>
    <select class="custom-select" name="language">
    @foreach($postTranslationsData as $value)
     <option value="{{$value->lang_code}}">{{$value->lang_code}}</option>
   @endforeach
</select>
 
  
  <button type="submit" class="btn btn-primary">Güncəllə</button>
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