@extends('layouts.layout')
@section('title', "{!!$post->title!!}")
    
@section('content')
    
<section class="container-fluid content py-5">
    <div class="row justify-content-center">
        <!-- Post -->
        <div class="col-12 col-md-7 text-center">
            <h1>{{$post->title}}</h1>
            <hr>
            <img src="{{asset($post->featured)}}" alt="{{$post->title}}" class="img-fluid">

            <p class="text-left mt-3 post-txt">
                <span>{{$post->author}}</span>
                <span class="float-right">Publicado:{{\Carbon\Carbon::parse($post['created_at'])->diffForHumans() }}</span>
            </p>
            <p class="prose lg:prose-xl text-left text-dark">
               {!! $post->content !!}
            </p>
            <p class="text-left post-txt"><i>Categoría: {{$post->category->name}}</i></p>
        </div>
        <p>Compartir!</p>
        {!!Share::currentPage()->facebook('title')
            ->twitter('title')
            ->linkedin('title')
            ->telegram('title')
            ->whatsapp('title');!!}
            
        
        
        <!-- Entradas recientes -->
        <div class="col-md-3 offset-md-1">
            <p class="text-dark">Últimas entradas</p>
            @foreach ($latestPost as $latestPost)
            <div class="row mb-4">
                <div class="col-4 p-0">
                    <a href="{{route('post', $post->id)}}">
                        <img src="{{asset($latestPost->featured)}}" class="img-fluid rounded" width="100" alt="">
                    </a>
                </div>
                <div class="col-7 pl-0">
                    <a href="{{route('post', $latestPost->id)}}" class="link-post">{{$latestPost->title}}</a>
                </div>
            </div>
            @endforeach
            
        </div>

    </div>
</section>

<!-- Posts relacionados -->
{{-- <section class="container-fluid content py-5">
    <div class="row justify-content-center">
        <!-- Post -->
        <div class="col-12 text-center">
            <h2>Entradas relacionadas</h2>
            <hr class="post-hr">
        </div>
        <!-- Post 1 -->
        <div class="col-md-4 col-12 justify-content-center mb-5">
            <div class="card m-auto" style="width: 18rem;">
                <img class="card-img-top" src="{{asset('images/3.png')}}" alt="Post Python">
                <div class="card-body">
                    <small class="card-txt-category">Categoría: Programación</small>
                    <h5 class="card-title my-2">Aprende Python en un dos tres</h5>
                    <div class="d-card-text">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Sed voluptatum ab cumque quisquam quod nesciunt fugiat,
                        eius corrupti nulla veniam, molestias nemo repudiandae?
                    </div>
                    <a href="#" class="post-link"><b>Leer más</b></a>
                    <hr>
                    <div class="row">
                        <div class="col-6 text-left">
                            <span class="card-txt-author">YouDevs</span>
                        </div>
                        <div class="col-6 text-right">
                            <span class="card-txt-date">Hace 2 semanas</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Post 2 -->
        <div class="col-md-4 col-12 justify-content-center mb-5">
            <div class="card m-auto" style="width: 18rem;">
                <img class="card-img-top" src="{{asset('images/3.png')}}" alt="Post Python">
                <div class="card-body">
                    <small class="card-txt-category">Categoría: Programación</small>
                    <h5 class="card-title my-2">Aprende Python en un dos tres</h5>
                    <div class="d-card-text">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Sed voluptatum ab cumque quisquam quod nesciunt fugiat,
                        eius corrupti nulla veniam, molestias nemo repudiandae?
                    </div>
                    <a href="#" class="post-link"><b>Leer más</b></a>
                    <hr>
                    <div class="row">
                        <div class="col-6 text-left">
                            <span class="card-txt-author">YouDevs</span>
                        </div>
                        <div class="col-6 text-right">
                            <span class="card-txt-date">Hace 2 semanas</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Post 3 -->
        <div class="col-md-4 col-12 justify-content-center mb-5">
            <div class="card m-auto" style="width: 18rem;">
                <img class="card-img-top" src="{{asset('images/3.png')}}" alt="Post Python">
                <div class="card-body">
                    <small class="card-txt-category">Categoría: Programación</small>
                    <h5 class="card-title my-2">Aprende Python en un dos tres</h5>
                    <div class="d-card-text">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Sed voluptatum ab cumque quisquam quod nesciunt fugiat,
                        eius corrupti nulla veniam, molestias nemo repudiandae?
                    </div>
                    <a href="#" class="post-link"><b>Leer más</b></a>
                    <hr>
                    <div class="row">
                        <div class="col-6 text-left">
                            <span class="card-txt-author">YouDevs</span>
                        </div>
                        <div class="col-6 text-right">
                            <span class="card-txt-date">Hace 2 semanas</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}
@endsection

@section('js')

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
<script src="{{ asset('js/share.js') }}"></script>
@stop 