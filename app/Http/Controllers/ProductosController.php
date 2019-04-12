<?php

namespace App\Http\Controllers;

use App\Productos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; //borrado de imagenes.

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $request->user()->authorizeRoles('admin');
        $datos['productos'] = Productos::paginate(3);
        return view('productos.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('productos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validación de datos.
        $campos=[
            'nombre' => 'required|string|min:2|max:100',
            'descripcion' => 'required|string|max:255',
            'precio' => 'required|numeric|max:1000000',
            'cantidad' => 'required|numeric|max:10000',
            'foto' => 'required|image|max:1000|mimes:jpeg,png,jpg'
        ];

        $mensaje=["required"=>'Debe completar el campo :attribute.'];
        $this->validate($request,$campos,$mensaje);



        $datosProducto = request()->except('_token');
        if ($request->hasFile('foto')) {
            $datosProducto['foto'] = $request->file('foto')->store('uploads', 'public'); //Almacenamos la foto en la carpeta /storage/app/public/uploads
        }
        Productos::insert($datosProducto);
        return redirect('productos')->with('mensaje_confirm', ' Producto añadido correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function show(Productos $productos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $producto = Productos::findOrFail($id);

        return view('productos.edit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        //Validación de datos.
        $campos=[
            'nombre' => 'required|string|max:100',
            'descripcion' => 'required|string|max:500',
            'precio' => 'required|numeric|max:1000000',
            'cantidad' => 'required|numeric|max:10000'
            
        ];

        if ($request->hasFile('foto')) {
            $campos += ['foto' => 'required|image|max:10000|mimes:jpeg,png,jpg'];
        }

        $mensaje=["required"=>'Debe completar el campo :attribute.'];
        $this->validate($request,$campos,$mensaje);


        $datosProducto = request()->except(['_token', '_method']);

        if ($request->hasFile('foto')) {
            $producto = Productos::findOrFail($id); //Información antigua.
            Storage::delete('public/' . $producto->foto);
            $datosProducto['foto'] = $request->file('foto')->store('uploads', 'public'); //Almacenamos la foto en la carpeta /storage/app/public/uploads
        }

        Productos::where('id', '=', $id)->update($datosProducto);

        //$producto=Productos::findOrFail($id); //Información actual.
        //return view('productos.edit', compact('producto'));
        return redirect('productos')->with('mensaje_confirm', ' Producto actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $producto = Productos::findOrFail($id); //Información antigua.
        if (Storage::delete('public/' . $producto->foto)) {
            Productos::destroy($id);
        }

        return redirect('productos')->with('mensaje_confirm', ' Producto eliminado.');
    }
}

