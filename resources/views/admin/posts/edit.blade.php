@extends('admin.layouts.dashboard')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h1 class="m-0 font-weight-bold text-dark">Editar la Noticia</h1>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="/post/{{$post->id}}" enctype="multipart/form-data">
                @method('PATCH')
                @csrf

                <div class="form-group">
                    <label for="title">Titulo</label>
                    <input type="text" name="title" class="form-control" id="title" placeholder="Titulo..." value="{{ $post->title }}">
                </div>
                <label for="image">Seleccionar Imagen</label>
                <input type="file" name="image" class="form-control-file" id="profile-img" value="{{$post->image}}">
                <div class="row">
                    <img src="{{ asset('/storage/images/posts_images/'.$post->image_url) }}" id="profile-img-tag" class="img-thumbnail mx-auto" alt="{{$post->image_url}}" width="250" >
                </div>

                <div class="form-group">
                    <label for="content">Insertar contenido</label>
                    <textarea name="post_content" id="content">{{ $post->content }}</textarea>
                </div>

                <div class="form-group pt-2">
                    <input class="btn btn-success btn-lg float-md-right" type="submit" value="Actualizar">
                </div>
            </form>
            <script>
                CKEDITOR.replace('post_content');
            </script>
        </div>
    </div>
@endsection
