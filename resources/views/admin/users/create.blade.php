@extends('admin.layouts.dashboard')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h1 class="m-0 font-weight-bold text-dark">Ingresar nuevo usuario</h1>
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

            <form method="POST" action="/users" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="card_id">Cédula</label>
                            <input type="text" name="card_id" class="form-control" id="card_id" placeholder="Cédula..." value="{{ old('card_id') }}">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Nombre..." value="{{ old('name') }}">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="last_name">Apellido</label>
                            <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Apellido..." value="{{ old('last_name') }}">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Contaseña..." value="{{ old('password') }}">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Email..." value="{{ old('email') }}">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="phone">Telefono</label>
                            <input type="text" name="phone" class="form-control" id="phone" placeholder="Telefono..." value="{{ old('phone') }}">
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="form-group">
                            <label for="address">Dirección</label>
                            <input type="text" name="address" class="form-control" id="address" placeholder="Dirección..." value="{{ old('address') }}">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="date_of_birth">Fecha de Nacimiento</label>
                            <input type="date" name="date_of_birth" class="form-control" id="date_of_birth" placeholder="Fecha de nacimiento..." value="{{ old('date_of_birth') }}">
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="form-group">
                            <label for="image">Seleccionar Imagen</label>
                            <input type="file" name="image" class="form-control-file" id="image">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="rol_id">Rol</label>
                                <select class="form-control" name="rol_id" id="rol_id" onChange="mostrar(this.value);">
                                    <option value="">-- Seleccionar Rol --</option>
                                    @foreach($roles as $rol)
                                        <option value="{{$rol->id}}">{{$rol->name}}</option>
                                    @endforeach
                                </select>
                        </div>
                    </div>

                    <div class="container-fluid" id="deportista" style="display: none; background: #f8f9fc; box-shadow: 2px 1px 2px 0.5px #bfbfbf; border: solid #ffffff 1px;" >
                        <br>
                        <h5 class="m-0 font-weight-bold text-dark">Datos del Deportista</h5>
                        <hr>
                        <div class="row">
                            <div class="col-lg-4" >
                                <div class="form-group">
                                    <label for="club_id">Club</label>
                                    <select class="form-control" name="club_id" id="club_id">
                                        <option value="">-- Seleccionar club --</option>
                                        @foreach($clubs as $club)
                                            <option value="{{$club->id}}">{{$club->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="level_id">Nivel del deportista</label>
                                    <select class="form-control" name="level_id" id="level_id">
                                        <option value="">-- Seleccionar Nivel --</option>
                                        @foreach($levels as $level)
                                            <option value="{{$level->id}}">{{$level->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="category_id">Categoria del deportista</label>
                                    <select class="form-control" name="category_id" id="category_id">
                                        <option value="">-- Seleccionar Categoria --</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>

                    <div class="container-fluid" id="representante" style="display: none; background: #f8f9fc; box-shadow: 2px 1px 2px 0.5px #bfbfbf; border: solid #ffffff 1px;" >
                        <br>
                        <h5 class="m-0 font-weight-bold text-dark">Datos del Representado</h5>
                        <hr>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="relation_id">Parentesco</label>
                                    <select class="form-control" name="relation_id" id="relation_id">
                                        <option value="">-- Seleccionar parentesco --</option>
                                        @foreach($relations as $relation)
                                            <option value="{{$relation->id}}">{{$relation->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>
                    <div class="container-fluid" id="entrenador" style="display: none; background: #f8f9fc; box-shadow: 2px 1px 2px 0.5px #bfbfbf; border: solid #ffffff 1px;" >
                        <br>
                        <h5 class="m-0 font-weight-bold text-dark">Datos del Entrenador</h5>
                        <hr>
                        <div class="row">
                            <div class="col-lg-4" >
                                <div class="form-group">
                                    <label for="club_id">Club</label>
                                    <select class="form-control" name="club_id" id="club_id">
                                        <option value="">-- Seleccionar club --</option>
                                        @foreach($clubs as $club)
                                            <option value="{{$club->id}}">{{$club->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>
                    <div class="container-fluid" id="directivo" style="display: none; background: #f8f9fc; box-shadow: 2px 1px 2px 0.5px #bfbfbf; border: solid #ffffff 1px;" >
                        <br>
                        <h5 class="m-0 font-weight-bold text-dark">Datos del Directivo</h5>
                        <hr>
                        <div class="row">
                            <div class="col-lg-4" >
                                <div class="form-group">
                                    <label for="club_id">Club</label>
                                    <select class="form-control" name="club_id" id="club_id">
                                        <option value="">-- Seleccionar club --</option>
                                        @foreach($clubs as $club)
                                            <option value="{{$club->id}}">{{$club->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>
                    <br>
                </div>
                <br>
                <div class="form-group pt-2">
                    <input class="btn btn-success btn-lg float-md-right" type="submit" value="Guardar">
                </div>
            </form>
            <script type="text/javascript" src="js/jquery.js"></script>
            <script type="text/javascript">
                function mostrar(id) {
                    if (id == "1") {
                        $("#deportista").hide();
                        $("#representante").hide();
                        $("#entrenador").hide();
                        $("#directivo").hide();
                    }

                    if (id == "2") {
                        $("#deportista").show();
                        $("#representante").hide();
                        $("#entrenador").hide();
                        $("#directivo").hide();
                    }

                    if (id == "3") {
                        $("#deportista").hide();
                        $("#representante").hide();
                        $("#entrenador").show();
                        $("#directivo").hide();
                    }

                    if (id == "4") {
                        $("#deportista").hide();
                        $("#representante").show();
                        $("#entrenador").hide();
                        $("#directivo").hide();
                    }

                    if (id == "5") {
                        $("#deportista").hide();
                        $("#representante").hide();
                        $("#entrenador").hide();
                        $("#directivo").show();
                    }
                }
            </script>
        </div>
    </div>


@endsection
