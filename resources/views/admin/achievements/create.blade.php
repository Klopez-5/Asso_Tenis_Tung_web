@extends('admin.layouts.dashboard')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Mis logros</h1>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="no-gutters align-items-center">
                        <div class="h5 mb-0 font-weight-bold text-info text-uppercase mb-1">
                            <b>Agregar logro</b></div>
                        <hr>
                        <form method="POST" action="/achievements" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="name"><b>Título</b></label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Título..." value="{{ old('name') }}">
                            </div>
                            <div class="form-group">
                                <label for="description"><b>Descripción</b></label>
                                <textarea name="description" class="form-control" id="description" placeholder="Descripción..." >{{ old('description') }}</textarea>
                            </div>
                            @if ($errors->any())
                                <div class="alert alert-danger" role="alert">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <br>
                            <div class="form-group pt-2">
                                <input class="btn btn-success btn-lg float-md-right" type="submit" value="Guardar">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="no-gutters align-items-center">
                        <div class="h5 mb-0 font-weight-bold text-info text-uppercase mb-1">
                            <b>Listado de mis logros registrados</b></div>
                        <hr>
                        <div class="card-body">
                            <div class="table-info">
                                <table class="table table-bordered ">
                                    <thead>
                                    <tr>
                                        <th class="text-center"><b>Título</b></th>
                                        <th class="text-center"><b>Descripción</b></th>
                                    </thead>
                                    <tbody>
                                    @foreach($achievementsmy as $achievements)
                                        <tr>
                                            <td>
                                                <a title="Editar" href="/achievements/{{$achievements['id']}}/edit">{{$achievements['name']}}</a>
                                            </td>
                                            <td>{{$achievements['description']}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
