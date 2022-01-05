@extends('admin.layouts.dashboard')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h1 class="m-0 font-weight-bold text-dark">Agregar un nuevo rol</h1>
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

            <form method="POST" action="/roles" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="name">Rol</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Rol..." value="{{ old('name') }}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <input type="text" name="slug" class="form-control" id="slug" placeholder="Slug..." value="{{ old('slug') }}">
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="form-group">
                            <label for="description">Descripción</label>
                            <input type="text" name="description" class="form-control" id="description" placeholder="Descripción..." value="{{ old('description ')}}">
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="full_access">Acceso Total</label><br>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="fullaccessyes" name="full_access"
                                       class="custom-control-input" value="yes" onChange="mostrar(this.value);"
                                       @if (old('full_access')=="yes")
                                       checked
                                        @endif
                                       @if (old('full_access')===null)
                                       checked
                                    @endif
                                >
                                <label class="custom-control-label" for="fullaccessyes">Si</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="fullaccessno" name="full_access"
                                       class="custom-control-input" value="no" onChange="mostrar(this.value);"
                                       @if (old('full_access')=="no")
                                       checked
                                       @endif
                                >
                                <label class="custom-control-label" for="fullaccessno">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="container-fluid" id="permisos" style="display: none; background: #f8f9fc; box-shadow: 2px 1px 2px 0.5px #bfbfbf; border: solid #ffffff 1px;" >
                        <br>
                        <h5 class="m-0 font-weight-bold text-dark">Listado de permisos</h5>
                        <hr>
                        <div class="row">
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
                        <br>
                    </div>
                </div>

                <div class="form-group pt-2">
                    <input class="btn btn-success btn-lg float-md-right" type="submit" value="Guardar">
                </div>
            </form>
                <script type="text/javascript" src="js/jquery.js"></script>
                <script type="text/javascript">
                    function mostrar(id) {
                        if (id == "no") {
                            $("#permisos").show();
                        }
                        if (id == "yes") {
                            $("#permisos").hide();
                        }
                    }
                </script>
        </div>
    </div>


@endsection
