
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <body>
                        <p>Categorias</p>
                        <table>
                            <thead>
                                <th>id Categoria</th>
                                <th>Nombre Categoria</th>
                            </thead>
                          
                                @foreach ($categories as $categoria)
                                <tbody>
                                <th>{{$categoria->id}}</th>
                                <th>{{$categoria->name}}</th>
                            </tbody>
                                @endforeach
                            
                          
                        </table>
                    </body>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
