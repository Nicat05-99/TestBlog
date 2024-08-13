@extends('adminpanel.layouts.master')
@section('content')
<!-- DataTales Example -->
<h1 class="h3 mb-3 text-gray-800">Post</h1>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Post cədvəli
        
        </h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>image</th>
                        <th>Başlıq</th>
                        <th>Məqalə</th>
                        <th>Status</th>
                        <th>Dil</th>
                        <th>İşləmlər</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($postData as $post)
    <!-- Ana Post Satırı -->
    @foreach($post->translations as $index => $translation)
        <!-- Translation Kontrolü -->
        @if (!empty($translation->title) && !empty($translation->article))
            @if ($index == 0) <!-- İlk satırda ana bilgileri göster -->
            <tr>
                <td rowspan="{{ $post->translations->count() }}">
                    <img src="{{ asset('storage/images/' . $post->image) }}" alt="Image" width="70">
                </td>
                <td>{{ substr($translation->title, 0, 10) }}</td>
                <td>{!! substr($translation->article, 0, 50) !!}</td>
                <td>{{ $post->status == 1 ? 'Aktiv' : 'Passiv' }}</td>
                <td>{{ $translation->lang_code }}</td>
                <td>
                    <a href="{{ route('custom-edit', [$post->id, $translation->lang_code]) }}" title="düzənlə" class="btn-circle btn-sm btn-primary"><i class="fa fa-pen"></i></a>
                    <a href="{{ route('post.destroy', $post->id) }}" title="sil" class="btn-circle btn-sm btn-danger" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $post->id }}').submit();"><i class="fa fa-times"></i></a>
                    <form id="delete-form-{{ $post->id }}" action="{{ route('post.destroy', $post->id) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                    <a href="{{ route('custom-create', $post->id) }}" title="yeni dil elave et" class="btn-circle btn-sm btn-primary"><i class="fa fa-plus"></i></a>
                </td>
            </tr>
            @else
            <tr>
                <td>{{ substr($translation->title, 0, 10) }}</td>
                <td>{!! substr($translation->article, 0, 50) !!}</td>
                <td>{{ $post->status == 1 ? 'Aktiv' : 'Passiv' }}</td>
                <td>{{ $translation->lang_code }}</td>
                <td>
                    <a href="{{ route('custom-edit', [$post->id, $translation->lang_code]) }}" title="düzənlə" class="btn-circle btn-sm btn-primary"><i class="fa fa-pen"></i></a>
                    <a href="{{ route('post.destroy', $post->id) }}" title="sil" class="btn-circle btn-sm btn-danger" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $post->id }}').submit();"><i class="fa fa-times"></i></a>
                    <form id="delete-form-{{ $post->id }}" action="{{ route('post.destroy', $post->id) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                    <a href="{{ route('custom-create', $post->id) }}" title="yeni dil elave et" class="btn-circle btn-sm btn-primary"><i class="fa fa-plus"></i></a>
                </td>
            </tr>
            @endif
        @endif
    @endforeach
@endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    function redirectToUrl(selectElement) {
        var selectedValue = selectElement.value;
        
        // Eğer seçilen değer boş değilse yönlendirme yapın
        if (selectedValue) {
            window.location.href = selectedValue;
        }
    }
</script>

<script src="/Admin-panel/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="/Admin-panel/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="/Admin-panel/js/demo/datatables-demo.js"></script>
@endsection

@section('css')
<link href="/Admin-panel/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection
