@extends('adminpanel.layouts.master')
@section('content')
<!-- DataTales Example -->
 <!-- DataTales Example -->

 @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
 <h1 class="h3 mb-3 text-gray-800">Dillər</h1>
                  <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Bütün dillər
                            
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Ad</th>
                                            <th>Locale</th>
                                            <th>status</th>
                                            <th>İşləmlər</th>
                                           
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        @foreach($langData as $key=>$value)
                                        <tr>
                                            <td><a href="">{{$value->name}}</a></td>
                                            <td>{{$value->locale}}</td>
                                            <td>@if($value->status ==1)
                                                aktiv
                                                @else
                                                passiv
                                                @endif
                                            </td>
                                            <td>
                                        
                                            <a href="{{route('language.edit',$value->id)}}"  title="düzənlə" class="btn-circle btn-sm btn-primary edit-click"><i class="fa fa-pen"></i></a>
                                          
                                            <a href="#" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $value->id }}').submit();" title="sil" class="btn-circle btn-sm btn-danger"><i class="fa fa-times"></i></a>

                                            <form id="delete-form-{{ $value->id }}" action="{{ route('language.destroy', $value->id) }}" method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                       
                                            </td>                                           
                                        </tr>
                                        
                                        @endforeach
                                        
                                       
                                        
                                      
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    


@endsection
@section('js')

     <script src="/Admin-panel/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="/Admin-panel/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="/Admin-panel/js/demo/datatables-demo.js"></script>

@endsection
@section('css')
<link href="/Admin-panel/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection