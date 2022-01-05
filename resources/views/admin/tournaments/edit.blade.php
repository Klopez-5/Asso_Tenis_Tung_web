@extends('admin.layouts.dashboard')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h1 class="m-0 font-weight-bold text-dark">Editar Torneo</h1>
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

            <form method="POST" action="/tournaments/{{$tournament->id}}" enctype="multipart/form-data">
                @method('PATCH')
                @csrf

                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="name">Título/Nombre</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Título..." value="{{ old('name',$tournament->name) }}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="site">Lugar</label>
                            <input type="text" name="site" class="form-control" id="site" placeholder="Lugar..." value="{{ old('site',$tournament->site) }}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="address">Dirección</label>
                            <input type="text" name="address" class="form-control" id="address" placeholder="Dirección..." value="{{ old('address',$tournament->address) }}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="cost">Costo</label>
                            <input type="text" name="cost" class="form-control" id="cost" placeholder="Costo..." value="{{ old('cost',$tournament->cost) }}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="date">Fecha de inicio</label>
                            <input type="date" name="date" class="form-control" id="date" placeholder="Fecha..." value="{{ old('date',$tournament->date) }}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="state">Estado del torneo</label><br>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="stateF" name="state" class="custom-control-input" value="Finalizado"
                                       @if ( $tournament['state']=="Finalizado")
                                       checked
                                       @elseif  (old('state')=="Finalizado")
                                       checked
                                       @endif
                                >
                                <label class="custom-control-label" for="stateF">Finalizado</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="stateEn" name="state" class="custom-control-input" value="En Ejecución"
                                       @if ( $tournament['state']=="En Ejecución")
                                       checked
                                       @elseif  (old('state')=="En Ejecución")
                                       checked
                                        @endif
                                >
                                <label class="custom-control-label" for="stateEn">En ejecución</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="stateP" name="state" class="custom-control-input" value="Proximamente"
                                       @if ( $tournament['state']=="Proximamente")
                                       checked
                                       @elseif  (old('state',$tournament->state)=="Proximamente")
                                       checked
                                    @endif
                                >
                                <label class="custom-control-label" for="stateP">Proximamente</label>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="form-group">
                            <label for="type">Tipo de torneo</label><br>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="type1" name="type" class="custom-control-input" value="Single"
                                       @if ($tournament['type_of_tournament']=="Single")
                                       checked
                                       @elseif  (old('type')=="Single")
                                       checked
                                    @endif
                                >
                                <label class="custom-control-label" for="type1">Single</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="type2" name="type" class="custom-control-input" value="Dobles"
                                       @if ($tournament['type_of_tournament']=="Dobles")
                                       checked
                                       @elseif  (old('type')=="Dobles")
                                       checked
                                    @endif
                                >
                                <label class="custom-control-label" for="type2">Dobles</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="type3" name="type" class="custom-control-input" value="Por equipos"
                                       @if ($tournament['type_of_tournament']=="Por equipos")
                                       checked
                                       @elseif  (old('type')=="Por equipos")
                                       checked
                                    @endif
                                >
                                <label class="custom-control-label" for="type3">Por equipos</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="type4" name="type" class="custom-control-input" value="Interclubs"
                                       @if ($tournament['type_of_tournament']=="Interclubs")
                                       checked
                                       @elseif  (old('type')=="Interclubs")
                                       checked
                                    @endif
                                >
                                <label class="custom-control-label" for="type4">Interclubs</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="description">Descripción</label>
                            <textarea name="description" class="form-control" id="description" placeholder="Descripción..." >{{ old('description',$tournament->description) }}</textarea>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="image">Agregar Afiche</label>
                            <input type="file" name="image" class="form-control-file" id="image">
                            @isset($tournament['afiche_url'])
                                <p><b><i>Archivo cargado: </i></b>{{$tournament['afiche_url']}} </p>
                            @endisset
                            @empty($tournament['afiche_url'])
                                <p><b><i>No existen archivos cargados con antelación.</i></b></p>
                            @endempty
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="reglamento">Agregar Reglamento</label>
                            <input type="file" name="reglamento" class="form-control-file" id="reglamento">
                            @isset($tournament['reglamento_url'])
                                <p><b><i>Archivo cargado: </i></b>{{$tournament['reglamento_url']}} </p>
                            @endisset
                            @empty($tournament['reglamento_url'])
                                <p><b><i>No existen archivos cargados con antelación.</i></b></p>
                            @endempty
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="protocolo">Agregar Protocolo</label>
                            <input type="file" name="protocolo" class="form-control-file" id="protocolo">
                            @isset($tournament['protocolo_url'])
                                <p><b><i>Archivo cargado: </i></b>{{$tournament['protocolo_url']}} </p>
                            @endisset
                            @empty($tournament['protocolo_url'])
                                <p><b><i>No existen archivos cargados con antelación.</i></b></p>
                            @endempty
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="result">Agregar Resultados</label>
                            <input type="file" name="result" class="form-control-file" id="result">
                            @isset($tournament['resultados_url'])
                                <p><b><i>Archivo cargado: </i></b>{{$tournament['resultados_url']}} </p>
                            @endisset
                            @empty($tournament['resultados_url'])
                                <p><b><i>No existen archivos cargados con antelación.</i></b></p>
                            @endempty
                        </div>
                    </div>
                </div>
                <div class="form-group pt-2">
                    <input class="btn btn-success btn-lg float-md-right" type="submit" value="Actualizar">
                </div>
            </form>
            <script>
                CKEDITOR.replace('description');
            </script>
        </div>
    </div>
@endsection
