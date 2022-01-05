@extends('admin.layouts.dashboard')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h1 class="m-0 font-weight-bold text-dark">Editar la categoria por edad</h1>
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

            <form method="POST" action="/categories/{{$category->id}}" enctype="multipart/form-data">
                @method('PATCH')
                @csrf

                <div class="form-group">
                    <label for="title">Titulo</label>
                    <input type="text" name="title" class="form-control" id="title" placeholder="Titulo..." value="{{ $category->title }}">
                </div>

                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="title">Edad Minima</label>
                        <input type="number" name="age_min" class="form-control" id="age_min" placeholder="Edad minima..." value="{{ $category->age_min }}">
                    </div>
                    <div class="col-md-6">
                        <label for="title">Edad Maxima</label>
                        <input type="number" name="age_max" class="form-control" id="age_max" placeholder="Edad maxima..." value="{{ $category->age_max }}">
                    </div>

                </div>

                <div class="form-group pt-2">
                    <input class="btn btn-success btn-lg float-md-right" type="submit" value="Actualizar">
                </div>
            </form>
        </div>
    </div>
@endsection
