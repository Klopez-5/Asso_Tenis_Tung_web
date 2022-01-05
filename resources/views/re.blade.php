<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ __('Registro') }}</title>

    <!-- Scripts
    <script src="{{ asset('js/app.js') }}" defer></script> -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="register-content/images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="register-content/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="register-content/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="register-content/fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="register-content/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="register-content/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="register-content/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="register-content/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="register-content/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="register-content/vendor/noui/nouislider.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="register-content/css/util.css">
    <link rel="stylesheet" type="text/css" href="register-content/css/main.css">
    <!--===============================================================================================-->
</head>
<body>

<div class="container-contact100">
    <div class="wrap-contact100">
        <form method="POST" class="contact100-form validate-form" action="{{ route('register') }}">
            @csrf
				<span class="contact100-form-title">
					Formulario de registro
				</span>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="wrap-input100 validate-input bg1" data-validate="Debe ingresar su cédula">
                            <span class="label-input100">Cédula *</span>
                            <input
                                id="car_id"
                                class="input100 form-control @error('car_id') is-invalid @enderror"
                                type="number"
                                name="car_id"
                                placeholder="Ingresar cédula..."
                                value="{{ old('car_id') }}"
                                required autocomplete="car_id"
                                autofocus>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="wrap-input100 validate-input bg1" data-validate="Debe ingresar sus nombres">
                            <span class="label-input100">Nombres *</span>
                            <input
                                id="name"
                                class="input100 form-control @error('name') is-invalid @enderror"
                                type="text"
                                name="name"
                                placeholder="Ingresar nombres..."
                                value="{{ old('name') }}"
                                required autocomplete="name"
                                autofocus>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="wrap-input100 validate-input bg1" data-validate="Debe ingresar sus apellidos">
                            <span class="label-input100">Apellidos *</span>
                            <input
                                id="last_name"
                                class="input100 form-control @error('last_name') is-invalid @enderror"
                                type="text"
                                name="last_name"
                                placeholder="Ingresar apellidos..."
                                value="{{ old('last_name') }}"
                                required autocomplete="last_name"
                                autofocus>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="wrap-input100 validate-input bg1" data-validate="Debe ingresar su email">
                            <span class="label-input100">Email *</span>
                            <input
                                id="email"
                                class="input100 form-control @error('email') is-invalid @enderror"
                                type="text"
                                name="email"
                                placeholder="Ingresar email..."
                                value="{{ old('email') }}"
                                required autocomplete="email"
                                autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="wrap-input100 validate-input bg1" data-validate="Debe ingresar su telefono">
                            <span class="label-input100">Telefono *</span>
                            <input
                                id="phone"
                                class="input100 form-control @error('phone') is-invalid @enderror"
                                type="number"
                                name="phone"
                                placeholder="Ingresar telefono..."
                                value="{{ old('phone') }}"
                                required autocomplete="phone"
                                autofocus>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="wrap-input100 validate-input bg1" data-validate="Debe ingresar su contraseña">
                            <span class="label-input100">Contraseña *</span>
                            <input
                                id="password"
                                type="password"
                                class="input100 form-control @error('password') is-invalid @enderror"
                                name="password"
                                placeholder="Ingresar contraseña..."
                                required autocomplete="new-password">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="wrap-input100 validate-input bg1" data-validate="Debe confirmar su contraseña">
                            <span class="label-input100">Confirmar contraseña *</span>
                            <input
                                id="password-confirm"
                                type="password"
                                class="input100 form-control"
                                name="password_confirmation"
                                placeholder="Confirmar contraseña..."
                                required autocomplete="new-password">
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="wrap-input100 validate-input bg1" data-validate="Debe ingresar su contraseña">
                            <span class="label-input100">Contraseña *</span>
                            <select id="club_id" name="club_id" class="input100 form-control @error('club_id') is-invalid @enderror">

                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="wrap-input100 validate-input bg1" data-validate="Debe confirmar su contraseña">
                            <span class="label-input100">Confirmar contraseña *</span>
                            <input
                                id="password-confirm"
                                type="password"
                                class="input100 form-control"
                                name="password_confirmation"
                                placeholder="Confirmar contraseña..."
                                required autocomplete="new-password">
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="wrap-input100 validate-input bg1" data-validate="Debe ingresar su fecha de nacimiento">
                            <span class="label-input100">Fecha de nacimiento *</span>
                            <input
                                id="date_of_birth"
                                class="input100 form-control @error('date_of_birth') is-invalid @enderror"
                                type="date"
                                name="date_of_birth"
                                placeholder="Ingresar fecha de nacimiento..."
                                value="{{ old('date_of_birth') }}"
                                required autocomplete="date_of_birth"
                                autofocus>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="wrap-input100 validate-input bg1" data-validate="Debe ingresar su edad">
                            <span class="label-input100">Edad *</span>
                            <input
                                id="age"
                                type="number"
                                class="input100 form-control"
                                name="age"
                                placeholder="Ingresar edad..."
                                required autocomplete="age">
                        </div>
                    </div>
                </div>
            </div>


            <div class="wrap-input100 bg1 rs1-wrap-input100">
                <span class="label-input100">Phone</span>
                <input class="input100" type="text" name="phone" placeholder="Enter Number Phone">
            </div>

            <div class="">
                <span class="label-input100">Needed Services *</span>
                <div>
                    <select class="js-select2" name="service">
                        <option>Please chooses</option>
                        <option>eCommerce Bussiness</option>
                        <option>UI/UX Design</option>
                        <option>Online Services</option>
                    </select>
                    <div class="dropDownSelect2"></div>
                </div>
            </div>

            <div class="dis-none js-show-service">
                <div class="wrap-contact100-form-radio">
                    <span class="label-input100">What type of products do you sell?</span>

                    <div class="contact100-form-radio m-t-15">
                        <input class="input-radio100" id="radio1" type="radio" name="type-product" value="physical" checked="checked">
                        <label class="label-radio100" for="radio1">
                            Phycical Products
                        </label>
                    </div>

                    <div class="contact100-form-radio">
                        <input class="input-radio100" id="radio2" type="radio" name="type-product" value="digital">
                        <label class="label-radio100" for="radio2">
                            Digital Products
                        </label>
                    </div>
                </div>
            </div>

            <div class="wrap-input100 validate-input bg0 rs1-alert-validate" data-validate = "Please Type Your Message">
                <span class="label-input100">Message</span>
                <textarea class="input100" name="message" placeholder="Your message here..."></textarea>
            </div>

            <div class="container-contact100-form-btn">
                <button class="contact100-form-btn">
						<span>
							Submit
							<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
						</span>
                </button>
            </div>
        </form>
    </div>
