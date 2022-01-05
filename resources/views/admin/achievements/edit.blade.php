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
                            <b>Editar mi logro</b></div>
                        <hr>
                        <form method="POST" action="/achievements/{{$achievement->id}}" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf

                            <div class="form-group">
                                <label for="name">Título</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Título..." value="{{ old('name', $achievement->name) }}">
                            </div>
                            <div class="form-group">
                                <label for="description">Descripción</label>
                                <textarea name="description" class="form-control" id="description" placeholder="Descripción..." >{{ old('description',$achievement->description) }}</textarea>
                            </div>

                            <div class="form-group pt-2">
                                <input class="btn btn-success btn-lg float-md-right" type="submit" value="Actualizar">
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
