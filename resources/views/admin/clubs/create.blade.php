@extends('admin.layouts.dashboard')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h1 class="m-0 font-weight-bold text-dark">Agregar un nuevo Club</h1>
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

            <form method="POST" action="/clubs" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Nombre..." value="{{ old('name') }}">
                </div>

                <div class="form-group pt-2">
                    <input class="btn btn-success btn-lg float-md-right" type="submit" value="Guardar">
                </div>
            </form>
        </div>
    </div>


@endsection
