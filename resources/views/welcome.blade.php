
@extends('layouts.home-page')

@section('content')
    <!-- Header -->
    <header id="header" class="header">
        <div class="header-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="text-container">
                            <h1>Asociación de Tenis de Tungurahua</h1>
                            <br>
                            <div class="container">
                                <div class="aline-centro-padre">
                                    <div class="aline-centro-hijo">
                                        <a class="btn-solid-reg col-lg-4" href="{{ route('login') }}">{{ __('Ingresar') }}</a>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <!--<a class="btn-solid-lg page-scroll" href="#services">Ingresar</a>-->
                        </div> <!-- end of text-container -->
                    </div> <!-- end of col -->
                    <div class="col-lg-6">
                        <div class="image-container">
                            <img class="img-fluid" src="/images/home/header.png" alt="alternative">
                        </div> <!-- end of image-container -->
                    </div> <!-- end of col -->
                </div> <!-- end of row -->
            </div> <!-- end of container -->
        </div> <!-- end of header-content -->
    </header> <!-- end of header -->
    <!-- end of header -->
@endsection
