@extends('layouts.layout')

@section('title', 'Contacto')
    
  
@section('content')

    <div class="d-sm-flex justify-content-center align-items-center vh-100 " >
        <div class="w-33 shadow-lg p-3 mb-5 bg-body rounded">
            <h1>Contactame</h1>
            <p>Tenes alguna duda o te gustaria que trabajemos juntos en un proyecto?</p>
            <div class="">
                <form action="{{ route('contact.send') }}" method="POST">
                    @csrf
                    <div class="form-group row mt-5">
                        <label class="col-sm-2 col-form-label">Nombre</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control-plaintext  border border-dark rounded" name="name" placeholder=" Ingrese su Nombre">
                        </div>
                    </div>
                    <div class="form-group row mt-5">
                        <label class="col-sm-2 col-form-label">Telefono</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control-plaintext border border-dark rounded" name="phone" placeholder=" Ingrese su Telefono">
                        </div>
                    </div>
                    <div class="form-group row mt-5">
                        <label class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control-plaintext border border-dark rounded" name="email" placeholder=" Ingrese su Email">
                        </div>
                    </div>
                    <div class="form-group row mt-5">
                        <label class="col-sm-2 col-form-label">Asunto</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control-plaintext border border-dark rounded" name="subject" placeholder=" Asunto">
                        </div>
                    </div>
                    <div class="form-group row mt-5">
                        <label class="col-sm-2 col-form-label">Mensaje</label>
                        <div class="col-sm-10 ">
                            <textarea class="form-control border border-dark" name="message" placeholder="Ingrese su Consulta"></textarea>
                        </div>
                        <button class="btn btn-success col-md-13 mt-3">Enviar</button>
                    </div>
                    <div class="align-items-center">
                      
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
    
@endsection