</div>



<!--===============================================================================================-->
<script src="register-content/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="register-content/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="register-content/vendor/bootstrap/js/popper.js"></script>
<script src="register-content/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="register-content/vendor/select2/select2.min.js"></script>
<script>
    $(".js-select2").each(function(){
        $(this).select2({
            dropdownParent: $(this).next('.dropDownSelect2')
        });


        $(".js-select2").each(function(){
            $(this).on('select2:close', function (e){
                if($(this).val() == "Please chooses") {
                    $('.js-show-service').slideUp();
                }
                else {
                    $('.js-show-service').slideUp();
                    $('.js-show-service').slideDown();
                }
            });
        });
    })
</script>
<!--===============================================================================================-->
<script src="register-content/vendor/daterangepicker/moment.min.js"></script>
<script src="register-content/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="register-content/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="register-content/vendor/noui/nouislider.min.js"></script>
<script>
    var filterBar = document.getElementById('filter-bar');

    noUiSlider.create(filterBar, {
        start: [ 1500, 3900 ],
        connect: true,
        range: {
            'min': 1500,
            'max': 7500
        }
    });

    var skipValues = [
        document.getElementById('value-lower'),
        document.getElementById('value-upper')
    ];

    filterBar.noUiSlider.on('update', function( values, handle ) {
        skipValues[handle].innerHTML = Math.round(values[handle]);
        $('.contact100-form-range-value input[name="from-value"]').val($('#value-lower').html());
        $('.contact100-form-range-value input[name="to-value"]').val($('#value-upper').html());
    });
</script>
<!--===============================================================================================-->
<script src="/js/main.js"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-23581568-13');
</script>

</body>
</html>
