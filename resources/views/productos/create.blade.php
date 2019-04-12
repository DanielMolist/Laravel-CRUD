@extends('plantilla')
@section('title','Nuevo Producto')
@section('contenido')
<div class="row mt-3">
    <div class="col-lg-3"></div>
    <div class="col-lg-7">
        <!--
        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
        -->
        <form method="POST" action="{{'/productos'}}" enctype="multipart/form-data">
            {{ csrf_field() }} <!-- Añade token -->
            @include('productos.form', ['accion' => 'create'])
        </form>
    </div>
    <div class="col-lg-2"></div>
</div>
@endsection