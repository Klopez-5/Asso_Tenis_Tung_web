@extends('layouts.home-page')

@section('content')
    <!-- Page Header -->

    <!-- Header -->
    <header id="header" class="header">
        <div class="header-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="text-container">
                            <h1>{{$post['title']}}</h1>
                            <h1></h1>
                            <span class="subheading">Creado por {{ $post->user['name'] }} el {{ $post->user['created_at'] }}</span>
                            <br>
                            <hr>
                            <div class="container">

                                        <p>{!!$post['content']!!}</p>

                            </div>
                            <!--<a class="btn-solid-lg page-scroll" href="#services">Ingresar</a>-->
                        </div> <!-- end of text-container -->
                    </div> <!-- end of col -->
                    <div class="col-lg-6">
                        <div class="contente-post-img">
                            <img class="card-post-img" src="{{asset('storage/images/posts_images/'.$post['image_url']) }}" alt="alternative">
                        </div> <!-- end of image-container -->
                    </div> <!-- end of col -->
                </div> <!-- end of row -->
            </div> <!-- end of container -->
        </div> <!-- end of header-content -->
    </header> <!-- end of header -->
    <!-- end of header -->

    <hr>
@endsection
