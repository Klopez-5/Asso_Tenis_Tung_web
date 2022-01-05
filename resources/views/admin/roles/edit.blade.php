@extends('admin.layouts.dashboard')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h1 class="m-0 font-weight-bold text-dark">Editar rol</h1>
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

            <form method="POST" action="/roles/{{$role->id}}" enctype="multipart/form-data">
                @method('PATCH')
                @csrf

                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="name">Rol</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Rol..." value="{{ old('name',$role->name) }}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <input type="text" name="slug" class="form-control" id="slug" placeholder="Slug..." value="{{ old( 'slug',$role->slug) }}">
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="form-group">
                            <label for="description">Descripción</label>
                            <input type="text" name="description" class="form-control" id="description" placeholder="Descripción..." value="{{ old('description',$role->description)}}">
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="full_access">Acceso Total</label><br>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="fullaccessyes" name="full_access" class="custom-control-input" value="yes"
                                       @if ( $role['full_access']=="yes")
                                            checked
                                       @elseif (old('full_access')=="yes")
                                            checked
                                       @endif
                                >
                                <label class="custom-control-label" for="fullaccessyes">Si</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="fullaccessno" name="full_access" class="custom-control-input" value="no"
                                       @if ( $role['full_access']=="no")
                                            checked
                                       @elseif (old('full_access')=="no")
                                            checked
                                        @endif>
                                <label class="custom-control-label" for="fullaccessno">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8">
                        <label for="full_access">Lista de permisos</label><br>
                        @foreach($permissions as $permission)


                            <div class="custom-control custom-checkbox">
                                <input type="checkbox"
                                       class="custom-control-input"
                                       id="permission_{{$permission->id}}"
                                       value="{{$permission->id}}"
                                       name="permission[]"
                                       @if( is_array(old('permission')) && in_array("$permission->id", old('permission'))    )
                                            checked
                                       @elseif( is_array($permission_role) && in_array("$permission->id", $permission_role)    )
                                            checked
                                       @endif
                                >
                                <label class="custom-control-label"
                                       for="permission_{{$permission->id}}">
                                    {{ $permission->id }}
                                    -
                                    {{ $permission->name }}
                                    <em>( {{ $permission->description }} )</em>

                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="form-group pt-2">
                    <input class="btn btn-success btn-lg float-md-right" type="submit" value="Actualizar">
                </div>
            </form>
        </div>
    </div>
@endsection
