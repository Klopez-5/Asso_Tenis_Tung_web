@extends('admin.layouts.dashboard')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h1 class="m-0 font-weight-bold text-dark">Permiso</h1>
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

            <form enctype="multipart/form-data">
                @method('PUT')
                @csrf

                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="name">Permiso</label>
                            <input readonly type="text" name="name" class="form-control" id="name" placeholder="Permiso..." value="{{ old('name',$permission->name) }}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <input readonly type="text" name="slug" class="form-control" id="slug" placeholder="Slug..." value="{{ old( 'slug',$permission->slug) }}">
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="form-group">
                            <label for="description">Descripción</label>
                            <input readonly type="text" name="description" class="form-control" id="description" placeholder="Descripción..." value="{{ old('description',$permission->description)}}">
                        </div>
                    </div>
                </div>

                <div class="form-group pt-2">
                    <a class="btn btn-success btn-lg float-md-right" href="/permissions/{{$permission['id']}}/edit">Editar</a>
                    <a class="btn btn-danger btn-lg float-md-left" href="/permissions">Regresar</a>
            </form>
        </div>
    </div>
@endsection
