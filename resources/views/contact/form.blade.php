@extends('layouts.layout')

@section('title', 'Contacto')
    
  
@section('content')

    <div class="d-flex justify-content-center align-items-center vh-100" >
        <div>
        <form action="{{ route('contact.send') }}" method="POST">
        @csrf
            <div class="form-group row mt-5">
                <label class="col-lg-2 col-form-label">Nombre</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control-plaintext" name="name" placeholder="Ingrese su Nombre">
                </div>
            </div>
            <div class="form-group row mt-5">
                <label class="col-sm-2 col-form-label">Telefono</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control-plaintext" name="phone" placeholder="Ingrese su Telefono">
                </div>
            </div>
            <div class="form-group row mt-5">
                <label class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control-plaintext" name="email" placeholder="Ingrese su Email">
                </div>
            </div>
            <div class="form-group row mt-5">
                <label class="col-sm-2 col-form-label">Asunto</label>
                <div class="col-sm-10">
                <input type="text" class="form-control-plaintext" name="subject" placeholder="Asunto">
                </div>
            </div>
            <div class="form-group row mt-5">
                <label class="col-sm-2 col-form-label">Mensaje</label>
                <div class="col-sm-10">
                    <textarea name="message" cols="50" placeholder="Ingrese su Consulta"></textarea>
                </div>
            <button class="btn btn-info col-md-10">Enviar</button>
            </div>
        </form>
        </div>
    </div>
    
@endsection