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
                            <h1>Noticias</h1>
                            <hr>
                            <!--<a class="btn-solid-lg page-scroll" href="#services">Ingresar</a>-->
                        </div> <!-- end of text-container -->
                    </div> <!-- end of col -->
                    <div class="col-lg-6">
                        <div class="image-container">
                            <img class="img-fluid" src="/images/home/details-lightbox-2.svg" alt="alternative">
                        </div> <!-- end of image-container -->
                    </div> <!-- end of col -->
                </div> <!-- end of row -->
            </div> <!-- end of container -->
        </div> <!-- end of header-content -->
    </header> <!-- end of header -->
    <!-- end of header -->
    <!-- Request -->
        <div class="container">
            <div class="row">
                <hr>
                @foreach($posts as $post)
                    <div class="row basic-post-indi">
                        <div class="col-lg-7">
                            <div class="contente-text">
                                <h2><b>{{$post['title']}}</b></h2>
                                <p><em><b>Publicado el: {{$post['created_at']}}</b></em></p>
                                <hr>
                                {!!getShorterString($post['content'],200) !!}
                                <hr>
                                <a class="btn-solid-reg" href="/home/{{$post['id']}}">Leer mas</a>
                            </div>
                        </div>

                        <div class="col-lg-5">
                            <div class="contente-galery-2">
                                <img class="card-galery-2" src="{{asset('storage/images/posts_images/'.$post['image_url']) }}" alt="{{$post['image_url']}}">
                            </div>
                        </div>

                    </div>
                    <hr>
            @endforeach

            </div> <!-- end of col -->
        </div> <!-- end of row -->
    <!-- end of request -->
    <hr>
@endsection
