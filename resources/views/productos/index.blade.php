@extends('plantilla')

@section('title','Productos')

@section('contenido')
<div class="row">
    <div class="col-lg-12 text-center">
        @if(Session::has('mensaje_confirm'))
        <div class="alert alert-info">
            <strong>¡Atento!</strong>{{Session::get('mensaje_confirm')}}
        </div>
        @endif
    </div>
</div>
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">#id</th>
            <th scope="col">Foto</th>
            <th scope="col">Nombre</th>
            <th scope="col">Descripción</th>
            <th scope="col">Precio</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse($productos as $fila)
        <tr>
            <th scope="row">{{$fila->id}}</th>
            <td><img src="{{asset('storage').'/'.$fila->foto}}" alt="Imagen del producto" width="150"></td>
            <td class="pt-5">{{$fila->nombre}}</td>
            <td class="pt-5">{{$fila->descripcion}}</td>
            <td class="pt-5">{{$fila->precio}}</td>
            <td class="pt-5">{{$fila->cantidad}}</td>
            <td class="pt-5">
                <form action="{{url('/productos/'.$fila->id)}}" method="post">

                    <!-- Boton Editar -->
                    <a href="{{url('/productos/'.$fila->id.'/edit')}}" class="btn btn-primary">Editar</a>

                    {{ csrf_field() }} <!-- Añade token -->
                    {{method_field('DELETE')}}
                    <!-- Boton Borrar -->
                    <button type="submit" class="btn btn-danger" onclick="return confirm('¡Cuidado! ¿Desea borrar el producto?')">Borrar</button>
                </form>
            </td>
        </tr>
        @empty
            <p>No hay productos que mostrar.</p>
        @endforelse
    </tbody>
</table>
    <div class="row">
        <div class="col-lg-4"></div>
        <div class="col-lg-4"></div>
        <div class="col-lg-4">{{$productos->links()}}</div>
    </div>
<div class="text-center mb-3">
    <a href="productos/create" class="btn btn-success">Añadir</a>
</div>

@endsection