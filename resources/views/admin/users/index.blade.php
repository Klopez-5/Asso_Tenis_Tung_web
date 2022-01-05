@extends('admin.layouts.dashboard')
@section('content')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">

            <div class="row py-lg-2">
                <div class="col-md-6">
                    <h2 class="m-0 font-weight-bold text-dark">Usuarios</h2>
                </div>
                <div class="col-md-6">
                    <a href="/users/create" class="btn btn-success btn-lg float-md-right" role="button" aria-pressed="true">
                        Agregar Deportista
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Cédula</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Telefono</th>
                        <th>Edad</th>
                        <th>Club</th>
                        <th>Categoria</th>
                        <th>Nivel</th>
                        <th>Rol</th>
                        <th>Representante</th>
                        <th>Operaciones</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Foto</th>
                        <th>Cédula</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Telefono</th>
                        <th>Edad</th>
                        <th>Club</th>
                        <th>Categoria</th>
                        <th>Nivel</th>
                        <th>Rol</th>
                        <th>Representante</th>
                        <th>Operaciones</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td><img src="{{asset('storage/images/users_images/'.$user['image_url']) }}" alt="{{$user['image_url']}}" width="100"></td>
                            <td>{{$user['card_id']}}</td>
                            <td>{{$user['last_name']}} {{$user['name']}}</td>
                            <td>{{$user['email']}}</td>
                            <td>{{$user['phone']}}</td>
                            <td>{{$user['age']}}</td>
                            <td>
                                @foreach($clubs as $club)
                                @if($user['club_id']==$club['id'])
                                    {{$club['name']}}
                                @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach($categories as $category)
                                    @if($user['category_id']==$category['id'])
                                        {{$category['title']}}
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach($levels as $level)
                                    @if($user['level_id']==$level['id'])
                                        {{$level['title']}}
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @isset($user->roles[0]->name)
                                    {{$user->roles[0]->name}}
                                @endisset
                            </td>
                            <td>
                                @foreach($represents as $repre)
                                    @if($user['represented_id']==$repre['id'])
                                        {{$repre['name']}} {{$repre['last_name']}}
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                <a href="/users/{{ $user['id'] }}"><i class="fa fa-eye"></i></a>
                                <a href="/users/{{$user['id']}}/edit"><i class="fa fa-edit"></i></a>
                                <a  href="#" data-toggle="modal" data-target="#deleteModal" data-userid="{{$user['id']}}">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
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
                <div class="modal-body">¿Desea eliminar este registro?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <form method="POST" action="/users/{{$user['id']}}">
                        @method('DELETE')
                        @csrf
                        <input type="hidden" id="user_id" name="user_id" value="">
                        <a class="btn btn-danger" onclick="$(this).closest('form').submit();">Eliminar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js_post_page')
    <script>
        $('#deleteModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var user_id = button.data('userid')

            var modal = $(this)
            modal.find('.modal-footer #user_id').val(user_id);
            //modal.find('form').attr('action','/posts/' + post_id);
        })
    </script>
@endsection
