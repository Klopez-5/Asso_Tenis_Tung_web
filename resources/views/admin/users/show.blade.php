@extends('admin.layouts.dashboard')
@section('content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="text-container">
                            <h1>Perfil</h1>
                            <hr>
                            <p><strong>Cédula:</strong> {{$user['card_id']}}</p>
                            <p><strong>Nombre:</strong> {{$user['last_name']}} {{$user['name']}}</p>
                            <p><strong>Email:</strong> {{$user['email']}}</p>
                            <p><strong>Telefono:</strong> {{$user['phone']}}</p>
                            <p><strong>Edad:</strong> {{$user['age']}} años</p>
                            @isset($user['club_id'])
                            <p><strong>Club:</strong>
                                @foreach($clubs as $club)
                                    @if($user['club_id']==$club['id'])
                                        {{$club['name']}}
                                    @endif
                                @endforeach</p>
                            @endisset
                            @isset($user['category_id'])
                            <p><strong>Categoria:</strong>
                                @foreach($categories as $category)
                                    @if($user['category_id']==$category['id'])
                                        {{$category['title']}}
                                    @endif
                                @endforeach</p>
                            @endisset
                            @isset($user['level_id'])
                            <p><strong>Nivel:</strong>
                                @foreach($levels as $level)
                                    @if($user['level_id']==$level['id'])
                                        {{$level['title']}}
                                    @endif
                                @endforeach</p>
                            @endisset
                            @isset($user['_id'])
                                <hr>
                                <p><h4><strong>Datos del representante</strong></h4>
                                @foreach($achievements as $achievement)
                                    <ul>
                                        <li>
                                            <b><i>{{$achievement->name}}</i></b> - {{$achievement->description}}
                                        </li>
                                    </ul>
                                    @endforeach</p>
                                    @endisset
                            @isset($achievements)
                                <hr>
                                <p><h4><strong>Logros</strong></h4>
                                    @foreach($achievements as $achievement)
                                        <ul>
                                            <li>
                                                <b><i>{{$achievement->name}}</i></b> - {{$achievement->description}}
                                            </li>
                                        </ul>
                                    @endforeach</p>
                            @endisset
                        </div> <!-- end of text-container -->
                    </div> <!-- end of col -->
                    <div class="col-lg-6">
                        <div class="text-center">
                            <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                                 src="{{asset('storage/images/users_images/'.$user['image_url']) }}" alt="{{$user['image_url']}}">
                        </div>
                        <br>
                        @can('haveaccess','userown.edit')
                            @if($user['id'] == Auth::user()->id)
                        <div class="text-center">
                            <a href="/users/{{$user['id']}}/edit" class="btn btn-primary"><i class="fa fa-edit"></i> Editar Perfil</a>
                        </div>
                            @endif
                        @endcan
                        <br>
                        <br>
                    </div> <!-- end of col -->
                </div> <!-- end of row -->
            </div> <!-- end of container -->
            <div class="card-footer">
                <a href="{{ url()->previous() }}" class="btn btn-success">Regresar</a>
            </div>
        </div>
    </div>
@endsection
