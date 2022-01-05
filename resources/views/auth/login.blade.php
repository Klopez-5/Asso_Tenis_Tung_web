<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Iniciar Sesión</title>
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
    <link rel="stylesheet" href="css/style-login.css" type="text/css" media="all" />
    <!--//Style-CSS -->
</head>

<body>
<!-- /login-section -->

<section class="w3l-forms-23">
    <div class="forms23-block-hny">
        <div class="wrapper">
            <h1>Asociación de Tenis de Tungurahua</h1>
            <div class="d-grid forms23-grids">
                <div class="form23">
                    <div class="main-bg">
                        <h6 class="sec-one">Iniciar Sesión</h6>
                        <div class="speci-login first-look">
                            <img src="images/login/user.png" alt="" class="img-responsive">
                        </div>
                    </div>

                    <div class="bottom-content">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <input
                                id="email"
                                type="email"
                                class="input-form form-control @error('email') is-invalid @enderror"
                                name="email"
                                value="{{ old('email') }}"
                                placeholder="Email"
                                required autocomplete="email" autofocus/>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            <input
                                id="password"
                                type="password"
                                class="input-form form-control @error('password') is-invalid @enderror"
                                name="password"
                                placeholder="Contraseña"
                                required autocomplete="current-password"/>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror


                            <button type="submit" class="loginhny-btn btn">{{ __('Ingresar') }}</button>
                        </form>
                        <p>¿No tienes cuenta? <a href="{{url('/registro/create')}}">Registrate!</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('sweetalert::alert')
</body>
</html>
