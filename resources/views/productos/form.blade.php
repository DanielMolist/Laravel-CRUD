<div class="row">
    <div class="col-lg-6">
        <div class="form-group">
            <label for="nombre" class="h3">Nombre</label>
            <input type="text" value="{{isset($producto->nombre)? $producto->nombre : old('nombre')}}" class="form-control {{$errors->has('nombre')?'is-invalid':''}}" id="nombre" name="nombre" aria-describedby="Nombre" placeholder="Nombre de la nota" >
            {!! $errors->first('nombre','<div class="alert alert-danger">:message</div>') !!}
        </div>
        
        <div class="form-group">
            <label for="descripcion" class="h3">Descripción</label>
            <textarea class="form-control {{$errors->has('descripcion')?'is-invalid':''}}" id="descripcion" name="descripcion" rows="5" placeholder="Descipción del producto" >{{isset($producto->descripcion)? $producto->descripcion : old('descripcion')}}</textarea>
            {!! $errors->first('descripcion','<div class="alert alert-danger">:message</div>') !!}
        </div>
        <div class="form-group">
            <label for="precio" class="h3">Precio</label>
            <input type="number" value="{{isset($producto->precio)? $producto->precio : old('precio')}}" class="form-control {{$errors->has('precio')?'is-invalid':''}}" id="precio" name="precio" aria-describedby="Precio" placeholder="0.0 €" step="any" >
            {!! $errors->first('precio','<div class="alert alert-danger">:message</div>') !!}
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label for="cantidad" class="h3">Cantidad</label>
            <input type="number" value="{{isset($producto->cantidad)? $producto->cantidad : old('cantidad')}}" class="form-control {{$errors->has('cantidad')?'is-invalid':''}}" id="cantidad" name="cantidad" aria-describedby="Precio" placeholder="0" >
            {!! $errors->first('cantidad','<div class="alert alert-danger">:message</div>') !!}
        </div>
        <div class="form-group">
            <label for="foto" class="h3">Imagen</label><br>
            @if(isset($producto->foto))
            <img src="{{asset('storage').'/'.$producto->foto}}" id="foto_actual" name="foto_actual" alt="Imagen del producto" width="200">
            @endif
            <input id="foto" name="foto" type="file" class="file" data-show-preview="false">
            {!! $errors->first('foto','<div class="alert alert-danger">:message</div>') !!}
        </div>
    </div>
</div>
<div class="my-4 text-center">
    <button type="submit" class="btn btn-primary">
        {{$accion == 'create'? 'Añadir' : 'Editar'}}
    </button>
    <a href="/productos" class="btn btn-warning">Cancelar</a>
</div> 