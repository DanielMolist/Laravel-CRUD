@extends('plantilla')
@section('title','Editar')
@section('contenido')
<div class="row mt-3">
    <div class="col-lg-3"></div>
    <div class="col-lg-7">
        <form method="POST" action="{{url('/productos/'.$producto->id)}}" enctype="multipart/form-data">
            {{ csrf_field() }} <!-- Añade token -->
            {{method_field('PATCH')}}
            @include('productos.form', ['accion'=> 'edit'])
        </form>
    </div>
    <div class="col-lg-2"></div>
</div>


@endsection 