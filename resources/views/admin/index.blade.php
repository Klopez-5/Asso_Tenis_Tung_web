@extends('admin.layouts.dashboard')
@section('content')

        @can('haveaccess','dashboard.index')
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Panel de Control</h1>

        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Usuarios Registrados</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$countUsers}}</div>
                                <br>
                                <a href="/users/create" class="btn btn-success btn-sm" role="button" aria-pressed="true">
                                    Agregar Usuario
                                </a>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user-circle fa-4x text-gray-600"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    Clubs Registrados</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$countClubs}}</div>
                                <br>
                                <a href="/clubs/create" class="btn btn-info btn-sm" role="button" aria-pressed="true">
                                    Agregar Club
                                </a>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-id-card fa-4x text-gray-600"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Torneos registrados</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$countTourn}}</div>
                                <br>
                                <a href="/tournaments/create" class="btn btn-warning btn-sm" role="button" aria-pressed="true">
                                    Agregar Torneo
                                </a>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-4x text-gray-600"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
            <hr>
        @endcan
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Torneos</h1>
        </div>
        <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            @foreach($tournaments as $tournament)
                <div class="col-xl-6 col-md-8 mb-6">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="h5 mb-0 font-weight-bold text-info text-uppercase mb-1">
                                        {{$tournament['name']}}</div>
                                </div>
                                <div class="col-auto">
                                    <div class="contente-galery-2">
                                        <img class="card-galery-2" src="{{asset('storage/images/tournaments_images/'.$tournament['afiche_url']) }}" alt="{{$tournament['afiche_url']}}">
                                    </div>
                                </div>
                                <div class="col mr-2">
                                    <div class="mb-0 font-weight-bold text-gray-800"><i><b>Lugar:</b></i> {{$tournament['site']}}</div>
                                    <div class="mb-0 font-weight-bold text-gray-800"><i><b>Dirección:</b></i> {{$tournament['address']}}</div>
                                    <div class="mb-0 font-weight-bold text-gray-800"><i><b>Costo:</b></i> {{$tournament['cost']}}</div>
                                    <div class="mb-0 font-weight-bold text-gray-800"><i><b>Fecha:</b></i>  {{$tournament['date']}}</div>
                                    <div class="mb-0 font-weight-bold text-gray-800"><i><b>Estado:</b></i>  {{$tournament['state']}}</div>
                                    <div class="mb-0 font-weight-bold text-gray-800"><i><b>Tipo de torneo:</b></i>  {{$tournament['type_of_tournament']}}</div>
                                    <hr>
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
                                    <hr>
                                    <div class="row">
                                        <div class="col-xl-6 contente-galery-2">
                                            <a href="/tournaments/{{$tournament['id']}}" class="btn btn-info btn-sm" role="button" aria-pressed="true">Mas información</a>
                                        </div>
                                        <div class="col-xl-6 contente-galery-2">
                                            <a href="/tournaments/{{$tournament['id']}}/form" class="btn btn-success btn-sm" role="button" aria-pressed="true">Inscribirse</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        <hr>
        <div class="contente-galery-2">
            <a href="/tournaments" class="btn btn-info btn-sm" role="button" aria-pressed="true">Ver todos los torneos</a>
        </div>
        <hr>
        @isset($achievements)
            <div class="row">
                <div class="col-xl-12 col-md-12 mb-12 ">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">

                                <div class="h5 mb-0 font-weight-bold text-warning text-uppercase mb-1">
                                    Logros de nuestros deportistas Asociados</div>

                                <div class="card-body">
                                    <table class="table table-striped table-bordered shadow-lg" width="100%" cellspacing="4">
                                        <thead>
                                        <tr>
                                            <th>Deportista</th>
                                            <th>Título</th>
                                            <th>Descripción</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($achievements as $achievement)
                                            <tr>
                                                <td>
                                                    <a title="Ver perfil" href="/users/{{ $achievement->user_id }}">
                                                        <img src="{{asset('storage/images/users_images/'.$achievement->user['image_url']) }}"  width="100">

                                                    </a>
                                                </td>
                                                <td>{{$achievement['name']}}</td>
                                                <td>{{$achievement['description']}}</td>
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
        @endisset
        <br>

@endsection
