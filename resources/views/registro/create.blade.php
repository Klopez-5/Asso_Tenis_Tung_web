<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Registro</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon  -->
    <link rel="icon" href="/images/home/logo_att.jpeg">
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- //Meta tag Keywords -->
    <!--/Style-CSS -->
    <link href="/css/home/bootstrap.css" rel="stylesheet">
    <link href="/css/home/styles.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/style-login.css" type="text/css" media="all" />
    <!--//Style-CSS -->
</head>

<body>
<!-- /login-section -->

<section class="w3l-forms-23">
    <div class="forms23-block-hny">
        <div class="wrapper">
            <div class="d-grid forms23-grids">
                <div class="form23">
                    <div class="main-bg">
                        <h6 class="sec-one">Registrarse</h6>
                        <div class="speci-login first-look">
                            <img src="/images/login/user.png" alt="" class="img-responsive">
                        </div>
                    </div>

                    <div class="bottom-content">
                        <form method="POST" action="/registro" enctype="multipart/form-data" >
                            {{ csrf_field() }}
                            <h5 class="m-0 font-weight-bold text-dark">Datos del Deportista</h5>
                            <hr>
                            <div class="content row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="text-lg-left" for="name">  <b>Nombres</b></label>
                                        <input
                                            id="name"
                                            type="text"
                                            class="input-form form-control @error('name') is-invalid @enderror"
                                            name="name"
                                            value="{{ old('name') }}"
                                            required autocomplete="name" autofocus/>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="text-lg-left" for="last_name"><b>Apellidos</b></label>
                                        <input
                                            id="last_name"
                                            type="text"
                                            class="input-form form-control @error('last_name') is-invalid @enderror"
                                            name="last_name"
                                            value="{{ old('last_name') }}"
                                            required autocomplete="last_name" autofocus/>
                                        @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="text-lg-left" for="card_id"><b>Cédula</b></label>
                                        <input
                                            id="card_id"
                                            type="number"
                                            class="input-form form-control @error('card_id') is-invalid @enderror"
                                            name="card_id"
                                            value="{{ old('card_id') }}"
                                            required autocomplete="card_id" autofocus/>
                                        @error('card_id')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="text-lg-left" for="email"><b>Email</b></label>
                                        <input
                                            id="email"
                                            type="email"
                                            class="input-form form-control @error('email') is-invalid @enderror"
                                            name="email"
                                            value="{{ old('email') }}"
                                            required autocomplete="email" autofocus/>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="text-lg-left" for="password"><b>Contraseña</b></label>
                                        <input
                                            id="password"
                                            type="password"
                                            class="input-form form-control @error('password') is-invalid @enderror"
                                            name="password"
                                            value="{{ old('password') }}"
                                            required autocomplete="password" autofocus/>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="text-lg-left" for="password_confirmation"><b>Confirmar contraseña</b></label>
                                        <input
                                            id="password_confirmation"
                                            type="password"
                                            class="input-form form-control @error('password_confirmation') is-invalid @enderror"
                                            name="password_confirmation"
                                            value="{{ old('password_confirmation') }}"
                                            required autocomplete="password_confirmation" autofocus/>
                                        @error('password_confirmation')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="text-lg-left" for="phone"><b>Celular</b></label>
                                        <input
                                            id="phone"
                                            type="number"
                                            class="input-form form-control @error('phone') is-invalid @enderror"
                                            name="phone"
                                            value="{{ old('phone') }}"
                                            required autocomplete="phone" autofocus/>
                                        @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <script type="text/javascript">
                                    function Edad(FechaNacimiento) {
                                        var fechaNace = new Date(FechaNacimiento);
                                        var fechaActual = new Date()

                                        var mes = fechaActual.getMonth();
                                        var dia = fechaActual.getDate();
                                        var año = fechaActual.getFullYear();

                                        fechaActual.setDate(dia);
                                        fechaActual.setMonth(mes);
                                        fechaActual.setFullYear(año);

                                        edad = Math.floor(((fechaActual - fechaNace) / (1000 * 60 * 60 * 24) / 365));

                                        if (edad <= "17") {
                                            $("#representante").show();
                                        }
                                        if (edad > "17") {
                                            $("#representante").hide();
                                        }
                                    }
                                </script>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="date_of_birth"><b>Fecha de Nacimiento</b></label>
                                        <input type="date" name="date_of_birth" class="form-control" id="date_of_birth" value="{{ old('date_of_birth') }}" onChange="Edad(this.value);">
                                    </div>
                                </div>
                                <div class="col-sm-2"></div>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label class="text-lg-left" for="address"><b>Provincia de residencia </b></label>
                                        <select class="form-control" name="province_id" id="province_id">
                                            <option value="">-- Seleccionar --</option>
                                            @foreach($provinces as $province)
                                                <option value="{{$province->id}}">{{$province->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="text-lg-left" for="address"><b>Dirección</b></label>
                                        <input
                                            id="address"
                                            type="text"
                                            class="input-form form-control @error('address') is-invalid @enderror"
                                            name="address"
                                            value="{{ old('address') }}"
                                            required autocomplete="address" autofocus/>
                                        @error('address')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group0">
                                        <div class="form-group">
                                            <label for="image"><b>Seleccionar Imagen</b></label>
                                            <input type="file" name="image" class="form-control-file" id="image">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="club_id"><b>Club</b></label>
                                        <select class="form-control" name="club_id" id="club_id">
                                            <option value="">-- Seleccionar --</option>
                                            @foreach($clubs as $club)
                                                <option value="{{$club->id}}">{{$club->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="level_id"><b>Nivel deportivo</b></label>
                                        <select class="form-control" name="level_id" id="level_id">
                                            <option value="">-- Seleccionar --</option>
                                            @foreach($levels as $level)
                                                <option value="{{$level->id}}">{{$level->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div  id="representante" style="display: none;" >
                                <h5 class="m-0 font-weight-bold text-dark">Datos del Representante</h5>
                                <hr>
                                <div class="justify-content-center row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="text-lg-left" for="name2">  <b>Nombres</b></label>
                                            <input
                                                id="name2"
                                                type="text"
                                                class="input-form form-control @error('name2') is-invalid @enderror"
                                                name="name2"
                                                value="{{ old('name2') }}"
                                                autocomplete="name2" autofocus/>
                                            @error('name2')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="text-lg-left" for="last_name2"><b>Apellidos</b></label>
                                            <input
                                                id="last_name2"
                                                type="text"
                                                class="input-form form-control @error('last_name2') is-invalid @enderror"
                                                name="last_name2"
                                                value="{{ old('last_name2') }}"
                                                autocomplete="last_name2" autofocus/>
                                            @error('last_name2')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="text-lg-left" for="card_id2"><b>Cédula</b></label>
                                            <input
                                                id="card_id2"
                                                type="number"
                                                class="input-form form-control @error('card_id2') is-invalid @enderror"
                                                name="card_id2"
                                                value="{{ old('card_id2') }}"
                                                autocomplete="card_id2" autofocus/>
                                            @error('card_id2')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="text-lg-left" for="email2"><b>Email</b></label>
                                            <input
                                                id="email2"
                                                type="email"
                                                class="input-form form-control @error('email2') is-invalid @enderror"
                                                name="email2"
                                                value="{{ old('email2') }}"
                                                autocomplete="email2" autofocus/>
                                            @error('email2')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="text-lg-left" for="address2"><b>Dirección</b></label>
                                            <input
                                                id="address2"
                                                type="text"
                                                class="input-form form-control @error('address2') is-invalid @enderror"
                                                name="address2"
                                                value="{{ old('address2') }}"
                                                autocomplete="address2" autofocus/>
                                            @error('address2')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="text-lg-left" for="phone2"><b>Celular</b></label>
                                            <input
                                                id="phone2"
                                                type="number"
                                                class="input-form form-control @error('phone2') is-invalid @enderror"
                                                name="phone2"
                                                value="{{ old('phone2') }}"
                                                autocomplete="phone2" autofocus/>
                                            @error('phone2')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="text-lg-left" for="date_of_birth2"><b>Fecha de Nacimiento</b></label>
                                            <input
                                                id="date_of_birth2"
                                                type="date"
                                                class="input-form form-control @error('date_of_birth2') is-invalid @enderror"
                                                name="date_of_birth2"
                                                value="{{ old('date_of_birth2') }}"
                                                autocomplete="date_of_birth2" autofocus/>
                                            @error('date_of_birth2')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <label for="relation_id"><b>Parentesco</b></label>
                                            <select class="form-control" name="relation_id" id="relation_id">
                                                <option value="">-- Seleccionar --</option>
                                                @foreach($relations as $relation)
                                                    <option value="{{$relation->id}}">{{$relation->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-2"></div>
                                </div>
                            </div>
                            <div class="form-group pt-2">
                                <button type="submit" class="loginhny-btn btn">{{ __('Registrarse') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="/js/home/jquery.min.js"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
<script src="/js/home/popper.min.js"></script> <!-- Popper tooltip library for Bootstrap -->
<script src="/js/home/bootstrap.min.js"></script> <!-- Bootstrap framework -->
<script src="/js/home/jquery.easing.min.js"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
<script src="/js/home/swiper.min.js"></script> <!-- Swiper for image and text sliders -->
<script src="/js/home/jquery.magnific-popup.js"></script> <!-- Magnific Popup for lightboxes -->
<script src="/js/home/validator.min.js"></script> <!-- Validator.js - Bootstrap plugin that validates forms -->
<script src="/js/home/scripts.js"></script> <!-- Custom scripts -->
@include('sweetalert::alert')
</body>
</html>


