@extends('admin.layouts.dashboard')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h1 class="m-0 font-weight-bold text-dark">{{$tournament->name}}</h1>
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
                    <div class="col-lg-6 text-container">
                        <div class="row">
                            @isset($tournament['site'])
                            <div class="form-group col-lg-6">
                                <label for="site"><i><b>Lugar</b></i></label>
                                <input  readonly type="text" name="site" class="form-control" id="site" value="{{ old('site',$tournament->site) }}">
                            </div>
                            @endisset
                            @isset($tournament['cost'])
                            <div class="form-group col-lg-6">
                                <label for="cost"><i><b>Costo</b></i></label>
                                <input readonly type="text" name="cost" class="form-control" id="cost"  value="{{ old('cost',$tournament->cost) }}">
                            </div>
                            @endisset
                            @isset($tournament['date'])
                            <div class="form-group col-lg-6">
                                <label for="date"><i><b>Fecha de inicio</b></i></label>
                                <input readonly type="date" name="date" class="form-control" id="date"  value="{{ old('date',$tournament->date) }}">
                            </div>
                            @endisset
                            @isset($tournament['state'])
                            <div class="form-group col-lg-6">
                                <label for="state"><i><b>Estado del torneo</b></i></label>
                                <input readonly type="text" name="state" class="form-control" id="state"  value="{{ old('state',$tournament->state) }}">
                            </div>
                            @endisset
                            @isset($tournament['address'])
                            <div class="form-group col-lg-12">
                                <label for="address"><i><b>Dirección</b></i></label>
                                <input readonly type="text" name="address" class="form-control" id="address"  value="{{ old('address',$tournament->address) }}">
                            </div>
                            @endisset
                            @isset($tournament['type_of_tournament'])
                                <div class="form-group col-lg-6">
                                    <label for="type"><i><b>Tipo de torneo</b></i></label>
                                    <input readonly type="text" name="state" class="form-control" id="state"  value="{{ old('type',$tournament->type_of_tournament) }}">
                                </div>
                            @endisset
                        </div>
                        <hr>
                        @isset($tournament['description'])
                        <div class="form-group">
                            <label for="date"><i><b>Descripción</b></i></label>
                            <div class="container">
                                <p>{!!$tournament['description']!!}</p>
                            </div>
                        </div>
                        @endisset
                        <div class="mb-0 font-weight-bold text-gray-800 ul"><i><b>Documentos del torneo:</b></i>
                            @isset($tournament['reglamento_url'])
                                <li><a target="_blank" href="{{asset('storage/pdfs/tournaments_pdf/'.$tournament['reglamento_url'])}}">Reglamento</a></li>
                            @endisset
                            @isset($tournament['protocolo_url'])
                                <li><a target="_blank" href="{{asset('storage/pdfs/tournaments_pdf/'.$tournament['protocolo_url'])}}">Protocolo</a></li>
                            @endisset
                            @isset($tournament['resultados_url'])
                                <li><a target="_blank" href="{{asset('storage/pdfs/tournaments_pdf/'.$tournament['resultados_url'])}}">Resultados</a></li>
                            @endisset
                        </div>
                    </div>
                    <div class="col-lg-6">
                        @isset($tournament['afiche_url'])
                        <div class="text-center">
                            <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                                 src="{{asset('storage/images/tournaments_images/'.$tournament['afiche_url']) }}" alt="{{$tournament['afiche_url']}}">
                        </div>
                        @endisset
                        <br>
                            @can('haveaccess','tournaments.edit')
                        <div class="text-center">
                            <a href="/tournaments/{{$tournament['id']}}/edit" class="btn btn-primary"><i class="fa fa-edit"></i> Editar Torneo</a>
                        </div>
                            @endcan
                        <br>
                    </div>

                </div>
                <hr>

                <div class="text-center">
                    <hr>
                    <h2 for="reglamento">Información de los participantes inscritos</h2>
                </div>
                <hr>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Comprobante de pago</th>
                            <th>Nombre del equipo</th>
                            <th>Provincia</th>
                            <th>Descripción</th>
                            <th>Participantes</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($groups as $group)
                            <tr>
                                @if(in_array("$group->id", $tournament_groups))
                                    <td><img src="{{asset('storage/images/tournaments_comprobante/'.$group['comprobante_url']) }}" alt="{{$group['comprobante_url']}}" width="100"></td>
                                    <td>{{$group['name']}}</td>
                                    <td>
                                        @foreach($provinces as $province)
                                            @if($province['id']==$group['province_id'])
                                                {{$province['title']}}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>{{$group['descripcionM']}}</td>
                                    <td>
                                        <ul>
                                            @foreach($participants as $participant)
                                                @if($participant->group_id == $group->id)

                                                    <li>
                                                        <label for="text">{{ $participant->name }} {{ $participant->las_name }}</label>
                                                    </li>

                                                @endif
                                            @endforeach
                                        </ul>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>



            </form>
        </div>
    </div>
@endsection
