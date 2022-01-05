@extends('admin.layouts.dashboard')
@section('content')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">

            <div class="row py-lg-2">
                <div class="col-md-6">
                    <h2 class="m-0 font-weight-bold text-dark"> Mis Logros</h2>
                </div>
                <div class="col-md-6">
                    <a href="/achievements/create" class="btn btn-warning btn-lg float-md-right" role="button" aria-pressed="true">
                        Agregar logro
                    </a>
                </div>
            </div>
        </div>

        <div class="card-body">

            @can('haveaccess','achievementsown.show')
                <div  >
                    <hr>
                    <p class="text-center"> Ingrese sus logros para recibir reconocimientos y premios a su constancia, empeño y trabajo. </p>
                    <hr>
                    <div class="row">
                        <!-- Pending Requests Card Example -->
                        @foreach($achievementsmy as $achievement)
                            <div class="col-xl-6 col-md-6 mb-6">
                                <div class="card border-left-dark shadow h-100 py-2">
                                    <div class="card-body">
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span title="Eliminar" aria-hidden="true"  data-toggle="modal" data-target="#deleteModal" data-achievementid="{{$achievement['id']}}">×</span>
                                        </button>
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="h5 mb-0 font-weight-bold text-black text-uppercase mb-1">
                                                    <i><b>{{$achievement['name']}}</b></i></div>

                                                <div class=" font-weight-bold text-gray-800">{{$achievement['description']}}</div>
                                                <hr>
                                                <a title="Editar" href="/achievements/{{$achievement['id']}}/edit"><i class="fa fa-edit text-dark"></i></a>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-trophy fa-4x text-warning"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endcan
                <br>
                <br>
            @can('haveaccess','achievement.index')
                    @isset($achievements)
                        <div class="row">
                            <div class="col-xl-12 col-md-12 mb-12 ">
                                <div class="card border-left-warning shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-6">
                                                <div class="h5 mb-0 font-weight-bold text-warning text-uppercase mb-1">
                                                    Logros de nuestros deportistas Asociados</div>
                                            </div>
                                            <div class="col-auto">
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
                        </div>
                    @endisset
                    <br>
            @endcan
        </div>
    </div>
    <!-- Logout Modal-->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">¿Desea eliminar este logro?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    @isset($achievement['id'])
                    <form method="POST" action="/achievements/{{$achievement['id']}}">
                        @method('DELETE')
                        @csrf
                        <input type="hidden" id="achievement_id" name="achievement_id" value="">
                        <a class="btn btn-danger" onclick="$(this).closest('form').submit();">Eliminar</a>
                    </form>
                    @endisset
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="vendor/jquery/jquery.js"></script>

@endsection

@section('js_post_page')
    <script>
        $('#deleteModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var achievement_id = button.data('achievementid')

            var modal = $(this)
            modal.find('.modal-footer #achievement_id').val(achievement_id);
            //modal.find('form').attr('action','/posts/' + post_id);
        })
    </script>
@endsection
